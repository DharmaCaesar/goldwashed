@extends('preload.default')

@section('container')
@include('partials.modals')
@include('partials.navbar')
@if (Session::has('success'))
<div class="alert alert-success">
    <div class="flex-1">
      <label>✔ {{ Session::get('success') }}</label>
    </div>
  </div>  
@endif

@if (Session::has('failure'))
<div class="alert alert-error">
    <div class="flex-1">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-6 h-6 mx-2 stroke-current">    
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path>                      
      </svg> 
      <label>{{ Session::get('failure') }}</label>
    </div>
  </div>
@endif

{{-- BAGIAN AWAL TAB --}}
<div class="text-center my-5">
    <div class="btn-group inline-block">
        <button class="btn btn-active" id="view-btn">View</button>
        <button class="btn" id="create-btn">Create</button>
        <button class="btn" id="log-btn">Logs</button>
    </div>
</div>
{{-- BAGIAN AKHIR TAB --}}

{{-- BAGIAN AWAL TABEL --}}
<div id="packages-view" class="">
    <div class="overflow-x-auto">
        <table class="table w-full">
            <thead>
                <tr>
                    <th></th>
                    <th>Outlet Name</th>
                    <th>Packages</th>
                    <th>packages type</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($packagesdata as $packages)
                <tr class="active">
                    <th>{{ $packages -> id }}</th>
                    <td>{{ $packages -> outlets -> outlet_name }}</td>
                    <td>{{ $packages -> package_name }}</td>
                    <td>{{ $packages -> package_type }}</td>
                    <td>$ {{ $packages -> package_price }}</td>
                    <td><button class="btn btn-ghost" onclick="editpackage(this)">Edit</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{{-- BAGIAN AKHIR TABEL --}}

{{-- BAGIAN AWAL CREATE --}}
<div id="packages-create" class="hidden">
    <form action="/createpackages" method="post" class="text-center">
        @csrf
            <div class="flex flex-row">
                <div class="flex-1 w-full mx-5">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Outlet ID</span>
                        </label>
                        <div class="input-group">
                            <input type="hidden" name="outlet_id" id="outlet_id_input" value="{{ Auth::user() -> outlet_id }}">
                            <input type="text" value="{{ Auth::user() -> outlets -> outlet_name }}" id="outlet_name_input" class="w-full input input-primary rounded-1-none" readonly> 
                            {{-- <button class="btn btn-primary">Washearch</button> --}}
                        </div>
                    </div>
                </div>

                <div class="flex-1 w-full mx-5">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Packages Name</span>
                        </label>
                        <input type="text" name="package_name" placeholder="packages name" class="input input-primary input-bordered w-full">
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Packages Type</span>
                        </label>
                        <div class="flex-row">
                            <select name="package_type" class="select select-bordered w-full">
                                <option disabled="disabled" selected="selected">Choose Packages Type</option>
                                <option value="HEAVY">HEAVY</option>
                                <option value="BLANKET">BLANKET</option>
                                <option value="BED_COVER">BED COVER</option>
                                <option value="SHIRTS">SHIRTS</option>
                                <option value="SUIT">SUIT</option>
                                <option value="OTHERS">OTHERS</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Packages Price</span>
                        </label>
                        <div class="input-group">
                            <span>$</span>
                            <input type="number" name="package_price" placeholder="Number" class="input input-accent input-bordered w-full">
                        </div>
                    </div>
                </div>
            </div>
        <button class="btn btn-outline my-10">Create</button>
    </form>
</div>
{{-- BAGIAN AKHIR CREATE --}}

{{-- BAGIAN AWAL LOG --}}
<div id="packages-log" class="hidden">
    <div class="overflow-x-auto">
        <table class="table w-full">
          <thead>
            <tr>
              <th></th> 
              <th>packages Name</th> 
              <th>Create at</th> 
              <th>Delete at</th>
              <th>Last Update</th>
            </tr>
          </thead> 

          <tbody>
            <tr class="hover">
              <th>7</th> 
              <td>Meghann Durtnal</td> 
              <td>Staff Accountant IV</td> 
              <td>Yellow</td>
            </tr>
          </tbody>
        </table>
      </div>
</div>
{{-- BAGIAN AKHIR LOG --}}
@endsection