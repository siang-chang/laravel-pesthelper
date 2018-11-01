@extends('site.master.subpage')
@section('content')
<!-- 內容區塊 -->
<div class="container">
    <!-- 頁面 Title = 害蟲名稱 -->
    <div class="row page-title">
        <h1 class="col-xs-12 text-Large-1">{{ $plantData->name }}</h1>
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
            <hr />
        </div>
    </div>
    <!-- 害蟲資料 -->
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3">
            <!-- 影像 -->
            <div class="img-detail">
                <img src="{{ asset('img/image.jpg') }}" alt="{{ $plantData->name }}">
            </div>
            <!-- 文字資料 -->
            <div class="row textdata">
                <div class="col-xs-6">
                    <div class="RoundBtn-1-5 text-medium-1">學名</div>
                    <p class="text-medium-3">{{ $plantData->scientificName }}</p>
                </div>
                <div id="{{ $key_last = count($alias) }}" class="col-xs-6">
                    <!-- ↑ 先將「植株別名」的數量計算後儲存起來 ↑ -->
                    <div class="RoundBtn-1-5 text-medium-1">別名</div>
                    <p class="text-medium-3">
                        <!-- 使用 foreach 列印「植株別名」 -->
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
                    <p class="text-medium-3">{{ $plantData->category }}</p>
                </div>
                <div class="col-xs-6">
                    <div class="RoundBtn-1-5 text-medium-1">科別</div>
                    <p class="text-medium-3">{{ $plantData->secondCategory }}</p>
                </div>
            </div>
            <div class="text-medium-1">．．．</div>
        </div>
    </div>
    <!-- 感染關係 Title -->
    <div class="row page-title">
        <div class="col-xs-12 text-medium-1">
            <h3 class="RoundBtn-1-5">可能感染的蟲害</h3>
        </div>
    </div>
    <!-- 感染關係資料 -->
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3">
            <div class="row textdata">
                @foreach($infectRelation as $relation)
                <div class="col-xs-6">
                    <img src="{{ asset('img/image.jpg') }}" alt="{{ $relation->name }}">
                    <p class="text-medium-3">{{ $relation->name }}</p>
                </div>
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
