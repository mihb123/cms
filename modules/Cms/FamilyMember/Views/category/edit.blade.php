@extends('backend::layout')

@section('title',  __('子タグ'))

@section('content')

    <form class="kt-form" id="node-form" action="{{ route('family-member-category.update', $category['id']) }}" method="POST">
        @csrf
        @method('PUT')
        <input type='hidden' name='id' value="{{ $category['id'] }}" />
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
                            <label class="required">{{ __('family-member::messages.title') }}</label>
                            <input class="form-control" type="text" name="title"
                                   placeholder="@lang('ここにタイトルを入力')" value="{{ $category['title'] }}">
                        </div>

                        <div class="form-group">
                            <label class="required">{{ __('family-member::messages.status') }}</label>
                            <select class="form-control status" data-placeholder="{{ __('family-member::messages.status') }}"name="status">
                                @foreach(getListStatus() as $value => $name)
                                    <option
                                        {{ $category->status == $value ? 'selected' : '' }} value="{{ $value }}">{{ $name }}</option>
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
                            @upload(['type' => 'image', 'vendor' => 'family-member-category', 'name' => 'avatar', 'value' => isset($category['avatar']->id) ? $category['avatar']->id : '' , 'thumb' => isset($category['avatar']->path) ? thumb($category['avatar']->path) : '' ])
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
                                <a class="btn btn-dark" href="{{ route('family-member-category.index') }}">
                                    <i class="fa fa-arrow-left"></i>
                                    {{ __('family-member::messages.cancel') }}
                                </a>
                                <button id="node-save" type="submit" class="btn btn-primary" style="margin-right:5px;">
                                    <i class="fa fa-save"></i>
                                    {{ __('family-member::messages.save') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

