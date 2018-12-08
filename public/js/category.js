/* 展開目錄細項 (害蟲&植株適用) */
function openCatalog(categoryNum) {
    // console.log(categoryNum);
    /* 先判斷是害蟲或植株目錄，將目標網址存入變數 catagoryUrl */
    if (categoryNum.substr(0, 1) == 'A') {
        var catagoryUrl = LaravelUrl + 'GetPestCategoryData';
        var detailUrl = 'pestDetailed/';
    } else {
        var catagoryUrl = LaravelUrl + 'GetPlantCategoryData';
        var detailUrl = 'plantDetailed/';
    }
    // console.log(catagoryUrl);
    $.ajax({
        // headers: {
        //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        // },
        /* GET -> 前端處理資料版本 */
        // type: 'GET',
        /* POST -> 後端處理資料版本 */
        type: "POST",
        url: catagoryUrl,
        data: {
            categoryNum: categoryNum
        },
        success: function (data) {
            // console.log(data);
            var dataset = '';

            for (i = 0; data.length > i; i++) {
                if (data[i].categoryNum == categoryNum) {
                    console.log(LaravelUrl + data[i].img);
                    str = '<div class="img-box col-xs-12 col-sm-6 col-md-4">' +
                        '<a href="' + LaravelUrl + detailUrl + data[i].name + '">' +
                        '<div class="img-innerbox">' +
                        '<div class="img">' +
                        "<img class='main' src='" + LaravelUrl + data[i].img + "' alt='" + data[i].name +
                        "'" + 'onError="this.src=' + "'" + LaravelUrl + "img/image.jpg" + "'" + ';">' +

                        // "<img class='main' src='127.0.0.1/pesthelper/public/img/image.jpg' alt=''>" +
                        '</div>' +
                        '<hr />' +
                        '<div class="base">' +
                        "<p class='text-article-1'>" + data[i].name + "</p>" +
                        "<p class='text-small-1'>" + data[i].scientificName + "</p>" +
                        "</div></div></a></div>";
                    dataset += str;
                }
            }
            $('#collapse-' + categoryNum).children('.panel-body').children('.row').html(dataset);
        }
    })
};
