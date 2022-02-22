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
                <button type="button" class="btn btn-outline my-10 mx-2"
                    onclick="document.getElementById('find_member').classList.remove('modal-open')">Cancel</button>
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
                    <button type="button" class="btn btn-outline my-10 mx-2"
                        onclick="document.getElementById('find_packages').classList.remove('modal-open')">Cancel</button>
                </div>
        </div>
    </div>

@endif

@if ($page == 'invoice')
    <div class="modal" id="takeInvoice">
        <div class="modal-box max-w-2xl">
            <div id="printing-location" class="">
                <div class=" flex flex-row mb-4 items-center">
                    <div class="flex-1">
                        <p class="text-2xl font-bold">#<span id="code"></span></p>
                    </div>

                    <div class="flex-none text-right">
                        <p class="text-sm opacity-50" id="date"></p>
                    </div>
                </div>

                <div class="flex flex-row items-stretch">
                    <div class="flex-1 text-left">
                        <p class="font-bold">Customer:</p>

                        <address>
                            <span id="name"></span>, <span id="gender"></span>
                            <p><span id="number"></span></p>
                        </address>
                    </div>

                    <div class="flex-none text-right">
                        <p class="font-bold">Outlet:</p>

                        <address>
                            <p id="outletName"></p>
                            <p><span id="outletPhone"></span></p>
                        </address>
                    </div>
                </div>

                <div class="flex flex-col lg:flex-row bg-base-500 my-5">
                    <div class="flex-1">
                        <address class="text-left">
                            To:
                            <p class="my-2" id="sento"></p>
                        </address>
                    </div>

                    <div class="flex-2">
                        <address class="text-right">
                            From:
                            <p class="my-2" id="senrom"></p>
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
                        {{-- <tr>
                <th></th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr> --}}
                    </tbody>

                    <tfoot>
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
                            <th><span id="disc"></span>%</th>
                            <th><span class="normal-case">$</span> <span id="sumtal"></span></th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="modal-action">
                <button class="btn btn-outline non-printtab my-10 mx-2" onclick="window.print()" type="button">Print</button>
                <button type="button" class="btn btn-outline my-10 mx-2 non-printtab" onclick="exit()">Cancel</button>
            </div>
        </div>
    </div>
@endif
