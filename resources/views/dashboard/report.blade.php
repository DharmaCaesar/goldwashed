@extends('preload.default')

@section('container')
    @include('partials.navbar')

{{-- BAGIAN AWAL TAB --}}
    <div class="flex flex-row">
        <div class="flex-1 p-4">
            <div class="tabs mx-auto justify-center">
                <a id="report-tab" class="tab tab-lg tab-bordered tab-active text-opacity-100" onclick="change_tab(this)">
                    Reports
                </a>

                <a id="schedule-tab" class="tab tab-lg tab-bordered" onclick="change_tab(this)">
                    Schedule
                </a>

                <a id="chat-tab" class="indicator tab tab-lg tab-bordered" onclick="change_tab(this)">
                    Chats
                    <span id="chat-counter" class="indicator-item badge hidden">0</span>
                </a>

                <a id="chat-tab" class="indicator tab tab-lg tab-bordered" onclick="change_tab(this)">
                    Logs
                    <span id="chat-counter" class="indicator-item badge hidden">0</span>
                </a>
            </div>
        </div>
    </div>
{{-- BAGIAN AKHIR TAB --}}

{{-- BAGIAN AWAL REPORT --}}
<div id="reports-view" class="border-2 border-primary m-2 hidden">
<div class="flex flex-row p-2">
    <div class="flex-1">
        <div class="text-center">
            <a href="/reports/export/transactions" class="btn btn-sm m-2 btn-primary">Export as XLSX</a>
        </div>

        <div class="overflow-x-auto">
            <table class="table py-2 w-full select-none" id="transaction-table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Customer</th>
                        <th>Paid</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactionData as $trd)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $trd->members->member_name }}</td>
                            <td>Rp. {{ $trd->transaction_paid }}</td>
                            <td>{{ $trd->transaction_date }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="flex-1 px-2">
        <div class="shadow stats stats-vertical lg:stats-horizontal w-full text-center select-none">
            <div class="stat">
                <div class="stat-title">Workers</div>
                <div class="stat-value">{{ mt_rand(50, 100) }}</div>
                <div class="stat-desc">Amount of hired workers</div>
            </div>

            <div class="stat">
                <div class="stat-title">Users</div>
                <div class="stat-value">{{ Auth::user()->count() }}</div>
                <div class="stat-desc">Amount of registered users</div>
            </div>

            <div class="stat">
                <div class="stat-title">Customers</div>
                <div class="stat-value">{{ $memberData->count() }}</div>
                <div class="stat-desc">Amount of members registered</div>
            </div>
        </div>

        <canvas id="myChart" width="400" height="300"></canvas>
    </div>

    <div class="flex-1">
        <div class="shadow stats stats-vertical w-full text-center select-none">
            <div class="stat">
                <div class="stat-title">Gross Profit</div>
                <div class="stat-value">Rp. {{ $transactionData->sum('transaction_paid') }}</div>
                <div class="stat-desc">Uncalculated full profit</div>
            </div>

            <div class="stat">
                <div class="stat-title">Loss by Tax</div>
                <div class="stat-value">Rp. {{ $transactionData->sum('transaction_tax') }}</div>
                <div class="stat-desc">Profit lost by Tax</div>
            </div>

            <div class="stat">
                <div class="stat-title">Additional Fee</div>
                <div class="stat-value">Rp. {{ $transactionData->sum('transaction_paid_extra') }}</div>
                <div class="stat-desc">Profit gained through fees</div>
            </div>

            <div class="stat">
                <div class="stat-title">Sold Quantity</div>
                <div class="stat-value">
                    {{ $transactionData->sum('TransactionDetails.quantity') }}</div>
                <div class="stat-desc">Quantity of items sold</div>
            </div>
        </div>
    </div>
</div>
</div>
{{-- BAGIAN AKHIR REPORT --}}

{{-- BAGIAN AWAL SCHEDULE --}}
<div id="schedule-view" class="border-2 border-primary m-2 hidden">
    <div class="flex flex-row p-4">
        <div class="flex-1">
            <div class="overflow-y-scroll">
                @foreach ($transactionData as $trad)
                    <div class="card w-11/12 m-2 bg-primary text-primary-content">
                        <div class="card-body">
                            <h2 class="card-title">{{ $trad->members->member_name }}</h2>
                            <p>PACKAGE: {{ $trad->TransactionDetails->packages->package_name }}</p>
                            <p>QTY: {{ $trad->TransactionDetails->quantity }} </p>
                            <p>OUTLET: {{ $trad->outlets->outlet_name }}</p>
                            <p>CASHIER {{ $trad->user->name }}</p>
                            <div class="justify-end card-actions">
                                <button class="btn">Report</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="flex-1">
            <div id="month" class="bg-primary text-primary-content text-center p-4">
                <div class="flex flex-row items-center">
                    <div class="flex-none">
                        <p class="font-bold">Previous</p>
                    </div>

                    <div class="flex-1">
                        <h2 class="text-2xl font-medium">{{ now()->monthName }}</h2>
                        <p class="text-xl font-light">{{ now()->format('d') }} - {{ now()->dayName }}</p>
                    </div>

                    <div class="flex-none">
                        <p class="font-bold">Next</p>
                    </div>
                </div>
            </div>

            <div id="weekday">
                <div class="flex flex-row text-center text-primary-content font-bold bg-green-300">
                    <div class="mx-5 my-2">
                        <div class="rounded-full bg-primary p-5 w-16">
                            <p>Su</p>
                        </div>
                    </div>

                    <div class="mx-5 my-2">
                        <div class="rounded-full bg-primary p-5 w-16">
                            <p>Mo</p>
                        </div>
                    </div>

                    <div class="mx-5 my-2">
                        <div class="rounded-full bg-primary p-5 w-16">
                            <p>Tu</p>
                        </div>
                    </div>

                    <div class="mx-5 my-2">
                        <div class="rounded-full bg-primary p-5 w-16">
                            <p>We</p>
                        </div>
                    </div>

                    <div class="mx-5 my-2">
                        <div class="rounded-full bg-primary p-5 w-16">
                            <p>Th</p>
                        </div>
                    </div>

                    <div class="mx-5 my-2">
                        <div class="rounded-full bg-primary p-5 w-16">
                            <p>Fr</p>
                        </div>
                    </div>

                    <div class="mx-5 my-2">
                        <div class="rounded-full bg-primary p-5 w-16">
                            <p>Sa</p>
                        </div>
                    </div>
                </div>
            </div>

            <div id="days">
                <div class="flex flex-row flex-wrap text-center text-primary-content font-bold">
                    @for ($i = 1; $i <= now()->daysInMonth; $i++)
                        <div class="mx-5 my-2">
                            <div class="rounded-full bg-green-300 p-5 w-16 hover:bg-green-400">
                                <p>{{ $i }}</p>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>
{{-- BAGIAN AKHIR SCHEDULE --}}

{{-- BAGIAN AWAL CHAT --}}
<div id="chats-view" class="border-2 border-primary m-2">
    <div class="flex flex-row p-4">
        <div class="flex-1">
            <div class="bg-primary rounded-l-xl px-4 py-3 text-primary-content">
                <p class="text-lg font-semibold">Users</p>
            </div>

            <input type="hidden" id="fromId" value="{{ Auth::user()->id }}">

            <div class="overflow-y-scroll px-2">
                @foreach (Auth::user()->where('outlet_id', Auth::user()->outlet_id)->get()->except(Auth::user()->id)
    as $user)
                    <div class="card w-full bg-primary text-primary-content my-4">
                        <div class="card-body">
                            <input type="hidden" value="{{ $user->id }}">
                            <h2 class="card-title"><span>{{ $user->username }}</span>-
                                <span>{{ $user->roles }}</span>
                            </h2>
                            <p class="opacity-50">{{ $user->name }}</p>
                            <div class="justify-end card-actions">
                                <button class="btn startMessage">Start Messaging</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="flex-1">
            <div class="bg-primary text-primary-content rounded-r-xl px-4">
                <p class="text-lg font-semibold">Messaging: <span id="username-of-chat"></span></p>
                <p class="opacity-50 font-extralight">Last online: </p>
            </div>

            <div class="flex flex-col">
                <div id="chat-box" class="bg-gray-700 text-primary h-96 px-2 overflow-y-auto">
                    <p>> Welcome, {{ Auth::user()->username }}</p>

                    @foreach ($chatData as $chat)
                        @if ($chat->user->id == Auth::user()->id)
                            <p class="text-right">{{ $chat->user->username }}: {{ $chat->message }}</p>
                        @else
                            <p class="text-left">{{ $chat->user->username }}: {{ $chat->message }}</p>
                        @endif
                    @endforeach
                </div>

                <div id="message-box" class="bg-gray-900 text-primary-content p-2">
                    <form id="messageForm">
                        <div class="input-group">
                            <input type="text" class="input input-sm text-black input-bordered w-full"
                                placeholder="Request something..." id="chatInput">
                            <button type="submit" class="btn btn-sm btn-primary" id="sendChat">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- BAGIAN AKHIR CHAT --}}
@endsection

{{-- BAGIAN JS CHART --}}
@push('chart')
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: '$',
                    data: [
                        @foreach ($transactionData as $turd)
                            {{ $turd->transaction_paid }},
                        @endforeach
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endpush
{{-- BAGIAN JS CHART --}}