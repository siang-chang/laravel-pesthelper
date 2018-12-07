@extends('site.master.subpage')
@section('pageTitle', '害蟲辨識')
@section('description', '害蟲辨識')
@section('content')
<style type="text/css">
    /* * {
        box-sizing: border-box;
    } */

    /* 整個滑動區域的設定 */
    .slider {
        margin: 10px auto;
    }

    /* 每個選項之間的距離 */
    .slick-slide {
        margin: 0px 10px;
    }

    /* 每個選項中，圖片的大小(這邊為了讓圖片套用我自己寫的css大小，故隱藏) */
    /* .slick-slide img {
        width: 100%;
    } */

    /* 左右移動按鈕 */
    .slick-prev:before,
    .slick-next:before {
        color: #2699fb;
    }

    /* 超出顯示範圍的選項 */
    .slick-slide {
        transition: all ease-in-out .3s;
        opacity: .5;
    }

    /* 左右兩邊的選項 */
    .slick-active {
        opacity: .8;
    }

    /* 正中間的選項 */
    .slick-current {
        opacity: 1;
    }

</style>

<!-- 內容區塊 -->
<div class="container recognition">
    <!-- 頁面 Title -->
    <div class="row page-title">
        <h1 class="col-xs-12 text-Large-1">害蟲辨識</h1>
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
            <hr />
        </div>
    </div>
</div>

<!-- 內容區塊 -->
<div class="page-container">

    <!-- 行動呼籲區塊 -->
    <div class="row">
        <h2 class="col-xs-12 text-medium-1">點擊您認為最符合的結果，查看詳細資料</h2>
    </div>

    <!-- 結果選擇區塊 -->
    <div class="row slider">
        <section class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 center">
            @foreach ($recognition as $recognitionDate)
            <div class="img-box">
                <a href='{{ url('/pestDetailed/'.$recognitionDate->name) }}'>
                    <div id="{{ $recognitionDate->name }}" class="img-innerbox">
                        <div class="img">
                            <img class="main" src="{{ asset($recognitionDate->img) }}" alt="{{ $recognitionDate->name }}"
                                onError="this.src='{{ asset('img/image.jpg') }}';">
                        </div>
                        <hr />
                        <div class="base">
                            <p class="text-article-1">{{ $recognitionDate->name }}</p>
                            <p class="text-small-1">{{ $recognitionDate->scientificName }}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </section>
    </div>

    <!-- 分隔線 -->
    <div class="text-medium-1">．．．</div>

    <!-- 行動呼籲區塊 -->
    <div class="row">
        <h2 class="col-xs-12 text-medium-1">都不對嗎？再試試看</h2>
    </div>
</div>

<!-- 影像辨識區塊 -->
<div class="container recognition">
    <form action="recognition" method="POST" enctype="multipart/form-data" class="text-medium-0">
        @csrf
        <!-- 上傳影像 -->
        <div class="btn-1">
            <span>上傳影像</span>
            <input type="file" id="uploadImg" name="userImg" accept="image/*">
        </div>
        <!-- hidden PC -->
        <span class="hidden-md hidden-lg" style="margin: 15px;"></span>
        <!-- 拍攝影像 hidden PC -->
        <div class="btn-0 text-medium-1 hidden-md hidden-lg">
            <span>拍攝影像</span>
            <input type="file" id="shootImg" name="userImg" accept="image/*" capture="camera">
        </div>
    </form>

    <!-- 導入 camera.js 相機上傳模組 -->
    <script src="{{ asset('js/camera.js') }}"></script>
    <script>
        var _token = '@csrf';

    </script>
    <!-- 行動呼籲區塊 -->
    <div class="row hidden-xs hidden-sm">
        <h2 class="col-xs-12 text-medium-2" style="margin-top:30px;">您也可以透過行動裝置瀏覽網頁，使用即時辨識功能</h2>
    </div>
</div>



<script type="text/javascript">
    $(document).on('ready', function () {
        $('.center').slick({
            centerMode: true,
            centerPadding: '60px',
            slidesToShow: 3,
            responsive: [{
                    breakpoint: 992,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 991,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 1
                    }
                },
            ]
        });
    });

</script>

@stop
