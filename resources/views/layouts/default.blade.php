<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    {{-- Daterangepicker --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    {{--Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    @yield('script')
</head>
<body>
<header>
    <div class="header">
        <div class="logo_name">
            <h1>REISENDER</h1>
        </div>
        <div class="menu">
            <a href="/" class="btn btn-success">Home</a>
            <a href="{{route('booking')}}" class="btn btn-success">Buchung</a>
        </div>
    </div>
</header>
<div class="container">
    @yield('content')
</div>
<footer>
<div class="footer">
    <p>Entwickelt von Max auf Laravel</p>
</div>
</footer>
</body>

</html>
