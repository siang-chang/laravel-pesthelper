@extends('site.master.subpage')
@section('pageTitle', '害蟲目錄')
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
        <div class="panel-group col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2" id="accordion">
            @foreach($categoryList as $category)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $category->categoryNum }}"
                            onclick="openCatalog('{{ $category->categoryNum }}')">
                            {{ $category->categoryName }}
                        </a>
                    </h4>
                </div>
                <div id="collapse{{ $category->categoryNum }}" class="panel-collapse collapse">
                    <div class="panel-body">

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    {{-- <div class="row">
        @foreach($categoryList as $category)
        <form action='{{ url("/pestcatalog/$category->categoryNum") }}' method="POST">
            @csrf
            <!-- csrf一定要放在form的下一行 -->
            <input type="submit" value="{{ $category->categoryName }}">
        </form>
        @endforeach
    </div> --}}

    {{-- <div>
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
    </div> --}}

</div>
@stop
