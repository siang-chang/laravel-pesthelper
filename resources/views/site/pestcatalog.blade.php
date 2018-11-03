@extends('site.master.subpage')
@section('content')
<!-- 內容區塊 -->
<div class="container">
    <!-- 頁面 Title -->
    <div class="row page-title">
        <h1 class="col-xs-12 text-Large-1">害蟲目錄</h1>
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
            <hr />
        </div>
    </div>
    <!-- 害蟲目錄 -->
    <div class="row">
        @foreach($categoryList as $category)
        <div id="{{ $category->categoryNum }}">{{ $category->categoryName }}</div>
        <form action='{{ url("/_pestcatalog/$category->categoryNum") }}' method="POST">
            @csrf
            <!-- csrf一定要放在form的下一行 -->
            <input type="submit" value="show">
        </form>
        @endforeach
        <div>
            {{-- {{ isset($pestCategoryData) ? $pestCategoryData : 'Default' }} --}}
            @if(!empty($pestCategoryData))
            @foreach($pestCategoryData as $pestCategory)
            <div>
                num = {{ $pestCategory->num }};
            </div>
            <div>
                name = {{ $pestCategory->name }};
            </div>
            <div>
                scientificName = {{ $pestCategory->scientificName }};
            </div>
            <hr>
            @endforeach

            @endif


        </div>
    </div>
</div>
@stop
