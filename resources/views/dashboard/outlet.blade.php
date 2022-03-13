@extends('preload.default')

@section('container')
    @include('partials.modals')
    @include('partials.navbar')

    {{-- BAGIAN AWAL NOTIF --}}
    @if (Session::has('success'))
        <div class="alert alert-success" id="alert-success">
            <div class="flex-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <label>{{ Session::get('success') }}</label>
            </div>

            <div class="flex-none">
                <button class="btn btn-sm" onclick="document.getElementById('alert-success').remove()">
                    <svg class="swap-on fill-current" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 512 512"><polygon points="400 145.49 366.51 112 256 222.51 145.49 112 112 145.49 222.51 256 112 366.51 145.49 400 256 289.49 366.51 400 400 366.51 289.49 256 400 145.49"/></svg>
                </button>
            </div>
        </div>
    @endif

    @if (Session::has('failure'))
        <div class="alert alert-error" id="alert-error">
            <div class="flex-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <label>{{ Session::get('failure') }}</label>
            </div>

            <div class="flex-none">
                <button class="btn btn-sm" onclick="document.getElementById('alert-error').remove()">
                    <svg class="swap-on fill-current" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 512 512"><polygon points="400 145.49 366.51 112 256 222.51 145.49 112 112 145.49 222.51 256 112 366.51 145.49 400 256 289.49 366.51 400 400 366.51 289.49 256 400 145.49"/></svg>
                </button>
            </div>
        </div>
    @endif
    {{-- BAGIAN AKHIR NOTIF --}}

    {{-- BAGIAN AWAL TAB --}}
    <div class="text-center my-5">
        <div class="btn-group inline-block">
            <button class="btn btn-active" id="view-btn">View</button>
            {{-- <button class="btn" id="create-btn">Create</button> --}}
            <button class="btn" id="log-btn">Logs</button>
        </div>
    </div>
    {{-- BAGIAN AKHIR TAB --}}

    {{-- BAGIAN AWAL TABEL --}}
    <div id="outlet-view" class="">
        {{-- <div class="overflow-x-auto">
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
                @foreach ($outletdata as $outlet)
                <tr class="active">
                    <th>{{ $outlet -> id }}</th>
                    <td>{{ $outlet -> outlet_name }}</td>
                    <td>{{ $outlet -> outlet_address }}</td>
                    <td>{{ $outlet -> outlet_phone }}</td>
                    <td>{{ $outlet -> status }}</td>
                    <td><button class="btn btn-ghost" onclick="editoutlet(this)">Edit</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div> --}}

        @foreach ($outletdata as $util)
            <div class="card lg:card-side card-bordered text-center bg-base-200 rounded-box mx-10">
                <div class="card-body">
                    <div class="my-10">
                        <h2 class="text-sm font-bold">STATUS</h2>
                        <h2 class="text-xl font-bold">{{ $util->status }}</h2>
                    </div>

                    <div class="flex">
                        <div class="flex-1">
                            <h2 class="text-sm font-bold">NAME</h2>
                            <p class="text-xl font-bold"> {{ $util->outlet_name }} </p>
                            <p class="font-sm opacity-50" id="table_outlet_id">{{ $util->id }}</p>
                        </div>

                        <div class="flex-1">
                            <h2 class="text-sm font-bold">ADDRESS</h2>
                            <p class="font-bold text-xl">"{{ $util->outlet_address }}"</p>
                            <p class="text-sm">+62{{ $util->outlet_phone }}</p>
                        </div>
                    </div>

                    <div class="my-10">
                        <h2 class="text-sm font-bold">REGISTERED USERS</h2>
                        <h2 class="text-xl font-bold">{{ $util->user->count() }}</h2>
                    </div>

                    <div class="card-actions inline-block">
                        <button class="btn btn-outline" onclick="editoutlet(this)">Edit</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{-- BAGIAN AKHIR TABEL --}}

    {{-- BAGIAN AWAL CREATE --}}
    {{-- <div id="outlet-create" class="hidden">
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
</div> --}}
    {{-- BAGIAN AKHIR CREATE --}}

    {{-- BAGIAN AWAL LOG --}}
    <div id="outlet-log" class="hidden">
        <div class="overflow-x-auto">
            <table class="table w-full text-center">
                <thead>
                    <tr>
                        {{-- <th>Id</th> --}}
                        <th>Activition</th>
                        <th>Created At</th>
                        <th>Last Update</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($logsdata as $logs)
                        <tr class="hover">
                            {{-- <th>{{ $logs -> id }}</th> --}}
                            <td>{{ $logs->logs_activition }}</td>
                            <td>{{ $logs->created_at }}</td>
                            <td>{{ $logs->updated_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- BAGIAN AKHIR LOG --}}
@endsection