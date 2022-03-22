<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuLogController extends Controller
{
    /**
     * Function yang dipanggil dengan request Login melalui Post dan mengatur sesi masuk sesuai pengguna tertentu 
     * @param Request $request
     * @return \illuminate\Http\RedirectResponse
     */
    public function login(Request $request){
        $data = $request -> validate([
            'username' => ['required'],
            'password' => ['required']
        ]);
        if (Auth::attempt($data)) {
            $request->session()->regenerate();

            return redirect() -> route('home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Function yang dipanggil dengan request Logout melalui Get untuk menghilangkan sesi dan Logout lalu buat ulang token
     * @param Request $request
     * @return \illuminate\Http\RedirectResponse
     */
    public function logout(Request $request){
        Auth::logout();

        $request -> session() -> invalidate();

        $request -> session() -> regenerateToken();

        return redirect('/');
    }
}
