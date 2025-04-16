@extends('backend::layout')

@section('title',  __('話題の記事'))
@section('content')
    <form class="kt-form" id="node-form" action="{{ route('topic-useful.update', $useful->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type='hidden' name='id' value="{{ $useful->id }}" />
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
                            <input class="form-control" type="text" name="title" placeholder="@lang('タイトルを入力お願いします。')" value="{{ $useful->title }}" >
                        </div>
                        <?php /*
                        <div class="form-group">
                            <label class="required">{{ __('posts::messages.summary') }}</label>
                            <textarea class="form-control" name="summary" placeholder="{{ __('posts::messages.summary') }}" cols="30" rows="3">{{ $useful->summary }}</textarea>
                        </div>
                         */?>
                        <div class="form-group">
                            <label>{{ __('タイトルUrl') }}</label>
                            <input class="form-control" type="text" name="url" placeholder="@lang('タイトルUrl')" value="{{ $useful->url ?? '' }}" >
                        </div>
                        <div class="form-group">
                            <label class="required">著者</label>
                            <select class="form-control status" data-placeholder="クリエイター" name="creator_id">
                                <option selected disabled>{{ __('選択してください') }}</option>
                                @foreach($listCreator as $key => $creator)
                                    <option {{ ($useful->creator_id == $creator['id']) ? 'selected' : '' }} value="{{ $creator['id'] }}">{{ $creator['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ __('posts::messages.category') }}</label>
                            <select class="form-control status" data-placeholder="{{ __('posts::messages.category') }}" name="category_id">
                                <option disabled selected>{{ __('選択してください') }}</option>
                                @foreach($listCategory as $value => $category)
                                    <option {{ ($useful->category_id == $category->id) ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ __('posts::messages.status') }}</label>
                            <select class="form-control status" data-placeholder="{{ __('posts::messages.status') }}" name="status">
                                <option selected value="">{{ __('選択してください') }}</option>
                                @foreach(getListStatus() as $value => $name)
                                    <option {{ ($useful->status == $value) ? 'selected' : '' }} value="{{ $value }}">{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="">まとめ</label>
                            <textarea class="summernote" style="height: 30px; display: none;" name="content" placeholder="まとめ" cols="30" rows="3">{!! $useful->content !!}</textarea>
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
                            <h3 class="kt-portlet__head-title">
                                {{ __('画像') }}
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="form-group">
                            <label class="d-block required">{{ __('posts::messages.banner') }}</label>
                            @upload(['type' => 'image', 'vendor' => 'postsUseful', 'name' => 'avatar', 'value' => isset($useful['avatar']->id) ? $useful['avatar']->id : '' ,'thumb' => isset($useful['avatar']->path) ? thumb($useful['avatar']->path) : '' ])
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
                            @upload(['type' => 'image', 'vendor' => 'postsUseful', 'name' => 'icon', 'value' => isset($useful['icon']->id) ? $useful['icon']->id : '' ,'thumb' => isset($useful['icon']->path) ? thumb($useful['icon']->path) : '' ])
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
                                <a class="btn btn-dark" href="{{ route('topic-useful.index') }}">
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
