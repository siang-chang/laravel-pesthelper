@extends('site.master.subpage')
@section('pageTitle', '害蟲辨識')
@section('description', '害蟲辨識')
@section('content')
<style type="text/css">
    * {
        box-sizing: border-box;
    }

    .slider {
        width: 50%;
        margin: 100px auto;
    }

    .slick-slide {
        margin: 0px 20px;
    }

    .slick-slide img {
        width: 100%;
    }

    .slick-prev:before,
    .slick-next:before {
        color: black;
    }


    .slick-slide {
        transition: all ease-in-out .3s;
        opacity: .2;
    }

    .slick-active {
        opacity: .5;
    }

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
<!-- 影像辨識區塊 -->
<div class="page-container">
    <!-- 行動呼籲區塊 -->
    <div class="row">
        <h2 class="col-xs-12 text-medium-1">點擊您認為最符合的結果，查看詳細資料</h2>
    </div>
    <!-- 結果選擇區塊 -->
    <div class="row">
        <section class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 center">
            @foreach ($recognition as $recognitionDate)
            <div>
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
            <div>
                <img src="http://placehold.it/350x100?text=1">
            </div>
            <div>
                <img src="http://placehold.it/350x100?text=2">
            </div>
            <div>
                <img src="http://placehold.it/350x100?text=3">
            </div>
            <div>
                <img src="http://placehold.it/350x100?text=4">
            </div>
            <div>
                <img src="http://placehold.it/350x100?text=5">
            </div>
        </section>
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
