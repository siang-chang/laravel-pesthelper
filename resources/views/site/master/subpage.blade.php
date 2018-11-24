<!DOCTYPE html>
<html lang="zh-Hant-TW">
    <head>
        <title>@yield('pageTitle')｜蟲害小幫手</title>
        @include('site.master.meta')
        <meta name="description" content="@yield('description')" />
        @include('site.master.link')
    </head>
<body class="body">
    @include('site.layouts.header')
    <div class="container main-container">
        @yield('content')
    </div>
    @include('site.layouts.footer')
</body>

</html>
