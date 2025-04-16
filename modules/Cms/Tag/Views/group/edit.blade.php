@extends('backend::layout')

@section('title',  __('tag::messages.manage.tag-category-title'))
@section('content')
    <form class="kt-form" id="node-form" action="{{  route('tag-group.update', $group['id']) }}" method="POST">
        @csrf
        @method('PUT')
        <input type='hidden' name='id' value="{{ $group['id'] }}">
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
                            <label class="required">{{ __('tag::messages.title_japan') }}</label>
                            <input class="form-control" type="text" name="title_japan" placeholder="@lang('タイトル を入力おねがいします。')" value="{{ $group['title_japan'] }}">
                        </div>
                        <div class="form-group">
                            <label class="required">{{ __('tag::messages.title_english') }}</label>
                            <input class="form-control" type="text" name="title_english" placeholder="@lang('タイトル を入力おねがいします。')" value="{{ $group['title_english'] }}">
                        </div>
                        <div class="form-group">
                            <label class="required">{{ __('tag::messages.status') }} :</label>
                            <select class="form-control status" data-placeholder="{{ __('tag::messages.status') }}" name="status">
                                <option selected>{{ __('選択してください') }}</option>
                                @foreach(getListStatus() as $value => $name)
                                    <option {{ ($group['status'] == $value) ? 'selected' : '' }} value="{{ $value }}">{{ $name }}</option>
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
                                <a class="btn btn-dark" href="{{ route('tag-group.index') }}">
                                    <i class="fa fa-arrow-left"></i>
                                    {{ __('tag::messages.cancel') }}
                                </a>
                                <button id="node-save" type="submit" class="btn btn-primary" style="margin-right:5px;">
                                    <i class="fa fa-save"></i>
                                    {{ __('tag::messages.save') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection


