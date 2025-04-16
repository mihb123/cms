
function customMapBox(lat, lng, container) {
    var zoom = 14.03;
    window.location.hash = '#'+zoom+'/'+lat+'/'+lng;
    var maps = new mapboxgl.Map({
        container: container,
        hash: true,
        style: '../json/style.json', //style.jsonへのパス
        center: [lat, lng],
        zoom: zoom,
        maxZoom: 17.99,
        minZoom: 4,
        width:"100%",
        height:"100%",
        localIdeographFontFamily: false
    });

    var marker = new mapboxgl.Marker().setLngLat(maps.getCenter()).addTo(maps);
    maps.addControl(new mapboxgl.NavigationControl(), 'bottom-right');
    maps.addControl(new mapboxgl.ScaleControl());
    maps.addControl(new mapboxgl.FullscreenControl());

    setTimeout(maps.resize(), 3000);
    $(".item-list-top__menu-top .menu-item").on("click", function (e) {
        e.preventDefault();
        maps.resize();
    })
    // maps.on('idle',function(){
    //     maps.resize()
    // })
}

function customMapBox1(lat, lng, container) {
    var zoom = 14.03;
    window.location.hash = '#'+zoom+'/'+lat+'/'+lng;
    var maps = new mapboxgl.Map({
        container: container,
        hash: true,
        style: '../json/style.json', //style.jsonへのパス
        center: [lat, lng],
        zoom: zoom,
        maxZoom: 17.99,
        minZoom: 4,
        width:"100%",
        height:"100%",
        localIdeographFontFamily: false
    });

    var marker = new mapboxgl.Marker().setLngLat(maps.getCenter()).addTo(maps);
    maps.addControl(new mapboxgl.NavigationControl(), 'bottom-right');
    maps.addControl(new mapboxgl.ScaleControl());
    maps.addControl(new mapboxgl.FullscreenControl());
    maps.on('idle',function(){
        maps.resize()
    })
}

function customMapBox2(lat, lng, container) {
    var zoom = 14.03;
    window.location.hash = '#'+zoom+'/'+lat+'/'+lng;
    var maps = new mapboxgl.Map({
        container: container,
        hash: true,
        style: '../json/style.json', //style.jsonへのパス
        center: [lat, lng],
        zoom: zoom,
        maxZoom: 17.99,
        minZoom: 4,
        width:"100%",
        height:"100%",
        localIdeographFontFamily: false
    });

    var marker = new mapboxgl.Marker().setLngLat(maps.getCenter()).addTo(maps);
    maps.addControl(new mapboxgl.NavigationControl(), 'bottom-right');
    maps.addControl(new mapboxgl.ScaleControl());
    maps.addControl(new mapboxgl.FullscreenControl());

    setTimeout(maps.resize(), 3000);
    $(".item-list-top__menu-top .menu-item").on("click", function (e) {
        e.preventDefault();
        maps.resize();
    })
    // maps.on('idle',function(){
    //     maps.resize()
    // })
}