@extends('site.master.subpage')
@section('pageTitle', '辨識失敗')
@section('content')

<!-- 頁面載入動畫 -->
@include('site.layouts.loadingSpinner')
        <!-- 警告提示 -->
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-offset-1 alert alert-danger alert-dismissible text-small-1" role="alert" style="margin-top:20px;margin-bottom:0px;text-align:left">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div style="text-align:left;margin-left:5px;margin-right:10px;">
                        <strong>提醒：</strong>辨識功能已停用，本系統目前僅做為作品集保留。
                    </div>
                </div>
            </div>
        </div>
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

@section('javascript')

<!-- 導入 camera.js 相機上傳模組 -->
<script src="{{ asset('js/camera.js') }}"></script>

<!-- 生成 csrf token 供 javascript 使用 -->
<script>
    var _token = '@csrf';
</script>

@stop
