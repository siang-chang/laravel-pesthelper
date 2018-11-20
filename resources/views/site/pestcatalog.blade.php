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
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading-{{ $category->orderNum }}" data-toggle="collapse"
                    data-parent="#accordion" href="#collapse-{{ $category->orderNum }}" aria-expanded="true"
                    aria-controls="collapse-{{ $category->orderNum }}" onclick="openCatalog('{{ $category->orderNum }}')">
                    <h4 class="panel-title">
                        <span class="glyphicon glyphicon-chevron-down text-xs-1"></span>
                        <span class="text-medium-1">{{ $category->pestOrder }}</span>
                    </h4>
                </div>
                <div id="collapse-{{ $category->orderNum }}" class="panel-collapse collapse" role="tabpanel"
                    aria-labelledby="heading-{{ $category->orderNum }}">
                    <div class="panel-body">
                        <div class="row"></div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="row">
        <h1>Click</h1>
        <input type="text" id="psd">
        <input type="button" id="send" value="送出">
    </div>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery(document).ready(function ($) {
            $('#send').on('click', function (event) {
                event.preventDefault();
                var str = $('#psd').val();
                console.log(str);
                $.post('/pesthelper/public/postajax', {
                    psd: str
                }).done(
                    function (data) {
                        console.log(data);
                        if (data == 'success') {
                            alert('成功');
                        } else {
                            alert('失敗');
                        }
                    });
            });
        })

    </script>
</div>
@stop
