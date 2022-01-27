<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuLogController extends Controller
{
    public function login(Request $request){
        $data = $request -> validate([
            'username' => ['required'],
            'password' => ['required']
        ]);
        if (Auth::attempt($data)) {
            $request->session()->regenerate();

            return redirect('/home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
