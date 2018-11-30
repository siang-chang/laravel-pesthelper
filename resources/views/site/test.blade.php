<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>

    <title>Document</title>
    <style>
        *{
        padding: 0;
        margin: 0;
        }
        .wrapper{
        width: 320px;
        height: 50px;
        margin: 20px auto;
        position: relative;
        border: 1px solid #f0f0f0;
        }
        input{
        width: 100px;
        height: 30px;
        }
        button{
        position: absolute;
        cursor: pointer;
        pointer-events: none;
        width: 100px;
        height: 30px;
        left: 0;
        top: 0;
        }
        a{
        pointer-events: none;
        }
        .img{
        border: 1px solid #ccc;
        padding: 10px;
        }
        </style>
    <script>
        // "global" vars, built using blade
            var LaravelUrl = '{{ URL::asset('/') }}';
        </script>

</head>

<body>
    <div class="wrapper">
        <input type="file" accept="image/*" capture="camera" id="img" />
        <button>上傳照片 </button>
    </div>
</body>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    document.getElementById('img').addEventListener('change', function () {
        /* 網址宣告 */
        thisUrl = LaravelUrl + 'recognition';
        console.log(thisUrl);

        var reader = new FileReader();

        reader.onload = function (e) {
            compress(this.result);
        };
        reader.readAsDataURL(this.files[0]);
        console.log(this.files[0]);
        // var fileSize = Math.round(this.files[0].size / 1024 / 1024); //以M為單位
        //this.files[0] 該資訊包含：圖片的大小，以byte計算 獲取size的方法如下：this.files[0].size;
    }, false);

    function compress(res, fileSize) { //res代表上傳的圖片，fileSize大小圖片的大小
        var img = new Image(),
            maxW = 640; //設定最大寬度
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
            document.body.appendChild(cvs);
            console.log(dataUrl);
            $.ajax({
            // headers: {
            //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            // },
            /* GET -> 前端處理資料版本 */
            // type: 'GET',
            /* POST -> 後端處理資料版本 */
            type: "POST",
            url: thisUrl,
            data: {
                // userImg: this.files[0]
                userImg: dataUrl
            },
            success: function (data) {
                // console.log(data);
                alert(data);
            }
        })
        }
        img.src = res;
    }

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

</script>

</html>
