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
            <div class="flex flex-row m-4">
                <div class="flex-1">
                    <div class="btn-group inline-block">
                    <button class="btn btn-primary btn-sm mr-2" id="addDataBtn" onclick="openModal('datab-create')">Add Data</button>
                            <a href="{{ route('export-datab') }}" class="btn fa fa-file-excel">Export</a>
                            <form action="{{ route('import-datab') }}" enctype="multipart/form-datab" class="inline-block"
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
                    {{-- <a href="{{ route('export_item') }}" class="btn btn-info btn-sm mx-2"> Export </a>
                    <button class="btn btn-warning btn-sm mx-2"
                        onclick="document.getElementById('importModal').classList.add('modal-open')"> Import </button> --}}
                </div>
            </div>
        </div>
    </div>
    {{-- BAGIAN AKHIR TAB --}}

    {{-- BAGIAN AWAL TABEL --}}
    <div id="datab-view">
        <div class="overflow-x-auto p-2">
            <table class="table w-full py-2" id="databTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Product Name</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Buy date</th>
                        <th>Supplier</th>
                        <th>Status Product</th>
                        <th>Update time Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($databdata as $datab)
                        <tr class="active">
                            <th>{{ $datab->id }}</th>
                            <td>{{ $datab->product_name }}</td>
                            <td>{{ $datab->qty }}</td>
                            <td>{{ $datab->price }}</td>
                            <td>{{ $datab->buydate }}</td>
                            <td>{{ $datab->supply }}</td>
                            <td>
                                <select class="select select-bordered w-full" onchange="updateStatus(this)"
                                    value="{{ $datab->status }}">
                                    <option value="DIAJUKAN" @if ($datab->status === 'DIAJUKAN') selected @endif>DIAJUKAN BELI
                                    </option>
                                    <option value="HABIS" @if ($datab->status === 'HABIS') selected @endif>HABIS</option>
                                    <option value="TERSEDIA" @if ($datab->status === 'TERSEDIA') selected @endif>TERSEDIA
                                    </option>
                                </select>
                            </td>
                            <td>{{ $datab->update_at }}</td>
                            <td><button class="btn btn-ghost" onclick="editdatab(this)">Edit</button>
                                ||
                                <button type="button" class="btn btn-outline my-10 mx-2 hover:bg-red-900"
                                onclick="document.getElementById('delete_datab').classList.add('modal-open'); document.getElementById('edit_datab').classList.remove('modal-open')">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- BAGIAN AKHIR TABEL --}}

    {{-- BAGIAN AWAL LOG --}}
    {{-- <div id="datab-log" class="hidden">
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
    </div> --}}
    {{-- BAGIAN AKHIR LOG --}}
@endsection

