@extends('preload.default')

@section('container')
@include('partials.navbar')

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
<div id="outlet-view" class="">
    <div class="overflow-x-auto">
        <table class="table w-full">
            <thead>
                <tr>
                    <th></th>
                    <th>Outlet Name</th>
                    <th>Location</th>
                    <th>Contact number</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($outletdata as $outlet)
                <tr class="active">
                    <th>{{ $outlet -> id }}</th>
                    <td>{{ $outlet -> outlet_name }}</td>
                    <td>{{ $outlet -> outlet_address }}</td>
                    <td>{{ $outlet -> outlet_phone }}</td>
                    <td>{{ $outlet -> status }}</td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{{-- BAGIAN AKHIR TABEL --}}

{{-- BAGIAN AWAL CREATE --}}
<div id="outlet-create" class="hidden">
    <form action="/createoutlet" method="post" class="text-center">
        @csrf
            <div class="flex flex-row">
                <div class="flex-1 w-full mx-5">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Outlet Status</span>
                        </label>
                        <div class="flex-row">
                            <select name="status" class="select select-bordered w-full">
                                <option disabled="disabled" selected="selected">Choose Outlet Status</option>
                                <option value="ACTIVE">Active</option>
                                <option value="CLOSED">Closed</option>
                                <option value="BANKRUPT">Bankrupt</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="flex-1 w-full mx-5">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Outlet Name</span>
                        </label>
                        <input type="text" name="outlet_name" placeholder="Outlet name" class="input input-primary input-bordered w-full">
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Outlet Location</span>
                        </label>
                        <input type="text" name="outlet_address" placeholder="Location name" class="input input-secondary input-bordered w-full">
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Contact number</span>
                        </label>
                        <div class="input-group">
                            <span>+62</span>
                            <input type="text" name="outlet_phone" placeholder="Number" class="input input-accent input-bordered w-full">
                        </div>
                    </div>
                </div>
            </div>
        <button class="btn btn-outline my-10">Create</button>
    </form>
</div>
{{-- BAGIAN AKHIR CREATE --}}

{{-- BAGIAN AWAL LOG --}}
<div id="outlet-log" class="hidden">
    <div class="overflow-x-auto">
        <table class="table w-full">
          <thead>
            <tr>
              <th></th> 
              <th>Outlet Name</th> 
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