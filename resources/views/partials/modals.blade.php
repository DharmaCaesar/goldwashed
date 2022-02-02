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