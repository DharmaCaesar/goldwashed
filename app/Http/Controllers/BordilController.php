<?php

namespace App\Http\Controllers;

use App\Models\Members;
use App\Models\Outlets;
use App\Models\Packages;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Maatwebsite\Excel\ExcelServiceProvider;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MembershipExport;

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

    public function createmember(Request $request){
        $data = $request -> validate([
            'member_gender' => ['required'],
            'member_name' => ['required'],
            'member_address' => ['required'],
            'member_phone' => ['required'],
        ]);

        $data ['member_phone'] = '+62' . $data ['member_phone'];
        $member = new Members;
        $member -> member_gender = $data ['member_gender'];
        $member -> member_name = $data ['member_name'];
        $member -> member_address = $data ['member_address'];
        $member -> member_phone = $data ['member_phone'];
        if($member -> save()){
            return redirect() -> back();
        } else {
            return redirect() -> back();
        }
    }

    public function createuser(Request $request){
        $data = $request -> validate([
            'role' => ['required'],
            'name' => ['required'],
            'username' => ['required'],
            'password' => ['required'],
        ]);

        $user = new User();
        $user -> outlet_id = Auth::user() -> outlet_id;
        $user -> role = $data ['role'];
        $user -> name = $data ['name'];
        $user -> username = $data ['username'];
        $user -> password = Hash::make($data ['password']);
        if($user -> save()){
            return redirect() -> back();
        } else {
            return redirect() -> back();
        }
    }

    public function exportdata(){
        $date = date('Y-m-d');
        return Excel::download(new MembershipExport, $date.' Member.xlsx');
    }
}
