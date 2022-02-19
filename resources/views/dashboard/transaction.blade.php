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

    {{-- BAGIAN AWAL STAT --}}
    <div class="shadow stats w-full">

        <div class="stat w-full text-center">
            <div class="stat-figure text-success">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    class="inline-block w-8 h-8 stroke-current">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z">
                    </path>
                </svg>
            </div>
            <div class="stat-title text-primary">Price</div>
            <div class="stat-value text-success">$ <span id="price-view"></span></div>
            <div class="stat-desc text-primary"><span id="discount-view"></span> Discount</div>
        </div>

        <div class="stat w-full text-center">
            <div class="stat-figure text-info">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    class="inline-block w-8 h-8 stroke-current">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z">
                    </path>
                </svg>
            </div>
            <div class="stat-title text-primary">Additional Fee</div>
            <div class="stat-value text-info">$ <span id="fe-view"></span></div>
            <div class="stat-desc text-primary">Anything spesial to add at order</div>
        </div>

        <div class="stat w-full text-center">
            <div class="stat-figure text-warning">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    class="inline-block w-8 h-8 stroke-current">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z">
                    </path>
                </svg>
            </div>
            <div class="stat-title text-primary">Tax</div>
            <div class="stat-value text-warning">$ <span id="tax-view"></span></div>
            <div class="stat-desc text-primary">5% tax added form packages & qty</div>
        </div>

    </div>
    {{-- BAGIAN AKHIR STAT --}}

    <div class="flex flex-row text-center my-2">
        <div class="flex-1">
            <button class="btn btn-outline" onclick="document.getElementById('find_packages').classList.add('modal-open')">
                Add Packages
            </button>
        </div>
    </div>

    {{-- BAGIAN AWAL TABLE --}}
    <div class="overflow-x-auto">
        <table class="table table-compact w-full">

            {{-- BAGIAN AWAL HEADER TABLE --}}
            <thead>
                <tr>
                    <th>#</th>
                    <th>Packages</th>
                    <th>packages type</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            {{-- BAGIAN AKHIR HEADER TABLE --}}

            <tbody id="dbuff">
                {{-- <tr>
                <th></th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr> --}}
            </tbody>
        </table>
    </div>
    {{-- BAGIAN AKHIR TABLE --}}

    {{-- BAGIAN AWAL CUSTOMER & SELLER INFO --}}
    <form action="/pay" method="POST">
        @csrf
        <div id="datainfo">
            <input type="hidden" name="sumpay" id="sumpay">
            <input type="hidden" name="fepay" id="fepay">
            <input type="hidden" name="taxpay" id="taxpay">
        </div>
        <div id="packinfo">

        </div>

        <div class="flex flex-row my-4">
            <div class="flex-1 mx-4 w-full">
                <div class="collapse border rounded-box border-base-300 collapse-arrow">
                    <input type="checkbox">
                    <div class="collapse-title text-xl font-medium text-center">
                        Customer Information
                    </div>
                    <div class="collapse-content">
                        <div>
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Customer Name</span>
                                </label>
                                <div class="input-group">
                                    <input type="hidden" name="member_id" id="memberInput">
                                    <input type="text" placeholder="Search…" class="input input-bordered w-full"
                                        id="nameInput" readonly>
                                    <button class="btn btn-square"
                                        onclick="document.getElementById('find_member').classList.add('modal-open')"
                                        type="button">Find</button>
                                </div>
                            </div>
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Address</span>
                                </label>
                                <input type="text" placeholder="Location name"
                                    class="input input-secondary input-bordered w-full" id="addressInput" readonly>
                            </div>
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Contact number</span>
                                </label>
                                <div class="input-group">
                                    <span>+62</span>
                                    <input type="text" placeholder="Phone Number"
                                        class="input input-accent input-bordered w-full" id="numberInput" readonly>
                                </div>
                            </div>
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Gender</span>
                                </label>
                                <div class="flex-row">
                                    <input type="text" placeholder="Gender" class="input input-accent input-bordered w-full"
                                        id="genderInput" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-control my-4">
                    <label class="cursor-pointer label">
                        <span class="label-text text-lg">Note Trigger</span>
                        <input type="checkbox" class="toggle">
                    </label>
                    <p class="text-sm text-primary">Anything added at note will be added to fee</p>
                </div>
                <textarea class="textarea textarea-bordered my-4 w-full" placeholder="Bio" id="nude"></textarea>
            </div>

            <div class="flex-1 mx-4 w-full">
                <div class="collapse border rounded-box border-base-300 collapse-arrow">
                    <input type="checkbox">
                    <div class="collapse-title text-xl font-medium text-center">
                        Seller Information
                    </div>
                    <div class="collapse-content">
                        <div>
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Transaction Type</span>
                                </label>
                                <div class="flex-row">
                                    <select name="type" class="select select-bordered w-full" id="`">
                                        <option disabled="disabled" selected="selected">Choose Transaction Type will Used
                                        </option>
                                        <option value="paynow">Pay Now</option>
                                        <option value="paylater">Pay Later</option>
                                    </select>
                                </div>
                            </div>
                            <div id="payblok">
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text">Deadline Date</span>
                                    </label>
                                    <input type="date" name="date" placeholder=""
                                        class="input input-secondary input-bordered w-full bg-neutral-content text-black"
                                        id="dateInput">
                                </div>
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text">Discount</span>
                                    </label>
                                    <div class="flex-row">
                                        <select name="disc" class="select select-bordered w-full" id="discInput">
                                            <option disabled="disabled" selected="selected">Select Discount</option>
                                            <option value="10">10% Discount</option>
                                            <option value="20">20% Discount</option>
                                            <option value="30">30% Discount</option>
                                            <option value="40">40% Discount</option>
                                            <option value="50">50% Discount</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
    {{-- BAGIAN AKHIR CUSTOMER & SELLER INFO --}}
@endsection
