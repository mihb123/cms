@extends('backend::layout')

@section('title', __('カテゴリ'))
@section('content')
<form class="kt-form" id="node-form" action="{{ route('product-category-news.update', $data['id']) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type='hidden' name='id' value="{{ $data['id'] }}">
    <div class="row">
        <div class="col-md-9">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            {{ __('カテゴリ') }}
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="form-group">
                        <label class="required">{{ __('product::messages.title') }}</label>
                        {{-- <input class="form-control" type="text" name="title" placeholder="@lang('入力をお願いします')" value="{{ $data['title'] }}"> --}}
                        <textarea class="form-control summernote" name="title" placeholder="@lang('入力をお願いします')" cols="30" rows="3">{{ $data['title'] }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>{{ __('記述') }}</label>
                        <input class="form-control" type="text" name="description" placeholder="@lang('記述を入力お願いします。')" value="{{ $data['description'] ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label class="required">{{ __('product::messages.status') }} :</label>
                        <select class="form-control status" data-placeholder="{{ __('product::messages.status') }}" name="status">
                            <option selected>{{ __('選択してください') }}</option>
                            @foreach(getListStatus() as $value => $name)
                            <option {{ ($data->status == $value) ? 'selected' : '' }} value="{{ $value }}">{{ $name }}</option>
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
                            {{ __('画像') }}
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="form-group">
                        <label class="d-block required">{{ __('product::messages.banner') }}</label>
                        @upload(['type' => 'image', 'vendor' => 'productCategoryNews', 'name' => 'avatar', 'value' => isset($data['avatar']->id) ? $data['avatar']->id : '' , 'thumb' => isset($data['avatar']->path) ? thumb($data['avatar']->path) : '' ])
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
                            <a class="btn btn-dark" href="{{ route('product-category-news.index') }}">
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
@endsection