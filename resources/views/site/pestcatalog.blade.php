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
            {{ csrf_field() }}
            <!-- csrf一定要放在form的下一行 -->
            <input type="submit" value="show">
        </form>
        @endforeach
        <div>
            {{-- {{ $pestCategoryData or 'Default' }} --}}
            {{ isset($pestCategoryData) ? $pestCategoryData : 'Default' }}
        </div>
    </div>
</div>
@stop
