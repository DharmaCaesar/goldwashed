<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\AuLogController;
use App\Http\Controllers\barventarisController;
use App\Http\Controllers\BordilController;
use App\Http\Controllers\CalculateController;
use App\Http\Controllers\databController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PenjemputanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ReportController;
use App\Models\Chat;
use App\Models\Logs;
use App\Models\Members;
use App\Models\Outlets;
use App\Models\Packages;
use App\Models\penjemputan;
use App\Models\Register;
use App\Models\Transactions;
use App\Models\User;
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
    return view('login', ['page' => 'login']);
});

Route::middleware(['auth.basic', 'role:ADMIN,CASHIER,OWNER']) -> group(function(){

Route::get('/home', function(){
    return view('dashboard.home', ['page' => 'home']);
}) -> name('home');

Route::get('/simp', function(){
    return view('simpinglation.simplation', ['page' => 'simp']);
}) -> name('simp');

Route::get('/simpp', function(){
    return view('simpinglation.simp', ['page' => 'simpp']);
}) -> name('simpp');

Route::get('/aksesoris', function(){
    return view('dashboard.aksesoris', ['page' => 'aksesoris']);
}) -> name('aksesoris');

Route::get('/logout', [AuLogController::class,'logout']);

});

Route::middleware(['auth.basic', 'role:ADMIN']) -> group(function(){

Route::get('/outlet', function(){
    $outletdata = Outlets::where('id', Auth::user() -> outlet_id) -> get();
    $logsdata = Logs::where('models', 'outlets') -> get();
    return view('dashboard.outlet', ['outletdata' => $outletdata, 'page' => 'outlets', 'logsdata' => $logsdata]);
});

Route::get('/packages', function(){
    $packagesdata = Packages::where('outlet_id', Auth::user() -> outlet_id) -> get();
    $logsdata = Logs::where('models', 'packages') -> get();
    return view('dashboard.packages', ['packagesdata' => $packagesdata, 'page' => 'packages', 'logsdata' => $logsdata]);
});

Route::get('/user', function(){
    $userdata = User::where('outlet_id', Auth::user() -> outlet_id) -> get();
    $logsdata = Logs::where('models', 'user') -> get();
    return view('dashboard.user', ['userdata' => $userdata, 'page' => 'user', 'logsdata' => $logsdata]);
});

Route::get('/report', function(){
    $transactionData = Transactions::where('outlet_id', Auth::user()->outlet_id)->with('TransactionDetails')->get();
    $chatData = Chat::all();
    $memberData = Members::all();
    // $activityData = Activity::all();

    return view('dashboard.report', [
    'page' => 'report',
    'chatData' => $chatData,
    'transactionData' => $transactionData,
    'memberData' => $memberData,
    // 'activityData' => $activityData
    ]);    
});

Route::post('/createoutlet', [BordilController::class, 'createoutlet']);
Route::post('/catch-outlet', [EditController::class, 'catchoutlet']);
Route::post('/editoutlet', [EditController::class, 'editoutlet']);
Route::post('/deleteoutlet', [EditController::class, 'deleteoutlet']);

Route::post('/createpackages', [BordilController::class, 'createpackages']);
Route::post('/catch-package', [EditController::class, 'catchpackages']);
Route::post('/editpackage', [EditController::class, 'editpackages']);
Route::post('/deletepackage', [EditController::class, 'deletepackages']);

Route::post('/createuser', [BordilController::class, 'createuser']);
Route::post('/catch-user', [EditController::class, 'catchuser']);
Route::post('/edituser', [EditController::class, 'edituser']);
Route::post('/deleteuser', [EditController::class, 'deleteuser']);

Route::post('/reportSchedule', [ReportController::class, 'report_schedule'])->name('reportSchedule');
Route::post('/sendRequestMessage', [ReportController::class, 'sendRequestMessage']);

});

Route::middleware(['auth.basic', 'role:OWNER']) -> group(function(){});

Route::middleware(['auth.basic', 'role:ADMIN,CASHIER']) -> group(function(){
    
    Route::get('/membership', function(){
        $memberdata = Members::all();
        $logsdata = Logs::where('models', 'members') -> get();
        return view('dashboard.membership', ['memberdata' => $memberdata, 'page' => 'membership', 'logsdata' => $logsdata]);
    });

    Route::get('/transaction', function(){
        $transaction = Transactions::where('outlet_id', Auth::user() -> outlet_id) -> get();
        $memberdata = Members::all();
        $packagesdata = Packages::where('outlet_id', Auth::user() -> outlet_id) -> get();
        return view('dashboard.transaction', ['transaction' => $transaction, 'memberdata' => $memberdata, 'packagesdata' => $packagesdata, 'page' => 'transaction']);
    });

    Route::get('/invoice', function(){
        $transaction = Transactions::where('outlet_id', Auth::user() -> outlet_id) -> get();
        $memberdata = Members::all();
        return view('dashboard.invoice', ['transaction' => $transaction, 'memberdata' => $memberdata, 'page' => 'invoice']);

    });
    
    Route::post('/createmember', [BordilController::class, 'createmember']);
    Route::post('/catch-member', [EditController::class, 'catchmember']);
    Route::post('/editmember', [EditController::class, 'editmember']);
    Route::post('/deletemember', [EditController::class, 'deletemember']);
    Route::post('/takemember', [TransactionController::class, 'takemember']);
    Route::get('member/export/', [BordilController::class, 'exportMember']) -> name('export-member');
    Route::post('member/import/', [BordilController::class, 'importMember']) -> name('import-member');

    Route::post('/addpackage', [TransactionController::class, 'addpackage']);
    Route::get('package/export/', [BordilController::class, 'exportPackage']) -> name('export-package');
    Route::post('package/import/', [BordilController::class, 'importPackage']) -> name('import-package');

    Route::post('/calculate', [CalculateController::class, 'calculate']);
    Route::post('/pay', [TransactionController::class, 'pay']);
    Route::post('/invoice', [InvoiceController::class, 'takeinvoice']);
    Route::get('/invoice/{invoice_code}', [InvoiceController::class, 'pin']);

    Route::get('/barventaris', [barventarisController::class, 'index']) -> name('barventaris');
    Route::post('/barventaris', [barventarisController::class, 'create']) -> name('add_inventory');
    Route::post('/takebarventaris', [barventarisController::class, 'fetch']) -> name('take_barventaris');
    Route::post('/update-barventaris', [barventarisController::class, 'update']) -> name('update_barventaris');
    Route::post('/delete-barventaris', [barventarisController::class, 'delete']) -> name('delete_barventaris');
    
    Route::get('/penjemputan', function(){
        $penjemputandata = penjemputan::all();
        $memberdata = Members::all();
        $logsdata = Logs::where('models', 'penjemputan') -> get();
        return view('dashboard.penjemputan', ['penjemputandata' => $penjemputandata, 'memberdata' => $memberdata, 'page' => 'penjemputan', 'logsdata' => $logsdata]);
    }) -> name('penjemputan');
    Route::post('/createpenjemputan', [BordilController::class, 'createpenjemputan']);
    Route::post('/catch-penjemputan', [PenjemputanController::class, 'catchpenjemputan']);
    Route::post('/editpenjemputan', [EditController::class, 'editpenjemputan']);
    Route::post('/deletepenjemputan', [EditController::class, 'deletepenjemputan']);
    Route::post('/takepenjemputan', [PenjemputanController::class, 'takepenjemputan']);
    Route::get('penjemputan/export/', [BordilController::class, 'exportPenjemputan']) -> name('export-penjemputan');
    Route::post('penjemputan/import/', [BordilController::class, 'importPenjemputan']) -> name('import-penjemputan');
    Route::post('/update-status', [PenjemputanController::class, 'updateStatus']);

    Route::get('/transaksi', [BordilController::class, 'createtransaksi']) -> name('transaksi');

    Route::get('/datab', [databController::class, 'index']) -> name('datab');
    Route::post('/update-status', [databController::class, 'status']) -> name('update-status');
    Route::post('/editdatab', [databController::class, 'edit']) -> name('editdatab');
    Route::post('/deletedatab', [databController::class, 'delete']) -> name('deletedatab');
    Route::post('/createdatab', [databController::class, 'store']) -> name('createdatab');
    Route::post('/updatedatab', [databController::class, 'update']) -> name('updatedatab');
    Route::post('/destroydatab', [databController::class, 'destroy']) -> name('destroydatab');
    Route::get('datab/export/', [BordilController::class, 'exportDatab']) -> name('export-datab');
    Route::get('datab/import/', [BordilController::class, 'importDatab']) -> name('import-datab');

    Route::get('/absen', [AbsenController::class, 'index']) -> name('absen');
    Route::post('/createabsen', [AbsenController::class, 'store']) -> name('createabsen');
    Route::post('/editabsen', [AbsenController::class, 'edit']) -> name('editabsen');
    Route::post('/updateabsen', [AbsenController::class, 'update']) -> name('updateabsen');
    Route::post('/update-status', [AbsenController::class, 'status']) -> name('update-status');
    Route::post('/deleteabsen', [AbsenController::class, 'delete']) -> name('deleteabsen');
    Route::post('/destroyabsen', [AbsenController::class, 'destroy']) -> name('destroyabsen');
    Route::get('absen/export/', [AbsenController::class, 'exportAbsen']) -> name('export_absen');
    Route::get('absen/import/', [AbsenController::class, 'importAbsen']) -> name('import_absen');
});

Route::middleware(['auth.basic', 'role:CASHIER']) -> group(function(){});

Route::post('/login', [AuLogController::class, 'login']);

Route::get('/register', function(){
    return view('register', ['page' => 'register']);
});

Route::post('/register-outlet', [RegisterController::class, 'register']);
