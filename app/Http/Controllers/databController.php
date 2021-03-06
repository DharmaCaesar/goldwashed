<?php

namespace App\Http\Controllers;

use App\Models\datab;
use Illuminate\Http\Request;

class databController extends Controller
{
    /**
     * 
     */
    public function index(){
        $datab = datab::all();
        return view('dashboard.data', [
            'page' => 'datab',
            'databdata' => $datab
        ]);
    }

    /**
     * On request from an AJAX, update the selected column and row then return a success to the user with JSON.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function status(Request $request)
    {
        if ($request->ajax()) {
            $validatedData = $request->validate([
                'id' => 'required|numeric',
                'item_status' => 'required|string'
            ]);

            $datab = datab::find($validatedData['id']);
            $datab->item_status = $validatedData['item_status'];

            if ($datab->update()) {
                return response()->json(['success' => 'Status changed successfully.']);
            }
        }
    }

    /**
     * On POST request from a form, validate the data received and create a new item, if successful, return with a success.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'item_name' => 'required|max:100',
            'item_quantity' => 'required|integer',
            'item_price' => 'required|integer',
            'item_supplier' => 'required|max:100',
            'item_status' => 'required',
            'paydate' => 'required'
        ]);

        $datab = datab::create($validatedData);

        if ($datab) {
            return redirect()->back()->with('success', 'Item created successfully');
        }
    }

    /**
     * On AJAX request upon opening an edit modal, receive a request with id parameter, validate, then return the data to the user
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Request $request)
    {
        if ($request->ajax()) {
            $validatedData = $request->validate([
                'id' => 'required|numeric'
            ]);

            $datab = datab::find($validatedData['id']);

            return response()->json($datab);
        }
    }

    /**
     * On POST request from an edit modal, validate the data received and update the item, if successful, return with a success.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'item_name' => 'required|max:100',
            'item_quantity' => 'required|integer',
            'item_price' => 'required|integer',
            'item_supplier' => 'required|max:100',
            'item_status' => 'required',
            'paydate' => 'required'
        ]);

        $datab = datab::find($validatedData['id']);
        $datab->item_name = $validatedData['item_name'];
        $datab->item_quantity = $validatedData['item_quantity'];
        $datab->item_price = $validatedData['item_price'];
        $datab->item_supplier = $validatedData['item_supplier'];
        $datab->item_status = $validatedData['item_status'];
        $datab->paydate = $validatedData['paydate'];

        if ($datab->update()) {
            return redirect()->back();
        }
    }

    /**
     * On AJAX request upon opening a delete modal, receive a request with id parameter, validate, then return the data to the user
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request)
    {
        if ($request->ajax()) {
            $validatedData = $request->validate([
                'id' => 'required'
            ]);

            $datab = datab::find($validatedData['id']);

            return response()->json($datab);
        }
    }

    /**
     * On POST request from a delete modal, validate the data received and delete the item, if successful, return with a success.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required'
        ]);

        $datab = datab::find($validatedData['id']);

        if ($datab->delete()) {
            return redirect()->back();
        }
    }
}
