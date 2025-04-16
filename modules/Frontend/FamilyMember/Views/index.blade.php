@extends('homepage::layout')

@section('content')
    <div class="mitori-slogan-top top">～ 看取った家族の物語り ～</div>
    <div class="mitori-wrap">
        <div class="mitori-hero">
            <div class="mitori-box-header d-tb-none d-sp-none">
                <img class="star" src="{{ asset('frontend/assets/images/star.svg') }}"/>
                <div class="title-group">
                    <h2 class="title">家族が語る「それぞれの最期」</h2>
                    <div class="title-en">Families talk about "their respective endingsmembers</div>
                </div>
                <img class="flower" src="{{ asset('frontend/assets/images/mitori/flower.png') }}" alt="flower"/>
            </div>
            <div class="d-pc-none mitori-detail-slogan">
                <span class="text-1">私の看取り体験談</span>
                <span class="text-en">Stories of each family</span>
            </div>
            <div class="mitori-short-desc">
                大切な家族を看送った方々による看取りの体験談をご紹介しています。それぞれのご家族にとってかけがえのない１日１日がより平穏で納得のいく日々でありますように。
            </div>
            <div class="image-top-group">
                <div class="content-left">
                    <img src="{{ asset('frontend/assets/images/mitori/mitori-icon.png') }}" alt=""/>
                    <div class="desc">Family members talk about their final send-off</div>
                </div>
                <div class="content-right">
                    <img src="{{ asset('frontend/assets/images/mitori/people-group.png') }}" alt=""/>
                </div>
            </div>
        </div>
        @include('mitori-taiken::partials.pickup')
        <div class="main-content-wrap">
            @include('mitori-taiken::partials.news')
            @include('homepage::sidebar.index')
        </div>
    </div>
@endsection
