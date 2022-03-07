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
            <button class="btn" id="create-btn">Create</button>
            <button class="btn" id="log-btn">Logs</button>
            <a href="{{ route('export-package') }}" class="btn fa fa-file-excel">Export</a>
            <form action="{{ route('import-package') }}" enctype="multipart/form-data" class="inline-block" id="importForm" method="POST">
                @csrf
                <button type="button" class="btn rounded-l-none gap-0" id="imbtn" onclick="document.getElementById('impor').click()">
                    Import
                </button>
                <input type="file" name="file" id="impor" class="hidden" onchange="document.getElementById('importForm').submit()">
            </form>
        </div>
    </div>
    {{-- BAGIAN AKHIR TAB --}}

    {{-- BAGIAN AWAL TABEL --}}
    <div id="packages-view" class="">
        <div class="overflow-x-auto p-2">
            <table class="table w-full py-2" id="packagesTable">
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
                            <th>{{ $packages->id }}</th>
                            <td>{{ $packages->outlets->outlet_name }}</td>
                            <td>{{ $packages->package_name }}</td>
                            <td>{{ $packages->package_type }}</td>
                            <td>$ {{ $packages->package_price }}</td>
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
                            <input type="hidden" name="outlet_id" id="outlet_id_input"
                                value="{{ Auth::user()->outlet_id }}">
                            <input type="text" value="{{ Auth::user()->outlets->outlet_name }}" id="outlet_name_input"
                                class="w-full input input-primary rounded-1-none" readonly>
                            {{-- <button class="btn btn-primary">Washearch</button> --}}
                        </div>
                    </div>
                </div>

                <div class="flex-1 w-full mx-5">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Packages Name</span>
                        </label>
                        <input type="text" name="package_name" placeholder="packages name"
                            class="input input-primary input-bordered w-full">
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
                            <input type="number" name="package_price" placeholder="Number"
                                class="input input-accent input-bordered w-full">
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
            <table class="table w-full text-center">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Activition</th>
                        <th>Created At</th>
                        <th>Last Update</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($logsdata as $logs)
                        <tr class="hover">
                            <th>{{ $logs->id }}</th>
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
