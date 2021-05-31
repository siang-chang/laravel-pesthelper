@extends('site.master.subpage')
@section('pageTitle', '關於我們')
@section('description',
'網站的瀏覽者您好，我們是來自國立屏東科技大學資訊管理系的學生團隊。這個網站源自於我們的畢業專題──智慧型病蟲害解決方案服務，旨在協助使用者解決「居家型植物病蟲害」的問題，提供相關解決方案。')
@section('content')

<!-- 頁面載入動畫 -->
@include('site.layouts.loadingSpinner')

<!-- 頁面 Title -->
<div class="container">
    <div class="row page-title">
        <h1 class="col-xs-12 text-Large-1">關於我們</h1>
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
            <hr />
        </div>
    </div>
</div><!-- 頁面 Title 結束 -->

<!-- 內容區塊 -->
<div class="container">
    <div class="row ">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 text-medium-3" style="text-align:left">
            <br>
            <span>
                瀏覽者您好，我們是來自
                <strong class="text-medium-1">國立屏東科技大學資訊管理系</strong>
                的學生團隊。
                <br>
            </span>
            </p>
            <br>

            <span>
                這個網站源自於我們的畢業專題──
                <strong class="text-medium-1">智慧型病蟲害解決方案服務</strong>
                ，旨在協助您解決「居家型植物病蟲害」的問題，提供相關解決方案。
            </span>
            </p>
            <br>

            <span>
                本網站提供的植物及病蟲害相關資料皆取自
                <strong class="text-medium-1">政府開放資料</strong>
                及
                <strong class="text-medium-1">網路文獻</strong>
                ，若您在瀏覽的過程中，發現在資料方面有嚴重缺漏，亦或是在文字及影像資料的部分不慎侵害到您的權益，煩請來信告知，謝謝。
            </span>
            </p>
            <br>

            <span>
                <strong class="text-medium-1">2021 年更新</strong></p>
                網站的害蟲辨識及影像資料已停用，目前僅做為作品集保留。
            </span>
            </p>
            <br>

            <span class="text-medium-2">
                聯絡信箱：npustunknown@gmail.com
            </span>
        </div>
    </div>








</div><!-- 內容區塊結束 -->


@stop
