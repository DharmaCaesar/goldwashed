<?php

namespace App\Http\Controllers;

use App\Models\Members;
use App\Models\Outlets;
use App\Models\Packages;
use App\Models\penjemputan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EditController extends Controller
{
// BAGIAN AWAL OUTLET
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
            return redirect() -> back() -> with('success', 'Deleting was completed, there is nothing no to worry');
        } else {
            return redirect() -> back() -> with('failure', 'There has problem to deleting the data!!!');
        }
    }
// BAGIAN AKHIR OUTLET

// BAGIAN AWAL PACKAGES
    public function catchpackages(Request $request){
        if($request -> ajax()){
            $data = $request -> validate([
                'id' => ['required']
            ]);
            $package = Packages::find($data['id']);
            return response() -> json(['response' => $package]);
        }
    }

    public function editpackages(Request $request){
        $data = $request -> validate ([
            'package_id' => ['required'],
            'package_name' => ['required'],
            'package_type' => ['required'],
            'package_price' => ['required']
        ]);

        $package = Packages::find($data['package_id']);
        $package -> package_name = $data ['package_name'];
        $package -> package_type = $data ['package_type' ];
        $package -> package_price = $data ['package_price'];
        if($package -> update()){
            return redirect() -> back();
        } else {
            return redirect() -> back();
        }
    }

    public function deletepackages(Request $request){
        $data = $request -> validate([
            'package_id' => ['required']
        ]);

        $package = Packages::find($data['package_id']);
        if($package -> delete()){
            return redirect() -> back() -> with('success', 'Deleting was completed, there is nothing no to worry');
        } else {
            return redirect() -> back() -> with('failure', 'There has problem to deleting the data!!!');
        }
    }
// BAGIAN AKHIR PACKAGES

// BAGIAN AWAL MEMBERSHIP
    public function catchmember(Request $request){
        if($request -> ajax()){
            $data = $request -> validate([
                'id' => ['required']
            ]);
            $member = Members::find($data['id']);
            return response() -> json(['response' => $member]);
        }
    }

    public function editmember(Request $request){
        $data = $request -> validate ([
            'member_id' => ['required'],
            'member_name' => ['required'],
            'member_address' => ['required'],
            'member_phone' => ['required'],
            'member_gender' => ['required']
        ]);

        $member = Members::find($data['member_id']);
        $data ['member_phone'] = '+62' . $data ['member_phone'];
        $member -> member_name = $data ['member_name'];
        $member -> member_address = $data ['member_address' ];
        $member -> member_phone = $data ['member_phone'];
        $member -> member_gender = $data ['member_gender'];
        if($member -> update()){
            return redirect() -> back();
        } else {
            return redirect() -> back();
        }
    }

    public function deletemember(Request $request){
        $data = $request -> validate([
            'member_id' => ['required']
        ]);

        $member = Members::find($data['member_id']);
        if($member -> delete()){
            return redirect() -> back() -> with('success', 'Deleting was completed, there is nothing no to worry');
        } else {
            return redirect() -> back() -> with('failure', 'There has problem to deleting the data!!!');
        }
    }
// BAGIAN AKHIR MEMBERSHIP

// BAGIAN AWAL user
public function catchuser(Request $request){
    if($request -> ajax()){
        $data = $request -> validate([
            'id' => ['required']
        ]);
        $user = User::find($data['id']);
        return response() -> json(['response' => $user]);
    }
}

public function edituser(Request $request){
    $data = $request -> validate([
        'role' => ['required'],
        'name' => ['required'],
        'username' => ['required'],
        'password' => ['required'],
    ]);

    $user = new User();
    $user -> role = $data ['role'];
    $user -> name = $data ['name'];
    $user -> username = $data ['username'];
    $user -> password = Hash::make($data ['password']);
    if($user -> update()){
        return redirect() -> back();
    } else {
        return redirect() -> back();
    }
}

public function deleteuser(Request $request){
    $data = $request -> validate([
        'user_id' => ['required']
    ]);

    $user = User::find($data['user_id']);
    
    $outlet = Outlets::find($user -> outlet_id);
    $package = Packages::where('outlet_id', $user -> outlet_id);
    
    if($user -> delete()){

        if ($user -> count() == 0){
            $outlet -> delete();
            $package -> delete();
        }

        if ($user -> role == 'OWNER'){
            User::where('outlet_id', Auth::user() -> outlet_id) -> delete();
            $outlet -> delete();
            $package -> delete();
            return redirect('/') -> with('success', 'Deleting was completed, there is nothing no to worry');
        }
 
        return redirect() -> back() -> with('success', 'Deleting was completed, there is nothing no to worry');
    } else {
        return redirect() -> back() -> with('failure', 'There has problem to deleting the data!!!');
    }
}
// BAGIAN AKHIR user

// BAGIAN AWAL PENJEMPUTAN
public function editpenjemputan(Request $request)
    {
        $data = $request -> validate([
            'id' => ['required'],
            'petugas_penjemputan' => ['required'],
            'status' => ['required'],
            'member_id' => ['required'],
            'member_name' => ['required'],
            'member_address' => ['required'],
            'member_phone' => ['required']
        ]);

        $data ['member_phone'] = '+' . $data ['member_phone'];
        $penjemputan = penjemputan::find($data['id']);
        $penjemputan -> petugas_penjemputan = $data['petugas_penjemputan'];
        $penjemputan -> status = $data ['status'];
        $penjemputan -> member_id = $data ['member_id'];
        $penjemputan -> member_name = $data ['member_name'];
        $penjemputan -> member_address = $data ['member_address'];
        $penjemputan -> member_phone = $data ['member_phone'];
        if($penjemputan -> update()){
            return redirect() -> back();
        } else {
            return redirect() -> back();
        }
    }

public function delete(Request $request){
    $data = $request -> validate([
        'member_id' => ['required']
    ]);

    $member = penjemputan::find($data['member_id']);
    if($member -> delete()){
        return redirect() -> back() -> with('success', 'Deleting was completed, there is nothing no to worry');
    } else {
        return redirect() -> back() -> with('failure', 'There has problem to deleting the data!!!');
    }
}
// BAGIAN AKHIR PENJEMPUTAN
}
