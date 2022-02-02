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

    public function editoutlet(Request $request){
        $data = $request -> validate ([
            'outlet_id' => ['required'],
            'outlet_name' => ['required'],
            'outlet_address' => ['required'],
            'outlet_phone' => ['required'],
            'status' => ['required'] 
        ]);

        $outlet = Outlets::find($data['outlet_id']);
        $outlet -> outlet_name = $data ['outlet_name'];
        $outlet -> outlet_address = $data ['outlet_address' ];
        $outlet -> outlet_phone = $data ['outlet_phone'];
        $outlet -> status = $data ['status'];
        if($outlet -> update()){
            return redirect() -> back();
        } else {
            return redirect() -> back();
        }
    }

    public function deleteoutlet(Request $request){
        $data = $request -> validate([
            'outlet_id' => ['required']
        ]);

        $outlet = Outlets::find($data['outlet_id']);
        if($outlet -> delete()){
            return redirect() -> back();
        } else {
            return redirect() -> back();
        }
    }
}
