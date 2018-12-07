        <!-- 取得全域網址變數 -->
        <script>
            // "global" vars, built using blade
            var LaravelUrl = '{{ URL::asset('/') }}';
        </script>

        <!-- 導入 JQuery-2.2.0 -->
        {{-- <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script> --}}
        <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>

        <!-- 導入 Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <script src="{{ asset('js/bootstrap-3.3.7-dist/js/bootstrap.js') }}"></script>

        <!-- 導入 slick-1.8.1 -->
        <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick.css') }}"/>
        <!-- Add the new slick-theme.css if you want the default styling -->
        <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick-theme.css') }}"/>
        <script src="{{ asset('slick/slick.js') }}" type="text/javascript" charset="utf-8"></script>

        <!-- 導入客製化 css, js -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <script src="{{ asset('js/script.js') }}"></script>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-128961181-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'UA-128961181-1');

        </script>
