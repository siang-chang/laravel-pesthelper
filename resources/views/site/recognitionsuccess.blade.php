@extends('site.master.subpage')
@section('pageTitle', '害蟲辨識')
@section('description', '害蟲辨識')
@section('content')
<!-- 內容區塊 -->
<div class="container recognition">
    <!-- 頁面 Title -->
    <div class="row page-title">
        <h1 class="col-xs-12 text-Large-1">辨識結果</h1>
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
            <hr />
        </div>
    </div>
    <!-- 結果區塊 -->
    <div class="page-container">
        <!-- 行動呼籲區塊 -->
        <div class="row">
            <h2 class="col-xs-12 text-medium-1">點擊您認為最符合的結果，查看詳細資料</h2>
        </div>
        <!-- 結果選擇區塊 -->
        <div class="row">
            @foreach ($recognition as $recognitionDate)
            <div class="img-box col-xs-12 col-sm-6 col-md-4">
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
        </div>
    </div>
</div>
@stop
