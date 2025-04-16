@extends('backend::layout')

@section('title',  __('新規追加'))
@section('content')
    <form class="kt-form" id="node-form" action="{{ route('posts.store') }}" method="POST">
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
                            <label class="required">{{ __('posts::messages.title') }}</label>
                            <input class="form-control" type="text" name="title" placeholder="@lang('タイトルを入力お願いします')" value="{{ old('title') }}" >
                        </div>
                        <div class="form-group">
                            <label class="required">{{ __('posts::messages.title_english') }}</label>
                            <input class="form-control" type="text" name="title_english" placeholder="@lang('タイトルを入力お願いします')" value="{{ old('title_english') }}" >
                        </div>
                        <div class="form-group">
                            <label>{{ __('posts::messages.article_type') }}</label>
                            <input class="form-control" type="text" name="article_type" placeholder="@lang('入力をお願いします')" value="{{ old('article_type') }}" >
                        </div>
                        <div class="form-group">
                            <label class="required">著者</label>
                            <select class="form-control status" data-placeholder="クリエイター" name="creator_id">
                                <option selected>{{ __('選択してください') }}</option>
                                @foreach($listCreator as $key => $creator)
                                    <option {{ (old('creator_id') == $creator['id']) ? 'selected' : '' }} value="{{ $creator['id'] }}">{{ $creator['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ __('親タグ') }}</label>
                            <select class="form-control status" data-placeholder="{{ __('親タグ') }}" name="group_id[]" multiple>
                                <option disabled>{{ __('選択してください') }}</option>
                                @foreach($listGroup as $value => $group)
                                    <option {{ !empty(old('group_id')) && in_array($group['id'], old('group_id')) ? 'selected' : '' }} value="{{ $group->id }}">{{ $group->title_japan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>{{ __('posts::messages.post_type') }}</label>
                            <select class="form-control status" data-placeholder="{{ __('posts::messages.post_type') }}" name="post_type_id">
                                <option selected>{{ __('選択してください') }}</option>
                                @foreach($listPostsType as $value => $postType)
                                    <option {{ (old('post_type_id') == $postType->id) ? 'selected' : '' }} value="{{ $postType->id }}">{{ $postType->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ __('posts::messages.status') }}</label>
                            <select class="form-control status" data-placeholder="{{ __('posts::messages.status') }}" name="status">
                                <option selected>{{ __('選択してください') }}</option>
                                @foreach(getListStatus() as $value => $name)
                                    <option
                                        {{ (old('status') == $value) ? 'selected' : '' }} value="{{ $value }}">{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="">まとめ</label>
                            <textarea class="summernote" style="height: 30px; display: none;" name="content" placeholder="まとめ" cols="30" rows="3">{!! old('summernote') !!}</textarea>
                        </div>

                        <div class="form-group">
                            <div class="text-right mt-2">
                                <a href="#" class="add-new-link" data-menu="1" data-level="1">ページ分け</a>
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
                            <label class="d-block required">{{ __('posts::messages.banner') }}</label>
                            @upload(['type' => 'image', 'vendor' => 'posts', 'value' => old('avatar') ?? '' , 'thumb' => old('thumb-avatar') ?? '','name' => 'avatar'])
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
                                <a class="btn btn-dark" href="{{ route('posts.index') }}">
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
@push('scripts')
    <script>
        $(function() {
            $(document).on('click', '.add-new-link', function(e) {
                e.preventDefault();
                $('#node-form').find('.note-editable').append('<p><a>ページ分け</a></p>');
            })
        });
    </script>
@endpush

