@extends('site.master.subpage')
@section('pageTitle', '害蟲辨識')
@section('description', '害蟲辨識')
@section('content')
<style>
    html, body {
      margin: 0;
      padding: 0;
    }

    * {
      box-sizing: border-box;
    }

    .slider {
        width: 50%;
        margin: 100px auto;
    }

    .slick-slide {
      margin: 0px 20px;
    }

    .slick-slide img {
      width: 100%;
    }

    .slick-prev:before,
    .slick-next:before {
      color: black;
    }


    .slick-slide {
      transition: all ease-in-out .3s;
      opacity: .2;
    }

    .slick-active {
      opacity: .5;
    }

    .slick-current {
      opacity: 1;
    }
</style>
<!-- 內容區塊 -->
<div class="container recognition">
    <!-- 頁面 Title -->
    <div class="row page-title">
        <h1 class="col-xs-12 text-Large-1">害蟲辨識</h1>
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
            <hr />
        </div>
    </div>
    <!-- 影像辨識區塊 -->
    <section class="variable">
        <div>
            <img src="http://placehold.it/350x100?text=1">
        </div>
        <div>
            <img src="http://placehold.it/350x100?text=2">
        </div>
        <div>
            <img src="http://placehold.it/350x100?text=3">
        </div>
        <div>
            <img src="http://placehold.it/350x100?text=4">
        </div>
        <div>
            <img src="http://placehold.it/350x100?text=5">
        </div>
        <div>
            <img src="http://placehold.it/350x100?text=6">
        </div>
        <div>
            <img src="http://placehold.it/350x100?text=7">
        </div>
        <div>
            <img src="http://placehold.it/350x100?text=8">
        </div>
        <div>
            <img src="http://placehold.it/350x100?text=9">
        </div>
        <div>
            <img src="http://placehold.it/350x100?text=10">
        </div>
    </section>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('.variable').slick({
            setting - name: setting - value
        });
    });
    $('.variable').slick();

</script>
@stop
