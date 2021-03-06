<?php

namespace App\Http\Controllers;

use App\Models\Packages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalculateController extends Controller
{
    public function calculate(Request $request)
    {
        if ($request->ajax()) {
            $validatedData = $request->validate([
                'id' => ['required'],
                'discount' => ['required']
            ]);

            if ($validatedData['discount'] == 0 || $validatedData['discount'] == 10 || $validatedData['discount'] == 20 || $validatedData['discount'] == 30 || $validatedData['discount'] == 40 || $validatedData['discount'] == 50) {
                $total_price = 0;
                $tax_price = 0;
                $discount = intval($validatedData['discount']);
                $calculated_discount = 0;

                foreach ($validatedData['id'] as $data) {
                    $packageData = Packages::find($data['id']);

                    if ($packageData->outlet_id != Auth::user()->outlet_id) {
                        return 'INVALID RESPONSE';
                    }

                    $total_price += intval($packageData->package_price) * $data['qty'];
                    $calculated_discount = intval($total_price) * ($discount / 100);
                }

                $total_price = intval($total_price - $calculated_discount);
                $tax_price = $total_price * (2 / 100);

                return response()->json(['price' => $total_price, 'tax' => $tax_price]);
            }
        }
    }
}
