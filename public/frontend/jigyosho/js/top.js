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

