@extends('site.layouts.default')
@section('content')
<!-- 內容區塊 -->
<div class="container" style="padding-bottom:60px;">
    <!-- 搜尋列 Search Bar -->
    @include('site.layouts.searchbar')
    <div class="row" style="text-align: center;margin-top:30px;">
        <a id="area" class="roundBtn-1 text-article-1">全部類別</a>
        <a id="pest" class="roundBtn-1 text-article-1">　害蟲　</a>
        <a id="plant" class="roundBtn-1 text-article-1">　植株　</a>
    </div>
    <div class="row" style="margin-top:30px;">
        @foreach($searchResults as $results)
        <div class="img-box col-xs-12 col-sm-6 col-md-4">
            <div id="{{ $results->num }}" class="img-innerbox" onclick="alert('123');">
                <div class="img">
                    @if($results->type == 'pest')
                    <img class="icon" src="img/icon/icon_pest.png">
                    @else
                    <img class="icon" src="img/icon/icon_plant.png">
                    @endif
                    <img class="corner" src="img/corner.png">
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
    <button id="goTop" class="Btn-default"><img src="img/icon/up.png" alt="GoToTop"></button>
</div>

@stop
