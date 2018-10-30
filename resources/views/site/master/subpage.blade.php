<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('site.master.head')
</head>

<body class="body" style="padding-top: 80px;">
    @include('site.layouts.header')
    {{-- @section('sidebar')
    這是側選單
    @show --}}
    <div class="container" style="min-height:100%;padding-bottom: 50px;">
        @yield('content')
    </div>
    @include('site.layouts.footer')
</body>

</html>
