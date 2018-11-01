@extends('site.master.subpage')
@section('content')
<!-- 內容區塊 -->
<div class="container">
    <!-- 頁面 Title = 害蟲名稱 -->
    <div class="row page-title">
        <h1 class="col-xs-12 text-Large-1">{{ $pestData->name }}</h1>
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
            <hr />
        </div>
    </div>
    <!-- 害蟲資料 -->
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3">
            <!-- 影像 -->
            <div class="img-detail">
                <img src="{{ asset('img/image.jpg') }}" alt="{{ $pestData->name }}">
            </div>
            <!-- 文字資料 -->
            <div class="row textdata">
                <div class="col-xs-6">
                    <div class="RoundBtn-1-5 text-medium-1">學名</div>
                    <p class="text-medium-3">{{ $pestData->scientificName }}</p>
                </div>
                <div id="{{ $key_last = count($alias) }}" class="col-xs-6">
                    <!-- ↑ 先將「害蟲別名」的數量計算後儲存起來 ↑ -->
                    <div class="RoundBtn-1-5 text-medium-1">別名</div>
                    <p class="text-medium-3">
                        <!-- 使用 foreach 列印「害蟲別名」 -->
                        @foreach ($alias as $key => $value)
                        @if($key +1 == $key_last)
                        <!-- 如果本次列印是最後一項，則不連帶印出 "、" -->
                        {{ $value }}
                        @else
                        <!-- 如果本次列印不是最後一項，則連帶印出 "、" -->
                        {{ $value . '、' }}
                        @endif
                        @endforeach
                    </p>
                </div>
                <div class="col-xs-6">
                    <div class="RoundBtn-1-5 text-medium-1">目別</div>
                    <p class="text-medium-3">{{ $pestData->category }}</p>
                </div>
                <div class="col-xs-6">
                    <div class="RoundBtn-1-5 text-medium-1">科別</div>
                    <p class="text-medium-3">{{ $pestData->secondCategory }}</p>
                </div>
                <div class="col-xs-12">
                    <div class="RoundBtn-1-5 text-medium-1">害蟲習性</div>
                    <p class="text-medium-3">{{ $pestData->habit }}</p>
                </div>
            </div>
            <div class="text-medium-1">．．．</div>
        </div>
    </div>
    <!-- 解決方案 Title -->
    <div class="row page-title">
        <h3 class="col-xs-12 text-Large-1">解決方案</h3>
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
            <hr />
        </div>
    </div>
    <!-- 解決方案資料 -->
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3">
            <div class="row textdata">
                @foreach($solutionDatas as $solutionData)
                <div class="col-xs-12">
                    <div class="RoundBtn-1-5 text-medium-1">方案類別</div>
                    <p class="text-medium-3">{{ $solutionData->solutionType }}</p>
                </div>
                <div class="col-xs-12">
                    <div class="RoundBtn-1-5 text-medium-1">方案內容</div>
                    <p class="text-medium-3">{{ $solutionData->solution }}</p>
                </div>
                <hr />
                @endforeach
            </div>
            <div class="text-medium-1">．．．</div>
        </div>
    </div>
    <div class="row cta-btn">
        <button type="button" id="btnTest" class="btn-1 text-medium-0">提出建議</button>
        <p class="text-medium-2">如果以上內容有誤，也歡迎您提出建議！</p>
    </div>
</div>
@stop
