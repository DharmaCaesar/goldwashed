<!DOCTYPE html>
<html lang="en" data-theme="luxury">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/ju/jq-3.6.0/dt-1.11.4/datatables.min.css"/>
    <link rel="stylesheet" href="{{ asset("css/print.css") }}">
    <link rel="apple-touch-icon" sizes="180x180" href="ingredient/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="ingredient/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="ingredient/favicon-16x16.png">
    <link rel="manifest" href="ingredient/favicon">
    <title>Goldwashed</title>
</head>
<body>
    <div class="body">
        @yield('container')
    </div>

    <script src="{{ asset("js/app.js") }}"></script>
    
    <script src="{{ asset("js/grubbywash.js") }}"></script>

    <script src="{{ asset("js/outlet.js") }}"></script>

    <script src="{{ asset("js/packages.js") }}"></script>

    <script src="{{ asset("js/membership.js") }}"></script>

    <script src="{{ asset("js/user.js") }}"></script>

    <script src="{{ asset("js/transaction.js") }}"></script>
    
    <script src="{{ asset("js/calculate.js") }}"></script>

    <script src="{{  asset("js/invoice.js") }}"></script>

    <script src="{{ asset("js/print.js") }}"></script>

    <script src="{{ asset("js/barventaris.js") }}"></script>
</body>
</html>