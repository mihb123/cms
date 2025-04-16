@extends('layouts.auth')

@section('title', 'Login')
@section('description', 'Login')
@section('body:class', 'hold-transition login-page')

@section('content')
    <div class="kt-grid kt-grid--ver kt-grid--root kt-page">
        <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v5 kt-login--signin" id="kt_login">
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
                        <div class="kt-login__signin">
                            <div class="kt-login__head">
                                <h3 class="kt-login__title">ログイン画面</h3>
                            </div>
                            <div class="kt-login__form">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" type="text" required placeholder="{{ __('メールアドレス') }}" name="email" autocomplete="off">
                                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback help-block" role="alert">
                                            {{ $errors->first('email') }}
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <input class="form-control form-control-last {{ $errors->has('password') ? ' is-invalid' : '' }}" required type="password" placeholder="{{ __('パスワード') }}" name="password">
                                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback help-block" role="alert">
                                            {{ $errors->first('password') }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="row kt-login__extra">
                                        <div class="col-12">
                                            <label class="kt-checkbox">
                                                <input type="checkbox" name="remember"> ログイン状態を保存する
                                                <span></span>
                                            </label>
                                        </div>
                                        <div class="col-12 text-center mt-2">
                                            <a href="{{ route('password.request') }}" class="kt-link">パスワードを忘れてしまった場合</a>
                                        </div>
                                    </div>
                                    <div class="kt-login__actions">
                                        <button type="submit" class="btn btn-brand btn-pill btn-elevate">{{ __('ログイン') }}</button>
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
