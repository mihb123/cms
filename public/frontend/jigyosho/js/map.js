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