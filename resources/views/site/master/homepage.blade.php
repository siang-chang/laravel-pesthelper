<!DOCTYPE html>
<html  lang="zh-Hant-TW">
<head>
    @include('site.master.head')
    <meta name="google-site-verification" content="PQ4k-jai_xSwxaieSJ1MpsUb5E3reXXNupbbT2RxZ5Q" />
</head>
<body class="body" style="background-image: url('img/bg.jpg');">
    @include('site.layouts.header')
    <div class="container main-container">
        @yield('content')
    </div>
</body>
</html>
