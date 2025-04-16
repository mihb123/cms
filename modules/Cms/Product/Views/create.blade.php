@extends('backend::layout')

@section('title', __('新規追加'))
@section('content')
    <form class="kt-form" id="node-form" action="{{ route('product.store') }}" method="POST">
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
                            <label class="required">{{ __('製品名') }}</label>
                            <input class="form-control" type="text" name="title" placeholder="@lang('タイトルを入力お願いします')"
                                value="{{ old('title') }}">
                        </div>
                        <div class="form-group">
                            <label class="required">{{ __('product::messages.category') }}</label>
                            <select class="form-control status" id="category"
                                data-placeholder="{{ __('product::messages.category') }}" name="category_id">
                                <option disabled selected>{{ __('選択してください') }}</option>
                                @foreach ($listCategory as $value => $category)
                                    <option {{ old('category_id') == $category->id ? 'selected' : '' }}
                                        value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ __('product::messages.key_words') }} </label>
                                <select class="form-control status"
                                    data-placeholder="{{ __('キーワード登録名') }}" name="keyWord_id[]" id="listKeyWords" multiple>
                                    <option disabled>{{ __('選択してください') }}</option>
                                </select>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ __('product::messages.factory') }}</label>
                            <select class="form-control status" data-placeholder="{{ __('product::messages.category') }}"
                                name="factory_id">
                                <option disabled selected>{{ __('選択してください') }}</option>
                                @foreach ($listFactory as $value => $factory)
                                    <option {{ old('factory_id') == $factory->id ? 'selected' : '' }}
                                        value="{{ $factory->id }}">{{ $factory->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ __('product::messages.star') }}</label>
                            <select class="form-control status" data-placeholder="{{ __('product::messages.star') }}"
                                name="star">
                                <option selected disabled>{{ __('選択してください') }}</option>
                                @foreach (getStar() as $value => $star)
                                    <option {{ old('star') == $value ? 'selected' : '' }} value="{{ $value }}">
                                        {{ $star }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ __('product::messages.description') }}</label>
                            <textarea class="summernote" style="height: 30px; display: none;" name="description" placeholder="まとめ" cols="30"
                                rows="3">{!! old('description') !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label>{{ __('product::messages.note') }}</label>
                            <textarea class="summernote" style="height: 30px; display: none;" name="note" placeholder="備考" cols="30"
                                rows="3">{!! old('note') !!}</textarea>
                        </div>

                        @if (old('content'))
                            @foreach (old('content') as $key => $content)
                                <div class="block mt-2 ui-menu menu{{ $key }}">
                                    <div class="card card-info">
                                        <div class="card-header">
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
                                                    <label>{{ __('product::messages.title') }}</label>
                                                    <input class="form-control title" type="text"
                                                        name="content[{{ $key }}][title]"
                                                        value="{{ $content['title'] ?? '' }}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="">{{ __('product::messages.summary') }}</label>
                                                    <textarea class="summernote" style="height:30px" name="content[{{ $key }}][content]" cols="30"
                                                        rows="3">{{ $content['content'] ?? '' }}</textarea>
                                                </div>
                                                <div class="text-right mt-2">
                                                    <a href="#" class="add-level" data-menu="{{ $key }}"
                                                        data-level="1">説明を追加</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <div class="form-group">
                            <div class="text-right mt-2">
                                <a href="#" class="add-new-link" data-menu="1" data-level="1">説明を追加</a>
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
                            <label class="d-block required">{{ __('product::messages.banner') }}</label>
                            @upload(['type' => 'image', 'vendor' => 'product', 'value' => old('avatar') ?? '', 'thumb' => old('thumb-avatar') ?? '', 'name' => 'avatar'])
                        </div>
                    </div>
                </div>
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
                            <label class="d-block required">{{ __('product::messages.banner') }}</label>
                            @upload(['multiple' => true, 'type' => 'image', 'vendor' => 'productSlider', 'value' => old('image_slider') ?? '', 'name' => 'image_slider'])
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
                                <a class="btn btn-dark" href="{{ route('product.index') }}">
                                    <i class="fa fa-arrow-left"></i>
                                    {{ __('product::messages.cancel') }}
                                </a>
                                <button id="node-save" type="submit" class="btn btn-primary" style="margin-right:5px;">
                                    <i class="fa fa-save"></i>
                                    {{ __('product::messages.save') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @include('product::common.news_block')
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            var id = $('#category').val();
            if (id) {
                $.ajax({
                    type: "POST",
                    url: cedu.route('/product/getKeyWords'),
                    data: {
                        id: id,
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        _method: 'POST'
                    },
                    beforeSend: function() {
                        $(".wrapper").append(
                            "<div class='loading'><span class='loadding'>Waiting...</span></div>");
                        $("#listKeyWords").empty();
                    },
                    success: function(response) {
                        $("#listKeyWords").append(response.data.listKeyWords);
                    }
                });
            }
        });
        $('#category').on('change', function() {
            var id = $(this).val();
            $.ajax({
                type: "POST",
                url: cedu.route('/product/getKeyWords'),
                data: {
                    id: id,
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    _method: 'POST'
                },
                beforeSend: function() {
                    $(".wrapper").append(
                        "<div class='loading'><span class='loadding'>Waiting...</span></div>");
                    $("#listKeyWords").empty();
                },
                success: function(response) {
                    $("#listKeyWords").append(response.data.listKeyWords);
                }
            });
        });
    </script>
@endpush
