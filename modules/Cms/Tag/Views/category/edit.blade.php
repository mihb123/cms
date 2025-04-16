@extends('backend::layout')

@section('title', __('tag::messages.manage.tag-category-title'))
@section('content')
    <form class="kt-form" id="node-form" action="{{ route('tag-group-category.update', $data['id']) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type='hidden' name='id' value="{{ $data['id'] }}">
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
                            <label class="required">{{ __('tag::messages.title') }}</label>
                            {{-- <input class="form-control" type="text" name="title"placeholder="@lang('タイトルを入力お願いします。')" value="{{ $data['title'] }}"> --}}
                            <textarea class="form-control summernote" name="title" placeholder="@lang('入力をお願いします')" cols="30" rows="3">{{ $data['title'] }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="code" class="required">{{ __('記述') }}</label>
                            <input class="form-control" type="text" name="description" placeholder="@lang('記述を入力お願いします。')"
                                value="{{ $data['description'] ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label>親タグ</label>
                            <select class="form-control status" data-placeholder="選択ください。" name="group_id[]"
                                multiple="multiple">
                                @foreach ($listGroup as $key => $group)
                                    <option {{ in_array($group['id'], $groupIds) ? 'selected' : '' }}
                                        value="{{ $group['id'] }}">{{ $group['title_japan'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ __('tag::messages.status') }}</label>
                            <select class="form-control status" data-placeholder="{{ __('tag::messages.status') }}"
                                name="status">
                                <option selected>{{ __('選択してください') }}</option>
                                @foreach (getListStatus() as $value => $name)
                                    <option {{ $data->status == $value ? 'selected' : '' }} value="{{ $value }}">
                                        {{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>{{ __('バナーリンク') }}</label>
                            <input class="form-control" type="text" name="url" placeholder="@lang('入力をお願いします。')"
                                value="{{ $data['url'] }}">
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
                            @upload(['type' => 'image', 'vendor' => 'tagCategory', 'name' => 'avatar', 'value' => isset($data['avatar']->id) ? $data['avatar']->id : '', 'thumb' => isset($data['avatar']->path) ? thumb($data['avatar']->path) : ''])
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
                                <a class="btn btn-dark" href="{{ route('tag-group-category.index') }}">
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
