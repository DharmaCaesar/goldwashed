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
        <div class="flex flex-row">
            <div class="flex-1">
                <div class="btn-group inline-block">
                    <button class="btn btn-active" id="view-btn">View</button>
                    <button class="btn" id="create-btn">Create</button>
                    <button class="btn" id="log-btn">Logs</button>
                </div>
            </div>
            <div class="flex-1">
                <div class="btn-group inline-block">
                    <a href="{{ route('export-penjemputan') }}" class="btn fa fa-file-excel">Export</a>
                    <form action="{{ route('import-penjemputan') }}" enctype="multipart/form-data" class="inline-block"
                        id="importForm" method="POST">
                        @csrf
                        <button type="button" class="btn rounded-l-none" id="imbtn"
                            onclick="document.getElementById('impor').click()">
                            Import
                        </button>
                        <input type="file" name="file" id="impor" class="hidden"
                            onchange="document.getElementById('importForm').submit()">
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- BAGIAN AKHIR TAB --}}

    {{-- BAGIAN AWAL TABEL --}}
    <div id="penjemputan-view">
        <div class="overflow-x-auto p-2">
            <table class="table w-full py-2" id="penjemputanTable">
                <thead>
                    <tr>
                        <th></th>
                        <th>Member Name</th>
                        <th>Member Address</th>
                        <th>Member Contact</th>
                        <th>Pick-up Officer</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penjemputandata as $penjemputan)
                        <tr class="active">
                            <th>{{ $penjemputan->id }}</th>
                            <td>{{ $penjemputan->member_name }}</td>
                            <td>{{ $penjemputan->member_address }}</td>
                            <td>{{ $penjemputan->member_phone }}</td>
                            <td>{{ $penjemputan->petugas_penjemputan}}</td>
                            {{-- <td>{{ $penjemputan->status }}</td> --}}
                            <td>
                                <select name="status" class="select select-bordered w-full" id="statusInput">
                                    <option disabled="disabled" selected="selected">Status</option>
                                    <option value="TERCATAT">TERCATAT</option>
                                    <option value="PENJEMPUTAN">PENJEMPUTAN</option>
                                    <option value="SELESAI">SELESAI</option>
                                </select>
                            </td>
                            <td><button class="btn btn-ghost" onclick="editpenjemputan(this)">Edit</button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- BAGIAN AKHIR TABEL --}}

    {{-- BAGIAN AWAL CREATE --}}
    <div id="penjemputan-create" class="hidden">
        <form action="/createpenjemputan" method="post" class="text-center">
            @csrf
            <div class="flex flex-row justify-center">
                <div class="flex-1 w-full mx-5 max-w-lg">
                    <div class="form-control">
                        <label class="label justify-center">
                            <span class="label-text">Customer Name</span>
                        </label>
                        <div class="input-group">
                            <input type="hidden" name="member_id" id="membersInput">
                            <input type="text" placeholder="Search…" class="input input-bordered w-full rounded-r-lg"
                                id="namesInput" readonly name="member_name">
                            <button class="btn btn-square"
                                onclick="document.getElementById('fin_member').classList.add('modal-open')"
                                type="button">Find</button>
                        </div>
                    </div>
                    <div class="form-control">
                        <label class="label justify-center">
                            <span class="label-text">Address</span>
                        </label>
                        <input type="text" placeholder="Location name"
                            class="input input-secondary input-bordered w-full" id="alamatInput" readonly name="member_address">
                    </div>
                    <div class="form-control">
                        <label class="label justify-center">
                            <span class="label-text">Contact number</span>
                        </label>
                        <div class="input-group">
                            <span>+62</span>
                            <input type="text" placeholder="Phone Number"
                                class="input input-accent input-bordered w-full" id="nomorInput" readonly name="member_phone">
                        </div>
                    </div>

                    <div class="form-control">
                        <label class="label justify-center">
                            <span class="label-text">Officer Name</span>
                        </label>
                        <input type="text" name="petugas_penjemputan" placeholder="Officer name"
                            class="input input-primary input-bordered w-full" id="namiInput">
                    </div>
                    <div class="form-control">
                        <label class="label justify-center">
                            <span class="label-text">Status</span>
                        </label>
                        <div class="flex-row">
                            <select name="status" class="select select-bordered w-full" id="statusInput">
                                <option disabled="disabled" selected="selected">Status</option>
                                <option value="TERCATAT">TERCATAT</option>
                                <option value="PENJEMPUTAN">PENJEMPUTAN</option>
                                <option value="SELESAI">SELESAI</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-outline my-10">Create</button>
        </form>
    </div>
    {{-- BAGIAN AKHIR CREATE --}}

    {{-- BAGIAN AWAL LOG --}}
    <div id="penjemputan-log" class="hidden">
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

