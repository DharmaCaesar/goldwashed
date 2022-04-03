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
     * Return a view to the user
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
     * On request from an AJAX, update the selected column and row then return a success to the user with JSON.
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

            if ($absen->update()) {
                return response()->json(['success' => 'Status changed successfully.']);
            }
        }
    }

    public function selesai(Request $request)
    {
        if ($request->ajax()) {
            $validatedData = $request->validate([
                'id' => 'required|numeric'
            ]);

            $absen = absen::find($validatedData['id']);

            if ($absen->update()) {
                return response()->json(['success' => 'Status changed successfully.']);
            }
        }
    }

    /**
     * On POST request from a form, validate the data received and create a new item, if successful, return with a success.
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
     * On AJAX request upon opening an edit modal, receive a request with id parameter, validate, then return the data to the user
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
     * On POST request from an edit modal, validate the data received and update the item, if successful, return with a success.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'nama_karyawan' => 'required|max:100',
            'tanggal_masuk' => 'required|date',
            'waktu_masuk_kerja' => 'required|time',
            'status' => 'required',
            'waktu_akhir_kerja' => 'required|time'
        ]);

        $absen = absen::find($validatedData['id']);
        $absen->nama_karyawan = $validatedData['nama_karyawan'];
        $absen->tanggal_masuk = $validatedData['tanggal_masuk'];
        $absen->waktu_masuk_kerja = $validatedData['waktu_masuk_kerja'];
        $absen->status = $validatedData['status'];
        $absen->waktu_akhir_kerja = $validatedData['waktu_akhir_kerja'];

        if ($absen->update()) {
            return redirect()->back();
        }
    }

    /**
     * On AJAX request upon opening a delete modal, receive a request with id parameter, validate, then return the data to the user
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
     * On POST request from a delete modal, validate the data received and delete the item, if successful, return with a success.
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
     * On GET request from an anchor in the blade, return a downloaded file in the form of xlsx format with the data from the database
     */
    public function export()
    {
        return Excel::download(new AbsenExport, date('Y-m-d H:i:s') . '_absen.xlsx');
    }

    /**
     * On POST request from a form in the import modal, validate the file data received, if exists, then get the file name,
     * and move it inside a folder within the public with the intended filename, then import the data from the file into the database.
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
