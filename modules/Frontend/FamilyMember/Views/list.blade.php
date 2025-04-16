@extends('homepage::layout')

@section('content')
    <div class="mitori-layout-2">
        <div class="main-content-wrap">
            <div class="main-content-left">
                <div class="white-box">
                    <div class="mitori-slogan-top">～ 看取った家族の物語り ～</div>
                    <div class="bc-with-date">
                        <div class="mitori-breadcrumb">
                            <a href="#">余命宣告</a> <span class="divi">/</span>
                            <span class="current">余命宣告カテゴリ一覧</span>
                        </div>
                        <div class="meta-date">1/10(火) 0:24更新</div>
                    </div>
                    <div class="list-title">【 一覧】</div>
                    @include('mitori-taiken::partials.news')
                </div>
            </div>
            @include('homepage::sidebar.index')
        </div>
    </div>
@endsection
