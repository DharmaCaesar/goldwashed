<?php

namespace App\Http\Controllers;

use App\Models\datab;
use Illuminate\Http\Request;

class databController extends Controller
{
    public function index(){
        $datab = datab::all();
        return view('dashboard.data', [
            'page' => 'datab',
            'databdata' => $datab
        ]);
    }
}
