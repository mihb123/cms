@extends('backend::layout')

@section('title', __('メーカー公式サイトの管理'))
@section('content')
<form class="kt-form" id="node-form" action="{{ route('factory.store') }}" method="POST">
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
                        <label class="required">{{ __('product::messages.name_factory') }}</label>
                        <input class="form-control" type="text" name="title" placeholder="@lang('タイトルを入力お願いします')" value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label class="required">{{ __('product::messages.summary') }}</label>
                        <textarea class="form-control" type="text" name="description" placeholder="@lang('記述を入力お願いします。')">{{ old('description') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="created" class="required">{{ __('product::messages.status') }}</label>
                        <select class="form-control status" data-placeholder="{{ __('product::messages.status') }}" name="status">
                            <option selected>{{ __('選択してください') }}</option>
                            @foreach(getListStatus() as $value => $name)
                                <option {{ (old('status') == $value) ? 'selected' : '' }} value="{{ $value }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @if(old('content'))
                        @foreach(old('content') as $key => $content)
                            <div class="block mt-2 ui-menu menu{{ $key }}">
                                <div class="card card-info">
                                    <div class="card-header">
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
                        <div class="text-right mt-2">
                            <a href="#" class="add-new-link" data-menu="1" data-level="1">説明を追加</a>
                        </div>
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
                        @upload(['type' => 'image', 'vendor' => 'factory', 'value' => old('avatar') ?? '' , 'thumb' => old('thumb-avatar') ?? '','name' => 'avatar'])
                    </div>
                    <div class="form-group">
                        <label>URL</label>
                        <input class="form-control title-english" type="text" name="url_image" value="{{ old('url_image') }}">
                    </div>
                    <div class="form-group">
                        <label>幅</label>
                        <input class="form-control title-english" type="text" name="width_image" value="{{ old('width_image') }}">
                    </div>
                    <div class="form-group">
                        <label>高さ</label>
                        <input class="form-control title-english" type="text" name="height_image" value="{{ old('height_image') }}">
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
                            <a class="btn btn-dark" href="{{ route('factory.index') }}">
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
@include('product::common.news_block_factory')
@endsection
