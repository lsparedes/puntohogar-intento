<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PuntoHogar') }}</title>

    <!-- Favicon -->
    <link href="{{asset('assets/img/brand/favicon.png')}}" rel="icon" type="image/png">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{asset('assets/styles/vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
    <link href="{{asset('assets/styles/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- Argon CSS -->
    <link href="{{asset('assets/styles/css/argon.css?v=1.1.0')}}" rel="stylesheet">
    <!-- Styles -->
    <!-- <link href="{{ asset('assets/styles/css/app.css') }}" rel="stylesheet"> -->
</head>
<body>
    @yield('content')
    <script src="{{asset('assets/styles/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/styles/vendor/popper/popper.min.js')}}"></script>
    <script src="{{asset('assets/styles/vendor/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/styles/vendor/headroom/headroom.min.js')}}"></script>
    <!-- Argon JS -->
    <script src="{{asset('assets/js/argon.js?v=1.1.0')}}"></script>

</body>
</html>
