<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::get('/home', function(){
    return view('dashboard.home');
});

Route::get('/outlet', function(){
    return view('dashboard.outlet');
});

Route::get('/packages', function(){
    return view('dashboard.packages');
});

Route::get('/membership', function(){
    return view('dashboard.membership');
});