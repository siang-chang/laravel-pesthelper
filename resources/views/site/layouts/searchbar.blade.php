<!-- 搜尋列 Search Bar -->
<div class="row SearchBar-Border">
    <!-- 輸入框 -->
    <input type="text" id="searchBar" class="col-xs-9 col-sm-7 col-md-7 col-lg-8 text-medium-1" placeholder="請輸入害蟲或植株的名稱.....">
    <!-- SearchType 選單 , 行動版不顯示 -->
    <div class="hidden-phone col-xs-0 col-sm-3 col-md-3 col-lg-2">
        <div class="btn-group">
            <button class="text-medium-2 searchTypeBtn dropdown-toggle" type="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="text-medium-2 line">｜&nbsp;</span>
                <span id="searchType">全部類別</span>
                <span>&nbsp;</span>
                <span class="caret"></span>
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
            <button type="button" id="Search" class="searchBtn">
                <img src="img/icon/icon_search_24x24.png" alt="Search">
            </button>
        </a>
    </div>
</div>
<script>
    function changSearchType(searchType) {
        if (searchType == "pest") {
            searchTypeText = document.getElementById("searchPest").innerHTML;
        } else if (searchType == "plant") {
            searchTypeText = document.getElementById("searchPlant").innerHTML;
        } else {
            searchTypeText = document.getElementById("searchArea").innerHTML;
        }
        document.getElementById("searchType").innerHTML = searchTypeText;
    }

</script>
