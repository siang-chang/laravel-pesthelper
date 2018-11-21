@extends('site.master.subpage')
@section('pageTitle', $pestData->name)
@section('description',$pestData->name)
@section('content')
<!-- 內容區塊 -->
<div class="container">
    <!-- 頁面 Title = 害蟲名稱 -->
    <div class="row page-title">
        <h1 class="col-xs-12 text-Large-1">{{ $pestData->name ?? 'Error' }}</h1>
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
            <hr />
        </div>
    </div>
    <!-- 害蟲資料 -->
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3">
            <!-- 影像 -->
            <div class="img-detail">
                {{-- <img src="{{ asset($pestData->img) }}" alt="{{ $pestData->name ?? '暫無名稱' }}"> --}}
                <img src="{{ asset('img/image.jpg') }}" alt="{{ $pestData->name ?? '暫無名稱' }}">
            </div>
            <!-- 文字資料 -->
            <div class="row textdata">
                <div class="col-xs-6">
                    <div class="RoundBtn-1-5 text-medium-1">學名</div>
                    <p class="text-medium-3">{{ $pestData->scientificName ?? '暫無學名' }}</p>
                </div>
                <div id="{{ $key_last = count($alias) }}" class="col-xs-6">
                    <!-- ↑ 先將「害蟲別名」的數量計算後儲存起來 ↑ -->
                    <div class="RoundBtn-1-5 text-medium-1">別名</div>
                    <p class="text-medium-3">
                        @if($key_last <= 1) <!-- 如果沒有「害蟲別名」，則列印替代文字 -->
                            <span>暫無別名</span>
                            @else
                            <!-- 如果有別名，則使用 foreach 列印「害蟲別名」 -->
                            @foreach ($alias as $key => $value)
                            @if($key +1 == $key_last)
                            <!-- 如果本次列印是最後一項，則不連帶印出 "、" -->
                            {{ $value }}
                            @else
                            <!-- 如果本次列印不是最後一項，則連帶印出 "、" -->
                            {{ $value . '、' }}
                            @endif
                            @endforeach
                            @endif
                    </p>
                </div>
                <!-- Add the extra clearfix for only the required viewport -->
                <span class="clearfix"></span>
                <!-- Add the extra clearfix for only the required viewport -->
                <div class="col-xs-6">
                    <div class="RoundBtn-1-5 text-medium-1">目別</div>
                    <p class="text-medium-3">{{ $pestData->category ?? '暫無目別' }}</p>
                </div>
                <div class="col-xs-6">
                    <div class="RoundBtn-1-5 text-medium-1">科別</div>
                    <p class="text-medium-3">{{ $pestData->secondCategory ?? '暫無科別' }}</p>
                </div>
                <div class="col-xs-12 flex-align-title">
                    <div class="RoundBtn-1-5 text-medium-1">害蟲習性</div>
                    <p>
                        <span class="text-medium-3">
                            @if($pestData->habit == '')
                            {{ '暫無習性' }}
                            @else
                            {{ $pestData->habit ?? '暫無習性' }}
                            @endif
                        </span>
                    </p>
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
                @if(count((array)$solutionDatas))
                <!-- 如果 $solutionDatas 有資料，則使用 foreach列印 -->
                @foreach($solutionDatas as $solutionData)
                <!-- 使用 foreach 列印 $solutionData -->
                <div class="col-xs-12">
                    <div class="RoundBtn-1-5 text-medium-1">方案類別</div>
                    <p class="text-medium-3">{{ $solutionData->solutionType }}</p>
                </div>
                <div class="col-xs-12 flex-align-title">
                    <div class="RoundBtn-1-5 text-medium-1">方案內容</div>
                    <p class="text-medium-3">
                        <span>
                            {{ $solutionData->solution }}
                        </span>
                    </p>
                </div>
                <div class="col-xs-12">
                    <hr />
                </div>
                <!-- 列印結束 -->
                @endforeach
                @else
                <!-- 如果 $solutionDatas 沒有資料，則顯示錯誤資訊 -->
                <div class="col-xs-12">
                    <p class="text-medium-3">此害蟲目前尚無解決方案資料</p>
                </div>
                @endif
            </div>
            <div class="col-xs-12 text-medium-1">．．．</div>
        </div>
    </div>
    <!-- 修改建議 -->
    {{-- <div class="row cta">
        <button type="button" id="btnTest" class="btn-1 text-medium-0">提出建議</button>
        <p class="text-medium-2 bottom">如果以上內容有誤，也歡迎您提出建議！</p>
    </div> --}}
    <div class="row cta">
        <form method="POST" action="suggestion">
            @csrf
            <input type="text" name="num" value={{ $pestData->num}} hidden>
            <button type="submit" id="btnTest" class="btn-1 text-medium-0"> 提出建議 </button>
            <p class="text-medium-2 bottom"> 如果以上內容有誤，也歡迎您提出建議！ </p>
        </form>
    </div>

</div>
@stop
