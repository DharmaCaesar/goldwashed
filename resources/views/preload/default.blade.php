<!DOCTYPE html>
<html lang="en" data-theme="luxury">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Document</title>
</head>
<body>
    <div class="body">
        @yield('container')
    </div>

    <script src="{{ asset("js/outlet.js") }}"></script>

    <script src="{{ asset("js/packages.js") }}"></script>
</body>
</html>