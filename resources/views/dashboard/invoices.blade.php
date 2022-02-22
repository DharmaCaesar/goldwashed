@extends('preload.default')

@section('container')
    {{-- @include('partials.modals') --}}
    @include('partials.motrac')
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
                <label class="mx-2"> {{ Session::get('success') }}</label>
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
                <label class="mx-2"> {{ Session::get('failure') }}</label>
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

{{-- BAGIAN AWAL TABLE --}}
    <div class="flex flex-row">
        <div class="flex-1 p-4">
            <div class=" flex flex-row mb-4 items-center" id="printlocal">
                <div class="flex-1">
                    <p class="text-2xl font-bold">#<span id="code">{{ $transaction -> invoice_code }}</span></p>
                </div>

                <div class="flex-none text-right">
                    <p class="text-sm opacity-50" id="date">{{ $transaction -> transaction_date }}</p>
                </div>
            </div>

            <div class="flex flex-row items-stretch">
                <div class="flex-1 text-left">
                    <p class="font-bold">Customer:</p>

                    <address>
                        <span id="name">{{ $transaction -> members -> member_name }}</span>, <span id="gender">{{ $transaction -> members -> member_gender }}</span>
                        <p><span id="number">+{{ $transaction -> members -> member_phone }}</span></p>
                    </address>
                </div>

                <div class="flex-none text-right">
                    <p class="font-bold">Outlet:</p>

                    <address>
                        <p id="outletName">{{ $transaction -> outlets -> outlet_name }}</p>
                        <p><span id="outletPhone">+{{ $transaction -> outlets -> outlet_phone }}</span></p>
                    </address>
                </div>
            </div>

            <div class="flex flex-col lg:flex-row bg-base-500 my-5">
                <div class="flex-1">
                    <address class="text-left">
                        To:
                        <p class="my-2" id="sento">{{ $transaction -> members -> member_address }}</p>
                    </address>
                </div>

                <div class="flex-2">
                    <address class="text-right">
                        From:
                        <p class="my-2" id="senrom">{{  $transaction -> outlets -> outlet_address }}</p>
                    </address>
                </div>
            </div>

            <table class="table w-full table-compact text-center" id="inpaktab">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Package Name</th>
                        <th>Package Type</th>
                        <th>Package Price</th>
                        <th>Quantity</th>
                    </tr>
                </thead>

                <tbody id="inbuff">
                    @foreach ($trandet as $t)
                    <tr>
                        <th>{{ $t -> packages -> id }}</th>
                        <td>{{ $t -> packages -> package_name }}</td>
                        <td>{{ $t -> packages -> package_type }}</td>
                        <td>{{ $t -> packages -> package_price }}</td>
                        <td>{{ $t -> quantity }}</td>
                    </tr>
                    @endforeach
                </tbody>

                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>Additional Fee</th>
                        <th><span class="normal-case">$</span> <span id="fee">{{ $transaction -> transaction_paid_extra }}</span></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>Subtotal</th>
                        <th><span class="normal-case">$</span> <span id="total"></span></th>
                        <th id="totalqty">0</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th>Discount</th>
                        <th><span id="disc">{{ $transaction -> transaction_discount }}</span>%</th>
                        <th><span class="normal-case">$</span> <span id="sumtal">{{ $transaction -> transaction_paid }}</span></th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
  {{-- BAGIAN AKHIR TABLE --}}

  <div class="flex flex-row">
      <div class="flex-1 text-center">
        <button class="btn btn-outline non-printtab" onclick="window.print()">Print</button>
      </div>
  </div>
@endsection
