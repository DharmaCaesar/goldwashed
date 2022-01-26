<?php

namespace App\Http\Controllers;

use App\Models\Outlets;
use Illuminate\Http\Request;

class BordilController extends Controller
{
    public function createoutlet(Request $request){
        $data = $request -> validate ([
            'outlet_name' => ['required'],
            'outlet_address' => ['required'],
            'outlet_phone' => ['required'],
            'status' => ['required'] 
        ]);

        $outlet = new Outlets;
        $outlet -> outlet_name = $data ['outlet_name'];
        $outlet -> outlet_address = $data ['outlet_address' ];
        $outlet -> outlet_phone = $data ['outlet_phone'];
        $outlet -> status = $data ['status'];
        if($outlet -> save()){
            return redirect() -> back(); 
        } else {
            return redirect() -> back();
        }
    }
}
