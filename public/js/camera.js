/*
//---------------------------------------------------------------------------
// camera.js
//---------------------------------------------------------------------------
*/
document.getElementById('shootImg').addEventListener('change', function () {
    event.preventDefault();
    /* 網址宣告 */
    thisUrl = LaravelUrl + 'recognition';
    /* 取得圖片 */
    var reader = new FileReader();
    reader.onload = function (e) {
        compress(this.result);
    };
    reader.readAsDataURL(this.files[0]);
    // console.log(this.files[0]);
    // var fileSize = Math.round(this.files[0].size / 1024 / 1024); //以M為單位
    //this.files[0] 該資訊包含：圖片的大小，以byte計算 獲取size的方法如下：this.files[0].size;
}, false);

document.getElementById('uploadImg').addEventListener('change', function () {
    event.preventDefault();
    /* 網址宣告 */
    thisUrl = LaravelUrl + 'recognition';
    /* 取得圖片 */
    var reader = new FileReader();
    reader.onload = function (e) {
        compress(this.result);
    };
    reader.readAsDataURL(this.files[0]);
    // console.log(this.files[0]);
    // var fileSize = Math.round(this.files[0].size / 1024 / 1024); //以M為單位
    //this.files[0] 該資訊包含：圖片的大小，以byte計算 獲取size的方法如下：this.files[0].size;
}, false);

/* 圖像壓縮與傳送 */
function compress(res, fileSize) { //res代表上傳的圖片，fileSize大小圖片的大小
    var img = new Image(),
        maxW = 640; // 設定最大寬度
    img.onload = function () {
        var cvs = document.createElement('canvas'),
            ctx = cvs.getContext('2d');

        if (img.width > maxW) {
            img.height *= maxW / img.width;
            img.width = maxW;
        }

        cvs.width = img.width;
        cvs.height = img.height;

        ctx.clearRect(0, 0, cvs.width, cvs.height);
        ctx.drawImage(img, 0, 0, img.width, img.height);
        var compressRate = getCompressRate(1, fileSize);
        var dataUrl = cvs.toDataURL('image/jpeg', compressRate);
        // document.body.appendChild(cvs); /* 在頁面上列印圖片 */
        // console.log(dataUrl);
        $.ajax({
            type: "POST",
            url: thisUrl,
            data: {
                userImg: dataUrl
            },
            success: function (data) {
                // console.log(data);
                // alert(data);
                if (data != '保存失敗') {
                    redrawPage(data);
                }
            }
        })
    }
    img.src = res;
    // alert('img.src=' + img.src);
}

/* 計算壓縮比率，為 compress 的副程式 */
function getCompressRate(allowMaxSize, fileSize) { //計算壓縮比率，size單位為MB
    var compressRate = 1;
    if (fileSize / allowMaxSize > 4) {
        compressRate = 0.5;
    } else if (fileSize / allowMaxSize > 3) {
        compressRate = 0.6;
    } else if (fileSize / allowMaxSize > 2) {
        compressRate = 0.7;
    } else if (fileSize > allowMaxSize) {
        compressRate = 0.8;
    } else {
        compressRate = 0.9;
    }
    return compressRate;
}

/* 重新繪製檔案 */
function redrawPage(userImg) {
    str = '<div class="row">' +
        '<h2 class="col-xs-12 text-medium-1">確定使用這張圖片進行辨識？</h2>' +
        '</div>' +
        '<div class="row">' +
        '<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">' +
        // '<form action="recognition" method="POST" enctype="multipart/form-data" class="text-medium-0">' +
        '<div class="userImg">' +
        '<div>' +
        "<img src='" + LaravelUrl + userImg + "' alt='userImg' onError='this.src='" + LaravelUrl + "img/image.jpg';'>" +
        '</div>' +
        '</div>' +
        '<div class="cta">' +
        '<button id="dorecognition" class="btn-2 text-medium-1" value="test" onclick="dorecognition(' + "'" + userImg + "'" + ')">進行辨識</button>' +
        '</div>' +
        // '</form>' +
        '</div>' +
        '</div>';

    /* 頁面重繪 */
    $('.page-container').html(str);
}

function dorecognition(imgUrl) {
    console.log(imgUrl);
    event.preventDefault();
    thisUrl = LaravelUrl + "recognitionresults";
    /* 網址宣告 */
    $.ajax({
        type: "POST",
        url: thisUrl,
        data: {
            userImg: imgUrl
        },
        success: function (data) {
            console.log(data);
            location.href= LaravelUrl + '/recognitionfail?userImg=' + data;
            // location.href= LaravelUrl + '/recognitionfail';
        }
    })
}
