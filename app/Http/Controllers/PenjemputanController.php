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
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function createpenjemputan(Request $request){
            $data = $request -> validate([
                'penjemputan_status' => ['required'],
                'member_name' => ['required'],
                'member_address' => ['required'],
                'member_phone' => ['required'],
            ]);
    
            $data ['member_phone'] = '+62' . $data ['member_phone'];
            $member = new penjemputan;
            $member -> penjemputan_status = $data ['penjemputan_status'];
            $member -> member_name = $data ['member_name'];
            $member -> member_address = $data ['member_address'];
            $member -> member_phone = $data ['member_phone'];
            if($member -> save()){
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
        //
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
        //
    }
}
