const map_search_box_cntnt = document.getElementById("map-search-box-cntnt");

document.getElementById("btn-map-search").onclick = function() {
	
    //DEBUG
    //alert("clicked");

    var search_category = "";
    var zip22 = document.top_map_search_form.zip22.value;
    var pref21 = document.top_map_search_form.pref21.value;
    var addr21 = document.top_map_search_form.addr21.value;
    var strt21 = document.top_map_search_form.strt21.value;
    var map_sts= "2";
	
    if (document.getElementById("checkbox-1").checked) {
       search_category = document.getElementById("checkbox-1").value;
    }
    if (document.getElementById("checkbox-2").checked) {
       search_category = document.getElementById("checkbox-2").value;
    }
    if (document.getElementById("checkbox-3").checked) {
       search_category = document.getElementById("checkbox-3").value;
    }
    if (document.getElementById("checkbox-4").checked) {
       search_category = document.getElementById("checkbox-4").value;
    }
    if (document.getElementById("checkbox-5").checked) {
       search_category = document.getElementById("checkbox-5").value;
    }
    if (document.getElementById("checkbox-6").checked) {
       search_category = document.getElementById("checkbox-6").value;
    }
    if (document.getElementById("checkbox-7").checked) {
       search_category = document.getElementById("checkbox-7").value;
    }
    if (document.getElementById("checkbox-8").checked) {
       search_category = document.getElementById("checkbox-8").value;
    }
    if (document.getElementById("checkbox-9").checked) {
       search_category = document.getElementById("checkbox-9").value;
    }
    if (document.getElementById("checkbox-10").checked) {
       search_category = document.getElementById("checkbox-10").value;
    }
    if (document.getElementById("checkbox-11").checked) {
       search_category = document.getElementById("checkbox-11").value;
    }
    if (document.getElementById("checkbox-12").checked) {
       search_category = document.getElementById("checkbox-12").value;
    }
	     
    //postAjax('index.php', { search_category: search_category, zipCode: zip22, address_1: pref21, address_2: addr21, address_3: strt21, map_sts: map_sts }, function(data){ console.log(data); });
    window.location = "./?search_category=" + search_category +  "&zipCode=" + zip22 + "&address_1=" + pref21 +  "&address_2=" + addr21 +  "&address_3=" + strt21 + "&map_sts=" + map_sts ;

    //map_search_box_cntnt.style.display ="none";
    //search();
	
    //DEBUG
    //alert("種別 = " + search_category +"\n郵便番号 = " + zip22 + "\n都道府県 = " + pref21+ "\n市区町村 = " + addr21 + "\n続きの住所 = " + strt21);
}

function postAjax(url, data, success) {
    var params = typeof data == 'string' ? data : Object.keys(data).map(
            function(k){ return encodeURIComponent(k) + '=' + encodeURIComponent(data[k]) }
        ).join('&');

    var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
    xhr.open('POST', url);
    xhr.onreadystatechange = function() {
        if (xhr.readyState>3 && xhr.status==200) { success(xhr.responseText); }
    };
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(params);
    return xhr;
}

function ctgry_search(dist) {
    $('#select-category-select').trigger("click");
    var ctgry ="";    
    var elems = document.getElementsByName("checkbox-banner");

    for (var i = 0; i < elems.length; i++) {
      if (elems[i].checked){
          ctgry = elems[i].value;
          break;
      }
    } // end for i
 
    var address_2 = document.getElementById("address_2_form").innerText;
    var address_3 = document.swms_form.address_3_info.value;

    window.location = "./map-search?search_category=" + ctgry +  "&address_2=" + address_2 +  "&address_3=" + address_3 +  "&dist=" + dist;
}

function search(){
    
    var ctgry = document.getElementById("select-category-text").innerText;   
//DEBUG
//alert("search():: ctgry = " + ctgry);  
    
    var dist = "10";
    var elems = document.getElementsByName("dist");

    for (var i = 0; i < elems.length; i++) {
        if (elems[i].checked){
            dist = elems[i].value;
//DEBUG
//alert("search(pref, ctgry)::dist = " + dist);  
        }
    } // end for i

//DEBUG
//alert("search():: dist = " + dist);  

    //2023.05.11 郵便番号検索は一旦保留
    //var zipCode_1 = document.getElementById("zipCode_1").value;
    //DEBUG
    //alert("search(pref, ctgry):: zipCode_1 = " + zipCode_1);
    //var zipCode_2 = document.getElementById("zipCode_2").value;
    //DEBUG
   // alert("search(pref, ctgry):: zipCode_2 = " + zipCode_2);
    
     //DEBUG
    //alert("search(pref, ctgry):: address_1 = " + pref);
    
    var address_2 = document.getElementById("address_2_form").innerText;   

//DEBUG
//alert("search():: address_2 = " + address_2);
    
    var address_3 = document.swms_form.address_3_info.value;

//DEBUG
//alert("search():: address_3  = " + address_3 );
    
    //clear_ctgry( );
    //change_ctgry(ctgry.trim());
    //$('#select-category-select').trigger("click");
    //$('#select-category-text').text(ctgry.trim());
 

    window.location = "./map-search?search_category=" + ctgry +  "&address_2=" + address_2 +  "&address_3=" + address_3 +  "&dist=" + dist;
   //window.location = "./map_search.php?search_category=" + ctgry + "&zipCode_1=" + zipCode_1 + "&zipCode_2=" + zipCode_2 + "&address_1=" + pref +  "&address_2=" + city +  "&address_3=" +area +  "&dist=" + dist;
 }


function cancel_ctgry(ctgry) {
//DEBUG
 //alert("cancel_ctgry( ) is called!!");
    var ctgry = $('#select-category-text').text();
    //alert(ctgry.trim());
    clear_ctgry( );
    change_ctgry(ctgry.trim());
    $('#select-category-select').trigger("click");
    return;
}

function clear_ctgry( ) {
   //alert("clear_ctgry( ) is called!!");
   document.getElementById("checkbox-1").checked = false;
   document.getElementById("checkbox-2").checked = false;
   document.getElementById("checkbox-3").checked = false;
   document.getElementById("checkbox-4").checked = false;
   document.getElementById("checkbox-5").checked = false;
   document.getElementById("checkbox-6").checked = false;
   document.getElementById("checkbox-7").checked = false;
   document.getElementById("checkbox-8").checked = false;
   document.getElementById("checkbox-9").checked = false;
   document.getElementById("checkbox-10").checked = false;
   document.getElementById("checkbox-11").checked = false;
   document.getElementById("checkbox-12").checked = false;
   return;
}

function change_ctgry(ctgry){
    //DEBUG    
    //alert("change_ctgry():" + ctgry);
    
    if (ctgry == "公共の相談所") {
        $('#checkbox-1').prop('checked', true);
    } else if (ctgry == "専門相談員（無料）") {
        $('#checkbox-2').prop('checked', true);
    } else if (ctgry == "訪問医師") {
        $('#checkbox-3').prop('checked', true);
    } else if (ctgry == "訪問介護士") {
        $('#checkbox-4').prop('checked', true);
    } else if (ctgry == "訪問看護師") {
        $('#checkbox-5').prop('checked', true);
    } else if (ctgry == "訪問リハビリ") {
        $('#checkbox-6').prop('checked', true);
    } else if (ctgry == "福祉用具（ベッド他）") {
        $('#checkbox-7').prop('checked', true);
    } else if (ctgry == "訪問入浴") {
        $('#checkbox-8').prop('checked', true);
     } else if (ctgry == "訪問薬局" ) {
        $('#checkbox-9').prop('checked', true);
     } else if (ctgry == "訪問介護夜間対応") {
        $('#checkbox-10').prop('checked', true);
     } else if (ctgry == "定期巡回" ) {
        $('#checkbox-11').prop('checked', true);
    } else if (ctgry == "訪問マッサージ") {
        $('#checkbox-12').prop('checked', true);
     }
     return;
}

function load(path) {
    alert("Hello!!");
    return new Promise(function (resolve, reject) {
      var req = new XMLHttpRequest();
      req.open("get", path, true);
      req.responseType = "arraybuffer";
      req.onload = () => {
        if (req.status == 200) {
          resolve(req.response);
        } else {
          reject("file cannot load");
        }
      };
      req.send();
    });
  }
  
  jQuery(document).ready(function () {
    const ctgry = mapData.search_category || ""; 
    clear_ctgry(); 
    change_ctgry(ctgry); 
    // Use window variables with defaults
    const address_2 = mapData.address_2 || "東京都";
    const address_3 = mapData.address_3 || "新宿区"; 
    const dist = mapData.dist || "5";
    const iconClass = mapData.iconClass || "marker-icon";
    const iconLat = mapData.icon_lat || [];
    const iconLng = mapData.icon_lng || [];
    const iconPopCont = mapData.icon_pop_cont || [];
    let lat = mapData.lat || 35.681236;
    let lng = mapData.lng || 139.767125;
    const cnt = iconPopCont.length;
    
    // check if address_3 is empty
    const hasAddress3 = address_3 && address_3.trim() !== "";
  
    // Check and get coordinates from address_2 and address_3
    if (hasAddress3) {
      const address = address_2 + address_3;
      $.ajax({
        url: 'https://msearch.gsi.go.jp/address-search/AddressSearch?q=' + address,
      }).done(function (res) {
        if (res.length) {
          lng = res[0].geometry.coordinates[0]; // Kinh độ
          lat = res[0].geometry.coordinates[1]; // Vĩ độ
        }
      });
    }
    console.log("lat = ", lat);
    console.log("lng = ", lng);
    // Initialize Mapbox map
    const map = new mapboxgl.Map({
      container: 'Map-search-view',
      hash: true,
      style: '/frontend/jigyosho/json/style.json',
      center: [lng, lat],
      zoom: 12.41,
      maxZoom: 17.99,
      minZoom: 4,
      localIdeographFontFamily: false
    });
  
    var lnglat_crrnt = map.getCenter();
    new mapboxgl.Marker()
      .setLngLat(lnglat_crrnt)
      .addTo(map);
  
    map.addControl(new mapboxgl.NavigationControl(), 'bottom-right');
    map.addControl(new mapboxgl.ScaleControl());
  
    var markers = new Array(cnt);
  
    // Thêm các marker lên bản đồ
    for (var i = 0; i <= cnt; i++) {
      if (iconLat[i] && iconLng[i]) {
        var el = document.createElement('div_' + i);
        el.className = iconClass;
  
        var lnglat = [iconLng[i], iconLat[i]];
        var popup = new mapboxgl.Popup({
          anchor: 'bottom',
          closeButton: true,
          closeOnClick: true,
          focusAfterOpen: true
        });
        popup.setHTML(iconPopCont[i] || "");
  
        markers[i] = new mapboxgl.Marker(el, {
          anchor: 'top',
          offset: [0, 0]
        }).setLngLat(lnglat).setPopup(popup).addTo(map);
  
        var markerDiv = markers[i].getElement();
        markerDiv.addEventListener('mouseenter', (function (index) {
          return function () {
            markers[index].togglePopup();
          };
        })(i));
      }
    }
  
      //change house icon because this url is wrong now, check it in mapp.css file
      $('.mapboxgl-marker.mapboxgl-marker-anchor-top').each(function() {
        let url = $(this).css('background-image');
        let newUrl = url.replace('/frontend/', '/frontend/jigyosho/');
        $(this).css('background-image', newUrl);
      });
  
    // Vẽ vòng tròn dựa trên giá trị dist
    if (dist === "10") {
      var myCircle = new MapboxCircle(lnglat_crrnt, 10000, {
        editable: false,
        strokeColor: '#0055FF',
        strokeWeight: 1.0,
        fillColor: 'null'
      }).addTo(map);
    } else if (dist === "16") {
      var myCircle = new MapboxCircle(lnglat_crrnt, 16000, {
        editable: false,
        strokeColor: '#0055FF',
        strokeWeight: 1.0,
        fillColor: 'null'
      }).addTo(map);
    } else {
      var myCircle = new MapboxCircle(lnglat_crrnt, 5000, {
        editable: false,
        strokeColor: '#0055FF',
        strokeWeight: 1.0,
        fillColor: 'null'
      }).addTo(map);
    }
    console.log('myCircle', myCircle);
  });