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
            <button class="btn btn-active" id="barventaris-btn">View</button>
            <button class="btn" id="barventaris-create-btn">Create</button>
        </div>
    </div>
    {{-- BAGIAN AKHIR TAB --}}

    {{-- BAGIAN AWAL TABEL --}}
    <div id="barventaris-view" class="">
        <div class="overflow-x-auto p-2">
            <table class="table w-full py-2" id="barventarisTable">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name of goods</th>
                        <th>Goods brands</th>
                        <th>Qty</th>
                        <th>Condition</th>
                        <th>procurement date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barventarisdata as $bv)
                        <tr class="active">
                            <th>{{ $bv->id }}</th>
                            <td>{{ $bv->nama_barang }}</td>
                            <td>{{ $bv->merk_barang }}</td>
                            <td>{{ $bv->qty }}</td>
                            <td>{{ $bv->kondisi }}</td>
                            <td>{{ $bv->tanggal_pengadaan  }}</td>
                            <td><button class="btn btn-ghost" onclick="request_info(this, 'inventory_input' ,'updateInventoryModal')">Edit</button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- BAGIAN AKHIR TABEL --}}

    {{-- BAGIAN AWAL CREATE --}}
    <div id="barventaris-create" class="hidden">
        <form action="/barventaris" method="post" class="text-center">
            @csrf
            <div class="flex flex-row">
                <div class="flex-1 w-full mx-5">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Name of goods</span>
                        </label>
                        <input type="text" name="nama_barang" placeholder="name of goods"
                            class="input input-primary input-bordered w-full" id="nameInput" required>
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Goods brands</span>
                        </label>
                        <input type="text" name="merk_barang" placeholder="goods brands"
                            class="input input-secondary input-bordered w-full" id="brandInput" required>
                    </div>
                </div>

                <div class="flex-1 w-full mx-5">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Qty</span>
                        </label>
                        <input type="number" name="qty" placeholder="quantity"
                            class="input input-primary input-bordered w-full" id="qtyInput" required>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Condition</span>
                        </label>
                        <div class="flex-row">
                            <select name="kondisi"
                            id="typeInput" class="select select-bordered w-full">
                                <option disabled="disabled" selected="selected">Condition of goods</option>
                                <option value="layak_pakai">Normal</option>
                                <option value="rusak_ringan">Minus Damage</option>
                                <option value="rusak_berat">Broke</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">procurement date</span>
                        </label>
                        <div class="input-group">
                            <input type="date" name="tanggal_pengadaan"
                            id="dateInput"
                            placeholder="Number"
                                class="input input-accent input-bordered w-full" required>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-outline my-10">Create</button>
        </form>
    </div>
    {{-- BAGIAN AKHIR CREATE --}}
@endsection
