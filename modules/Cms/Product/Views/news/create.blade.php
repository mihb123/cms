@extends('backend::layout')

@section('title', __('新規追加'))
@section('content')
<form class="kt-form" id="node-form" action="{{ route('product-news.store') }}" method="POST">
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
                        <label class="required">{{ __('product::messages.title_product_new') }}</label>
                        <textarea class="form-control" type="text" name="title" placeholder="@lang('タイトルを入力お願いします')">{{ old('title') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="required">{{ __('カテゴリ') }}</label>
                        <select class="form-control status" data-placeholder="{{ __('選択してください') }}" name="category_id">
                            <option disabled selected>{{ __('選択してください') }}</option>
                            @foreach($listCategory as $value => $category)
                                <option {{ old('category_id') == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="required">{{ __('product::messages.url') }}</label>
                        <input class="form-control" type="text" name="url" placeholder="@lang('タイトルを入力お願いします')" value="{{ old('url') }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title ">
                            {{ __('画像') }}
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="form-group">
                        <label class="d-block required">{{ __('product::messages.banner') }}</label>
                        @upload(['type' => 'image', 'vendor' => 'productNews', 'value' => old('avatar') ?? '' , 'thumb' => old('thumb-avatar') ?? '','name' => 'avatar'])
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
                            <a class="btn btn-dark" href="{{ route('product-news.index') }}">
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
    </div>
</form>
@include('product::common.news_block')
@endsection
