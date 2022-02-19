<?php

namespace App\Http\Controllers;

use App\Models\Members;
use App\Models\Packages;
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

    // public function get_package(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $validatedData = $request->validate([
    //             'id' => ['required']
    //         ]);

    //         $packageData = Packages::find($validatedData['id']);

    //         return response()->json(['response' => $packageData]);
    //     }
    // }

    public function addpackage(Request $request)
    {
        if ($request->ajax()) {
            $validatedData = $request->validate([
                'id' => ['required']
            ]);

            $packageData = Packages::find($validatedData['id']);

            return response()->json(['response' => $packageData]);
        }
    }
}
