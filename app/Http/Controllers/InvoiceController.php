<?php

namespace App\Http\Controllers;

use App\Models\Members;
use App\Models\Outlets;
use App\Models\Packages;
use App\Models\TransactionDetails;
use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function takeinvoice(Request $request){
        if($request -> ajax()){
            $data = $request -> validate([
                'id' => ['required']
            ]);
            $transaction = Transactions::find($data['id']);
            $transaction_details = TransactionDetails::with('packages') -> where('transaction_id', $transaction -> id) -> get();
            $invoice = TransactionDetails::find($data['id']);
            $member = Members::find($transaction -> id);
            $package = Packages::find($invoice -> package_id);
            $outlet = Outlets::find(Auth::user() -> outlet_id);

            return response() -> json(['response' => [$invoice, $transaction, $member, $package, $outlet], 'lists' => $transaction_details]);
        }
    }

    public function pin($invoice_code){
        $transaction = Transactions::where('invoice_code', $invoice_code) -> first();
        $trandet = TransactionDetails::with('packages') -> where('transaction_id', $transaction -> id) -> get();
        return view('dashboard.invoices', ['page' => 'view', 'transaction' => $transaction, 'trandet' => $trandet]);
    }
}
