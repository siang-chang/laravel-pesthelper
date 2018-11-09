        <!-- 導入 Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap-3.3.7-dist/js/bootstrap.js') }}"></script>

        <!-- 導入客製化 css, js -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <script src="{{ asset('js/script.js') }}"></script>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-54516992-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'UA-54516992-1');

        </script>
