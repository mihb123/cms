@extends('backend::layout')

@section('title', 'Admin create')
@section('description', 'Admin create')
@section('content:class', 'no-padding')

@section('content')

    <form class="kt-form row" id="node-form" action="{{ route('admin.store') }}" method="POST">
        @csrf
        <div class="col-lg-6">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            {{ __($_module . '::messages.general') }}
                        </h3>
                    </div>
                </div>

                <div class="kt-portlet__body">
                    <div class="form-group">
                        <label for="code" class="required">{{ __('backend::messages.name') }}</label>
                        <input class="form-control" type="text" name="name" placeholder="{{ __('backend::messages.name') }}" value="{{ old('name') }}">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="created" class="">{{ __('backend::messages.avatar') }} :</label>
                        @upload(['type' => 'image', 'vendor' => 'avatar', 'name' => 'avatar'])
                    </div>
                    <div class="form-group">
                        <label for="about" class="required">{{ __('backend::messages.phone') }} :</label>
                        <input class="form-control" type="text" name="mobile" placeholder="{{ __('backend::messages.phone') }}" value="{{ old('mobile') }}" >
                        @if ($errors->has('mobile'))
                            <span class="text-danger">{{ $errors->first('mobile') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="city">{{ __('backend::messages.city') }}:</label>
                        <input class="form-control" type="text" name="location[city]" placeholder="{{ __('backend::messages.city') }}" value="{{ old('location[city]') }}">
                    </div>
                    <div class="form-group">
                        <label for="address" >{{ __('backend::messages.address') }}:</label>
                        <input class="form-control" type="text" name="location[address]" placeholder="{{ __('backend::messages.address') }}" value="{{ old('location[address]') }}">
                    </div>
                    <div class="form-group">
                        <label for="about">{{ __('backend::messages.about') }}:</label>
                        <textarea class="form-control" style="height:100px" name="about" placeholder="{{ __('backend::messages.about') }}" data-rule-maxlength="1024" cols="30" rows="3">{{ old('about') }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            {{ __('backend::messages.info_login') }}
                        </h3>
                    </div>
                </div>

                <div class="kt-portlet__body">
                    <div class="form-group">
                        <label for="code" class="required">{{ __('backend::messages.email') }}</label>
                        <input class="form-control" type="email" name="email" placeholder="{{ __('backend::messages.email') }}" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="code" class="required">{{ __('backend::messages.password') }}</label>
                        <input class="form-control" placeholder="{{ __('backend::messages.password') }}" name="password" type="password" value="{{ old('password') }}">
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="code" class="required">{{ __('backend::messages.password_confirm') }}</label>
                        <input class="form-control" placeholder="{{ __('backend::messages.password_confirm') }}" name="password_confirmation" type="password" value="{{ old('password_confirmation') }}">
                        @if ($errors->has('password_confirmation'))
                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            {{ __('backend::messages.roles') }}
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="form-group">
                        <label for="code" class="required">{{ __('backend::messages.permission') }}</label>
                        <select class="form-control kt-select2" data-placeholder="{{ __('backend::messages.permission') }}" id="kt_select2_3" name="roles[]" multiple="multiple">
                            @foreach($roles as $role)
                                <option value="{{ $role->roles }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('roles'))
                            <span class="text-danger">{{ $errors->first('roles') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="status" class="required">{{ __('backend::messages.status') }}</label>
                        <select class="form-control" data-placeholder="{{ __('backend::messages.status') }}" rel="select2" name="status">
                            <option value="" selected>{{ __('選択してください') }}</option> 
                            @foreach($collection['status'] as $value => $name)
                                <option <?php if(old('status') == $value) { echo 'selected'; } ?> value="{{ $value }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="box box-solid box-label">
                <div class="box-body">
                    <div class="form-group">
                        <div class="col-md-12 fvalue">
                            <button id="node-save" type="submit" class="btn btn-primary" style="margin-right:5px;">
                                <i class="fa fa-save"></i>
                                {{ __($_module . '::messages.save') }}
                            </button>
                            <a class="btn btn-default" href="{{ route('admin.index') }}">
                                <i class="fa fa-arrow-left"></i>
                                {{ __($_module . '::messages.cancel') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
