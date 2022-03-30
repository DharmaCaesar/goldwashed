<?php

namespace App\Imports;

use App\Models\datab;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class DatabImport implements ToModel, WithStartRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //
    }

    public function startRow(): int{
        return 4;
    }

    public function model(array $row)
    {
        return new datab([
            'id' => $row[1],
            'product_name' => $row[2],
            'qty' => $row[3],
            'price' => $row[4],
            'buydate' => $row[5],
            'supply' => $row[6],
            'status' => $row[7],
            'update_at' => $row[8]
        ]);
    }    
}
