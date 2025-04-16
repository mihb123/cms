@extends('backend::layout')

@section('content')
    <form class="kt-form row" id="node-form" action="{{ route('company-service.store') }}" method="POST">
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
                        <label for="code" class="required">{{ __('product::messages.title') }}</label>
                        <input class="form-control" type="text" name="title" placeholder="@lang('タイトルを入力お願いします。')" value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label class="required">{{ __('product::messages.status') }}</label>
                        <select class="form-control status" data-placeholder="{{ __('product::messages.status') }}" name="status">
                            <option selected>{{ __('選択してください') }}</option>
                            @foreach(getListStatus() as $value => $name)
                                <option
                                    {{ (old('status') == $value) ? 'selected' : '' }} value="{{ $value }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>{{ __('product::messages.borders') }}</label>
                        <select class="form-control status" data-placeholder="{{ __('product::messages.borders') }}" name="borders">
                            <option selected disabled>{{ __('選択してください') }}</option>
                            @foreach(listBorder() as $value => $name)
                                <option {{ (old('borders') == $value) ? 'selected' : '' }} value="{{ $value }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>{{ __('色を選択する') }}</label>
                        <input class="form-control color" type="color" name="color" value="{{ old('color') }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
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
                        <a class="btn btn-dark" href="{{ route('company-service.index') }}">
                                <i class="fa fa-arrow-left"></i>
                                {{ __('product::messages.cancel') }}
                            </a>
                            <button id="node-save" type="submit" class="btn btn-primary" style="margin-right:5px;">
                                <i class="fa fa-save"></i>
                                {{ __('product::messages.save') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

