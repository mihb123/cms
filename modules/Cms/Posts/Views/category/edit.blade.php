@extends('backend::layout')

@section('title', __('投稿カテゴリー'))
@section('content')
    <form class="kt-form" id="node-form" action="{{ route('posts-category.update', $data['id']) }}" method="POST"
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
                                {{ __('投稿カテゴリー') }}
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="form-group">
                            <label class="required">{{ __('posts::messages.title') }}（原則１５文字以内）</label>
                            {{-- <input class="form-control" type="text" name="title" placeholder="@lang('posts::messages.title')" value="{{ $data['title'] }}"> --}}
                            <textarea class="form-control summernote" name="title" placeholder="@lang('入力をお願いします')" cols="30" rows="3">{{ $data['title'] }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ __('記述') }}</label>
                            <input class="form-control" type="text" name="description" placeholder="@lang('記述を入力お願いします。')"
                                value="{{ $data['description'] ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label class="required">親タグ</label>
                            <select class="form-control  status" data-placeholder="選択ください。" name="group_id[]"
                                multiple="multiple">
                                @foreach ($listGroup as $key => $group)
                                    <option {{ in_array($group['id'], $groupIds) ? 'selected' : '' }}
                                        value="{{ $group['id'] }}">{{ $group['title_japan'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ __('posts::messages.status') }} :</label>
                            <select class="form-control status" data-placeholder="{{ __('posts::messages.status') }}"
                                name="status">
                                <option value="" selected>{{ __('選択してください') }}</option>
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
                                {{ __('バナー（PC用）') }}
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="form-group">
                            <label class="d-block">{{ __('posts::messages.banner') }}</label>
                            @upload(['type' => 'image', 'vendor' => 'postsCategory', 'name' => 'avatar', 'value' => isset($data['avatar']->id) ? $data['avatar']->id : '', 'thumb' => isset($data['avatar']->path) ? thumb($data['avatar']->path) : ''])
                        </div>
                    </div>
                </div>
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                {{ __('バナー（SP用）') }}
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="form-group">
                            <label class="d-block">{{ __('posts::messages.banner') }}</label>
                            @upload(['type' => 'image', 'vendor' => 'postsCategorySp', 'name' => 'avatar_sp', 'value' => isset($data['avatar_sp']->id) ? $data['avatar_sp']->id : '', 'thumb' => isset($data['avatar_sp']->path) ? thumb($data['avatar_sp']->path) : ''])
                        </div>
                    </div>
                </div>
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                {{ __('posts::messages.icon') }}
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="form-group">
                            <label class="d-block">{{ __('posts::messages.icon') }}</label>
                            @upload(['type' => 'image', 'vendor' => 'postsCategory', 'name' => 'icon', 'value' => isset($data['icon']->id) ? $data['icon']->id : '', 'thumb' => isset($data['icon']->path) ? thumb($data['icon']->path) : ''])
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
                                <a class="btn btn-dark" href="{{ route('posts-category.index') }}">
                                    <i class="fa fa-arrow-left"></i>
                                    {{ __('posts::messages.cancel') }}
                                </a>
                                <button id="node-save" type="submit" class="btn btn-primary" style="margin-right:5px;">
                                    <i class="fa fa-save"></i>
                                    {{ __('posts::messages.save') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
