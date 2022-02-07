<?php

use App\Http\Controllers\AuLogController;
use App\Http\Controllers\BordilController;
use App\Http\Controllers\EditController;
use App\Models\Logs;
use App\Models\Members;
use App\Models\Outlets;
use App\Models\Packages;
use App\Models\Register;
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

Route::middleware(['auth.basic']) -> group(function(){

Route::get('/home', function(){
    return view('dashboard.home');
});

Route::get('/outlet', function(){
    $outletdata = Outlets::all();
    $logsdata = Logs::where('models', 'outlets') -> get();
    return view('dashboard.outlet', ['outletdata' => $outletdata, 'page' => 'outlets', 'logsdata' => $logsdata]);
});

Route::get('/packages', function(){
    $packagesdata = Packages::all();
    $logsdata = Logs::where('models', 'packages') -> get();
    return view('dashboard.packages', ['packagesdata' => $packagesdata, 'page' => 'packages', 'logsdata' => $logsdata]);
});

Route::get('/membership', function(){
    $memberdata = Members::all();
    $logsdata = Logs::where('models', 'members') -> get();
    return view('dashboard.membership', ['memberdata' => $memberdata, 'page' => 'membership', 'logsdata' => $logsdata]);
});

Route::get('/regis', function(){
    $registerdata = Register::all();
    $logsdata = Logs::where('models', 'register') -> get();
    return view('dashboard.register', ['registerdata' => $registerdata, 'page' => 'register', 'logsdata' => $logsdata]);
});

Route::post('/createoutlet', [BordilController::class, 'createoutlet']);
Route::post('/catch-outlet', [EditController::class, 'catchoutlet']);
Route::post('/editoutlet', [EditController::class, 'editoutlet']);
Route::post('/deleteoutlet', [EditController::class, 'deleteoutlet']);

Route::post('/createpackages', [BordilController::class, 'createpackages']);
Route::post('/catch-package', [EditController::class, 'catchpackages']);
Route::post('/editpackage', [EditController::class, 'editpackages']);
Route::post('/deletepackage', [EditController::class, 'deletepackages']);

Route::post('/createmember', [BordilController::class, 'createmember']);
Route::post('/catch-member', [EditController::class, 'catchmember']);
Route::post('/editmember', [EditController::class, 'editmember']);
Route::post('/deletemember', [EditController::class, 'deletemember']);

Route::get('/logout', [AuLogController::class,'logout']);

});

Route::post('/login', [AuLogController::class, 'login']);
