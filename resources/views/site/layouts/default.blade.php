<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- 導入 Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-3.3.7-dist/js/bootstrap.js') }}"></script>
    <!-- 導入客製化 css, js -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>PestHelper</title>
</head>

<body class="body" style="padding-top: 80px;">
    @include('site.layouts.header')
    {{-- @section('sidebar')
    這是側選單
    @show --}}
    <div class="container">
        @yield('content')
    </div>
    @include('site.layouts.footer')
</body>
</html>
