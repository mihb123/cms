@if (!empty($results))
    <option value="0">選択してください</option>
        @foreach ($results as $val)
            <option value="{{ $val['_id'] }}">{{ $val['name'] }}</option>
        @endforeach
@endif
