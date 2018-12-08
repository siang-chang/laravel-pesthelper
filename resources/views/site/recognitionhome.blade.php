@extends('site.master.subpage')
@section('pageTitle', '害蟲辨識')
@section('description', '害蟲辨識')
@section('content')

<!-- 頁面載入動畫 -->
@include('site.layouts.loadingSpinner')

<!-- 頁面 Title -->
        <div class="container">
            <div class="row page-title">
                <h1 class="col-xs-12 text-Large-1">害蟲辨識</h1>
                <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                    <hr />
                </div>
            </div>
        </div><!-- 頁面 Title 結束 -->

        <!-- 內容區塊 -->
        <div class="container page-container recognition">

            <!-- 行動呼籲區塊 -->
            <div class="row">
                <h2 class="col-xs-12 text-medium-1">辨識未知的害蟲，找到解決方案</h2>
            </div>

            <!-- 影像拍攝 -> 辨識 ｜　桌電不顯示 -->
            <div class="cta">
                <div class="row hidden-md hidden-lg ">
                    <div class="col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                        <form action="recognition" method="POST" enctype="multipart/form-data" class="text-medium-0">
                            @csrf


                            <!-- 影像 -->
                            <div class="img-detail" style="border: none">
                                <img src="{{ asset('img/camera_icon.svg') }}" alt="拍攝影像">
                                <input type="file" id="shootImg" name="userImg" accept="image/*" capture="camera">
                            </div>

                            <!-- 按鈕 -->
                            <div class="RoundBtn-1 text-article-1">
                                <span>啟動相機</span>
                                <input type="file" id="shootImg" name="userImg" accept="image/*" capture="camera">
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- 影像拍攝 -> 辨識結束 -->

            <!-- 分隔區塊 ｜ 桌電不顯示 -->
            <div class="hidden-md hidden-lg text-medium-1" style="margin-top:20px">．．．</div>

            <!-- 行動呼籲區塊 ｜ 桌電不顯示 -->
            <div class="row hidden-md hidden-lg">
                <h2 class="col-xs-12 text-medium-2">當然，您也可以直接上傳影像</h2>
            </div>

            <!-- 圖片上傳 -> 辨識 -->
            <div class="cta">
                <div class="row">
                    <div class="col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                        <form action="recognition" method="POST" enctype="multipart/form-data" class="text-medium-0">
                            @csrf


                            <!-- 影像 -->
                            <div class="img-detail">
                                <div>
                                    <img src="{{ asset('img/image.jpg') }}" alt="上傳您的影像">
                                    <input type="file" id="uploadImg" name="userImg" accept="image/*">
                                </div>
                            </div>

                            <!-- 按鈕 -->
                            <div class="RoundBtn-1 text-article-1">
                                <span>上傳影像</span>
                                <input type="file" id="uploadImg" name="userImg" accept="image/*">
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- 圖片上傳區結束 -->

            <!-- 分隔區塊 ｜ 手機、平板不顯示 -->
            <div class="hidden-xs hidden-sm text-medium-1" style="margin-top:20px">．．．</div>

            <!-- 行動呼籲區塊 ｜ 手機、平板不顯示 -->
            <div class="row hidden-xs hidden-sm">
                <h2 class="col-xs-12 text-medium-2">您也可以透過行動裝置瀏覽網頁，使用即時辨識功能</h2>
            </div>
        </div><!-- 內容區塊結束 -->


        </div>
    @stop

    @section('javascript')

    <!-- 導入 camera.js 相機上傳模組 -->
    <script src="{{ asset('js/camera.js') }}"></script>
    <script>
        var _token = '@csrf';

    </script>
    @stop
