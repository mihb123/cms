@extends('backend::layout')

@section('title', __('取扱い店'))
@section('content')
<form class="kt-form" id="node-form" action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-9">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            {{ __('取扱い店') }}
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-2">
                                <label class="required">{{ __('product::messages.name_company') }}</label>
                            </div>
                            <div class="col-10">
                                <input class="form-control" type="text" name="name" placeholder="@lang('入力をお願います')" value="{{ old('name') }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-2">
                                <label>{{ __('product::messages.summary') }}</label>
                            </div>
                            <div class="col-10">
                                <textarea class="form-control" style="height: 300px" type="text" name="summary" placeholder="@lang('記述を入力お願いします。')">{{ old('summary') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-2">
                                <label class="required">{{ __('product::messages.zip') }}</label>
                            </div>
                            <div class="col-10">
                                <div class="input-group w-25">
                                    <input class="form-control" id="postcode" type="text" name="zip" placeholder="@lang('郵便番号を入力')" value="{{ old('zip') }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button" id="btn-zip">検索</button>
                                    </div>
                                </div>
                                <input class="form-control mt-2" id="province" type="text" name="province" readonly value="{{ old('province') }}">
                                <input class="form-control mt-2" name="city" value="{{ old('city') }}" readonly id="city">
                                <input class="form-control mt-2" name="address" value="{{ old('address') }}" id="address">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-2">
                                <label class="required">{{ __('product::messages.category') }}</label>
                            </div>
                            <div class="col-10">
                                <select multiple class="form-control status" data-placeholder="{{ __('選択してください') }}" name="category_id[]">
                                    <option disabled>{{ __('選択してください') }}</option>
                                    @foreach($listCategory as $value => $category)
                                    <option {{ old('category_id') && in_array($category['id'], old('category_id')) ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-2">
                                <label class="required">{{ __('product::messages.service') }}</label>
                            </div>
                            <div class="col-10">
                                <select multiple class="form-control status" data-placeholder="{{ __('product::messages.service') }}" name="service_id[]">
                                    <option disabled>{{ __('選択してください') }}</option>
                                    @foreach($listService as $value => $service)
                                    <option {{ old('service_id') && in_array($service['id'], old('service_id')) ? 'selected' : '' }} value="{{ $service->id }}">{{ $service->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-2">
                                <label>{{ __('product::messages.url_home_page') }}</label>
                            </div>
                            <div class="col-10">
                                <input class="form-control" type="text" name="url_home_page" placeholder="@lang('product::messages.url_home_page')" value="{{ old('url_home_page') }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-2">
                                <label>{{ __('product::messages.url_info') }}</label>
                            </div>
                            <div class="col-10">
                                <input class="form-control" type="text" name="url_info" placeholder="@lang('product::messages.url_info')" value="{{ old('url_info') }}">
                            </div>
                        </div>
                    </div>
                    <?php /*
                    @if(old('content'))
                            @foreach(old('content') as $key => $content)
                                <div class="block mt-2 ui-menu menu{{ $key }}">
                                    <div class="card card-info">
                                        <div class="card-header bg-success">
                                            <h3 class="card-title">ブロック</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-tool btn-remove-block">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body" style="display: block;border: 1px solid #dedede">
                                            <div class="block-content">
                                                <div class="form-group">
                                                    <label>タイトル</label>
                                                    <input class="form-control title-japan" type="text" name="content[{{$key}}][title]" value="{{ $content['title'] ?? '' }}">
                                                </div>
                                                <div class="form-group">
                                                    <label>タイトル英語</label>
                                                    <input class="form-control title-english" type="text" name="content[{{$key}}][url]" value="{{ $content['url'] ?? '' }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    <div class="form-group">
                        <div class="text-right mt-3">
                            <a href="#" class="add-new-link" data-menu="0" data-level="0">新しいコンテンツを追加する</a>
                        </div>
                    </div>
                    */?>
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
                            <a class="btn btn-dark" href="{{ route('company.index') }}">
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
<?php /*
@include('product::common.news_block_company')
*/?>
@endsection
