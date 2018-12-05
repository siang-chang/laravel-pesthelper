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
    <div>
        pestCount={{ $results->pestCount }}
    </div>
    <div>
        @foreach ($results->recognition as $recognitionDate)
        {{ $recognitionData->name }}<br>
        @endforeach
    </div>
</div>
@stop
