@extends('site.master.subpage')
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
    <form action="recognition" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="userImg" accept="image/*" capture="camera">
        <button type="submit">post</button>
    </form>
</div>
@stop
