<header>
    <!-- 導覽列 navbar -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <form action="search" method="GET" id="nav-search" style="display:none;">
            {{ csrf_field() }}
            <input type="text" name="keyWord" id="navSearchBar" class="text-medium-1" placeholder="請輸入害蟲或植株的名稱">
            <a class="Btn-default" onclick="closeNavSearch()">
                <img src="{{ asset('img/icon/icon_cancel.svg') }}" width="20" alt="cancel">
            </a>
        </form>
        <div class="container-fluid">
            <!-- 行動版樣式 Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <!-- 漢堡條 -->
                <button type="button" class="navbar-left navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar top-bar"></span>
                    <span class="icon-bar middle-bar"></span>
                    <span class="icon-bar bottom-bar"></span>
                </button>
                <div class="navbar-right navbar-toggle collapsed">
                    <button class="Btn-default" onclick="showNavSearch()">
                        <img src="{{ asset('img/icon/icon_search.svg') }}" width="20" alt="Search">
                    </button>
                </div>
                <!-- logo & WebName -->
                <div class="navbar-brand text-medium-0"><a href="/pesthelper/public/_index">蟲害小幫手</a></div>
            </div>

            <!-- 桌面版樣式 Collect the nav links, forms, and other content for toggling -->
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#" class="text-medium-0">害蟲辨識</a></li>
                    <li><a href="/pesthelper/public/_pestcatalog" class="text-medium-0">害蟲目錄</a></li>
                    <li><a href="#" class="text-medium-0">植株目錄</a></li>
                    <li class="hidden-tab" onclick="showNavSearch()">
                        <a><img src="{{ asset('img/icon/icon_search.svg') }}" width="20" alt="Search"></a>
                    </li>
                </ul>

                <!-- search -->
                {{-- <div class="narvar-inner">
                    <form class="navbar-search pull-right">
                        <input type="text" class="search-query" placeholder="Search">
                    </form>
                </div> --}}

            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <script>
        function showNavSearch() {
            $('#nav-search').fadeIn(300);
            document.getElementById("navSearchBar").focus();
        };

        function closeNavSearch() {
            $('#nav-search').fadeOut(300);
        };

    </script>
</header>
