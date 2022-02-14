<?php

use App\Http\Controllers\AuLogController;
use App\Http\Controllers\BordilController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\RegisterController;
use App\Models\Logs;
use App\Models\Members;
use App\Models\Outlets;
use App\Models\Packages;
use App\Models\Register;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
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
}) -> name('home');

Route::get('/logout', [AuLogController::class,'logout']);

});

Route::middleware(['auth.basic', 'role:ADMIN']) -> group(function(){

Route::get('/outlet', function(){
    $outletdata = Outlets::where('id', Auth::user() -> outlet_id) -> get();
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

});

Route::middleware(['auth.basic', 'role:OWNER']) -> group(function(){});

Route::middleware(['auth.basic', 'role:CASHIER']) -> group(function(){

    
    Route::get('/membership', function(){
        $memberdata = Members::all();
        $logsdata = Logs::where('models', 'members') -> get();
        return view('dashboard.membership', ['memberdata' => $memberdata, 'page' => 'membership', 'logsdata' => $logsdata]);
    });
    
    Route::post('/createmember', [BordilController::class, 'createmember']);
    Route::post('/catch-member', [EditController::class, 'catchmember']);
    Route::post('/editmember', [EditController::class, 'editmember']);
    Route::post('/deletemember', [EditController::class, 'deletemember']);
    
});

Route::post('/login', [AuLogController::class, 'login']);

Route::get('/register', function(){
    return view('register');
});

Route::post('/register-outlet', [RegisterController::class, 'register']);
