<div class="form-group">                       
    <label class="required">{{ __('product::messages.manage.product-title') }}</label>  
    <select class="form-control status" data-placeholder="{{ __('選択してください') }}" name="product_id">
        <option disabled>{{ __('選択してください') }}</option>
        @foreach($category->listProduct as $key => $product)
        <option {{ (!empty( $data['product_id']) && $data['product_id'] == $product->id ? 'selected' : '') ?? (old('product_id') == $product->id ? 'selected' : '') }} value="{{ $product->id }}">{{ $product->title }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">                       
    <label class="required">{{ __('product::messages.name_company') }}</label>  
    <select class="form-control status" data-placeholder="{{ __('選択してください') }}" name="company_id">
        <option disabled>{{ __('選択してください') }}</option>
        @foreach($category->listCompany as $value => $company)
        <option {{ (!empty( $data['company_id']) && $data['company_id'] == $company->id ? 'selected' : '') ?? (old('company_id') == $company->id ? 'selected' : '') }} value="{{ $company->id }}">{{ $company->name }}</option>
        @endforeach
    </select>                        
</div>
<div class="form-group">
    <label class="required">{{ __('product::messages.note_option') }}</label>
    <textarea class="summernote" name="content" placeholder="備考" cols="30" rows="3">{!! old('content') ?? (!empty( $data['content']) && $data['content'] ? $data['content'] : '')  !!}</textarea>
</div>
<script>
    $( document ).ready(function() {
        $('.summernote').summernote({
            height: 200,
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
    })
</script>