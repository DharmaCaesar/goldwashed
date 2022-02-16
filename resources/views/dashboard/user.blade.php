@extends('preload.default')

@section('container')
@include('partials.modals')
@include('partials.navbar')

{{-- BAGIAN AWAL NOTIF --}}
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
{{-- BAGIAN AKHIR NOTIF --}}

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
<div id="user-view" class="">
    <div class="overflow-x-auto">
        <table class="table w-full text-center">
            <thead>
                <tr>
                    <th class="hidden"></th>
                    <th>User Fullname</th>
                    <th>User name</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($userdata as $user)
                <tr class="active">
                    <th class="hidden">{{ $user -> id }}</th>
                    <td>{{ $user -> name }}</td>
                    <td>{{ $user -> username }}</td>
                    <td>{{ $user -> role }}</td>
                    <td><button class="btn btn-ghost" onclick="edituser(this)" >Edit</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{{-- BAGIAN AKHIR TABEL --}}

{{-- BAGIAN AWAL CREATE --}}
<div id="user-create" class="hidden">
    <form action="/createuser" method="post" class="text-center">
        @csrf
            <div class="flex flex-row">
                <div class="flex-1 w-full mx-5">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Role</span>
                        </label>
                        <div class="flex-row">
                            <select name="role" class="select select-bordered w-full" id="genderInput">
                                <option disabled="disabled" selected="selected">User Role</option>
                                <option value="ADMIN">ADMIN</option>
                                <option value="OWNER">OWNER</option>
                                <option value="CASHIER">CASHIER</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="flex-1 w-full mx-5">
                    <div class="form-control">
                        <label class="label">
                          <span class="label-text">Fullname</span>
                        </label> 
                        <input type="text" name="name" placeholder="Fullname" class="input input-bordered">
                      </div>
                      <div class="form-control">
                          <label class="label">
                            <span class="label-text">Username</span>
                          </label> 
                          <input type="text" name="username" placeholder="Username" class="input input-bordered">
                      </div> 
                      <div class="form-control">
                        <label class="label">
                          <span class="label-text">Password</span>
                        </label> 
                        <input type="password" name="password" placeholder="password" class="input input-bordered"> 
                        {{-- <label class="label">
                          <a href="#" class="label-text-alt">Forgot password?</a>
                        </label> --}}
                    </div>
                </div>
            </div>
        <button class="btn btn-outline my-10">Create</button>
    </form>
</div>
{{-- BAGIAN AKHIR CREATE --}}

{{-- BAGIAN AWAL LOG --}}
<div id="user-log" class="hidden">
    <div class="overflow-x-auto">
        <table class="table w-full">
            <thead>
              <tr>
                <th>#</th> 
                <th>Activition</th> 
                <th>Created At</th>
                <th>Last Update</th>
              </tr>
            </thead> 
  
            <tbody>
              @foreach ($logsdata as $logs)
              <tr class="hover">
                <th>{{ $logs -> id }}</th> 
                <td>{{ $logs -> logs_activition }}</td> 
                <td>{{ $logs -> created_at }}</td> 
                <td>{{ $logs -> updated_at }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
      </div>
</div>
{{-- BAGIAN AKHIR LOG --}}
@endsection