@extends('preload.default')

@section('container')
@include('partials.modals')
@include('partials.navbar')

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

{{-- BAGIAN AWAL TABLE --}}
<div class="overflow-x-auto">
    <table class="table table-compact w-full">

        {{-- BAGIAN AWAL HEADER TABLE --}}
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Job</th>
                <th>company</th>
                <th>location</th>
                <th>Last Login</th>
                <th>Favorite Color</th>
            </tr>
        </thead>
        {{-- BAGIAN AKHIR HEADER TABLE --}}

        <tbody>
            <tr>
                <th></th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Job</th>
                <th>company</th>
                <th>location</th>
                <th>Last Login</th>
                <th>Favorite Color</th>
            </tr>
        </tfoot>
    </table>
</div>
{{-- BAGIAN AKHIR TABLE --}}

{{-- BAGIAN AWAL CUSTOMER & SELLER INFO --}}
<div class="flex flex-row my-4">
    <div class="flex-1 mx-4 w-full">
        <div class="collapse w-96 border rounded-box border-base-300 collapse-arrow">
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
                            <input type="text" name="name" placeholder="Search…" class="input input-bordered w-full" id="nameInput" readonly>
                            <button class="btn btn-square">Find</button>
                        </div>
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Address</span>
                        </label>
                        <input type="text" name="address" placeholder="Location name"
                            class="input input-secondary input-bordered w-full" id="addressInput" readonly>
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Contact number</span>
                        </label>
                        <div class="input-group">
                            <span>+62</span>
                            <input type="text" name="number" placeholder="Phone Number"
                                class="input input-accent input-bordered w-full" id="numberInput" readonly>
                        </div>
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Gender</span>
                        </label>
                        <div class="flex-row">
                            <input type="text" name="gender" placeholder="Gender"
                                class="input input-accent input-bordered w-full" id="genderInput" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex-1 mx-4 w-full">
        <div class="collapse w-96 border rounded-box border-base-300 collapse-arrow">
            <input type="checkbox">
            <div class="collapse-title text-xl font-medium text-center">
                Seller Information
            </div>
            <div class="collapse-content">
                <div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Customer Name</span>
                        </label>
                        <div class="input-group">
                            <input type="text" name="name" placeholder="Search…" class="input input-bordered w-full" id="nameInput" readonly>
                            <button class="btn btn-square">Find</button>
                        </div>
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Address</span>
                        </label>
                        <input type="text" name="address" placeholder="Location name"
                            class="input input-secondary input-bordered w-full" id="addressInput" readonly>
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Contact number</span>
                        </label>
                        <div class="input-group">
                            <span>+62</span>
                            <input type="text" name="number" placeholder="Phone Number"
                                class="input input-accent input-bordered w-full" id="numberInput" readonly>
                        </div>
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Gender</span>
                        </label>
                        <div class="flex-row">
                            <input type="text" name="gender" placeholder="Gender"
                                class="input input-accent input-bordered w-full" id="genderInput" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- BAGIAN AKHIR CUSTOMER & SELLER INFO --}}

    @endsection