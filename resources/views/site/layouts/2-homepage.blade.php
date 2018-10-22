<!DOCTYPE html>
<html lang="en">

<head>
    @include('site.layouts.1-head')
</head>

<body class="body" style="padding-top: 80px;background-image: url('img/bg.jpg');">
    @include('site.layouts.header')
    {{-- @section('sidebar')
    這是側選單
    @show --}}
    <div class="container">
        @yield('content')
    </div>
</body>

</html>
