@extends('backend::layout')

@section('title', __('新規追加'))
@section('content')
<form class="kt-form row" id="node-form" action="{{ route('family-member.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col-md-9">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        {{ __('新規追加') }}
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="form-group">
                    <label class="required">{{ __('お名前') }}</label>
                    <input class="form-control" type="text" name="name" placeholder="@lang('例）佐藤　花子')" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label class="required">{{ __('family-member::messages.gender') }}</label>
                    <select class="form-control status" data-placeholder="{{ __('選択してください') }}" name="gender">
                        <option selected>{{ __('選択してください') }}</option>
                        @foreach(getGender() as $value => $gender)
                            <option {{ old('gender') == $value ? 'selected' : '' }} value="{{ $value }}">{{ $gender }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="required">{{ __('年齢')}}</label>
                    <input type="text" name="birthday" class="form-control" value="{{ old('birthday') }}" />
                </div>
                <div class="form-group">
                    <label>{{ __('family-member::messages.address') }}</label>
                    <input class="form-control" type="text" name="address" placeholder="@lang('こちらに住所を入力')" value="{{ old('address') }}">
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label>{{ __('family-member::messages.summary') }}</label>
                        <textarea class="form-control" name="summary" placeholder="{{ __('こちらに入力してください') }}" cols="30" rows="3">{{ old('summary') }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        {{ __('画像') }}
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="form-group">
                    <label class="d-block required">{{ __('family-member::messages.banner') }}</label>
                    @upload(['type' => 'image', 'vendor' => 'family-member', 'value' => old('avatar') ?? '' , 'thumb' => old('thumb-avatar') ?? '','name' => 'avatar'])
                </div>
            </div>
        </div>
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        {{ __('アクション') }}
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="form-group">
                    <div class="col-md-12 fvalue">
                        <a class="btn btn-dark" href="{{ route('family-member.index') }}">
                            <i class="fa fa-arrow-left"></i>
                            {{ __('posts::messages.cancel') }}
                        </a>
                        <button id="node-save" type="submit" class="btn btn-primary" style="margin-right:5px;">
                            <i class="fa fa-save"></i>
                            {{ __('posts::messages.save') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
