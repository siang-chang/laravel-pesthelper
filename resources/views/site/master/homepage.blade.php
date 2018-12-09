<!DOCTYPE html>
<html lang="zh-Hant-TW">

<head>
    <title>蟲害小幫手｜病蟲害解決方案服務</title>
    @include('site.master.meta')
    <meta name="description" content="蟲害小幫手是一個病蟲害解決方案服務系統" />
    <!-- google-site-verification -->
    <meta name="google-site-verification" content="PQ4k-jai_xSwxaieSJ1MpsUb5E3reXXNupbbT2RxZ5Q" />
    @include('site.master.link')
</head>

<body class="body">
    @include('site.layouts.header')

    <div class="container main-container">
        @yield('content')
    </div>

    @include('site.master.script')

    <style>
        @media only screen and (min-width: 992px) {
            body {
                background-image: url("img/bg.jpg")
            }
        }

        @media only screen and (max-width: 991px) {
            body {
                background-image: url("img/bg_mobile.jpg")
            }
        }

        @media only screen and (max-width: 767px) {
            body {
                background-image: url("img/bg_mobile.jpg")
            }
        }

    </style>

</body>

</html>
