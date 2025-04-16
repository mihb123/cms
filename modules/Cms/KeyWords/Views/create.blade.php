@extends('backend::layout')

@section('title', __('メーカー公式サイトの管理'))
@section('content')
    <form class="kt-form" id="node-form" action="{{ route('key-words.store') }}" method="POST">
        @csrf
        <div class="row">
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
                            <label class="required">{{ __('key-words::messages.title') }}</label>
                            <input class="form-control" type="text" name="title_admin" placeholder="@lang('タイトルを入力お願いします')"
                                value="{{ old('title_admin') }}">
                        </div>
                        <div class="form-group">
                            <label class="required">{{ __('key-words::messages.title_user') }}</label>
                            <input class="form-control" type="text" name="title_user" placeholder="@lang('タイトルを入力お願いします')"
                                value="{{ old('title_user') }}">
                        </div>
                        <div class="form-group">
                            <label for="created" class="required">{{ __('key-words::messages.status') }}</label>
                            <select class="form-control status" data-placeholder="{{ __('key-words::messages.status') }}"
                                name="status">
                                <option selected>{{ __('選択してください') }}</option>
                                @foreach (getListStatus() as $value => $name)
                                    <option {{ old('status') == $value ? 'selected' : '' }} value="{{ $value }}">
                                        {{ $name }}</option>
                                @endforeach
                            </select>
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
                                <a class="btn btn-dark" href="{{ route('key-words.index') }}">
                                    <i class="fa fa-arrow-left"></i>
                                    {{ __('key-words::messages.cancel') }}
                                </a>
                                <button id="node-save" type="submit" class="btn btn-primary" style="margin-right:5px;">
                                    <i class="fa fa-save"></i>
                                    {{ __('key-words::messages.save') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
