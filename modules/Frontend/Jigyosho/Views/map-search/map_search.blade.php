@extends('jigyosho::map-search.layout_map_search')
@section('content')
<form id="swms_form" name="swms_form">
  @include('jigyosho::map-search.menu_search_category')

  <!-- banner start -->
  <div class="banner">
    <!-- content banner start -->
    <div class="banner__container">
      <div id="Map-search-view">
        <!--++ Map-search-view ++-->
      </div>

      <!-- Address box -->
      <div class="map-tool-box">
        <ul class="map-tool-box-container">
          <li class="map-tool-title">
            <img src="{{ asset('frontend/jigyosho/officedetails/images/mark-blue.png') }}" alt="marker" />
          </li>
          <li class="map-tool-address">
            【{{ $address_1 }}】 {{ $address_2_onMap }}<br> {{ $address_3_onMap }}
          </li>
          <li class="map-tool-button">
            <label for="trigger" class="open_button">
              検索地を変更
            </label>
          </li>
        </ul>
      </div>
      <!-- End Address box -->
      @include('jigyosho::map-search.map_search_menu')
    </div>
  </div>
</form>
<script>
  mapData = {!! json_encode([
    'address_1' => $address_1,
    'address_2' => $address_2,
    'address_3' => $address_3,
    'lat' => $lat,
    'lng' => $lng,
    'dist' => $dist,
    'search_category' => $search_category,
    'icon_lat' => $icon_lat,
    'icon_lng' => $icon_lng,
    'icon_pop_cont' => $icon_pop_cont,
    'iconClass' => $iconClass
  ]) !!};
</script>

@endsection