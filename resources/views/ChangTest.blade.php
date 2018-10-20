<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- 導入 Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-3.3.7-dist/js/bootstrap.js') }}"></script>
    <!-- 導入客製化 css, js -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>PestHelper</title>
</head>

<body class="body" style="padding-top: 80px;background-image: url('img/bg.jpg');">
    {{--

    <body class="body" style="padding-top: 80px;"> --}}
        <header>
            <!-- 導覽列 navbar -->
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container-fluid">
                    <!-- 行動版樣式 Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <!-- 漢堡條 -->
                        <button type="button" class="navbar-left navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar top-bar"></span>
                            <span class="icon-bar middle-bar"></span>
                            <span class="icon-bar bottom-bar"></span>
                        </button>
                        <div class="navbar-right navbar-toggle collapsed" style="margin-top:20px;">
                            {{-- <span class="glyphicon glyphicon-search" aria-hidden="true"> </span> --}}
                            <img src="img/icon/icon_search_20x20.png" alt="Search">
                        </div>
                        <!-- logo & WebName -->
                        <a class="navbar-brand text-medium-0" href="/">蟲害小幫手</a>
                    </div>
                    <!-- 桌面版樣式 Collect the nav links, forms, and other content for toggling -->
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="hidden-phone"><a href="#"><img src="img/icon/icon_search_24x24.png" alt="Search"></a></li>
                            <li><a href="#" class="text-medium-0">害蟲辨識</a></li>
                            <li><a href="#" class="text-medium-0">害蟲目錄</a></li>
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
        </header>
        <!-- 內容區塊 -->
        <div class="container">
            <!-- 網站標語 Web Slogan -->
            <div class="row" style="margin-top: 60px;margin-bottom: 60px;">
                <h1 id="Web-page-slogan" class="col-xs-12 text-Oversized">蟲害小幫手<br />病蟲害解決方案查詢服務</h1>
            </div>
        </div>
        <div class="container">
            <!-- 功能標語 Function Slogan -->
            <div class="row">
                <h2 id="" class="col-xs-12 text-medium-1">開始你的搜尋，病蟲害問題迎刃而解</h2>
            </div>
            <!-- 搜尋列 Search Bar -->
            <div class="row SearchBar-Border" style="margin-top: 20px;margin-bottom: 20px">
                <!-- 輸入框 -->
                <input type="text" id="searchBar" class="col-xs-9 col-sm-7 col-md-7 col-lg-8 text-medium-1" style="text-align:left;"
                    placeholder="請輸入害蟲或植株的名稱.....">
                <!-- SearchType 選單 , 行動版不顯示 -->
                <div class="hidden-phone col-xs-0 col-sm-3 col-md-3 col-lg-2">
                    <div class="btn-group">
                        <button class="text-medium-2 searchTypeBtn dropdown-toggle" type="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <span class="text-medium-2 someline">｜&nbsp;</span>
                            <span id="searchType">全部類別</span>
                            <span>&nbsp;</span>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu text-medium-2">
                            <li><a id="area" href="javascript:changSearchType('area')">全部類別</a></li>
                            <li><a id="pest" href="javascript:changSearchType('pest')">僅查害蟲</a></li>
                            <li><a id="plant" href="javascript:changSearchType('pest')">僅查植株</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Search Buttom -->
                <div class="col-xs-3 col-sm-2 col-md-2 col-lg-2">
                    <button type="button" id="Search" class="searchBtn">
                        <img src="img/icon/icon_search_24x24.png" alt="Search">
                    </button>
                </div>
            </div>
            <script>
                function changSearchType(searchType) {
                    alert("searchType=" + searchType);
                }
            </script>
            <!-- Popular Keyword -->
            <div class="row">
                <div class="col-xs-12">
                    @foreach($keyWordList as $keyWord)
                    <a href="#" id="{{ $keyWord->keyWord }}" class="popularKeyword text-article-0">{{
                        $keyWord->keyWord }}</a>
                    @endforeach
                </div>
            </div>
            <!-- 其他呼籲 Other Function -->
            <div class="row" style="padding-top: 50px;text-align: center;">
                <p id="" class="text-medium-0">或者你可以試試</p>
            </div>
            <div class="row" style="padding-top: 30px;text-align: center;">
                <button type="button" id="btnTest" class="btn-1 text-medium-0">害蟲辨識</button>
                <span style="margin: 15px;"></span>
                <button type="button" id="btnTest" class="btn-0 text-medium-0">瀏覽教學</button>
            </div>
        </div>
    </body>

</html>
