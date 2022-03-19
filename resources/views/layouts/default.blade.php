<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
        <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    @yield('script')
</head>
<body>
<header>
    <div class="header">
        <div class="menu">
            <a href="/">Home</a>
            <a href="{{route('booking')}}">Booking</a>
            <a href="/">About</a>
        </div>
    </div>
</header>
<div class="container">
    @yield('content')
</div>
<footer>
<div class="footer">
    <hr>
    <p>Developed by Max on laravel</p>
</div>
</footer>
</body>
</html>
