<?php

namespace App\Http\Controllers;

use App\Models\Outlets;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request){
        $data = $request -> validate([
            'name' => ['required'],
            'username' => ['required'],
            'password' => ['required'],
            'outlet_name' => ['required'],
            'outlet_address' => ['required'],
            'outlet_phone' => ['required'],
            'admin_name' => ['required'],
            'admin_username' => ['required'],
            'admin_password' => ['required'],
        ]);

        $ownervalid = false;
        $outletvalid = false;
        $adminvalid = false;
        $owner = new User;
        $admin = new User;
        $outlet = new Outlets;

        $owner -> name = $data ['name'];
        $owner -> username = $data ['username'];
        $owner -> password = Hash::make($data ['password']);
        $owner -> role = 'OWNER';

        $outlet -> outlet_name = $data ['outlet_name'];
        $outlet -> outlet_address = $data ['outlet_address'];
        $outlet -> outlet_phone = $data ['outlet_phone'];
        $outlet -> status = 'CLOSED';

        $admin -> name = $data ['admin_name'];
        $admin -> username = $data ['admin_username'];
        $admin -> password = Hash::make($data ['admin_password']);
        $admin -> role = 'ADMIN';

        if($outlet -> save()){
            $outletvalid = true;
            $owner -> outlet_id = $outlet -> id;
            $admin -> outlet_id = $outlet -> id;
        }

        if($owner -> save()){
            $ownervalid = true;
        }

        if($admin -> save()){
            $adminvalid = true;
        }

        if($outletvalid && $ownervalid && $adminvalid){
            return redirect('/');
        } else {
            $owner -> delete();
            $outlet -> delete();
            $admin -> delete();
            return redirect('/register');
        }

    }
}
