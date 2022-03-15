@extends('preload.default')

@section('container')
    @include('partials.modals')
    @include('partials.navbar')

    {{-- BAGIAN AWAL TAB --}}
    <div class="text-center my-5 flex flex-row">
        <div class="flex-1">
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Filter</span>
                </label>
                <div class="flex-row">
                    <select class="select select-bordered w-full " id="fInput" onchange="sort(get_id('simpTable'))">
                        <option value="ASC">Ascending</option>
                        <option value="DESC">Descending</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="flex-1 pt-[2.2rem]">
            <div class="btn-group inline-block">
                <button class="btn btn-active" id="view-btn">View</button>
                <button class="btn btn-outline" type="button" onclick="sort(get_id('simpTable'))">Sort</button>
                <button class="btn" id="create-btn">Create</button>
            </div>
        </div>
        <div class="flex-1">
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Search</span>
                </label>
                <div class="flex-row">
                    <input type="search" id="sInput" class="input input-bordered w-full" oninput="search(document.getElementById('sInput'), 'simpTable')">
                </div>
            </div>
        </div>
    </div>
    {{-- BAGIAN AKHIR TAB --}}

    {{-- BAGIAN AWAL CREATE --}}
    <div id="simp-create" class="hidden text-center">
        {{-- <form action="/createsimp" method="post" class="text-center"> --}}
        {{-- @csrf --}}
        <div class="flex flex-row">
            <div class="flex-1 w-full mx-5">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Gender</span>
                    </label>
                    <div class="flex-row">
                        <select class="select select-bordered w-full" id="genderInput">
                            <option disabled="disabled" selected="selected">Gender</option>
                            <option value="MALE">Male</option>
                            <option value="FEMALE">Female</option>
                            <option value="SHEMALE">Shemale</option>
                        </select>
                    </div>
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Status</span>
                    </label>
                    <div class="flex-row">
                        <select class="select select-bordered w-full" id="statusInput">
                            <option disabled="disabled" selected="selected">Status</option>
                            <option value="Single">Single</option>
                            <option value="Couple">Couple</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="flex-1 w-full mx-5">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Id</span>
                    </label>
                    <input type="number" placeholder="id" class="input input-secondary input-bordered w-full" id="idInput"
                        min="1" value="1" required>
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Name</span>
                    </label>
                    <input type="text" placeholder="Name" class="input input-primary input-bordered w-full" id="nameInput">
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Started Work</span>
                    </label>
                    <input type="date" name="date" placeholder=""
                        class="date-input input-secondary input-bordered w-full text-black"
                        id="dateInput">
                </div>
            </div>
        </div>
        <button class="btn btn-outline my-10" type="button" onclick="submit_simulation()">Create</button>
        {{-- </form> --}}
    </div>
    {{-- BAGIAN AKHIR CREATE --}}

    {{-- BAGIAN AWAL TABEL --}}
    <div id="simp-view" class="flex flex-row">
        <div class="flex-1">
            <div class="overflow-x-auto p-2">
                <table class="table w-full py-2 text-center" id="simpTable">
                    <thead>
                        <tr>
                            <th>#Id</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Status</th>
                            <th>Child</th>
                            <th>Started Work</th>
                            <th>First Salary</th>
                            <th>Grant</th>
                            <th>Total Salary</th>
                        </tr>
                    </thead>

                    <tbody id="simpBody">
                        <tr>
                            <td>1</td>
                            <td></td>
                            <td>Female</td>
                            <td>Single</td>
                            <td>0</td>
                            <td>2019-02-16</td>
                            <td>2000000</td>
                            <td>750000</td>
                            <td>2750000</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td></td>
                            <td>Male</td>
                            <td>Couple</td>
                            <td>1</td>
                            <td>2020-05-27</td>
                            <td>2000000</td>
                            <td>1150000</td>
                            <td>3150000</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td></td>
                            <td>Male</td>
                            <td>Single</td>
                            <td>3</td>
                            <td>2014-10-19</td>
                            <td>2000000</td>
                            <td>1050000</td>
                            <td>3050000</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td></td>
                            <td>Female</td>
                            <td>Couple</td>
                            <td>2</td>
                            <td>2018-11-02</td>
                            <td>2000000</td>
                            <td>1300000</td>
                            <td>3300000</td>
                        </tr>
                    </tbody>

                    <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Total</td>
                            <td></td>
                            <td></td>
                            <td><span class="normal-case">Rp.</span> <span id="total"></td>
                            <td><span class="normal-case">Rp.</span> <span id="total"></td>
                            <td><span class="normal-case">Rp.</span> <span id="total"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    {{-- BAGIAN AKHIR TABEL --}}
@endsection
