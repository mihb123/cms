@extends('layouts.auth')

@section('title', 'Password reset')
@section('description', 'Password reset')
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
                                <h3 class="kt-login__title">パスワードを再設定</h3>
                            </div>
                            <div class="kt-login__form">
                                <form method="POST" action="{{ route('password.update') }}">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" placeholder="{{ __('E-Mail Address') }}" required autofocus />
                                        <span class="glyphicon glyphicon-user form-control-feedback"></span>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback help-block" role="alert">
                                            {{ $errors->first('email') }}
                                        </span>
                                        @endif
                                    </div>

                                    <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('パスワード') }}" required />
                                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback help-block" role="alert">
                                            {{ $errors->first('password') }}
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group has-feedback">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ __('パスワード再入力') }}" required />
                                        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                                    </div>

                                    <div class="kt-login__actions">
                                        <button type="submit" class="btn btn-brand btn-pill btn-elevate">{{ __('パスワード再設定') }}</button>
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
