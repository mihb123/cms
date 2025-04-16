@extends('backend::layout')

@section('content')
    <form class="kt-form" id="node-form" action="{{  route('calculate-group.update', $group['id']) }}" method="POST">
        @csrf
        @method('PUT')
        <input type='hidden' name='id' value="{{ $group['id'] }}">
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
                            <label class="required">{{ __('タイトル') }}</label>
                            <input class="form-control" type="text" name="title_japan" placeholder="@lang('タイトル を入力おねがいします。')" value="{{ $group['title_japan'] }}">
                        </div>
                        <div class="form-group">
                            <label class="required">{{ __('calculate::messages.status') }} :</label>
                            <select class="form-control status" data-placeholder="{{ __('calculate::messages.status') }}" name="status">
                                <option selected>{{ __('選択してください') }}</option>
                                @foreach(getListStatus() as $value => $name)
                                    <option {{ ($group['status'] == $value) ? 'selected' : '' }} value="{{ $value }}">{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ __('calculate::messages.calculate') }}</label>
                            <select class="form-control status" data-placeholder="{{ __('calculate::messages.calculate') }}" name="calculate_id">
                                <option disabled>{{ __('選択してください') }}</option>
                                @foreach(getListCalculate() as $key => $calculate)
                                    <option {{ $group->calculate->calculate_id == $key ? 'selected' : '' }} value="{{ $key }}">{{ $calculate }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="kt-portlet">
                    <div class="kt-portlet__body">
                        <div class="form-group">
                            <div class="col-md-12 fvalue">
                                <a class="btn btn-dark" href="{{ route('calculate-group.index') }}">
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


