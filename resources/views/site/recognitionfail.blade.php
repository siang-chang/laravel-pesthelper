@extends('site.master.subpage')
@section('pageTitle', '辨識失敗')
@section('content')
<!-- 頁面 Title -->
        <div class="container">
            <div class="row page-title">
                <h1 class="col-xs-12 text-Large-1">辨識失敗</h1>
                <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                    <hr />
                </div>
            </div>
        </div><!-- 頁面 Title 結束 -->

        <!-- 頁面內容 -->
        <div class="container page-container recognition">

            <!-- 行動呼籲區塊 -->
            <div class="row">
                <h2 class="col-xs-12 text-medium-1">抱歉，我們無法辨識這張影像</h2>
            </div>

            <!-- 使用者圖片區塊 -->
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2" style="text-align:center">
                    <div class="userImg">
                        <div>
                            <img src="{{ asset('/') . $userImg }}" alt="userImg" style="width: 100%;">
                        </div>
                    </div>
                </div>
            </div>

            <!-- 分隔線 -->
            <div class="text-medium-1">．．．</div>

            <!-- 行動呼籲區塊 -->
            <div class="row">
                <h2 class="col-xs-12 text-medium-1">　試試看別張影像？</h2>
            </div>
        </div><!-- 頁面內容 結束 -->

        <!-- include 影像辨識區塊 -->
        @include('site.layouts.recognition')

@stop
