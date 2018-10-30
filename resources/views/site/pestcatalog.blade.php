@extends('site.layouts.3-page')
@section('content')
<!-- 內容區塊 -->
<div class="container">
    <div class="row">
        <h1>害蟲目錄</h1>
        <hr />
    </div>

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
