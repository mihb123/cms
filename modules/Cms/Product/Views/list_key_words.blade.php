@foreach ($listKeyWords as $key => $keyWord)
    <option {{ old('keyWord_id') && in_array($keyWord->id, old('keyWord_id')) ? 'selected' : '' }}
        value="{{ $keyWord->id }}">
        {{ $keyWord->title_admin }}</option>
@endforeach
