@extends('backend::layout')

@section('title',  __('新規追加'))
@section('content')
    <form class="kt-form" id="node-form" action="{{ route('tag-news.update', $tagNews['id']) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type='hidden' name='id' value="{{ $tagNews['id'] }}" />
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
                            <label class="required">著者</label>
                            <select class="form-control status" data-placeholder="タググループ" name="creator_id">
                                <option selected>{{ __('選択してください') }}</option>
                                @foreach($listCreator as $key => $creator)
                                    <option {{ ($tagNews['creator_id'] == $creator['id']) ? 'selected' : '' }} value="{{ $creator['id'] }}">{{ $creator['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="required">子タグ</label>
                            <select class="form-control status" data-placeholder="タググループ" name="tag_id">
                                <option selected>{{ __('選択してください') }}</option>
                                @foreach($listTag as $key => $tag)
                                    <option {{ ($tagNews['tag_id'] == $tag['id']) ? 'selected' : '' }} value="{{ $tag['id'] }}">{{ $tag['title'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ __('tag::messages.status') }}</label>
                            <select class="form-control status" data-placeholder="{{ __('tag::messages.status') }}" name="status">
                                <option selected>{{ __('選択してください') }}</option>
                                @foreach(getListStatus() as $value => $name)
                                    <option {{ ($tagNews['status'] == $value) ? 'selected' : '' }} value="{{ $value }}">{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>

                        @if($tagNews['content'])
                            @foreach($tagNews['content'] as $key => $content)
                                <div class="block mt-2 ui-menu menu{{ $key }}">
                                    <div class="card card-info">
                                        <div class="card-header bg-warning">
                                            <h3 class="card-title">ブロック</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-tool btn-remove-block">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body" style="display: block;border: 1px solid #dedede">
                                            <div class="block-content">
                                                <div class="form-group">
                                                    <label>タイトル</label>
                                                    <input class="form-control title-japan" type="text" name="content[{{$key}}][title-japan]" value="{{ $content['title-japan'] ?? '' }}">
                                                </div>
                                                <div class="form-group">
                                                    <label>タイトル英語</label>
                                                    <input class="form-control title-english" type="text" name="content[{{$key}}][title-english]" value="{{ $content['title-english'] ?? '' }}">
                                                </div>
                                                @if(isset($content['level']))
                                                    @foreach($content['level'] as $level => $item)
                                                        <div class="block-level mt-2 level1 level-{{ $key }}-number-{{ $level}}">
                                                            <div class="card card-info">
                                                                <div class="card-header">
                                                                    <h3 class="card-title">ブロック</h3>
                                                                    <div class="card-tools">
                                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                                            <i class="fas fa-minus"></i>
                                                                        </button>
                                                                        <button type="button" class="btn btn-tool btn-remove-level1">
                                                                            <i class="fas fa-times"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body" style="display: block;border: 1px solid #dedede">
                                                                    <div class="block-content">
                                                                        <div class="card-body" style="display: block; border: 1px solid #dedede">
                                                                            <div class="block-content">
                                                                                <div class="form-group">
                                                                                    <label>タイトル</label>
                                                                                    <input class="form-control name" type="text" name="content[{{ $key }}][level][{{ $level}}][name]" value="{{ $item['name'] }}">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>カラーフォント</label>
                                                                                    <input class="form-control color" type="color" name="content[{{ $key }}][level][{{ $level}}][color]" value="{{ $item['color'] }}">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="">まとめ</label>
                                                                                    <textarea class="summernote-{{$key}}" style="height: 30px; display: none;" name="content[{{$key}}][level][{{$level}}][content]" placeholder="まとめ" cols="30" rows="3">{!! $item['content'] !!}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <script>
                                                            $( document ).ready(function() {
                                                                var editor = $('.summernote-{{$key}}');
                                                                editor.summernote({
                                                                    buttons: {
                                                                        filemanager: filemanager.btnSummernote
                                                                    },
                                                                    toolbar: [
                                                                        ["style", ["style", "bold", "italic", "underline"]],
                                                                        ["color", ["color"]],
                                                                        ["fontname", ["fontname"]],
                                                                        ["para", ["ul", "ol", "paragraph"]],
                                                                        ["table", ["table"]],
                                                                        ["fontsize", ["fontsize"]],
                                                                        ["custom", ["link", "filemanager", "video"]],
                                                                        ["view", ["codeview", "help"]],
                                                                        ['height', ['height']],

                                                                    ],
                                                                    lineHeights: ['1.0', '1.2', '1.4', '1.5', '1.6', '1.7', '1.8', '1.9', '2.0', '3.0'],
                                                                    fontSizeUnits: ['px', 'pt'],
                                                                    fontNamesIgnoreCheck: ['Noto Sans JP'],
                                                                    fontSizes: ['8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '20', '22', '24', '28', '32', '36', '40', '48'],
                                                                });
                                                            });

                                                        </script>
                                                    @endforeach
                                                @endif
                                                <div class="text-right mt-2">
                                                    <a href="#" class="add-level" data-menu="{{ $key }}" data-level="1">説明を追加</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        <div class="form-group">
                            <div class="text-right mt-3">
                                <a href="#" class="add-new-link" data-menu="0" data-level="0">新しいコンテンツを追加する</a>
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
                                {{ __('アクション') }}
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="form-group">
                            <div class="col-md-12 fvalue">
                                <a class="btn btn-dark" href="{{ route('tag-news.index') }}">
                                    <i class="fa fa-arrow-left"></i>
                                    {{ __('tag::messages.cancel') }}
                                </a>
                                <a href="{{ route('tag.detail',  $tagNews['tag_id']) }}" class="btn btn-success" target="_blank">
                                    <i class="fa fa-eye text-light"></i>
                                    {{ __('プレビュー') }}
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

    @include('tag::common.news_block')

@endsection


