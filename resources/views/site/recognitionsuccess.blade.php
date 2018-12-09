@extends('site.master.subpage')
@section('pageTitle', '害蟲辨識')
@section('description', '害蟲辨識')
@section('content')

<!-- 導入 slick-1.8.1 -->
<link rel="stylesheet" type="text/css" href="{{ asset('slick/slick.css') }}" />
<!-- Add the new slick-theme.css if you want the default styling -->
<link rel="stylesheet" type="text/css" href="{{ asset('slick/slick-theme.css') }}" />

<!-- 導入 slick 相關初始化 css -->
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
        color: #2BB388;
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

    .a:hover {
        color:#54CC86;
    }
</style>

<!-- 頁面 Title -->
<div class="container">
    <div class="row page-title">
        <h1 class="col-xs-12 text-Large-1">害蟲辨識</h1>
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
            <hr />
        </div>
    </div>
</div><!-- 頁面 Title 結束 -->

<!-- 辨識結果區塊 -->
<div class="container page-container recognition">

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
                    <!-- 辨識結果資料 -->
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
                    <!-- 辨識準確度 -->
                    <div class="RoundBtn-1 text-article-1">{{ intval(floatval($recognitionDate->score)*100) . "%" }}</div>
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
</div><!-- 辨識結果結束-->

<!-- include 影像辨識區塊 -->
@include('site.layouts.recognition')

@stop

@section('javascript')

<!-- 導入 camera.js 相機上傳模組 -->
<script src="{{ asset('js/camera.js') }}"></script>

<!-- 生成 csrf token 供 javascript 使用 -->
<script>
    var _token = '@csrf';
</script>

<!-- 導入 slick特效 -->
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
                    breakpoint: 767,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 1,
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
