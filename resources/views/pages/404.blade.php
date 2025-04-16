@extends('layouts.auth')

@section('content')
    <div class="kt-grid kt-grid--ver kt-grid--root kt-page">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid  kt-error-v6" style="background-image: url({{ asset('cms/theme_metronic/media/error/bg6.jpg') }})">
            <div class="kt-error_container">
                <div class="kt-error_subtitle kt-font-light">
                    <h1>Oops...</h1>
                </div>
                <p class="kt-error_description kt-font-light">
                    Looks like something went wrong.<br>
                    We're working on it
                </p>
            </div>
        </div>
    </div>
@endsection
@push('styles')
    <link href="{{ asset('cms/theme_metronic/css/pages/error/error-6.css') }}" rel="stylesheet" type="text/css" />
@endpush
