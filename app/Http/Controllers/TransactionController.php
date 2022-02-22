<?php

namespace App\Http\Controllers;

use App\Models\Members;
use App\Models\Packages;
use App\Models\TransactionDetails;
use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function takemember(Request $request){
        if($request -> ajax()){
            $data = $request -> validate([
                'id' => ['required']
            ]); 

            $member = Members::find($data['id']);
            return response() -> json(['response' => $member]);
        }
    }

    // public function get_package(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $validatedData = $request->validate([
    //             'id' => ['required']
    //         ]);

    //         $packageData = Packages::find($validatedData['id']);

    //         return response()->json(['response' => $packageData]);
    //     }
    // }

    public function addpackage(Request $request)
    {
        if ($request->ajax()) {
            $validatedData = $request->validate([
                'id' => ['required']
            ]);

            $packageData = Packages::find($validatedData['id']);

            return response()->json(['response' => $packageData]);
        }
    }

    public function pay(Request $request){
        // dd($request -> all());
     
        $validatedData = $request->validate([
            'sumpay' => ['required'],
            'fepay' => ['required'],
            'taxpay' => ['required'],
            'choosen_packages' => ['required'],
            'member_id' => ['required'],
            'note' => ['required', 'nullable'],
            'type' => ['required'],
            'date' => ['required'],
            'disc' => ['required']
            
        ]);

        if ($validatedData['sumpay'] != 0) {
            /* 
                    Validation Section
                */

            $isDiscountQualified = false;
            $isPriceQualified = false;
            $isTaxQualified = false;
            $isFeeQualified = false;
            $isTimeQualified = false;

            $calculated_price = 0;
            $calculated_discount = 0;
            $discount = intval($validatedData['disc']);

            // dd($validatedData['chosen_packages']);

            foreach ($validatedData['choosen_packages'] as $data) {
                $package = Packages::find(intval($data['id']));

                $calculated_price += intval($package->package_price) * $data['qty'];
                $calculated_discount = intval($calculated_price)  * ($discount / 100);

                $calculated_price = intval($calculated_price);
            }

            $calculated_price = intval($calculated_price - $calculated_discount) + intval($validatedData['fepay']);
            $validatedData['sumpay'] += intval($validatedData['fepay']);
            $calculated_tax = intval($calculated_price) * (2 / 100);

            if ($validatedData['disc'] <= 50) {
                $isDiscountQualified = true;
            }

            if ($validatedData['sumpay'] == $calculated_price) {
                $isPriceQualified = true;
            }

            if ($validatedData['taxpay'] == intval($calculated_tax)) {
                $isTaxQualified = true;
            }

            if ($validatedData['note'] == "NUN") {
                if ($validatedData['fepay'] == 0) {
                    $isFeeQualified = true;
                }
            } else {
                if ($validatedData['fepay'] == 10) {
                    $isFeeQualified = true;
                }
            }

            if ($validatedData['date'] > now()->toDateString()) {
                $isTimeQualified = true;
            } else {
                return redirect()->back()->with('failure', 'The expected deadline time cannot be on the same day!');
            }

            // dd([$isDiscountQualified, $isPriceQualified, $isTaxQualified, $isFeeQualified, $isTimeQualified]);

            if ($isDiscountQualified && $isPriceQualified && $isTaxQualified && $isFeeQualified && $isTimeQualified) {
                $transaction = new Transactions;

                $transaction->outlet_id = Auth::user()->outlet_id;
                $transaction->member_id = $validatedData['member_id'];
                $transaction->user_id = Auth::user()->id;
                $transaction->transaction_date = now()->toDateTimeString();
                $transaction->transaction_deadline = $validatedData['date'];

                if ($validatedData['type'] == 'paynow') {
                    $transaction->transaction_paydate = now()->toDateString();
                    $transaction->paid_status = 'PAID';
                } else {
                    $transaction->transaction_paydate = $validatedData['date'];
                    $transaction->paid_status = 'UNPAID';
                }

                $transaction->transaction_paid = $validatedData['sumpay'];
                $transaction->transaction_paid_extra = $validatedData['fepay'];
                $transaction->transaction_tax = $validatedData['taxpay'];
                $transaction->transaction_discount = $validatedData['disc'];
                $transaction->status = 'NEW';

                $transaction->invoice_code = 'NULL';

                if ($transaction->save()) {
                    $day = now()->day;
                    $month = now()->month;

                    $id  = $transaction->id;
                    $mid = $transaction->member_id;
                    $uid = $transaction->user_id;
                    $oud = $transaction->outlet_id;

                    $transaction->invoice_code = $day . $month . $mid . $uid . $oud . $id;

                    if ($transaction->update()) {
                        foreach ($validatedData['choosen_packages'] as $data) {
                            $transaction_details = new TransactionDetails();

                            $transaction_details->transaction_id = $transaction->id;
                            $transaction_details->package_id = intval($data['id']);
                            $transaction_details->quantity = intval($data['qty']);
                            $transaction_details->notes = $validatedData['note'];

                            $transaction_details->save();
                        }

                        // return redirect()->back()->with('success', 'Transaction successful! Invoice has been saved.');
                        return redirect('/invoices/' . $transaction -> invoice_code . '') -> with('success', 'Transaction successful! Invoice has been saved.');
                    } else {
                        $transaction->delete();
                    }
                }

                return redirect()->back()->with('failure', 'Transaction has failed to save.');
            } else {
                return redirect()->back()->with('failure', 'Invalid input or datetime input invalid');
            }
        }

        return redirect()->back()->with('Invalid price origin');
    }
}
