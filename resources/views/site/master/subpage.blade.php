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

    <!-- main-container -->
    <div class="container main-container">
        @yield('content')
    </div><!-- main-container 結束 -->

    @include('site.layouts.footer')

    @include('site.master.link_js')

    @yield('javascript')

</body>

</html>
