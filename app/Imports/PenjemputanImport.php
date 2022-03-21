<?php

namespace App\Imports;

use App\Models\penjemputan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class PenjemputanImport implements ToModel, WithStartRow
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
        return new penjemputan([
            'member_id' => $row[1],
            'member_name' => $row[2],
            'member_address' => $row[3],
            'member_phone' => $row[4],
            'petugas_penjemputan' => $row[5],
            'status' => $row[6]
        ]);
    }
}
