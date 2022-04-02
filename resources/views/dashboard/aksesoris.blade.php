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
                    <svg class="swap-on fill-current" xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                        viewBox="0 0 512 512">
                        <polygon
                            points="400 145.49 366.51 112 256 222.51 145.49 112 112 145.49 222.51 256 112 366.51 145.49 400 256 289.49 366.51 400 400 366.51 289.49 256 400 145.49" />
                    </svg>
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
                    <svg class="swap-on fill-current" xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                        viewBox="0 0 512 512">
                        <polygon
                            points="400 145.49 366.51 112 256 222.51 145.49 112 112 145.49 222.51 256 112 366.51 145.49 400 256 289.49 366.51 400 400 366.51 289.49 256 400 145.49" />
                    </svg>
                </button>
            </div>
        </div>
    @endif
    {{-- BAGIAN AKHIR NOTIF --}}

    {{-- BAGIAN AWAL CREATE --}}
    <div id="transaksi-create" class="text-center border-4 my-2">
        <div class="flex flex-row">
            <div class="flex-1 mx-5">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Id</span>
                    </label>
                    <input type="number" placeholder="id" class="input input-secondary input-bordered w-full" id="iInput"
                        min="1" value="1" required>
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Barang Dibeli</span>
                    </label>
                    <div class="flex-row">
                        <select class="select select-bordered w-full" id="pakInput" name="goods">
                            <option disabled="disabled" selected="selected">Barang</option>
                            <option value="GANTUNGANKUNCI">GANTUNGAN KUNCI</option>
                            <option value="IKATRAMBUT">IKAT RAMBUT</option>
                        </select>
                    </div>
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Jumlah barang</span>
                    </label>
                    <div class="flex-row">
                        <input type="number" name="qty" placeholder="" class="input input-secondary input-bordered w-full" id="QtyInput" >
                    </div>
                </div>
                <button class="btn btn-outline my-10" type="button" onclick="inputtrans()">Input</button>
            </div>

            <div class="flex-1 mx-5">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Tanggal beli</span>
                    </label>
                    <input type="date" name="bdate" placeholder=""
                        class="date-input input-secondary input-bordered w-full text-black" id="paidInput">
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Warna</span>
                    </label>
                    <div class="flex-row">
                        <select class="select select-bordered w-full" name="color" id="coInput">
                            <option disabled="disabled" selected="selected">Warna</option>
                            <option value="KUNING">KUNING</option>
                            <option value="MERAH">MERAH</option>
                        </select>
                    </div>
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Nama Pembeli</span>
                    </label>
                    <input type="text" placeholder="buyer name" name="buna"
                        class="input input-primary input-bordered w-full" id="nemInput">
                </div>
            </div>
        </div>
        {{-- </form> --}}
    </div>
    {{-- BAGIAN AKHIR CREATE --}}

    {{-- BAGIAN AWAL TAB --}}
    <div class="text-center my-5 flex flex-row">
        <div class="flex-1">
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Filter</span>
                </label>
                <div class="flex-row">
                    <select class="select select-bordered w-full " id="FInput" onchange="sort(get_id('aksesorisTable'))">
                        <option value="ASC">Ascending</option>
                        <option value="DESC">Descending</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="flex-1 pt-[2.2rem]">
            <div class="btn-group inline-block">
                <button class="btn btn-outline" type="button" onclick="sort(get_id('aksesorisTable'))">Sort</button>
            </div>
        </div>
        <div class="flex-1">
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Search</span>
                </label>
                <div class="flex-row">
                    <input type="search" id="sInput" class="input input-bordered w-full" oninput="search(document.getElementById('sInput'), 'aksesorisTable')">
                </div>
            </div>
        </div>
    </div>
    {{-- BAGIAN AKHIR TAB --}}

    {{-- BAGIAN AWAL TABEL --}}
    <div id="aksesoris-view" class="flex flex-row">
        <div class="flex-1">
            <div class="overflow-x-auto p-2">
                <table class="table w-full py-2 text-center" id="aksesorisTable">
                    <thead>
                        <tr>
                            <th>#Id</th>
                            <th>Tanggal Beli</th>
                            <th>Barang</th>
                            <th>Warna</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Nama Pembeli</th>
                            <th>Diskon</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>

                    <tbody id="aksesorisBody">
                        
                    </tbody>

                    <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Total</td>
                            <td></td>
                            <td><span class="normal-case">Rp.</span> <span id="tprice"></span></td>
                            <td><span class="normal-case"></span> <span id="tqty"></span></td>
                            <td></td>
                            <td><span class="normal-case">Rp.</span> <span id="tdisc"></span></td>
                            <td><span class="normal-case">Rp.</span> <span id="ft"></span></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    {{-- BAGIAN AKHIR TABEL --}}

    {{-- BAGIAN AWAL LOG --}}
    {{-- <div id="transaksi-log" class="hidden">
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