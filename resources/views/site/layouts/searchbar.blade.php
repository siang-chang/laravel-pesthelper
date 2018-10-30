<!-- 搜尋列 Search Bar -->
<div class="row SearchBar-Border">
    <form action="search" method="GET">
        @csrf
        <!-- 輸入框 -->
        <input type="search" name="keyWord" id="searchBar" class="col-xs-9 col-sm-7 col-md-7 col-lg-8 text-medium-1"
            placeholder="請輸入害蟲或植株的名稱....." value="{{ $keyWord ?? '' }}">
        <!-- SearchType 選單 , 行動版不顯示 -->
        <div class="hidden-phone col-xs-0 col-sm-3 col-md-3 col-lg-2">
            <div class="btn-group">
                <button class="text-medium-2 searchTypeBtn dropdown-toggle" type="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="text-medium-2 line">｜</span>
                    <input type="text" name="searchType" id="searchType" readonly="readonly" unselectable="on" value="{{ $searchType ?? '全部類別' }}">
                    {{-- <button type="button" name="searchType" id="searchType" value="全部">全部類別</button> --}}
                    {{-- <span name="searchType1" id="searchType" value="area">全部類別</span> --}}
                    <span class="caret"></span>
                    <span>&nbsp;</span>
                </button>
                <ul class="dropdown-menu">
                    <li><a id="searchArea" onclick="changSearchType('area')">全部類別</a></li>
                    <li><a id="searchPest" onclick="changSearchType('pest')">僅查害蟲</a></li>
                    <li><a id="searchPlant" onclick="changSearchType('plant')">僅查植株</a></li>
                </ul>
            </div>
        </div>
        <!-- Search Buttom -->
        <div class="col-xs-3 col-sm-2 col-md-2 col-lg-2">
            <a href="/pesthelper/public/search">
                <button type="submit" id="Search" class="searchBtn">
                    <img src="img/icon/icon_search.svg" alt="Search" width="24">
                </button>
            </a>
        </div>
    </form>
</div>
<script>
    function changSearchType(searchType) {
        if (searchType == "pest") {
            searchTypeText = $("#searchPest").html();
        } else if (searchType == "plant") {
            searchTypeText = $("#searchPlant").html();
        } else {
            searchTypeText = $("#searchArea").html();
        }
        $("#searchType").val(searchTypeText);
    }

</script>