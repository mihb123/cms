@extends('backend::layout')

@section('title', 'Admin edit')
@section('description', 'Admin edit')
@section('content:class', 'no-padding')

@section('content')
    <form class="kt-form row" id="node-form" action="{{ route('admin.update', $node['id']) }}" method="POST" >
    @csrf
    @method('PUT')
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
                    <input class="form-control" type="text" name="name" placeholder="{{ __('backend::messages.name') }}" value="{{ $node->name }}">
                </div>
                <div class="form-group">
                    <label for="created" class="">{{ __('backend::messages.avatar') }} :</label>
                    @upload(['type' => 'image', 'vendor' => 'avatar', 'name' => 'avatar', 'thumb' => isset($node['avatar']->path) ? thumb($node['avatar']->path) : '' ])
                </div>

                <div class="form-group">
                    <label for="about" class="required">{{ __('backend::messages.phone') }} :</label>
                    <input class="form-control" type="text" name="mobile" placeholder="{{ __('backend::messages.phone') }}" value="{{ $node->mobile }}">
                </div>
                <div class="form-group">
                    <label for="city">{{ __('backend::messages.city') }}:</label>
                    <input class="form-control" type="text" name="location[city]" placeholder="{{ __('backend::messages.city') }}" value="{{ $node['location'] ? $node['location']->city : '' }}">
                </div>
                <div class="form-group">
                    <label for="address" >{{ __('backend::messages.address') }}:</label>
                    <input class="form-control" type="text" name="location[address]" placeholder="{{ __('backend::messages.address') }}" value="{{ $node['location'] ? $node['location']->address : '' }}">
                </div>
                <div class="form-group">
                    <label for="about">{{ __('backend::messages.about') }}:</label>
                    <textarea class="form-control" style="height:100px" name="about" placeholder="{{ __('backend::messages.about') }}" data-rule-maxlength="1024" cols="30" rows="3">{{ $node->about }}</textarea>
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
                    <input class="form-control" type="email" name="email" placeholder="{{ __('backend::messages.email') }}" value="{{ $node->email }}">
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
                    <select class="form-control" data-placeholder="{{ __('backend::messages.roles') }}" rel="select2" name="roles[]" multiple="multiple">
                        @foreach($roles as $role)
                            @if($node->has($role->roles))
                                <option value="{{ $role->roles }}" selected>{{ $role->name }}</option>
                            @else
                                <option value="{{ $role->roles }}">{{ $role->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="status" class="required">{{ __('backend::messages.status') }}</label>
                    <select class="form-control" data-placeholder="{{ __('backend::messages.status') }}" rel="select2" name="status">
                        @foreach($collection['status'] as $value => $name)
                            @if($node->status == $value))
                            <option value="{{ $value }}" selected>{{ $name }}</option>
                            @else
                                <option value="{{ $value }}">{{ $name }}</option>
                            @endif
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

