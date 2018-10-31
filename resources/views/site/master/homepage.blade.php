<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('site.master.head')
</head>

<body class="body" style="background-image: url('img/bg.jpg');">
    @include('site.layouts.header')
    {{-- @section('sidebar')
    這是側選單
    @show --}}
    <div class="container main-container">
        @yield('content')
    </div>
</body>

</html>
