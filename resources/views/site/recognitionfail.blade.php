@extends('site.master.subpage')
@section('pageTitle', '辨識失敗')
@section('content')
<!-- 內容區塊 -->
<div class="container">
    <!-- 頁面 Title -->
    <div class="row page-title">
        <h1 class="col-xs-12 text-Large-1">害蟲辨識</h1>
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
            <hr />
        </div>
    </div>
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2" style="text-align:center">
        <img src="{{ 'pestimg/' . $userImgs }}" alt="userImg" style="width: 100%;">
    </div>
</div>
@stop
