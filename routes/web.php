<?php

use App\Http\Controllers\AuLogController;
use App\Http\Controllers\BordilController;
use App\Models\Outlets;
use App\Models\Packages;
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
    $outletdata = Outlets::all();
    return view('dashboard.outlet', ['outletdata' => $outletdata]);
});

Route::get('/packages', function(){
    $packagesdata = Packages::all();
    return view('dashboard.packages', ['packagesdata' => $packagesdata]);
});

Route::get('/membership', function(){
    return view('dashboard.membership');
});

Route::post('/createoutlet', [BordilController::class, 'createoutlet']);

Route::post('/createpackages', [BordilController::class, 'createpackages']);

Route::post('/login', [AuLogController::class, 'login']);