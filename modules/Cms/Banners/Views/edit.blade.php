@extends('backend::layout')

@section('title', __('メーカー公式サイトの管理'))
@section('content')
<form class="kt-form" id="node-form" action="{{ route('banners.update', $data['id']) }}" method="POST" enctype="multipart/form-data">
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
                        <label>URL</label>
                        <input class="form-control title-english" type="text" name="url" value="{{ $data['url'] ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label class="required">{{ __('banners::messages.status') }}</label>
                        <select class="form-control status" data-placeholder="{{ __('banners::messages.status') }}" name="status">
                            <option selected>{{ __('選択してください') }}</option>
                            @foreach(getListStatus() as $value => $name)
                                <option {{ $data['status'] == $value ? 'selected' : '' }} value="{{ $value }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="required">{{ __('banners::messages.position') }}</label>
                        <select class="form-control status" data-placeholder="{{ __('banners::messages.position') }}" name="position">
                            <option selected value="">{{ __('選択してください') }}</option>
                            @foreach(getListPositionBanner() as $key => $position)
                                <option {{ $data['position'] == $key ? 'selected' : '' }} value="{{ $key }}">{{ $position }}</option>
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
                        <label class="d-block required">{{ __('banners::messages.banner') }}</label>
                        @upload(['type' => 'image', 'vendor' => 'banners', 'name' => 'avatar', 'value' => isset($data['avatar']->id) ? $data['avatar']->id : '' , 'thumb' => isset($data['avatar']->path) ? thumb($data['avatar']->path) : '' ])
                    </div>
                    
                    <div class="form-group">
                        <label>幅</label>
                        <input class="form-control" type="text" name="width_image" value="{{ $data['width_image'] ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label>高さ</label>
                        <input class="form-control" type="text" name="height_image" value="{{ $data['height_image'] ?? '' }}">
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
                            <a class="btn btn-dark" href="{{ route('banners.index') }}">
                                <i class="fa fa-arrow-left"></i>
                                {{ __('banners::messages.cancel') }}
                            </a>
                            <button id="node-save" type="submit" class="btn btn-primary" style="margin-right:5px;">
                                <i class="fa fa-save"></i>
                                {{ __('banners::messages.save') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
