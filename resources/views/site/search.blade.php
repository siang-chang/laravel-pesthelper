@extends('site.master.subpage')
@section('content')
<!-- 內容區塊 -->
<div class="container search-container">
    <!-- 搜尋列 Search Bar -->
    @include('site.layouts.searchbar')
    <!-- 搜尋結果篩選按鈕 -->
    <div class="row searchType-list">
        <form action="search" method="GET">
            @csrf
            <button type="submit" name="searchType" value="全部類別" class="RoundBtn-1 text-article-1">全部類別</button>
            <button type="submit" name="searchType" value="僅查害蟲" class="RoundBtn-1 text-article-1">　害蟲　</button>
            <button type="submit" name="searchType" value="僅查植株" class="RoundBtn-1 text-article-1">　植株　</button>
            <input type="hidden" name="keyWord" value="{{ $keyWord ?? '' }}">
        </form>
    </div>
    <!-- 搜尋結果顯示區域 -->
    <div class="row">
        @foreach($searchResults as $results)
        <div class="img-box col-xs-12 col-sm-6 col-md-4">
            @if(substr( $results->num , 0 , 1 ) == 'A')
            <a href='{{ url("/pestDetailed/$results->num") }}'>
                @else
                <a href='{{ url("/plantDetailed/$results->num") }}'>
                    @endif

                    <div id="{{ $results->num }}" class="img-innerbox">
                        <div class="img">
                            @if(substr( $results->num , 0 , 1 ) == 'A')
                            <img class="icon" src="img/icon/icon_pest.svg" width="56">
                            @else
                            <img class="icon" src="img/icon/icon_plant.svg" width="56">
                            @endif
                            <img class="corner" src="img/corner.svg" width="80">
                            {{-- <img class="main" src="{{ $results->img ?? 'img/image.jpg' }}" alt=""> --}}
                            <img class="main" src="img/image.jpg" alt="{{ $results->name }}">
                        </div>
                        <hr />
                        <div class="base">
                            <p class="text-article-1">{{ $results->name }}</p>
                            <p class="text-small-1">{{ $results->scientificName }}</p>
                        </div>
                    </div>
                </a>
        </div>
        @endforeach
    </div>
    <!-- go to top 功能按鈕 -->
    <button id="goTop" class="Btn-default">
        <img src="img/icon/up.svg" width="40" height="40" alt="GoToTop">
    </button>
</div>
@stop
