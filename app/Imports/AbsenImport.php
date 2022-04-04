<?php

namespace App\Imports;

use App\Models\absen;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class AbsenImport implements ToModel, WithStartRow
{
    /**
    * @param Collection $collection
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    // public function collection(Collection $collection)
    // {
    //     return penjemputan::all();
    // }

    public function startRow(): int{
        return 4;
    }

    public function model(array $row)
    {
        return new absen([
            'nama_karyawan' => $row[1],
            'tanggal_masuk' => $row[2],
            'waktu_masuk_kerja' => $row[3],
            'waktu_akhir_kerja' => $row[4],
            'status' => $row[5]
        ]);
    }
}
