<div class="form-group">
    <label class="required">{{ __('要介護度') }}</label>
    <select class="form-control status" data-placeholder="選択ください。" name="category_id[]" multiple>
        <option disabled>{{ __('選択してください') }}</option>
        @foreach($listCategory as $key => $category)
            <option {{ old('category_id') && in_array($category['id'], old('category_id')) || !empty($categoryIds) && in_array($category['id'], $categoryIds) ? 'selected' : '' }} value="{{ $category['id'] }}">{{ $category['title'] }}</option>
        @endforeach
    </select>
</div>

<script>
    $('.status').select2({
        language: {
            noResults: function () {
                return "該当する情報は見つかりません。";
            }
        }
    });
</script>

