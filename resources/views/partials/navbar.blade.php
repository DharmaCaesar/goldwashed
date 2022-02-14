{{-- BAGIAN AWAL NAVBAR --}}
<div class="navbar mb-2 shadow-lg bg-neutral text-neutral-content rounded-box">
    <div class="px-2 mx-2 navbar-start">
        <span class="text-lg font-bold">
            Grubbywash
        </span>
    </div>

{{-- BAGIAN AWAL BUTTON --}}
    <div class="hidden px-2 mx-2 navbar-center lg:flex">
        <div class="flex items-stretch">
            <a class="btn btn-ghost btn-sm rounded-btn">
                Home
            </a>
            
            @if(Auth::user() -> role == 'ADMIN')
            <a class="btn btn-ghost btn-sm rounded-btn">
                User Account
            </a>
            <a class="btn btn-ghost btn-sm rounded-btn">
                Transaction
            </a>
            @endif

            @if(Auth::user() -> role == 'CASHIER')
            <a class="btn btn-ghost btn-sm rounded-btn">
                Transaction
            </a>
            @endif

            <a class="btn btn-ghost btn-sm rounded-btn">
                Contact
            </a>

            @if(Auth::user() -> role != 'OWNER')
            <div class="dropdown dropdown-hover">
                <div tabindex="0" class="btn btn-sm">Others ▼</div>
                <ul tabindex="0" class="p-2 shadow menu dropdown-content bg-base-100 rounded-box w-52">
                    @if(Auth::user() -> role == 'ADMIN')
                    <li>
                        <a href="/outlet">Outlet</a>
                    </li>
                    <li>
                        <a href="/packages">Package</a>
                    </li>
                    <li>
                        <a href="/membership">Membership</a>
                    </li>
                    @endif

                    @if(Auth::user() -> role == 'CASHIER')
                    <li>
                        <a href="/membership">Membership</a>
                    </li>
                    @endif
                </ul>
            </div>
            @endif
        </div>
    </div>
{{-- BAGIAN AKHIR BUTTON --}}

    <div class="navbar-end">
        <div class="dropdown dropdown-hover dropdown-end">

            <button tabindex="0" class="btn btn-square btn-ghost">
                <img src="{{ asset("ingredient/cat.jpg") }}" class="mask mask-squircle">
            </button>

            <ul tabindex="0" class="p-2 shadow menu dropdown-content bg-base-100 rounded-box w-52">
              <li>
                <a>Profile</a>
              </li> 
              <li>
                <a>Help</a>
              </li> 
              <li>
                <a href="/logout">Logout</a>
              </li>
            </ul>
          </div>
    </div>
</div>
{{-- BAGIAN AKHIR NAVBAR --}}