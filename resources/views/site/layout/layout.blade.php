<!DOCTYPE html>
<html lang="en">
<head>
    <title>E-Kurs &mdash; Online Ders Kursları</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="{{ asset('tema/site/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('tema/site/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('tema/site/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('tema/site/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('tema/site/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('tema/site/css/owl.theme.default.min.css') }}">


    <link rel="stylesheet" href="{{ asset('tema/site/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('tema/site/css/style.css') }}">
</head>

<div class="site-wrap">
    @include('site.inc.header')
    @yield('content')
    @include('site.inc.footer')
</div>

<body>
    <script src="{{ asset('tema/site/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('tema/site/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('tema/site/js/popper.min.js') }}"></script>
    <script src="{{ asset('tema/site/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('tema/site/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('tema/site/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('tema/site/js/aos.js') }}"></script>
    <script src="{{ asset('tema/site/js/main.js') }}"></script>
    @yield('script')
</body>
</html>