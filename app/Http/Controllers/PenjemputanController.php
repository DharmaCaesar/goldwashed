<?php

namespace App\Http\Controllers;

use App\Models\penjemputan;
use App\Http\Requests\StorepenjemputanRequest;
use App\Http\Requests\UpdatepenjemputanRequest;
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
        public function index(){
            $penjemputanData = penjemputan::all();
    
            return view('dashboard.penjemputan', ['page' => 'penjemputan', 'penjemputanData' => $penjemputanData ]);
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function createpenjemputan(Request $request){
            $data = $request -> validate([
                'penjemputan_name' => ['required'],
                'penjemputan_status' => ['required'],
                'member_name' => ['required'],
                'member_address' => ['required'],
                'member_phone' => ['required'],
            ]);
    
            $data ['member_phone'] = '+62' . $data ['member_phone'];
            $penjemputan = new penjemputan;
            $penjemputan -> penjemputan_name = $data['penjemputan_name'];
            $penjemputan -> penjemputan_status = $data ['penjemputan_status'];
            $penjemputan -> member_name = $data ['member_name'];
            $penjemputan -> member_address = $data ['member_address'];
            $penjemputan -> member_phone = $data ['member_phone'];
            if($penjemputan -> save()){
                return redirect() -> back();
            } else {
                return redirect() -> back();
            }
        }

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
    public function edit(penjemputan $penjemputan)
    {
        $data = $penjemputan -> validate([
            'penjemputan_name' => ['required'],
            'penjemputan_status' => ['required'],
            'member_name' => ['required'],
            'member_address' => ['required'],
            'member_phone' => ['required'],
        ]);

        $data ['member_phone'] = '+62' . $data ['member_phone'];
        $penjemputan = new penjemputan;
        $penjemputan -> penjemputan_name = $data['penjemputan_name'];
        $penjemputan -> penjemputan_status = $data ['penjemputan_status'];
        $penjemputan -> member_name = $data ['member_name'];
        $penjemputan -> member_address = $data ['member_address'];
        $penjemputan -> member_phone = $data ['member_phone'];
        if($penjemputan -> save()){
            return redirect() -> back();
        } else {
            return redirect() -> back();
        }
    }

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
            $data = $penjemputan -> validate([
                'member_id' => ['required']
            ]);
    
            $member = penjemputan::find($data['member_id']);
            if($member -> delete()){
                return redirect() -> back() -> with('success', 'Deleting was completed, there is nothing no to worry');
            } else {
                return redirect() -> back() -> with('failure', 'There has problem to deleting the data!!!');
            }
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
            $member = penjemputan::find($data['id']);
            return response() -> json(['response' => $member]);
        }
    }
}
