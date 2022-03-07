<!DOCTYPE html>
<html lang="en" data-theme="pastel">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/ju/jq-3.6.0/dt-1.11.4/datatables.min.css"/> --}}
    <link rel="stylesheet" href="{{ asset("css/print.css") }}">
    <link rel="apple-touch-icon" sizes="180x180" href="ingredient/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="ingredient/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="ingredient/favicon-16x16.png">
    <link rel="manifest" href="ingredient/favicon">
    <link rel="stylesheet" type="text/css" href="{{ asset('datatables/datatables.min.css') }}"/>
    <title>Sapphirewash</title>
</head>
<body>
    <div class="body">
        @yield('container')
    </div>

    
    <script src="{{ asset("js/app.js") }}"></script>
    
    <script src="{{ asset("js/grubbywash.js") }}"></script>
    
    <script type="text/javascript" src="{{ asset('datatables/datatables.min.js') }}"></script>
    
    @if($page == 'outlets')
    <script src="{{ asset("js/outlet.js") }}"></script>
    @endif

    @if($page == 'packages')
    <script src="{{ asset("js/packages.js") }}"></script>
    @endif

    @if($page == 'membership')
    <script src="{{ asset("js/membership.js") }}"></script>
    @endif

    @if($page == 'user')
    <script src="{{ asset("js/user.js") }}"></script>
    @endif

    @if($page == 'transaction')
    <script src="{{ asset("js/transaction.js") }}"></script>
    
    <script src="{{ asset("js/calculate.js") }}"></script>
    @endif

    @if($page == 'invoice')
    <script src="{{  asset("js/invoice.js") }}"></script>

    <script src="{{ asset("js/print.js") }}"></script>
    @endif

    @if($page == 'barventaris')
    <script src="{{ asset("js/barventaris.js") }}"></script>
    @endif
</body>
</html>