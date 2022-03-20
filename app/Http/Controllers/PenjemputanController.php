<?php

namespace App\Http\Controllers;

use App\Models\penjemputan;
use App\Http\Requests\StorepenjemputanRequest;
use App\Http\Requests\UpdatepenjemputanRequest;
use App\Models\Members;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class PenjemputanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        // public function index(){
        //     $penjemputanData = penjemputan::all();
    
        //     return view('dashboard.penjemputan', ['page' => 'penjemputan', 'penjemputanData' => $penjemputanData ]);
        // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
        

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepenjemputanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepenjemputanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\penjemputan  $penjemputan
     * @return \Illuminate\Http\Response
     */
    public function show(penjemputan $penjemputan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\penjemputan  $penjemputan
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepenjemputanRequest  $request
     * @param  \App\Models\penjemputan  $penjemputan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepenjemputanRequest $request, penjemputan $penjemputan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\penjemputan  $penjemputan
     * @return \Illuminate\Http\Response
     */
    public function destroy(penjemputan $penjemputan)
    {
            
    }

    public function takepenjemputan(Request $request){
        if($request -> ajax()){
            $data = $request -> validate([
                'id' => ['required']
            ]); 

            $penjemputan = penjemputan::find($data['id']);
            return response() -> json(['response' => $penjemputan]);
        }
    }

    public function catchpenjemputan(Request $request){
        if($request -> ajax()){
            $data = $request -> validate([
                'id' => ['required']
            ]);
            $member = Members::find($data['id']);
            return response() -> json(['response' => $member]);
        }
    }
}
