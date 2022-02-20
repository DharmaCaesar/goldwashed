@if ($page == 'transaction')

<div class="modal" id="find_member">
  <div class="modal-box min-w-full">
    <div class="overflow-x-auto">
        <table class="table w-full" id="membertable">
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
                        <td><button class="btn btn-ghost" onclick="takemember(this,0)">Pick</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
      </div>
    <div class="modal-action">
        <button type="button" class="btn btn-outline my-10 mx-2" onclick="document.getElementById('find_member').classList.remove('modal-open')">Cancel</button>
    </div>
  </div>
</div>

@endif


@if ($page == 'transaction')

<div class="modal" id="find_packages">
  <div class="modal-box min-w-full">
    <div class="overflow-x-auto">
        <table class="table w-full" id="packageTable">
            <thead>
                <tr>
                    <th></th>
                    <th>Outlet Name</th>
                    <th>Packages</th>
                    <th>packages type</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="packagebuffer">
                @foreach ($packagesdata as $packages)
                    <tr class="active">
                        <th>{{ $packages->id }}</th>
                        <td>{{ $packages->outlets->outlet_name }}</td>
                        <td>{{ $packages->package_name }}</td>
                        <td>{{ $packages->package_type }}</td>
                        <td>$ {{ $packages->package_price }}</td>
                        <th><button class="btn btn-ghost" onclick="add_package(this,0)">Pick</button></th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
        <td>
    <div class="modal-action">
        <button type="button" class="btn btn-outline my-10 mx-2" onclick="document.getElementById('find_packages').classList.remove('modal-open')">Cancel</button>
    </div>
  </div>
</div>

@endif


