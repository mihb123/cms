<div class="modal_wrap">
  <input id="trigger" type="checkbox">
  <div class="modal_overlay">
    <div class="modal_content">
      <label for="trigger" class="modal_trigger"></label>
      <label for="trigger" class="close_button">✖️</label>
      <div id="search_box" class="search_box" style="visibility:visible;">
        <div id="pref" class="pref">
          @if(isset($address_1) && $address_1 != "")
          <span>{{$address_1}}</span>
          @endif
          <div class="pref_info">
            <span>現状は東京都内のみの<br>検索サービスとなります</span>
            <img src="{{ asset('frontend/jigyosho/img/map_menu_info.svg')}}" alt="" />
          </div>
        </div>

        <div class=" address_2">
          <label id="address_2_form" for="address_2_box">{{ $address_2 ? $address_2 : "↓市区町村"}} </label>
          <div class="address_2_icon">
            <img src="{{ asset('frontend/jigyosho/issets/images/arrow-bottom.svg')}}" alt="" onclick=" selectCity_start();" />
          </div>
          <input type="checkbox" id="address_2_box" />
          <ul id="address_2_list">
            @php
            $json = file_get_contents(public_path('frontend/jigyosho/json/city_13.json'));
                  // 文字エンコーディングの変換（文字化け対策）
                  $json = mb_convert_encoding($json, "UTF-8", "ASCII, JIS, UTF-8, EUC-JP, SJIS-WIN");
                  // JSONデータを連想配列に変換
                  $obj = json_decode($json, true);
                  $city_index = 0;
                  foreach ($obj as $key => $value) {
                      $str_li = "<li onclick=\"selectCity('".$value["name"]."');\""." >".$value["name"]."</li>";
                      echo trim($str_li);
                      $city_index += 1;
                  }  
            @endphp                                                  
          </ul>
          <!--++address_2_list END ++-->
        </div>
        <!--++ address_2 END ++-->

        <!-- div class="address_3" -->
        <div class="address_3_explain">▼&nbsp;つづきの住所（任意）</div>
        <textarea id="address_3_info" name="address_3" class="address_3" placeholder="※未入力の場合、各自治体の役所付近の検索となります。" cols="1" rows="1" wrap="soft">{{$address_3}}</textarea>

        <div class="dist"><input type="hidden" id="dist_val" value="{{$dist}}" />
          <div class="dist_explain">▼検索範囲（半径距離）</div>
          <div class="dist_rb_container">
            <label class="dist_RadioInput">
              <input class="dist_RadioInput-Input" type="radio" id="dist5" name="dist" value="5" {{ $dist == 5 ? 'checked' : '' }}>
              <span class="dist_RadioInput-DummyInput"></span>
              <span class="dist_RadioInput-LabelText">5km</span>
            </label>
            <label class="dist_RadioInput">
              <input class="dist_RadioInput-Input" type="radio" id="dist10" name="dist" value="10" {{ $dist == 10 ? 'checked' : '' }}>
              <span class="dist_RadioInput-DummyInput"></span>
              <span class="dist_RadioInput-LabelText">10km</span>
            </label>
            <label class="dist_RadioInput">
              <input class="dist_RadioInput-Input" type="radio" id="dist16" name="dist" value="16" {{ $dist == 16 ? 'checked' : '' }}>
              <span class="dist_RadioInput-DummyInput"></span>
              <span class="dist_RadioInput-LabelText">16km</span>
            </label>
          </div>
        </div>
        <!--++ dist END ++-->

        <div class="map_search_button_container">
          <input type="button" class="map_search_button" value="検　索" onclick="search('{{$address_1}},{{$search_category}}');" />
        </div>
        <!--++map_search_button_container END ++-->

      </div>
      <!--++ serch_box ++-->
    </div><!-- modal_content -->
  </div><!-- modal_overlay -->
</div><!-- modal_wrap -->
<script>
  function selectCity(city) {
    var before = document.getElementById("address_2_form").innerText;

    if (before !== city) {
      document.getElementById("address_2_form").innerText = city;
      $('#address_3_info').val("");
    }

    $('#address_2_box').trigger("click");
    return;
  }

  function selectCity_start() {
    $('#address_2_box').trigger("click");
    return;
  }

  $(function() {

    $('#select-category-select').on('click', function() {
      var ctgry = $('#select-category-text').text();
      cancel_ctgry(ctgry.trim());
    });
  });

</script>
