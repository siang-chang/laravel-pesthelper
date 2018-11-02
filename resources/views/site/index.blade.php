@extends('site.master.homepage')
@section('content')
<!-- 內容區塊 -->
<div class="container">
    <!-- 網站標語 Web Slogan -->
    <div id="Web-page-slogan" class="row">
        <h1 class="col-xs-12 text-Oversized">蟲害小幫手<br />病蟲害解決方案查詢服務</h1>
    </div>
</div>
<div class="container">
    <!-- 功能標語 Function Slogan -->
    <div class="row">
        <h2 class="col-xs-12 text-medium-1">開始你的搜尋，病蟲害問題迎刃而解</h2>
    </div>
    <!-- 搜尋列 Search Bar -->
    @include('site.layouts.searchbar')
    <!-- Popular Keyword -->
    <div class="row">
        <div class="col-xs-12">
            <form action="search" method="GET">
                @csrf
                @foreach($keyWordList as $keyWord)
                <button type="submit" name="keyWord" value="{{ $keyWord->keyWord }}" class="RoundBtn-0 text-article-0">
                    {{ $keyWord->keyWord }}
                </button>
                @endforeach
            </form>
        </div>
    </div>
    <!-- 其他呼籲 Other Function -->
    <div class="row" style="padding-top: 50px;text-align: center;">
        <p class="text-medium-0">或者你可以試試</p>
    </div>
    <div class="row cta">
        <button type="button" id="btnTest" class="btn-1 text-medium-0">害蟲辨識</button>
        <span style="margin: 15px;"></span>
        <button type="button" id="btnTest" class="btn-0 text-medium-0">瀏覽教學</button>
    </div>
</div>
@stop
