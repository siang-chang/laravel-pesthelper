<!DOCTYPE html>
<html  lang="zh-Hant-TW">
<head>
    @include('site.master.head')
</head>
<body class="body">
    @include('site.layouts.header')
    <div class="container main-container">
        @yield('content')
    </div>
    @include('site.layouts.footer')
</body>
</html>
