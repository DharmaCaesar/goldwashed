<?php

namespace App\Http\Controllers;

use App\Models\Barventaris as ModelsBarventaris;
use Barventaris;
use Illuminate\Http\Request;

class barventarisController extends Controller
{
    public function index(){
        $barventarisData = ModelsBarventaris::all();

        return view('dashboard.barventaris', ['page' => 'barventaris', 'barventarisData' => $barventarisData ]);
    }

    public function fetch(Request $request){
        if($request -> ajax()){
            $validatedData = $request -> validate([
                'id' => ['required']
            ]);

            $response = ModelsBarventaris::find($validatedData['id']);

            return response() -> json(['response' => $response]);
        }
    }

    public function create(Request $request){
        $validatedData = $request -> validate([
            'nama_barang' => ['required'],
            'merk_barang' => ['required'],
            'qty' => ['required'],
            'kondisi' => ['required'],
            'tanggal_pengadaan' => ['required'],
        ]);

        $create = ModelsBarventaris::create($validatedData);

        if($create){
            return redirect() -> back() -> with('success', 'Inventory of goods filled');
        }
    }

    public function update(Request $request){
           $validatedData = $request -> validate([
                'barventaris_id' => ['required'],
                'nama_barang' => ['required'],
                'merk_barang' => ['required'],
                'qty' => ['required'],
                'kondisi' => ['required'],
                'tanggal_pengadaan' => ['required'],
            ]);

            $barventaris = ModelsBarventaris::find($validatedData['barventaris_id']);

            $barventaris -> nama_barang = $validatedData['nama_barang'];
            $barventaris -> merk_barang = $validatedData['merk_barang'];
            $barventaris -> qty = $validatedData['qty'];
            $barventaris -> kondisi = $validatedData['kondisi'];
            $barventaris -> tanggal_pengadaan = $validatedData['tanggal_pengadaan'];

            if($barventaris -> update()){
                return redirect() -> back() -> with('success', 'inventory of goods updated');
            } else {
                return redirect() -> back() -> with('faileure', 'inventory failed to updated');
            }
    }

    public function delete(Request $request){
        $validatedData = $request -> validate([
            'barventaris_delete' => ['required']
        ]);

        $barventaris = ModelsBarventaris::find($validatedData['barventaris_delete']);

        if($barventaris -> delete()){
            return redirect() -> back() -> with('success', 'inventory of goods updated');
            } else {
                return redirect() -> back() -> with('faileure', 'inventory failed to updated');
            }
    }
}
