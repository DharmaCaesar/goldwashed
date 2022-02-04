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
<div id="membership-view" class="">
    <div class="overflow-x-auto">
        <table class="table w-full">
            <thead>
                <tr>
                    <th></th>
                    <th>Member Name</th>
                    <th>Member Address</th>
                    <th>Member Contact</th>
                    <th>Gender</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($memberdata as $member)
                <tr class="active">
                    <th>{{ $member -> id }}</th>
                    <td>{{ $member -> member_name }}</td>
                    <td>{{ $member -> member_address }}</td>
                    <td>{{ $member -> member_phone }}</td>
                    <td>{{ $member -> member_gender }}</td>
                    <td><button class="btn btn-ghost" onclick="editmember(this)" >Edit</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{{-- BAGIAN AKHIR TABEL --}}

{{-- BAGIAN AWAL CREATE --}}
<div id="membership-create" class="hidden">
    <form action="/createmember" method="post" class="text-center">
        @csrf
            <div class="flex flex-row">
                <div class="flex-1 w-full mx-5">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Gender</span>
                        </label>
                        <div class="flex-row">
                            <select name="member_gender" class="select select-bordered w-full" id="genderInput">
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
                        <input type="text" name="member_name" placeholder="member name" class="input input-primary input-bordered w-full" id="nameInput">
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Member Address</span>
                        </label>
                        <input type="text" name="member_address" placeholder="member address" class="input input-secondary input-bordered w-full" id="addressInput">
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Member Contact</span>
                        </label>
                        <div class="input-group">
                            <span>+62</span>
                            <input type="text" name="member_phone" placeholder="Number" class="input input-accent input-bordered w-full" id="numberInput">
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