@extends('site.master.subpage')
@section('pageTitle', '害蟲辨識')
@section('description', '害蟲辨識')
@section('content')
<!-- 內容區塊 -->
<div class="container recognition">
    <!-- 頁面 Title -->
    <div class="row page-title">
        <h1 class="col-xs-12 text-Large-1">害蟲辨識</h1>
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
            <hr />
        </div>
    </div>
    <!-- 影像辨識區塊 -->
    <div class="page-container">
        <div class="row">
            <h2 class="col-xs-12 text-medium-1">確定使用這張圖片進行辨識？</h2>
        </div>
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <form action="recognition" method="POST" enctype="multipart/form-data" class="text-medium-0">
                    @csrf
                    <div class="userImg">
                        <div>
                            <img src="{{ asset('img/image.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="cta">
                        <button type="submit" class="btn-2 text-medium-1">進行辨識</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@stop
