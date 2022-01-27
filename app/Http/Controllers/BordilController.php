<?php

namespace App\Http\Controllers;

use App\Models\Outlets;
use App\Models\Packages;
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

    public function createpackages(Request $request){
        $data = $request -> validate([
            'package_type' => ['required'],
            'package_name' => ['required'],
            'package_price' => ['required'],
            'outlet_id' => ['required'],
        ]);

        $packages = new Packages;
        $packages -> package_type = $data ['package_type'];
        $packages -> package_name = $data ['package_name'];
        $packages -> package_price = $data ['package_price'];
        $packages -> outlet_id = $data ['outlet_id'];
        if($packages -> save()){
            return redirect() -> back();
        } else {
            return redirect() -> back();
        }
    }
}
