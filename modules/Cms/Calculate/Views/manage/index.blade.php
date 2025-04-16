@extends('backend::layout')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__head kt-portlet__head--lg">
        <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
                <i class="fa fa-school"></i>
            </span>
            <h3 class="kt-portlet__head-title">
                {{ __('サービス管理') }}
            </h3>
        </div>
    </div>

    @include('calculate::manage.create')
</div>

@endsection
