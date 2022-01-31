<?php

namespace App\Http\Controllers;

use App\Models\Outlets;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function catchoutlet(Request $request){
        if($request -> ajax()){
            $data = $request -> validate([
                'id' => ['required']
            ]);
            $outlet = Outlets::find($data['id']);
            return response() -> json(['response' => $outlet]);
        }
    }
}
