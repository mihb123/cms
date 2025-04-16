@extends('backend::layout')

@section('title',  __('お役立ち記事'))
@section('content')
    <form class="kt-form" id="node-form" action="{{ route('posts-topic.update', $topic->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type='hidden' name='id' value="{{ $topic->id }}" />
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
                            <label class="required">{{ __('posts::messages.title') }}</label>
                            <input class="form-control" type="text" name="title" placeholder="@lang('タイトルを入力お願いします。')" value="{{ $topic->title }}" >
                        </div>
                        <div class="form-group">
                            <label class="required">著者</label>
                            <select class="form-control status" data-placeholder="クリエイター" name="creator_id">
                                <option selected>{{ __('選択してください') }}</option>
                                @foreach($listCreator as $key => $creator)
                                    <option {{ ($topic->creator_id == $creator['id']) ? 'selected' : '' }} value="{{ $creator['id'] }}">{{ $creator['name'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="required">{{ __('posts::messages.summary') }}</label>
                            <textarea class="form-control" name="summary" placeholder="{{ __('posts::messages.summary') }}" cols="30" rows="3">{{ $topic->summary }}</textarea>
                        </div>
                        
                        <div class="form-group">
                            <label class="required">{{ __('posts::messages.category') }}</label>
                            <select class="form-control status" data-placeholder="{{ __('posts::messages.category') }}" name="category_id">
                                <option selected value="">{{ __('選択してください') }}</option>
                                @foreach($listCategory as $value => $category)
                                    <option {{ ($topic->category_id == $category->id) ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label class="required">{{ __('posts::messages.status') }} </label>
                            <select class="form-control status" data-placeholder="{{ __('posts::messages.status') }}" name="status">
                                <option selected disabled>{{ __('選択してください') }}</option>
                                @foreach(getListStatus() as $value => $name)
                                    <option {{ ($topic->status == $value) ? 'selected' : '' }} value="{{ $value }}">{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ __('posts::messages.position') }} </label>
                            <select class="form-control status" data-placeholder="{{ __('posts::messages.position') }}" name="position">
                                <option selected disabled>{{ __('選択してください') }}</option>
                                @foreach(getListPositionPostTopic() as $key => $postTopic)
                                    <option
                                        {{ $topic->position == $key ? 'selected' : '' }} value="{{ $key }}">{{ $postTopic }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="">まとめ</label>
                            <textarea class="summernote" style="height: 30px; display: none;" name="content" placeholder="まとめ" cols="30" rows="3">{!! $topic['content'] !!}</textarea>
                        </div>
                        <div class="form-group">
                            <div class="text-right mt-3">
                                <a href="#" class="add-new-link" data-menu="0" data-level="0">ページ分け</a>
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
                                {{ __('画像') }}
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="form-group">
                            <label class="d-block required">{{ __('posts::messages.banner') }}</label>
                            @upload(['type' => 'image', 'vendor' => 'posts-topic', 'name' => 'avatar', 'value' => isset($topic['avatar']->id) ? $topic['avatar']->id : '' ,'thumb' => isset($topic['avatar']->path) ? thumb($topic['avatar']->path) : '' ])
                        </div>
                    </div>
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                {{ __('posts::messages.icon') }}
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="form-group">
                            <label class="d-block required">{{ __('posts::messages.icon') }}</label>
                            @upload(['type' => 'image', 'vendor' => 'posts-topic', 'name' => 'icon', 'value' => isset($topic['icon']->id) ? $topic['icon']->id : '' ,'thumb' => isset($topic['icon']->path) ? thumb($topic['icon']->path) : '' ])
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
                                <a class="btn btn-dark" href="{{ route('posts-topic.index') }}">
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
