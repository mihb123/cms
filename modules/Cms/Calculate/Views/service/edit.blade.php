@extends('backend::layout')

@section('content')
    <form class="kt-form" id="node-form" action="{{ route('calculate-service.update', $data['id']) }}" method="POST" enctype="multipart/form-data">
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
                            <label class="required">{{ __('calculate::messages.title') }}</label>
                            <input class="form-control" type="text" name="title" placeholder="@lang('タイトルを入力お願いします。')" value="{{ $data['title'] }}">
                        </div>
                        <div class="form-group">
                            <label class="required">{{ __('サービスグループ') }}</label>
                            <select class="form-control status" id="group" data-placeholder="選択ください。" name="group_id">
                                <option disabled selected>{{ __('選択してください') }}</option>
                                @foreach($listGroup as $key => $group)
                                    <option {{ $data['group_id'] == $group['id'] ? 'selected' : '' }} value="{{ $group['id'] }}">{{ $group['title_japan'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div id="listCategory">
                        </div>
                        <div class="form-group">
                            <label class="required">{{ __('calculate::messages.title_description') }}</label>
                            <input class="form-control" type="text" name="title_description" placeholder="@lang('タイトルを入力お願いします。')" value="{{ $data['title_description'] }}">
                        </div>
                        <div class="form-group">
                            <label class="required">{{ __('calculate::messages.description') }}</label>
                            <textarea class="summernote" name="description" placeholder="備考" cols="30" rows="3">{!! $data['description'] !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ __('calculate::messages.status') }}</label>
                            <select class="form-control status" data-placeholder="{{ __('calculate::messages.status') }}" name="status">
                                <option disabled selected>{{ __('選択してください') }}</option>
                                @foreach(getListStatus() as $value => $name)
                                    <option {{ ($data['status'] == $value) ? 'selected' : '' }} value="{{ $value }}">{{ $name }}</option>
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
                                <a class="btn btn-dark" href="{{ route('calculate-service.index') }}">
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
@push('scripts')
    <script>
        $(document).ready(function () {
            var group_id = $('#group').val();
            $.ajax({
                type: "POST",
                url: cedu.route('/calculate-service/getCategory'),
                data: {
                    group_id: group_id,
                    service_calculate_id: {{ $data['id'] }},
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    _method: 'POST'
                },
                beforeSend: function(){
                    $(".wrapper").append("<div class='loading'><span class='loadding'>Waiting...</span></div>");
                    $("#listCategory").empty();
                },
                success:function(response){
                    $("#listCategory").append(response.data);
                }
            });
        });
        $('#group').on('change', function () {
            var group_id = $('#group').val();
            $.ajax({
                type: "POST",
                url: cedu.route('/calculate-service/getCategory'),
                data: {
                    group_id: group_id,
                    service_calculate_id: {{ $data['id'] }},
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    _method: 'POST'
                },
                beforeSend: function(){
                    $(".wrapper").append("<div class='loading'><span class='loadding'>Waiting...</span></div>");
                    $("#listCategory").empty();
                },
                success:function(response){
                    $("#listCategory").append(response.data);
                }
            });
        });
    </script>
@endpush

