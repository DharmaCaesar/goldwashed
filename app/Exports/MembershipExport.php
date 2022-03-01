<?php

namespace App\Exports;

use App\Models\Members;
use Maatwebsite\Excel\Concerns\FromCollection;

class MembershipExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Members::all();
    }
}
