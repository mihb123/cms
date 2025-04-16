@extends('backend::layout')

@section('title', __('支えてくれるもの'))
@section('content')
<form class="kt-form" id="node-form" action="{{ route('product-group-category.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-9">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            {{ __('支えてくれるもの') }}
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="form-group">
                        <label class="required">{{ __('product::messages.title') }}</label>
                        <input class="form-control" type="text" name="title" placeholder="@lang('入力をお願いします')" value="{{ old('title') }}" >
                    </div>
                    <div class="form-group">
                        <label class="required">{{ __('product::messages.category') }}</label>
                        <select multiple class="form-control status" data-placeholder="{{ __('選択してください') }}" name="category_id[]">
                            <option disabled>{{ __('選択してください') }}</option>
                            @foreach($listCategory as $value => $category)
                                <option {{ old('category_id') && in_array($category['id'],old('category_id')) ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="required">{{ __('product::messages.status') }}</label>
                        <select class="form-control status" data-placeholder="{{ __('product::messages.status') }}" name="status">
                            <option disabled selected>{{ __('選択してください') }}</option>
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
                            {{ __('アクション') }}
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="form-group">
                        <div class="col-md-12 fvalue">
                            <a class="btn btn-dark" href="{{ route('product-group-category.index') }}">
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
