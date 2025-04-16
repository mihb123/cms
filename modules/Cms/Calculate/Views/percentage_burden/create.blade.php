@extends('backend::layout')

@section('content')
    <form class="kt-form" id="node-form" action="{{ route('percentage-burden.store') }}" method="POST">
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
                            <label class="required">{{ __('calculate::messages.title') }}</label>
                            <input class="form-control" type="text" name="title" placeholder="@lang('タイトルを入力お願いします。')" value="{{ old('title') }}">
                        </div>
                        <div class="form-group">
                            <label class="required">{{ __('calculate::messages.percentage') }}</label>
                            <input class="form-control" type="number" name="percentage" placeholder="@lang('入力をお願いします。')" value="{{ old('percentage') }}">
                        </div>
                        <div class="form-group">
                            <label class="required">{{ __('要介護度') }}</label>
                            <select class="form-control status" data-placeholder="選択ください。" name="category_id[]" multiple="multiple">
                                <option disabled>{{ __('選択してください') }}</option>    
                                @foreach($listCategory as $key => $category)
                                    <option {{ old('category_id') && in_array($category['id'],old('category_id')) ? 'selected' : '' }} value="{{ $category['id'] }}">{{ $category['title'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="required">{{ __('calculate::messages.status') }}</label>
                            <select class="form-control status" data-placeholder="{{ __('calculate::messages.status') }}" name="status">
                                <option disabled selected>{{ __('選択してください') }}</option>
                                @foreach(getListStatus() as $value => $name)
                                    <option
                                        {{ (old('status') == $value) ? 'selected' : '' }} value="{{ $value }}">{{ $name }}</option>
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
                                <a class="btn btn-dark" href="{{ route('percentage-burden.index') }}">
                                    <i class="fa fa-arrow-left"></i>
                                    {{ __('calculate::messages.cancel') }}
                                </a>
                                <button id="node-save" type="submit" class="btn btn-primary" style="margin-right:5px;">
                                    <i class="fa fa-save"></i>
                                    {{ __('calculate::messages.save') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection