@extends('backend::layout')

@section('title', __('メーカー公式サイトの管理'))
@section('content')
    <form class="kt-form" id="node-form" action="{{ route('destination-guide.update', $data['id']) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type='hidden' name='id' value="{{ $data['id'] }}" />
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
                            <label class="required">誘導先</label>
                            <input class="form-control" type="text" name="title" value="{{ $data['title'] }}">
                        </div>
                        <div class="form-group">
                            <label class="required">URL</label>
                            <input class="form-control title-english" type="text" name="url"
                                value="{{ $data['url'] ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label class="">説明</label>
                            <textarea class="summernote" style="height: 30px; display: none;" name="description" placeholder="まとめ" cols="30"
                                rows="3">{!! $data['description'] ?? '' !!}</textarea>
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
                            <label class="d-block">{{ __('destination-guide::messages.banner') }}</label>
                            @upload(['type' => 'image', 'vendor' => 'destination-guide', 'name' => 'avatar', 'value' => isset($data['avatar']->id) ? $data['avatar']->id : '', 'thumb' => isset($data['avatar']->path) ? thumb($data['avatar']->path) : ''])
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
                                <a class="btn btn-dark" href="{{ route('destination-guide.index') }}">
                                    <i class="fa fa-arrow-left"></i>
                                    {{ __('destination-guide::messages.cancel') }}
                                </a>
                                <button id="node-save" type="submit" class="btn btn-primary" style="margin-right:5px;">
                                    <i class="fa fa-save"></i>
                                    {{ __('destination-guide::messages.save') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
