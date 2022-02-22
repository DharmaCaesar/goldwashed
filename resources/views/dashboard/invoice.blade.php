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
    <div class="overflow-x-auto p-2">
        <table class="table table-compact w-full text-center py-2" id="icu">

            {{-- BAGIAN AWAL HEADER TABLE --}}
            <thead>
                <tr>
                    <th>#</th>
                    <th>Invoice Code</th>
                    <th>Member Name</th>
                    <th>Member Phone</th>
                    <th>Member Address</th>
                    <th>Total Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            {{-- BAGIAN AKHIR HEADER TABLE --}}

            <tbody id="iv">
                @foreach($transaction as $t)
                <tr>
                    <th>{{ $t -> id }}</th>
                    <td>{{ $t -> invoice_code  }}</td>
                    <td>{{ $t -> members -> member_name }}</td>
                    <td>{{ $t -> members -> member_phone }}</td>
                    <td>{{ $t -> members -> member_address }}</td>
                    <td>$ {{ $t -> transaction_paid }}</td>
                    <th>
                        <button class="btn btn-outline" type="button" onclick="viewInvoice(this)">View</button>
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- BAGIAN AKHIR TABLE --}}

@endsection