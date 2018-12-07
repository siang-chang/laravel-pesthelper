@extends('site.master.subpage')
@section('pageTitle', '辨識失敗')
@section('content')
<!-- 內容區塊 -->
<div class="container">
    <!-- 頁面 Title -->
    <div class="row page-title">
        <h1 class="col-xs-12 text-Large-1">辨識失敗</h1>
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
            <hr />
        </div>
    </div>
    <div class="page-container">
        <!-- 行動呼籲區塊 -->
        <div class="row">
            <h2 class="col-xs-12 text-medium-1">抱歉，我們無法辨識這張影像</h2>
        </div>
        <!-- 結果選擇區塊 -->
        <div class="row">
            <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2" style="text-align:center">
                <img src="{{ asset('/') . $userImg }}" alt="userImg" style="width: 100%;">
            </div>
        </div>
    </div>

</div>
@stop
