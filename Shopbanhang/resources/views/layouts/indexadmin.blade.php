<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- Import CSS -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('script/chart-area-demo.js') }}"></script>
    <script src="{{ asset('script/chart-bar-demo.js') }}"></script>
    <script src="{{ asset('script/chart-pie-demo.js') }}"></script>
    <script src="{{ asset('script/datables-demo.js') }}"></script>
</head>
<body>
    <!-- HEADER -->
    @include('layouts.header')

    <!-- LAYOUT CONTAINER -->
    <div id="layoutSidenav">
        <!-- SIDEBAR BÊN TRÁI -->
        @include('layouts.sidebar')

        <!-- NỘI DUNG BÊN PHẢI -->
        <div id="layoutSidenav_content">
            @yield('content')
        </div>
    </div>

    <!-- FOOTER -->
    @include('layouts.footer')

    <!-- Import JS -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>
