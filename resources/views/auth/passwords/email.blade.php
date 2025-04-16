@extends('layouts.auth')

@section('title', 'Password email')
@section('description', 'Password email')
@section('body:class', 'hold-transition register-page')

@section('content')
    <div class="kt-grid kt-grid--ver kt-grid--root kt-page">
        <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v5 kt-login--forgot" id="kt_login">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile" style="background-image: url({{ asset('cms/theme_metronic/media/bg/bg-3.jpg') }});">
                <div class="kt-login__left">
                    <div class="kt-login__wrapper">
                        <div class="kt-login__content">
                            <a class="kt-login__logo" href="#">
                            </a>
                            <h3 class="kt-login__title">{{ env('BACKEND_SITENAME', 'laravel') }}</h3>
                            <span class="kt-login__desc">
                                {{ __('auth.description_login') }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="kt-login__divider">
                    <div></div>
                </div>
                <div class="kt-login__right">
                    <div class="kt-login__wrapper">
                        <div class="kt-login__forgot">
                            <div class="kt-login__head">
                                <h3 class="kt-login__title">パスワードをお忘れですか？</h3>
                                <div class="kt-login__desc">ここで新しいパスワードを簡単に設定できます。</div>
                            </div>
                            <div class="kt-login__form">
                                <form action="{{ route('password.email') }}" method="post">
                                    @csrf
                                    <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="メールアドレス" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                        @error('email')
                                        <span class="invalid-feedback help-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="kt-login__actions">
                                        <button type="submit" class="btn btn-brand btn-pill btn-elevate">送信</button>
                                        <a href="{{ route('login') }}" class="btn btn-outline-brand btn-pill" style="display:unset">キャンセル</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
