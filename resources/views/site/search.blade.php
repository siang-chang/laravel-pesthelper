@extends('site.layouts.3-page')
@section('content')
<!-- 內容區塊 -->
<div class="container">
    <!-- 搜尋列 Search Bar -->
    @include('site.layouts.searchbar')
    <div class="row" style="text-align: center;margin-top:30px;">
        <a id="area" class="RoundBtn-1 text-article-1">全部類別</a>
        <a id="pest" class="RoundBtn-1 text-article-1">　害蟲　</a>
        <a id="plant" class="RoundBtn-1 text-article-1">　植株　</a>
    </div>
    <div class="row" style="margin-top:30px;">
        {{-- @foreach($searchResults as $results) --}}
        @foreach($datas as $results)
        <div class="img-box col-xs-12 col-sm-6 col-md-4">
            <div id="{{ $results->num }}" class="img-innerbox" onclick="alert('123');">
                <div class="img">
                    @if(substr( $results->num , 0 , 1 ) == 'A')
                    <img class="icon" src="img/icon/icon_pest.svg" width="56">
                    @else
                    <img class="icon" src="img/icon/icon_plant.svg" width="56">
                    @endif
                    <img class="corner" src="img/corner.svg" width="80">
                    {{-- <img class="main" src="{{ $results->img ?? 'img/image.jpg' }}" alt=""> --}}
                    <img class="main" src="img/image.jpg" alt="">
                </div>
                <hr />
                <div class="base">
                    <p class="text-article-1">{{ $results->name }}</p>
                    <p class="text-small-1">{{ $results->scientificName }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <button id="goTop" class="Btn-default">
        <img src="img/icon/up.svg" width="40" height="40" alt="GoToTop">
    </button>

</div>

@stop
