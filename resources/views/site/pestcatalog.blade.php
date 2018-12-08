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
                <div class="panel-group col-xs-12" id="accordion" role="tablist" aria-multiselectable="true">
                    @foreach($categoryList as $category)

                    <!-- 害蟲目別 -->
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="heading-{{ $category->categoryNum }}" data-toggle="collapse"
                            data-parent="#accordion" href="#collapse-{{ $category->categoryNum }}" aria-expanded="true"
                            aria-controls="collapse-{{ $category->categoryNum }}" onclick="openCatalog('{{ $category->categoryNum }}')">
                            <h4 class="panel-title">
                                <span class="glyphicon glyphicon-chevron-down"></span>
                                <span class="text-medium-1">{{ $category->categoryName }}</span>
                            </h4>
                        </div>
                        <div id="collapse-{{ $category->categoryNum }}" class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby="heading-{{ $category->categoryNum }}">
                            <div class="panel-body">
                                <div class="row"></div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
@stop
