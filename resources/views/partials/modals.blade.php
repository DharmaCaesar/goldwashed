{{-- BAGIAN AWAL OUTLET --}}
@if ($page == 'outlets')

{{-- BAGIAN AWAL EDIT --}}
<div id="edit_outlet" class="modal">
    <div class="modal-box min-w-full text-center">
      <p>Enim dolorem dolorum omnis atque necessitatibus. Consequatur aut adipisci qui iusto illo eaque. Consequatur repudiandae et. Nulla ea quasi eligendi. Saepe velit autem minima.</p> 

      <form action="/editoutlet" method="post" class="text-center">
        @csrf
        <input type="hidden" name="outlet_id" value="{{ Auth::user() -> outlet_id }}">
            <div class="flex flex-row">
                <div class="flex-1 w-full mx-5">
                    <div class="form-control">
                        <label class="label">
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
                </div>

                <div class="flex-1 w-full mx-5">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Outlet New Name</span>
                        </label>
                        <input id="nameInput" type="text" name="outlet_name" placeholder="Outlet name" class="input input-primary input-bordered w-full">
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Outlet New Location</span>
                        </label>
                        <input id="addressInput" type="text" name="outlet_address" placeholder="Location name" class="input input-secondary input-bordered w-full">
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Contact New number</span>
                        </label>
                        <div class="input-group">
                            <span>+62</span>
                            <input id="numberInput" type="text" name="outlet_phone" placeholder="Number" class="input input-accent input-bordered w-full">
                        </div>
                    </div>
                </div>
            </div>
                <button type="submit" class="btn btn-outline my-10 mx-2 hover:bg-info">Edit</button>
                <button type="button" class="btn btn-outline my-10 mx-2" onclick="document.getElementById('edit_outlet').classList.remove('modal-open')">Cancel</button>
                <button type="button" class="btn btn-outline my-10 mx-2 hover:bg-red-900" onclick="document.getElementById('delete_outlet').classList.add('modal-open'); document.getElementById('edit_outlet').classList.remove('modal-open')">Delete</button>
    </form>

    </div>
  </div>
  {{-- BAGIAN AKHIR EDIT --}}

  {{-- BAGIAN AWAL DELETE --}}
  <div id="delete_outlet" class="modal">
    <div class="modal-box min-w-full text-center">
      <p>Enim dolorem dolorum omnis atque necessitatibus. Consequatur aut adipisci qui iusto illo eaque. Consequatur repudiandae et. Nulla ea quasi eligendi. Saepe velit autem minima.</p> 

    <form action="/deleteoutlet" method="post" class="text-center">
        @csrf
        <input type="hidden" name="outlet_id" value="{{ Auth::user() -> outlet_id }}">
            <button type="button" class="btn btn-outline my-10 mx-2" onclick="document.getElementByI('edit_outlet').classList.remove('modal-open')">Cancel</button>
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
      <p>Enim dolorem dolorum omnis atque necessitatibus. Consequatur aut adipisci qui iusto illo eaque. Consequatur repudiandae et. Nulla ea quasi eligendi. Saepe velit autem minima.</p> 

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
                            <input type="hidden" name="outlet_id" id="outlet_id_input" value="{{ Auth::user() -> outlet_id }}">
                            <input type="text" value="{{ Auth::user() -> outlets -> outlet_name }}" id="outlet_name_input" class="w-full input input-primary rounded-1-none" readonly> 
                            {{-- <button class="btn btn-primary">Washearch</button> --}}
                        </div>
                    </div>
                </div>

                <div class="flex-1 w-full mx-5">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Packages New Name</span>
                        </label>
                        <input id="nameInput" type="text" name="package_name" placeholder="package name" class="input input-primary input-bordered w-full">
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
                            <input type="number" name="package_price" placeholder="Number" class="input input-accent input-bordered w-full" id="priceInput">
                        </div>
                    </div>
                </div>
            </div>
                <button type="submit" class="btn btn-outline my-10 mx-2 hover:bg-info">Edit</button>
                <button type="button" class="btn btn-outline my-10 mx-2" onclick="document.getElementById('edit_package').classList.remove('modal-open')">Cancel</button>
                <button type="button" class="btn btn-outline my-10 mx-2 hover:bg-red-900" onclick="document.getElementById('delete_package').classList.add('modal-open'); document.getElementById('edit_package').classList.remove('modal-open')">Delete</button>
    </form>

    </div>
  </div>
  {{-- BAGIAN AKHIR EDIT --}}

  {{-- BAGIAN AWAL DELETE --}}
  <div id="delete_package" class="modal">
    <div class="modal-box min-w-full text-center">
      <p>Enim dolorem dolorum omnis atque necessitatibus. Consequatur aut adipisci qui iusto illo eaque. Consequatur repudiandae et. Nulla ea quasi eligendi. Saepe velit autem minima.</p> 

    <form action="/deletepackage" method="post" class="text-center">
        @csrf
        <input type="hidden" id="deleteId" name="package_id">
            <button type="button" class="btn btn-outline my-10 mx-2" onclick="document.getElementByI('edit_package').classList.remove('modal-open')">Cancel</button>
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
        <p>Enim dolorem dolorum omnis atque necessitatibus. Consequatur aut adipisci qui iusto illo eaque. Consequatur repudiandae et. Nulla ea quasi eligendi. Saepe velit autem minima.</p> 
  
        <form action="/editmember" method="post" class="text-center">
          @csrf
          <input type="hidden" name="member_id" id="idInput">
              <div class="flex flex-row">
                  <div class="flex-1 w-full mx-5">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Old Member Name</span>
                        </label>
                        <input type="text" placeholder="member name" class="input input-primary input-bordered w-full" id="namaInput" readonly>
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
                        <input type="text" name="member_name" placeholder="member name" class="input input-primary input-bordered w-full" id="nameInput">
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">New Member Address</span>
                        </label>
                        <input type="text" name="member_address" placeholder="member address" class="input input-secondary input-bordered w-full" id="addressInput">
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">New Member Contact</span>
                        </label>
                        <div class="input-group">
                            <span>+62</span>
                            <input type="text" name="member_phone" placeholder="Number" class="input input-accent input-bordered w-full" id="numberInput">
                        </div>
                    </div>
                </div>
              </div>
                  <button type="submit" class="btn btn-outline my-10 mx-2 hover:bg-info">Edit</button>
                  <button type="button" class="btn btn-outline my-10 mx-2" onclick="document.getElementById('edit_member').classList.remove('modal-open')">Cancel</button>
                  <button type="button" class="btn btn-outline my-10 mx-2 hover:bg-red-900" onclick="document.getElementById('delete_member').classList.add('modal-open'); document.getElementById('edit_member').classList.remove('modal-open')">Delete</button>
      </form>
  
      </div>
    </div>
    {{-- BAGIAN AKHIR EDIT --}}
  
    {{-- BAGIAN AWAL DELETE --}}
    <div id="delete_member" class="modal">
      <div class="modal-box min-w-full text-center">
        <p>Enim dolorem dolorum omnis atque necessitatibus. Consequatur aut adipisci qui iusto illo eaque. Consequatur repudiandae et. Nulla ea quasi eligendi. Saepe velit autem minima.</p> 
  
      <form action="/deletemember" method="post" class="text-center">
          @csrf
          <input type="hidden" name="member_id" id="deleteId">
              <button type="button" class="btn btn-outline my-10 mx-2" onclick="document.getElementByI('edit_member').classList.remove('modal-open')">Cancel</button>
              <button type="submit" class="btn btn-outline my-10 mx-2 hover:bg-red-900">Delete</button>
      </form>
      </div>
    </div>
  {{-- BAGIAN AKHIR DELETE --}}
  
    @endif
  {{-- BAGIAN AKHIR MEMBERSHIP --}}