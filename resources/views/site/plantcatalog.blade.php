@extends('site.master.subpage')
@section('pageTitle', '植株目錄')
@section('content')
<!-- 內容區塊 -->
<div class="container">
    <!-- 頁面 Title -->
    <div class="row page-title">
        <h1 class="col-xs-12 text-Large-1">植株目錄</h1>
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
            <hr />
        </div>
    </div>
    <!-- 植株目錄 -->
    <div class="row">
        <div class="panel-group col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2" id="accordion">
            @foreach($categoryList as $category)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $category->categoryNum }}">
                            {{ $category->categoryName }}
                        </a>
                    </h4>
                </div>
                <div id="collapse{{ $category->categoryNum }}" class="panel-collapse collapse">
                    <div class="panel-body">
                        <div>
                            {{-- {{ isset($pestCategoryData) ? $pestCategoryData : 'Default' }} --}}
                            @if(!empty($plantCategoryData))
                            @foreach($plantCategoryData as $plantCategory)
                            <div>
                                num = {{ $plantCategory->num }};
                            </div>
                            <div>
                                name = {{ $plantCategory->name }};
                            </div>
                            <div>
                                scientificName = {{ $plantCategory->scientificName }};
                            </div>
                            <hr>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>
@stop
