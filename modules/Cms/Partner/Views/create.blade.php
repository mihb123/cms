@extends('backend::layout')

@section('title',  __('partner::messages.manage.title'))
@section('description', 'partner.create')
@section('content:class', 'no-padding')

@section('content')
    <form class="kt-form" id="node-form" action="{{ route('partner.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                {{ __('partner::messages.general') }}
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="form-group">
                            <label for="code" class="required">{{ __('partner::messages.url') }}</label>
                            <input class="form-control" type="text" name="url" placeholder="@lang('Url を入力おねがいします。')" value="{{ old('url') }}">
                        </div>
                        <div class="form-group">
                            <label for="created" class="required">{{ __('partner::messages.status') }}</label>
                            <select class="form-control status" data-placeholder="{{ __('partner::messages.status') }}" name="status">
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
                            <label for="created" class="required">{{ __('partner::messages.banner') }}</label>
                            @upload(['type' => 'image', 'vendor' => 'partner', 'name' => 'avatar'])
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
                                <a class="btn btn-dark" href="{{ route('partner.index') }}">
                                    <i class="fa fa-arrow-left"></i>
                                    {{ __('creator::messages.cancel') }}
                                </a>
                                <button id="node-save" type="submit" class="btn btn-primary" style="margin-right:5px;">
                                    <i class="fa fa-save"></i>
                                    {{ __('creator::messages.save') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

