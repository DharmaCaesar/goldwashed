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
                    <input type="number" placeholder="id" class="input input-secondary input-bordered w-full" id="IdInput"
                        min="1" value="1" required>
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Package Name</span>
                    </label>
                    <div class="flex-row">
                        <select class="select select-bordered w-full" id="packInput" onchange="changePack(this)">
                            <option disabled="disabled" selected="selected">Package</option>
                            <option value="DEGEN">Detergent</option>
                            <option value="PARFUM">Parfume</option>
                            <option value="DETU">Shoes Detergent</option>
                        </select>
                    </div>
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">QTY</span>
                    </label>
                    <div class="flex-row">
                        <input type="number" name="qty" placeholder="" class="input input-secondary input-bordered w-full" id="qtyInput" >
                    </div>
                </div>
                <button class="btn btn-outline my-10" type="button" onclick="inputtrans()">Input</button>
            </div>

            <div class="flex-1 mx-5">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Buy Date</span>
                    </label>
                    <input type="date" name="bdate" placeholder=""
                        class="date-input input-secondary input-bordered w-full text-black" id="buyInput">
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Price</span>
                    </label>
                    <div class="mx-1">Rp. <span id="priceInput">0</span></div>
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Paid Way</span>
                    </label>
                </div>
                <div class="form-control">
                    <label class="label cursor-pointer">
                        <input type="radio" name="radio" class="radio checked:bg-info" id="cashRadio">
                        <span class="label-text">Cash</span>

                        <input type="radio" name="radio" class="radio checked:bg-warning" id="eRadio">
                        <span class="label-text">E-money/transfer</span>
                    </label>
                </div>
            </div>
        </div>
        {{-- </form> --}}
    </div>
    {{-- BAGIAN AKHIR CREATE --}}

    {{-- BAGIAN AWAL TABEL --}}
    <div id="transaksi-view" class="flex flex-row">
        <div class="flex-1">
            <div class="overflow-x-auto p-2">
                <table class="table w-full py-2 text-center" id="transaksiTable">
                    <thead>
                        <tr>
                            <th>#Id</th>
                            <th>Buy Date</th>
                            <th>Package Name</th>
                            <th>Price</th>
                            <th>QTY</th>
                            <th>Disc</th>
                            <th>Total</th>
                            <th>Paid Type</th>
                        </tr>
                    </thead>

                    <tbody id="transaksiBody">
                        <tr>
                           <td>1</td>
                           <td>2022-03-21</td>
                           <td>Detergent</td>
                           <td>15000</td>
                           <td>2</td>
                           <td>0</td>
                           <td>30000</td>
                           <td>Cash</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>2022-03-21</td>
                            <td>Parfume</td>
                            <td>10000</td>
                            <td>5</td>
                            <td>1500</td>
                            <td>48500</td>
                            <td>E-money</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>2022-03-22</td>
                            <td>Shoes Detergent</td>
                            <td>25000</td>
                            <td>5</td>
                            <td>18500</td>
                            <td>106500</td>
                            <td>E-money</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>2022-03-22</td>
                            <td>Parfume</td>
                            <td>10000</td>
                            <td>4</td>
                            <td>0</td>
                            <td>40000</td>
                            <td>Cash</td>
                        </tr>
                    </tbody>

                    <tfoot>
                        <tr>
                            <td></td>
                            <td>Total</td>
                            <td></td>
                            <td><span class="normal-case">Rp.</span> <span id="sump"></td>
                            <td><span class="normal-case">Rp.</span> <span id="sumq"></td>
                            <td><span class="normal-case">Rp.</span> <span id="sumd"></td>
                            <td><span class="normal-case">Rp.</span> <span id="fsum"></td>
                            <td></td>
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