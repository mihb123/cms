@extends('backend::layout')

@section('title',  __('sitemap::messages.manage.sitemap-title'))
@section('description', 'sitemap.create')
@section('content:class', 'no-padding')

@section('content')

    <form class="kt-form" id="node-form" action="{{ route('sitemap.update', $siteMap['id']) }}" method="POST">
        @csrf
        @method('PUT')
        <input type='hidden' name='id' value="{{ $siteMap['id'] }}" />
        <div class="row">
            <div class="col-md-9">
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                {{ __('編集') }}
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="form-group">
                            <label for="code" class="required">{{ __('sitemap::messages.title') }}</label>
                            <input class="form-control" type="text" name="title"
                                   placeholder="@lang('タイトルを入力お願いします。')" value="{{ $siteMap['title'] }}"
                                   >
                        </div>
                        <div class="form-group">
                            <label for="created" class="required">{{ __('sitemap::messages.status') }} :</label>
                            <select class="form-control status" data-placeholder="{{ __('sitemap::messages.status') }}" name="status">
                                <option selected>{{ __('選択してください') }}</option>
                                @foreach(getListStatus() as $value => $name)
                                    <option {{ ($siteMap['status'] == $value) ? 'selected' : '' }} value="{{ $value }}">{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if($siteMap['content'])
                            @foreach($siteMap['content'] as $key => $content)
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
                                <a class="btn btn-dark" href="{{ route('sitemap.index') }}">
                                    <i class="fa fa-arrow-left"></i>
                                    {{ __('sitemap::messages.cancel') }}
                                </a>
                                <button id="node-save" type="submit" class="btn btn-primary" style="margin-right:5px;">
                                    <i class="fa fa-save"></i>
                                    {{ __('sitemap::messages.save') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @include('sitemap::common.news_block')
@endsection

