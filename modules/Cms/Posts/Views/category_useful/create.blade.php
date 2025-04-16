@extends('backend::layout')

@section('title', __('投稿カテゴリー'))
@section('content')
<form class="kt-form" id="node-form" action="{{ route('posts-useful-category.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-9">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            {{ __('投稿カテゴリー') }}
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="form-group">
                        <label class="required">{{ __('posts::messages.title') }}</label>
                        <input class="form-control" type="text" name="title" placeholder="@lang('posts::messages.title')" value="{{ old('title') }}" >
                    </div>
                    <div class="form-group">
                        <label class="required">{{ __('記述') }}</label>
                        <input class="form-control" type="text" name="description" placeholder="@lang('記述を入力お願いします。')" value="{{ old('description') }}" >
                    </div>
                    <div class="form-group">
                        <label class="required">{{ __('posts::messages.status') }} :</label>
                        <select class="form-control status" data-placeholder="{{ __('posts::messages.status') }}" name="status">
                            <option selected>{{ __('選択してください') }}</option>
                            @foreach(getListStatus() as $value => $name)
                                <option {{ (old('status') == $value) ? 'selected' : '' }} value="{{ $value }}">{{ $name }}</option>
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
                        <label class="d-block required">{{ __('posts::messages.banner') }}</label>
                        @upload(['type' => 'image', 'vendor' => 'postsUsefulCategory', 'value' => old('avatar') ?? '' , 'thumb' => old('thumb-avatar') ?? '','name' => 'avatar'])
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
                            <a class="btn btn-dark" href="{{ route('posts-useful-category.index') }}">
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
    </div>
</form>
@endsection
