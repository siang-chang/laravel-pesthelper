/*
//---------------------------------------------------------------------------
// Document Ready Function
//---------------------------------------------------------------------------
*/
// $('#nav-search').hide();

$(function () {
    // goToTop 回置頁面頂端
    $("#goTop").click(function () {
        $("html,body").animate({
            scrollTop: 0
        }, 1000);
    });

    // 頁面自動捲動時, 緩慢執行
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('#gotop').fadeIn("fast");
        } else {
            $('#gotop').stop().fadeOut("fast");
        }
    });

    // 隱藏 required 顯示的警告訊息
    $('input, select, textarea').on("invalid", function (e) {
        e.preventDefault();
    });

    // 點擊 nav-search 以外的地方則關閉 nav-search
    $(document).click(function () {
        $('#nav-search').fadeOut(300);
    });

    // 點擊的若是 nav-search 則中斷「關閉動作」
    $(".navbar").click(function (event) {
        event.stopPropagation();
    });
});


/*
//---------------------------------------------------------------------------
// Layout
//---------------------------------------------------------------------------
*/
// 顯示導覽搜尋列 nav-search
function showNavSearch() {
    $('#nav-search').fadeIn(300);
    document.getElementById("navSearchBar").focus();
};

// 關閉導覽搜尋列 nav-search
function closeNavSearch() {
    $('#nav-search').fadeOut(300);
};

/*
//---------------------------------------------------------------------------
// SearchBar
//---------------------------------------------------------------------------
*/
// 更換搜尋模式(searchType)
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
