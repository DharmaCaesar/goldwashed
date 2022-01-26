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
<div id="membership-view" class="">
    <div class="overflow-x-auto">
        <table class="table w-full">
            <thead>
                <tr>
                    <th></th>
                    <th>Member Name</th>
                    <th>Mmeber Address</th>
                    <th>Member Contact</th>
                    <th>Gender</th>
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
<div id="membership-create" class="hidden">
    <form action="" method="post" class="text-center">
            <div class="flex flex-row">
                <div class="flex-1 w-full mx-5">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Gender</span>
                        </label>
                        <div class="flex-row">
                            <select name="member_gender" class="select select-bordered w-full">
                                <option disabled="disabled" selected="selected">Member Gender</option>
                                <option value="MALE">Male</option>
                                <option value="FEMALE">Female</option>
                                <option value="SHEMALE">Shemale</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="flex-1 w-full mx-5">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Member Name</span>
                        </label>
                        <input type="text" name="member_name" placeholder="member name" class="input input-primary input-bordered w-full">
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Member Address</span>
                        </label>
                        <input type="text" name="member_address" placeholder="member address" class="input input-secondary input-bordered w-full">
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Member Contact</span>
                        </label>
                        <div class="input-group">
                            <span>+62</span>
                            <input type="number" name="member_phone" placeholder="Number" class="input input-accent input-bordered w-full">
                        </div>
                    </div>
                </div>
            </div>
        <button class="btn btn-outline my-10">Create</button>
    </form>
</div>
{{-- BAGIAN AKHIR CREATE --}}

{{-- BAGIAN AWAL LOG --}}
<div id="membership-log" class="hidden">
    <div class="overflow-x-auto">
        <table class="table w-full">
          <thead>
            <tr>
              <th></th> 
              <th>Member Name</th> 
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