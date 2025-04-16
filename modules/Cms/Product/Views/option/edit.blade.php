@extends('backend::layout')

@section('title', __('編集'))
@section('content')
    <form class="kt-form" id="node-form" action="{{ route('product-option.update', $data['id']) }}" method="POST" enctype="multipart/form-data">
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
                            <label class="required">{{ __('product::messages.category') }}</label>  
                            <select class="form-control status" id="category" data-placeholder="{{ __('選択してください') }}" name="category_id">
                                <option disabled selected>{{ __('選択してください') }}</option>
                                @foreach($listCategory as $value => $category)
                                <option {{ $data['category_id'] == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>    
                        </div>
                        <div id="listProductAndCompany">
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
                                <a class="btn btn-dark" href="{{ route('product-option.index') }}">
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
@endsection
@push('scripts')
<script>
    $(document).ready(function () { 
        var id = $('#category').val();
        var product_option_id = '{{ $data['id'] }}';
        $.ajax({
            type: "POST",
            url: cedu.route('/product-option/getProductAndCompany'),
            data: {
                id: id,
                product_option_id: product_option_id,
                _token: $('meta[name="csrf-token"]').attr('content'),
                _method: 'POST'
            },
            beforeSend: function(){
                $(".wrapper").append("<div class='loading'><span class='loadding'>Waiting...</span></div>");
                $("#listProductAndCompany").empty();
            },
            success:function(response){
            $("#listProductAndCompany").append(response.data);
            }
        });
    });

    $('#category').on('change', function () {
        var id = $(this).val();
        var data_id = '{{ $data['category_id'] }}';
        if (id === data_id) {
            var data = {
                id: id,
                product_option_id : '{{ $data['id'] }}',
                _token: $('meta[name="csrf-token"]').attr('content'),
                _method: 'POST'
            }
        } else {
            var data = {
                id: id,
                _token: $('meta[name="csrf-token"]').attr('content'),
                _method: 'POST'
            }
        }
        $.ajax({
            type: "POST",
            url: cedu.route('/product-option/getProductAndCompany'),
            data: data,
            beforeSend: function(){
                $(".wrapper").append("<div class='loading'><span class='loadding'>Waiting...</span></div>");
                $("#listProductAndCompany").empty();
            },
            success:function(response) {
            $("#listProductAndCompany").append(response.data);
            }
        });
    });
</script>
@endpush