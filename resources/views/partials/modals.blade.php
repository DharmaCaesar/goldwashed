{{-- BAGIAN AWAL OUTLET --}}
@if ($page == 'outlets')
    {{-- BAGIAN AWAL EDIT --}}
    <div id="edit_outlet" class="modal">
        <div class="modal-box min-w-full text-center">
            <p>Enim dolorem dolorum omnis atque necessitatibus. Consequatur aut adipisci qui iusto illo eaque.
                Consequatur repudiandae et. Nulla ea quasi eligendi. Saepe velit autem minima.</p>

            <form action="/editoutlet" method="post" class="text-center">
                @csrf
                <input type="hidden" name="outlet_id" value="{{ Auth::user()->outlet_id }}">
                <div class="flex flex-row justify-center">
                    <div class="flex-1 w-full mx-5 max-w-lg">
                        <div class="form-control">
                            <label class="label justify-center">
                                <span class="label-text">Outlet Status</span>
                            </label>
                            <div class="flex-row">
                                <select id="statusInput" name="status" class="select select-bordered w-full">
                                    <option disabled="disabled" selected="selected">Choose Outlet Status</option>
                                    <option value="ACTIVE">Active</option>
                                    <option value="CLOSED">Closed</option>
                                    <option value="BANKRUPT">Bankrupt</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-control">
                            <label class="label justify-center">
                                <span class="label-text">Outlet New Name</span>
                            </label>
                            <input id="nameInput" type="text" name="outlet_name" placeholder="Outlet name"
                                class="input input-primary input-bordered w-full">
                        </div>
                        <div class="form-control">
                            <label class="label justify-center">
                                <span class="label-text">Outlet New Location</span>
                            </label>
                            <input id="addressInput" type="text" name="outlet_address" placeholder="Location name"
                                class="input input-secondary input-bordered w-full">
                        </div>
                        <div class="form-control">
                            <label class="label justify-center">
                                <span class="label-text">Contact New number</span>
                            </label>
                            <div class="input-group">
                                <span>+62</span>
                                <input id="numberInput" type="text" name="outlet_phone" placeholder="Number"
                                    class="input input-accent input-bordered w-full">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-outline my-10 mx-2 hover:bg-info">Edit</button>
                <button type="button" class="btn btn-outline my-10 mx-2"
                    onclick="document.getElementById('edit_outlet').classList.remove('modal-open')">Cancel</button>
                <button type="button" class="btn btn-outline my-10 mx-2 hover:bg-red-900"
                    onclick="document.getElementById('delete_outlet').classList.add('modal-open'); document.getElementById('edit_outlet').classList.remove('modal-open')">Delete</button>
            </form>

        </div>
    </div>
    {{-- BAGIAN AKHIR EDIT --}}

    {{-- BAGIAN AWAL DELETE --}}
    <div id="delete_outlet" class="modal">
        <div class="modal-box min-w-full text-center">
            <p>Enim dolorem dolorum omnis atque necessitatibus. Consequatur aut adipisci qui iusto illo eaque.
                Consequatur repudiandae et. Nulla ea quasi eligendi. Saepe velit autem minima.</p>

            <form action="/deleteoutlet" method="post" class="text-center">
                @csrf
                <input type="hidden" name="outlet_id" value="{{ Auth::user()->outlet_id }}">
                <button type="button" class="btn btn-outline my-10 mx-2"
                    onclick="document.getElementById('delete_outlet').classList.remove('modal-open')">Cancel</button>
                <button type="submit" class="btn btn-outline my-10 mx-2 hover:bg-red-900">Delete</button>
            </form>
        </div>
    </div>
    {{-- BAGIAN AKHIR DELETE --}}
@endif
{{-- BAGIAN AKHIR OUTLET --}}

{{-- BAGIAN AWAL PACKAGES --}}
@if ($page == 'packages')
    {{-- BAGIAN AWAL EDIT --}}
    <div id="edit_package" class="modal">
        <div class="modal-box min-w-full text-center">
            <p>Enim dolorem dolorum omnis atque necessitatibus. Consequatur aut adipisci qui iusto illo eaque.
                Consequatur repudiandae et. Nulla ea quasi eligendi. Saepe velit autem minima.</p>

            <form action="/editpackage" method="post" class="text-center">
                @csrf
                <input type="hidden" name="package_id" id="idInput">
                <div class="flex flex-row">
                    <div class="flex-1 w-full mx-5">
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Outlet ID</span>
                            </label>
                            <div class="input-group">
                                <input type="hidden" name="outlet_id" id="outlet_id_input"
                                    value="{{ Auth::user()->outlet_id }}">
                                <input type="text" value="{{ Auth::user()->outlets->outlet_name }}"
                                    id="outlet_name_input" class="w-full input input-primary rounded-1-none" readonly>
                                {{-- <button class="btn btn-primary">Washearch</button> --}}
                            </div>
                        </div>
                    </div>

                    <div class="flex-1 w-full mx-5">
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Packages New Name</span>
                            </label>
                            <input id="nameInput" type="text" name="package_name" placeholder="package name"
                                class="input input-primary input-bordered w-full">
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Packages New Type</span>
                            </label>
                            <div class="flex-row">
                                <select name="package_type" class="select select-bordered w-full" id="typeInput">
                                    <option disabled="disabled" selected="selected">Choose New Packages Type</option>
                                    <option value="HEAVY">HEAVY</option>
                                    <option value="BLANKET">BLANKET</option>
                                    <option value="BED_COVER">BED COVER</option>
                                    <option value="SHIRTS">SHIRTS</option>
                                    <option value="SUIT">SUIT</option>
                                    <option value="OTHERS">OTHERS</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Packages Price</span>
                            </label>
                            <div class="input-group">
                                <span>$</span>
                                <input type="number" name="package_price" placeholder="Number"
                                    class="input input-accent input-bordered w-full" id="priceInput">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-outline my-10 mx-2 hover:bg-info">Edit</button>
                <button type="button" class="btn btn-outline my-10 mx-2"
                    onclick="document.getElementById('edit_package').classList.remove('modal-open')">Cancel</button>
                <button type="button" class="btn btn-outline my-10 mx-2 hover:bg-red-900"
                    onclick="document.getElementById('delete_package').classList.add('modal-open'); document.getElementById('edit_package').classList.remove('modal-open')">Delete</button>
            </form>

        </div>
    </div>
    {{-- BAGIAN AKHIR EDIT --}}

    {{-- BAGIAN AWAL DELETE --}}
    <div id="delete_package" class="modal">
        <div class="modal-box min-w-full text-center">
            <p>Enim dolorem dolorum omnis atque necessitatibus. Consequatur aut adipisci qui iusto illo eaque.
                Consequatur repudiandae et. Nulla ea quasi eligendi. Saepe velit autem minima.</p>

            <form action="/deletepackage" method="post" class="text-center">
                @csrf
                <input type="hidden" id="deleteId" name="package_id">
                <button type="button" class="btn btn-outline my-10 mx-2"
                    onclick="document.getElementByI('delete_package').classList.remove('modal-open')">Cancel</button>
                <button type="submit" class="btn btn-outline my-10 mx-2 hover:bg-red-900">Delete</button>
            </form>
        </div>
    </div>
    {{-- BAGIAN AKHIR DELETE --}}
@endif
{{-- BAGIAN AKHIR PACKAGES --}}

{{-- BAGIAN AWAL MEMBERSHIP --}}
@if ($page == 'membership')
    {{-- BAGIAN AWAL EDIT --}}
    <div id="edit_member" class="modal">
        <div class="modal-box min-w-full text-center">
            <p>Enim dolorem dolorum omnis atque necessitatibus. Consequatur aut adipisci qui iusto illo eaque.
                Consequatur repudiandae et. Nulla ea quasi eligendi. Saepe velit autem minima.</p>

            <form action="/editmember" method="post" class="text-center">
                @csrf
                <input type="hidden" name="member_id" id="idInput">
                <div class="flex flex-row">
                    <div class="flex-1 w-full mx-5">
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Old Member Name</span>
                            </label>
                            <input type="text" placeholder="member name"
                                class="input input-primary input-bordered w-full" id="namaInput" readonly>
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Member Gender</span>
                            </label>
                            <div class="flex-row">
                                <select name="member_gender" class="select select-bordered w-full" id="genderInput">
                                    <option disabled="disabled" selected="selected">Member Gender</option>
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
                                <span class="label-text">New Member Name</span>
                            </label>
                            <input type="text" name="member_name" placeholder="member name"
                                class="input input-primary input-bordered w-full" id="nameInput">
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">New Member Address</span>
                            </label>
                            <input type="text" name="member_address" placeholder="member address"
                                class="input input-secondary input-bordered w-full" id="addressInput">
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">New Member Contact</span>
                            </label>
                            <div class="input-group">
                                <span>+62</span>
                                <input type="text" name="member_phone" placeholder="Number"
                                    class="input input-accent input-bordered w-full" id="numberInput">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-outline my-10 mx-2 hover:bg-info">Edit</button>
                <button type="button" class="btn btn-outline my-10 mx-2"
                    onclick="document.getElementById('edit_member').classList.remove('modal-open')">Cancel</button>
                <button type="button" class="btn btn-outline my-10 mx-2 hover:bg-red-900"
                    onclick="document.getElementById('delete_member').classList.add('modal-open'); document.getElementById('edit_member').classList.remove('modal-open')">Delete</button>
            </form>

        </div>
    </div>
    {{-- BAGIAN AKHIR EDIT --}}

    {{-- BAGIAN AWAL DELETE --}}
    <div id="delete_member" class="modal">
        <div class="modal-box min-w-full text-center">
            <p>Enim dolorem dolorum omnis atque necessitatibus. Consequatur aut adipisci qui iusto illo eaque.
                Consequatur repudiandae et. Nulla ea quasi eligendi. Saepe velit autem minima.</p>

            <form action="/deletemember" method="post" class="text-center">
                @csrf
                <input type="hidden" name="member_id" id="deleteId">
                <button type="button" class="btn btn-outline my-10 mx-2"
                    onclick="document.getElementById('delete_member').classList.remove('modal-open')">Cancel</button>
                <button type="submit" class="btn btn-outline my-10 mx-2 hover:bg-red-900">Delete</button>
            </form>
        </div>
    </div>
    {{-- BAGIAN AKHIR DELETE --}}
@endif
{{-- BAGIAN AKHIR MEMBERSHIP --}}

{{-- BAGIAN AWAL USER --}}
@if ($page == 'user')
    {{-- BAGIAN AWAL EDIT --}}
    <div id="edit_user" class="modal">
        <div class="modal-box min-w-full text-center">
            <p>Enim dolorem dolorum omnis atque necessitatibus. Consequatur aut adipisci qui iusto illo eaque.
                Consequatur repudiandae et. Nulla ea quasi eligendi. Saepe velit autem minima.</p>

            <form action="/edituser" method="post" class="text-center">
                @csrf
                <input type="hidden" name="user_id" id="idInput">
                <div class="flex flex-row">
                    <div class="flex-1 w-full mx-5">
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Role</span>
                            </label>
                            <div class="flex-row">
                                <select name="role" class="select select-bordered w-full" id="roleInput">
                                    <option disabled="disabled" selected="selected">User Role</option>
                                    <option value="ADMIN">ADMIN</option>
                                    <option value="OWNER">OWNER</option>
                                    <option value="CASHIER">CASHIER</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="flex-1 w-full mx-5">
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Fullname</span>
                            </label>
                            <input id="nameInput" type="text" name="name" placeholder="Fullname"
                                class="input input-bordered">
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Username</span>
                            </label>
                            <input id="usernameInput" type="text" name="username" placeholder="Username"
                                class="input input-bordered">
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Password</span>
                            </label>
                            <input id="passwordInput" type="password" name="password" placeholder="password"
                                class="input input-bordered">
                            {{-- <label class="label">
                              <a href="#" class="label-text-alt">Forgot password?</a>
                            </label> --}}
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-outline my-10 mx-2 hover:bg-info">Edit</button>
                <button type="button" class="btn btn-outline my-10 mx-2"
                    onclick="document.getElementById('edit_user').classList.remove('modal-open')">Cancel</button>
                <button type="button" class="btn btn-outline my-10 mx-2 hover:bg-red-900"
                    onclick="document.getElementById('delete_user').classList.add('modal-open'); document.getElementById('edit_user').classList.remove('modal-open')">Delete</button>
            </form>

        </div>
    </div>
    {{-- BAGIAN AKHIR EDIT --}}

    {{-- BAGIAN AWAL DELETE --}}
    <div id="delete_user" class="modal">
        <div class="modal-box min-w-full text-center">
            <p>Enim dolorem dolorum omnis atque necessitatibus. Consequatur aut adipisci qui iusto illo eaque.
                Consequatur repudiandae et. Nulla ea quasi eligendi. Saepe velit autem minima.</p>

            <form action="/deleteuser" method="post" class="text-center">
                @csrf
                <input type="hidden" name="user_id" id="deleteId">
                <button type="button" class="btn btn-outline my-10 mx-2"
                    onclick="document.getElementById('delete_user').classList.remove('modal-open')">Cancel</button>
                <button type="submit" class="btn btn-outline my-10 mx-2 hover:bg-red-900">Delete</button>
            </form>
        </div>
    </div>
    {{-- BAGIAN AKHIR DELETE --}}
@endif
{{-- BAGIAN AKHIR USER --}}

{{-- BAGIAN AWAL BARVENTARIS --}}
@if ($page == 'barventaris')
    {{-- BAGIAN AWAL EDIT --}}
    <div id="updatebarventarisModal" class="modal">
        <div class="modal-box min-w-full text-center">
            <p>Change informmation of goods .</p>

            <form action="/update-barventaris" method="post" class="text-center">
                @csrf
                <input type="hidden" name="barventaris_id" id="barventaris_input">
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
                                <select name="kondisi" id="conditionInput" class="select select-bordered w-full">
                                    <option disabled="disabled" selected="selected">Condition of goods</option>
                                    <option value="Normal">Normal</option>
                                    <option value="Minus">Minus Damage</option>
                                    <option value="Broke">Broke</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">procurement date</span>
                            </label>
                            <div class="input-group">
                                <input type="date" name="tanggal_pengadaan" id="dateInput" placeholder="Number"
                                    class="input input-secondary input-bordered w-full bg-neutral-content text-black"
                                    required>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-outline my-10 mx-2 hover:bg-info">Edit</button>
                <button type="button" class="btn btn-outline my-10 mx-2"
                    onclick="document.getElementById('updatebarventarisModal').classList.remove('modal-open')">Cancel</button>
                <button type="button" class="btn btn-outline my-10 mx-2 hover:bg-red-900"
                    onclick="deleteItem('barventaris_input','updatebarventarisModal')">Delete</button>
            </form>

        </div>
    </div>
    {{-- BAGIAN AKHIR EDIT --}}

    {{-- BAGIAN AWAL DELETE --}}
    <div class="modal" id="deletebarventarisModal">
        <div class="modal-box min-w-full text-center">
            <p>Be sure to deleting the item u choose, before deleting permanently.</p>

            <form action="/delete-barventaris" method="post" class="text-center">
                @csrf
                <input type="hidden" name="barventaris_delete" id="barventaris_delete">
                <div class="flex flex-row text-center justify-center">
                    <div class="flex-1 justify-center">
                        <div class="modal-action my-4 text-center">
                            <button type="button" class="btn btn-outline my-10 mx-2"
                                onclick="document.getElementById('deletebarventarisModal').classList.remove('modal-open')">Cancel</button>
                            <button type="submit" class="btn btn-outline my-10 mx-2 hover:bg-red-900">Delete</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        {{-- BAGIAN AKHIR DELETE --}}
    </div>
@endif
{{-- BAGIAN AKHIR BARVENTARIS --}}

{{-- BAGIAN AWAL PENJEMPUTAN --}}
@if ($page == 'penjemputan')
    {{-- BAGIAN AWAL EDIT --}}
    <div id="edit_penjemputan" class="modal">
        <div class="modal-box min-w-full text-center">
            <p>Enim dolorem dolorum omnis atque necessitatibus. Consequatur aut adipisci qui iusto illo eaque.
                Consequatur repudiandae et. Nulla ea quasi eligendi. Saepe velit autem minima.</p>

            <form action="/editpenjemputan" method="post" class="text-center">
                @csrf
                <input type="hidden" name="id" id="Idinput">
                <div class="flex flex-row">
                    <div class="flex-1 w-full mx-5">
                        <div class="form-control">
                            <label class="label justify-center">
                                <span class="label-text">Member Name</span>
                            </label>
                            <div class="input-group">
                                <input type="hidden" name="member_id" id="memberInput">
                                <input type="text" placeholder="Search…" class="input input-bordered w-full rounded-r-lg"
                                    id="namasInput" readonly name="member_name">
                                <button class="btn btn-square"
                                    onclick="document.getElementById('fin_member').classList.add('modal-open')"
                                    type="button">Find</button>
                            </div>
                        </div>
                        <div class="form-control">
                            <label class="label justify-center">
                                <span class="label-text">Address</span>
                            </label>
                            <input type="text" placeholder="Location name"
                                class="input input-secondary input-bordered w-full" id="addInput" readonly name="member_address">
                        </div>
                        <div class="form-control">
                            <label class="label justify-center">
                                <span class="label-text">Contact number</span>
                            </label>
                            <div class="input-group">
                                <span>+62</span>
                                <input type="text" placeholder="Phone Number"
                                    class="input input-accent input-bordered w-full" id="noInput" readonly name="member_phone">
                            </div>
                        </div>
                        <div class="form-control">
                            <label class="label justify-center">
                                <span class="label-text">New Officer Name</span>
                            </label>
                            <input type="text" name="petugas_penjemputan" placeholder="Officer Name" class="input input-secondary input-bordered w-full" id="namiInput">
                        </div>
                        <div class="form-control">
                            <label class="label justify-center">
                                <span class="label-text">Status</span>
                            </label>
                            <div class="flex-row">
                                <select name="status" class="select select-bordered w-full" id="sInput">
                                    <option disabled="disabled" selected="selected">Status</option>
                                    <option value="TERCATAT">TERCATAT</option>
                                    <option value="PENJEMPUTAN">PENJEMPUTAN</option>
                                    <option value="SELESAI">SELESAI</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-outline my-10 mx-2 hover:bg-info">Edit</button>
                <button type="button" class="btn btn-outline my-10 mx-2"
                    onclick="document.getElementById('edit_penjemputan').classList.remove('modal-open')">Cancel</button>
                <button type="button" class="btn btn-outline my-10 mx-2 hover:bg-red-900"
                    onclick="document.getElementById('delete_penjemputan').classList.add('modal-open'); document.getElementById('edit_penjemputan').classList.remove('modal-open')">Delete</button>
            </form>

        </div>
    </div>
    {{-- BAGIAN AKHIR EDIT --}}

    {{-- BAGIAN AWAL DELETE --}}
    <div id="delete_penjemputan" class="modal">
        <div class="modal-box min-w-full text-center">
            <p>Enim dolorem dolorum omnis atque necessitatibus. Consequatur aut adipisci qui iusto illo eaque.
                Consequatur repudiandae et. Nulla ea quasi eligendi. Saepe velit autem minima.</p>

            <form action="/deletepenjemputan" method="post" class="text-center">
                @csrf
                <input type="hidden" name="member_id" id="delId">
                <button type="button" class="btn btn-outline my-10 mx-2"
                    onclick="document.getElementById('delete_penjemputan').classList.remove('modal-open')">Cancel</button>
                <button type="submit" class="btn btn-outline my-10 mx-2 hover:bg-red-900">Delete</button>
            </form>
        </div>
    </div>
    {{-- BAGIAN AKHIR DELETE --}}
@endif

{{-- BAGIAN AWAL TAKE ID_MEMBER --}}
@if ($page == 'penjemputan')

    <div class="modal" id="fin_member">
        <div class="modal-box min-w-full">
            <div class="overflow-x-auto">
                <table class="table w-full" id="memetable">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Member Name</th>
                            <th>Member Address</th>
                            <th>Member Contact</th>
                            <th>Gender</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($memberdata as $member)
                            <tr class="active">
                                <th>{{ $member->id }}</th>
                                <td>{{ $member->member_name }}</td>
                                <td>{{ $member->member_address }}</td>
                                <td>{{ $member->member_phone }}</td>
                                <td>{{ $member->member_gender }}</td>
                                <td><button class="btn btn-ghost" onclick="takepenjemputan(this,0)">Pick</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-action">
                <button type="button" class="btn btn-outline my-10 mx-2"
                    onclick="document.getElementById('fin_member').classList.remove('modal-open')">Cancel</button>
            </div>
        </div>
    </div>

@endif
{{-- BAGIAN AKHIR TAKE ID_MEMBER --}}
{{-- BAGIAN AKHIR PENJEMPUTAN --}}

{{-- BAGIAN AWAL datab --}}
@if ($page == 'datab')

    {{-- BAGIAN AWAL CREATE --}}
    <div id="datab-create" class="hidden">
        <form action="/createdatab" method="post" class="text-center">
            @csrf
            <div class="flex flex-row justify-center">
                <div class="flex-1 w-full mx-5 max-w-lg">
                    <div class="form-control">
                        <label class="label justify-center">
                            <span class="label-text">Product Name</span>
                        </label>
                        <div class="input-group">
                            <input type="hidden" name="pname" id="pInput">
                            <input type="text" placeholder="Search…" class="input input-bordered w-full rounded-r-lg"
                                id="namesInput" readonly name="member_name">
                        </div>
                    </div>
                    <div class="form-control">
                        <label class="label justify-center">
                            <span class="label-text">Address</span>
                        </label>
                        <input type="text" placeholder="Location name"
                            class="input input-secondary input-bordered w-full" id="alamatInput" readonly name="member_address">
                    </div>
                    <div class="form-control">
                        <label class="label justify-center">
                            <span class="label-text">Contact number</span>
                        </label>
                        <div class="input-group">
                            <span>+62</span>
                            <input type="text" placeholder="Phone Number"
                                class="input input-accent input-bordered w-full" id="nomorInput" readonly name="member_phone">
                        </div>
                    </div>

                    <div class="form-control">
                        <label class="label justify-center">
                            <span class="label-text">Officer Name</span>
                        </label>
                        <input type="text" name="petugas_datab" placeholder="Officer name"
                            class="input input-primary input-bordered w-full" id="namiInput">
                    </div>
                    <div class="form-control">
                        <label class="label justify-center">
                            <span class="label-text">Status</span>
                        </label>
                        <div class="flex-row">
                            <select name="status" class="select select-bordered w-full" id="statusInput">
                                <option disabled="disabled" selected="selected">Status</option>
                                <option value="TERCATAT">TERCATAT</option>
                                <option value="PENJEMPUTAN">PENJEMPUTAN</option>
                                <option value="SELESAI">SELESAI</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-outline my-10">Create</button>
        </form>
    </div>
    {{-- BAGIAN AKHIR CREATE --}}

    {{-- BAGIAN AWAL EDIT --}}
    <div id="edit_datab" class="modal">
        <div class="modal-box min-w-full text-center">
            <p>Enim dolorem dolorum omnis atque necessitatibus. Consequatur aut adipisci qui iusto illo eaque.
                Consequatur repudiandae et. Nulla ea quasi eligendi. Saepe velit autem minima.</p>

            <form action="/editdatab" method="post" class="text-center">
                @csrf
                <input type="hidden" name="id" id="Idinput">
                <div class="flex flex-row">
                    <div class="flex-1 w-full mx-5">
                        <div class="form-control">
                            <label class="label justify-center">
                                <span class="label-text">Member Name</span>
                            </label>
                            <div class="input-group">
                                <input type="hidden" name="member_id" id="memberInput">
                                <input type="text" placeholder="Search…" class="input input-bordered w-full rounded-r-lg"
                                    id="namasInput" readonly name="member_name">
                                <button class="btn btn-square"
                                    onclick="document.getElementById('fin_member').classList.add('modal-open')"
                                    type="button">Find</button>
                            </div>
                        </div>
                        <div class="form-control">
                            <label class="label justify-center">
                                <span class="label-text">Address</span>
                            </label>
                            <input type="text" placeholder="Location name"
                                class="input input-secondary input-bordered w-full" id="addInput" readonly name="member_address">
                        </div>
                        <div class="form-control">
                            <label class="label justify-center">
                                <span class="label-text">Contact number</span>
                            </label>
                            <div class="input-group">
                                <span>+62</span>
                                <input type="text" placeholder="Phone Number"
                                    class="input input-accent input-bordered w-full" id="noInput" readonly name="member_phone">
                            </div>
                        </div>
                        <div class="form-control">
                            <label class="label justify-center">
                                <span class="label-text">New Officer Name</span>
                            </label>
                            <input type="text" name="petugas_penjemputan" placeholder="Officer Name" class="input input-secondary input-bordered w-full" id="namiInput">
                        </div>
                        <div class="form-control">
                            <label class="label justify-center">
                                <span class="label-text">Status</span>
                            </label>
                            <div class="flex-row">
                                <select name="status" class="select select-bordered w-full" id="sInput">
                                    <option disabled="disabled" selected="selected">Status</option>
                                    <option value="TERCATAT">TERCATAT</option>
                                    <option value="PENJEMPUTAN">PENJEMPUTAN</option>
                                    <option value="SELESAI">SELESAI</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-outline my-10 mx-2 hover:bg-info">Edit</button>
                <button type="button" class="btn btn-outline my-10 mx-2"
                    onclick="document.getElementById('edit_datab').classList.remove('modal-open')">Cancel</button>
            </form>

        </div>
    </div>
    {{-- BAGIAN AKHIR EDIT --}}

    {{-- BAGIAN AWAL DELETE --}}
    <div id="delete_datab" class="modal">
        <div class="modal-box min-w-full text-center">
            <p>Enim dolorem dolorum omnis atque necessitatibus. Consequatur aut adipisci qui iusto illo eaque.
                Consequatur repudiandae et. Nulla ea quasi eligendi. Saepe velit autem minima.</p>

            <form action="/deletedatab" method="post" class="text-center">
                @csrf
                <input type="hidden" name="member_id" id="delId">
                <button type="button" class="btn btn-outline my-10 mx-2"
                    onclick="document.getElementById('delete_datab').classList.remove('modal-open')">Cancel</button>
                <button type="submit" class="btn btn-outline my-10 mx-2 hover:bg-red-900">Delete</button>
            </form>
        </div>
    </div>
    {{-- BAGIAN AKHIR DELETE --}}
@endif
{{-- BAGIAN AKHIR datab --}}
