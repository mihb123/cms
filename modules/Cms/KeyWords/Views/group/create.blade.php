@extends('backend::layout')

@section('title',  __('key-words::messages.manage.tag-category-title'))
@section('content')
    <form class="kt-form" id="node-form" action="{{ route('key-words-group.store') }}" method="POST">
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
                            <label class="required">{{ __('タイトル') }}</label>
                            <input class="form-control" type="text" name="title_japan"placeholder="@lang('タイトルを入力お願いします。')" value="{{ old('title_japan') }}">
                        </div>
                        
                        <div class="form-group">
                            <label>{{ __('key-words::messages.key_words') }} </label>
                            <select class="form-control status" data-placeholder="{{ __('key-words::messages.key_words') }}" name="key_words[]" multiple>
                                <option disabled>{{ __('選択してください') }}</option>
                                @foreach($listKeyWords as $key => $item)
                                    <option {{ old('key_words') && in_array($item->id, old('key_words')) ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ __('key-words::messages.status') }} :</label>
                            <select class="form-control status" data-placeholder="{{ __('key-words::messages.status') }}" name="status">
                                <option selected disabled>{{ __('選択してください') }}</option>
                                @foreach(getListStatus() as $value => $name)
                                    <option
                                        {{ (old('status') == $value) ? 'selected' : '' }} value="{{ $value }}">{{ $name }}</option>
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
                                <a class="btn btn-dark" href="{{ route('key-words-group.index') }}">
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


