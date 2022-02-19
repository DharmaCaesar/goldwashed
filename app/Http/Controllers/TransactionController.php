<?php

namespace App\Http\Controllers;

use App\Models\Members;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function takemember(Request $request){
        if($request -> ajax()){
            $data = $request -> validate([
                'id' => ['required']
            ]); 

            $member = Members::find($data['id']);
            return response() -> json(['response' => $member]);
        }
    }
}
