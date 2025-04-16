@foreach ($listGroupCategory as $key => $groupCategory)
    <div class="form-group">                       
        <input class="form-control" value="{{$groupCategory->group->title_japan}}" readonly>
    </div>
@endforeach