<header>
    <!-- 導覽列 navbar -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div id="nav-search" style="display:none;"></div>
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
                <div class="navbar-right navbar-toggle collapsed" style="margin-top:20px;">
                    <img src="{{ asset('img/icon/icon_search.svg') }}" width="20" alt="Search">
                </div>
                <!-- logo & WebName -->
                <div class="navbar-brand text-medium-0"><a href="/pesthelper/public/_index">蟲害小幫手</a></div>
            </div>

            <!-- 桌面版樣式 Collect the nav links, forms, and other content for toggling -->
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden-phone" onclick="closeNavSearch()"><a><img src="{{ asset('img/icon/icon_search.svg') }}"
                                width="24" alt="Search"></a></li>
                    <li><a href="#" class="text-medium-0">害蟲辨識</a></li>
                    <li><a href="/pesthelper/public/_pestcatalog" class="text-medium-0">害蟲目錄</a></li>
                    <li><a href="#" class="text-medium-0">植株目錄</a></li>
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
        function closeNavSearch() {
            $('#nav-search').fadeIn(500);
        };

    </script>
</header>
