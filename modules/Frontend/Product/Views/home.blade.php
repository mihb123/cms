<?php //@@extends('homepage::layout')  //edited by a.u 2024.09.21 ?>
@extends('homepage::layout_noindex')
@section('content')
    <div class="main-content-wrap">
        <div class="main-content-left cms4-top">
            @include($module . '::partials.section_one')
            @include($module . '::partials.section_two')
            @include($module . '::partials.section_three')

            <div class="backtop-backpage center d-sp-none">
                <a href="#" class="back-to-top">
                    <img src="{{ asset('frontend/assets/images/backtop.png') }}" alt=""/>
                    <span>ページの先頭へ戻る</span>
                </a>
                <a href="javascript:void(0)" onclick="history.back()" class="back-to-page">
                    <img src="{{ asset('frontend/assets/images/backpage.png') }}" alt=""/>
                    <span>前のページへもどる</span>
                </a>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="sidebar">
            @include('homepage::sidebar.area')
            @include('homepage::sidebar.testimonials_box')
            <div class="sidebar--area">
                @if ($listUseful)
                    @include('homepage::partials.news_widget_item')
                @endif
            </div>
        </div>
        <!-- End Sidebar -->
    </div>
@endsection
