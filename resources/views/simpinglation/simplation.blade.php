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
                        </tr>
                    </thead>

                    <tbody id="simpBody">
                        <tr>
                            <td>2</td>
                            <td>Save</td>
                            <td>Female</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Me</td>
                            <td>Male</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>From</td>
                            <td>Male</td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>Gay</td>
                            <td>Male</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- BAGIAN AKHIR TABEL --}}
@endsection
