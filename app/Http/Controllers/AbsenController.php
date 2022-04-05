<?php

namespace App\Http\Controllers;

use App\Exports\AbsenExport;
use App\Imports\AbsenImport;
use App\Models\absen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class AbsenController extends Controller
{
    /**
     * Mengembalikan view kepada user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $absen = absen::all();
        return view('dashboard.absen', [
            'page' => 'absen',
            'absendata' => $absen
        ]);
    }

    /**
     * Request dari AJAX ini akan mengupdate kolom dan baris yang dipilih, kemudian akan mengembalikan sukses kepada user dengan JSON.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function status(Request $request)
    {
        if ($request->ajax()) {
            $validatedData = $request->validate([
                'id' => 'required|numeric',
                'status' => 'required|string'
            ]);

            $absen = absen::find($validatedData['id']);
            $absen->status = $validatedData['status'];
            if($validatedData['status'] == 'CUTI' || $validatedData['status'] == 'SAKIT'){
                $absen -> waktu_akhir_kerja = '00:00:00';
                $absen -> waktu_masuk_kerja = '00:00:00';
            }

            if ($absen->update()) {
                return response()->json(['success' => 'Status changed successfully.']);
            }
        }
    }

    /**
     * Request dari AJAX ini akan mengupdate kolom dan baris yang dipilih, kemudian akan mengembalikan sukses kepada user dengan JSON.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function selesai(Request $request)
    {
        if ($request->ajax()) {
            $validatedData = $request->validate([
                'id' => 'required|numeric'
            ]);

            $absen = absen::find($validatedData['id']);
            $absen -> waktu_akhir_kerja = date('H:i:s');

            if ($absen->update()) {
                return response()->json(['success' => 'Status changed successfully.', 'waktu_akhir_kerja' => $absen->waktu_akhir_kerja]);
            }
        }
    }

    /**
     * Pada request POST dari form, validasi data yang diterima dan membuat item baru, jika berhasil, kembalikan dengan sukses.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_karyawan' => 'required|max:100',
            'tanggal_masuk' => 'required|date',
            'waktu_masuk_kerja' => 'required',
            'status' => 'required',
            'waktu_akhir_kerja' => 'required'
        ]);

        if($validatedData['status'] == 'MASUK') {
            $validatedData['waktu_akhir_kerja'] = '00:00:00';
        } else {
            $validatedData['waktu_masuk_kerja'] = '00:00:00';
            $validatedData['waktu_akhir_kerja'] = '00:00:00';
        }

        // $validatedData['waktu_masuk_kerja']=now();
        // $validatedData['waktu_akhir_kerja']=now();

        $absen = absen::create($validatedData);

        if ($absen) {
            return redirect()->back()->with('success', 'Data berhasil di tambahkan');
        }
    }

    /**
     * Request AJAX saat membuka modal edit, menerima request dengan parameter id, validasi, kemudian mengembalikan data kepada user
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Request $request)
    {
        if ($request->ajax()) {
            $validatedData = $request->validate([
                'id' => 'required|numeric'
            ]);

            $absen = absen::find($validatedData['id']);

            return response()->json($absen);
        }
    }

    /**
     * Pada request POST dari modal edit, validasi data yang diterima dan mengupdate item, jika berhasil, kembalikan dengan sukses.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|numeric',
            'nakar' => 'required|max:100',
            'tama' => 'required|date',
            'wama' => 'required',
            'status' => 'required',
            'waseke' => 'required'
        ]);

        if($validatedData['status'] == 'MASUK') {
            $validatedData['waseke'] = '00:00:00';
        } else {
            $validatedData['wama'] = '00:00:00';
            $validatedData['waseke'] = '00:00:00';
        }

        $absen = absen::find($validatedData['id']);
        $absen->nama_karyawan = $validatedData['nakar'];
        $absen->tanggal_masuk = $validatedData['tama'];
        $absen->waktu_masuk_kerja = $validatedData['wama'];
        $absen->status = $validatedData['status'];
        $absen->waktu_akhir_kerja = $validatedData['waseke'];

        if ($absen->update()) {
            return redirect()->back();
        }
    }

    /**
     * Request AJAX saat membuka modal delete, menerima request dengan parameter id, validasi, kemudian mengembalikan data kepada user
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request)
    {
        if ($request->ajax()) {
            $validatedData = $request->validate([
                'id' => 'required'
            ]);

            $absen = absen::find($validatedData['id']);

            return response()->json($absen);
        }
    }

    /**
     * Pada request POST dari modal delete, validasi data yang diterima dan menghapus item, jika berhasil, kembalikan dengan sukses.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required'
        ]);

        $absen = absen::find($validatedData['id']);

        if ($absen->delete()) {
            return redirect()->back();
        }
    }

    /**
     * Pada request GET dari anchor di blade, kembalikan file yang didownload dalam bentuk xlsx dengan data dari database
     * @return \Maatwebsite\Excel\Facades\Excel
     */
    public function export()
    {
        return Excel::download(new AbsenExport, date('Y-m-d H:i:s') . '_absen.xlsx');
    }

    /**
     * Pada request POST dari form di modal import, validasi data file yang diterima, jika ada, maka ambil nama file, dan pindahkan file tersebut ke dalam folder public dengan nama file yang dituju, kemudian impor data dari file ke database.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function import(Request $request)
    {
        $request->validate([
            'file' => ['required', 'mimes:xls,xlsx']
        ]);

        $file = $request->file('file');

        if ($file != null) {
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('import'), $fileName);

            Excel::import(new AbsenImport, public_path('import/' . $fileName));

            Storage::delete('import/' . $fileName);

            return redirect()->back()->with('success', 'absen imported successfully');
        }
    }
}
