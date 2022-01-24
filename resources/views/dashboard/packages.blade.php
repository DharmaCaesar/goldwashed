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
                <tr class="active">
                    <th>7</th>
                    <td>Meghann Durtnal</td>
                    <td>Staff Accountant IV</td>
                    <td>Yellow</td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
{{-- BAGIAN AKHIR TABEL --}}

{{-- BAGIAN AWAL CREATE --}}
<div id="packages-create" class="hidden">
    <form action="" method="post" class="text-center">
            <div class="flex flex-row">
                <div class="flex-1 w-full mx-5">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Outlet ID</span>
                        </label>
                        <div class="input-group">
                            <input type="hidden" name="outlet_id" id="outlet_id_input">
                            <input type="text" placeholder="Search" id="outlet_name_input" class="w-full input input-primary rounded-1-none" readonly> 
                            <button class="btn btn-primary">Washearch</button>
                        </div>
                    </div>
                </div>

                <div class="flex-1 w-full mx-5">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Packages Name</span>
                        </label>
                        <input type="text" placeholder="packages name" class="input input-primary input-bordered w-full">
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Packages Type</span>
                        </label>
                        <input type="text" placeholder="packages type" class="input input-secondary input-bordered w-full">
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Packages Price</span>
                        </label>
                        <div class="input-group">
                            <span>$</span>
                            <input type="number" placeholder="Number" class="input input-accent input-bordered w-full">
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