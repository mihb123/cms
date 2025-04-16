@extends('backend::layout')

@section('title',  __('新規追加'))
@section('content')

    <form class="kt-form " id="node-form" action="{{ route('creator.update', $creator['id']) }}" method="POST">
        @csrf
        @method('PUT')
        <input type='hidden' name='id' value="{{ $creator['id'] }}" />
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
                            <label for="code" class="required">{{ __('creator::messages.name') }}</label>
                            <input class="form-control" type="text" name="name"placeholder="@lang('ご入力をお願いします。')" value="{{ $creator['name'] }}">
                        </div>
                        <div class="form-group">
                            <label class="required">{{ __('creator::messages.gender') }}</label>
                            <select class="form-control status" data-placeholder="{{ __('選択してください') }}" name="gender">
                                <option selected>{{ __('選択してください') }}</option>
                                @foreach(getGender() as $value => $gender)
                                    <option {{ $creator['gender'] == $value ? 'selected' : '' }} value="{{ $value }}">{{ $gender }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="created" class="">{{ __('説明') }} :</label>
                            <textarea class="form-control" style="height:100px" name="summary"placeholder="{{ __('ご入力をお願いします。') }}" cols="30"rows="3">{{ $creator['summary'] }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="created" class="required">{{ __('creator::messages.status') }} :</label>
                            <select class="form-control status" data-placeholder="{{ __('creator::messages.status') }}"name="status">
                                @foreach(getListStatus() as $value => $name)
                                    <option
                                        {{ ($creator['status'] == $value) ? 'selected' : '' }} value="{{ $value }}">{{ $name }}</option>
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
                            <label for="created" class="">{{ __('creator::messages.banner') }}</label>
                            @upload(['type' => 'image', 'vendor' => 'creator', 'name' => 'avatar', 'thumb' => isset($creator['avatar']->path) ? thumb($creator['avatar']->path) : '' ])
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
                                <a class="btn btn-dark" href="{{ route('creator.index') }}">
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

