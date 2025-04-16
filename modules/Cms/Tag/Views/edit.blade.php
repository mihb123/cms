@extends('backend::layout')

@section('title',  __('tag::messages.manage.tag-title'))
@section('description', 'tag.create')
@section('content:class', 'no-padding')

@section('content')

    <form class="kt-form" id="node-form" action="{{ route('tag.update', $tag['id']) }}" method="POST">
        @csrf
        @method('PUT')
        <input type='hidden' name='id' value="{{ $tag['id'] }}" />
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
                            <label for="code" class="required">{{ __('tag::messages.title') }}</label>
                            <textarea class="form-control" type="text" name="title" placeholder="@lang('tag::messages.title')">{{ $tag['title'] }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ __('tag::messages.title_english') }}</label>
                            <input class="form-control" type="text" name="title_english" placeholder="@lang('タイトルを入力お願いします')" value="{{ $tag['title_english'] }}" >
                        </div>
                        <div class="form-group">
                            <label>親タグ</label>
                            @if(isset($tag->tagGroup->group_id) && $tag->tagGroup->group_id)
                                @php
                                    $group_id = $tag->tagGroup->group_id;
                                @endphp
                            @else
                                @php
                                    $group_id = '';
                                @endphp
                            @endif
                            <select class="form-control status" data-placeholder="タググループ" name="group_id">
                                <option selected>{{ __('選択してください。') }}</option>
                                @foreach($listGroup as $key => $group)
                                    <option {{ ($group_id == $group['id']) ? 'selected' : '' }} value="{{ $group['id'] }}">{{ $group['title_japan'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ __('tag::messages.status') }} :</label>
                            <select class="form-control status" data-placeholder="{{ __('tag::messages.status') }}" name="status">
                                <option selected>{{ __('選択してください') }}</option>
                                @foreach(getListStatus() as $value => $name)
                                    <option {{ ($tag['status'] == $value) ? 'selected' : '' }} value="{{ $value }}">{{ $name }}</option>
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
                            <label>{{ __('tag::messages.banner') }}</label>
                            @upload(['type' => 'image', 'vendor' => 'tag', 'name' => 'avatar', 'value' => isset($tag['avatar']->id) ? $tag['avatar']->id : '' , 'thumb' => isset($tag['avatar']->path) ? thumb($tag['avatar']->path) : '' ])
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
                                <a class="btn btn-dark" href="{{ route('tag.index') }}">
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

