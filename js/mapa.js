var map;
var facebookid = $("#facebookid").val();
var lat;
var lng;
var markers = [];

function addMedicine(){
    var sendData = '?facebookid='+facebookid;
	//var sendData = '?lat='+lat+'&lng='+lng;

	$.fancybox({
		'fitToView': false,
		'autoSize': false,
		'width': 500,
		'height': 340,
		'padding': 10,
		'transitionIn': 'elastic',
		'transitionOut': 'elastic',
		'type': 'iframe',
		'titleShow': true,
		'title': 'Novo remédio',
		'href': 'cadastro_remedio.php'+sendData,
	});
}

function checkMedicine(pessoaid, nomeremedio, sintomas){

    var sendData = '?pessoaid='+pessoaid+'&nomeremedio='+nomeremedio+"&sintomas="+sintomas;
    //var sendData = '?lat='+lat+'&lng='+lng;

    $.fancybox({
        'fitToView': false,
        'autoSize': false,
        'width': 500,
        'height': 340,
        'padding': 10,
        'transitionIn': 'elastic',
        'transitionOut': 'elastic',
        'type': 'iframe',
        'titleShow': true,
        'title': 'Ver remedios',
        'href': 'verificar_remedio.php'+sendData,
    });
}

function checkMyMedicine(){

    var ajax = $.ajax({
        url: 'action/carregarTudoPessoaAction.php',
        type: 'POST',
        async: true,
        data: {facebookid: facebookid},
        //data: $("#cadastro_remedio").serialize(),
        success: function (data) {
            $.each($.parseJSON(data), function() {
                var pessoaid = this.pessoaid;

                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(this.lat, this.lng),
                    title: 'ue: ' + this.pessoaid,
                    map: map
                });

                marker.addListener('click', function() {
                    //alert('ueueue: ' + pessoaid);
                    checkMedicine(pessoaid, "", "")
                    
                });

                markers.push(marker);
            });
            
        },

        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
    });
    
    var sendData = '?pessoaid='+pessoaid;
    //var sendData = '?lat='+lat+'&lng='+lng;

    $.fancybox({
        'fitToView': false,
        'autoSize': false,
        'width': 500,
        'height': 340,
        'padding': 10,
        'transitionIn': 'elastic',
        'transitionOut': 'elastic',
        'type': 'iframe',
        'titleShow': true,
        'title': 'Meus remedios',
        'href': 'verificar_meus_remedios.php'+sendData,
    });


}



function initialize(){
    //carrego as coordenadas cadastradas na tabela pessoa
    getLatLng();

    //set coordenadas no mapa
	var latlng = new google.maps.LatLng(lat, lng);

	var options = {
		zoom: 17,
		center: latlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};

	map = new google.maps.Map(document.getElementById("map-area"), options);


    var homeIcon = {
        url: '../images/home.png',
        scaledSize: new google.maps.Size(40, 40),
        origin: new google.maps.Point(0,0),
        anchor: new google.maps.Point(0, 0)
    };

    var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        icon: homeIcon,
        title: 'Sua posição'
    });

    marker.addListener('click', function() {
        checkMyMedicine(facebookid);
    });

	var input = (document.getElementById('search_address'));
    var autocomplete = new google.maps.places.Autocomplete(input);

    var marker = new google.maps.Marker({
        map: map
    });

    autocomplete.bindTo('bounds', map);
    var infowindow = new google.maps.InfoWindow();

    //test
    google.maps.event.addListener(autocomplete, 'place_changed', function () {
        infowindow.close();
        marker.setVisible(false);
        input.className = '';
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            // Inform the user that the place was not found and return.
            input.className = 'notfound';
            return;
        }

        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17); // Why 17? Because it looks good.
        }
        marker.setIcon( /** @type {google.maps.Icon} */ ({
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(35, 35)
        }));
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);

        var address = '';
        if (place.address_components) {
            address = [
            (place.address_components[0] && place.address_components[0].short_name || ''), (place.address_components[1] && place.address_components[1].short_name || ''), (place.address_components[2] && place.address_components[2].short_name || '')].join(' ');
        }

        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
        infowindow.open(map, marker);
    });



	loadMarkers();

    /*
	google.maps.event.addListener(map, 'dblclick', function (e){
		addMedicine(e.latLng.lat(), e.latLng.lng());
		event.stop();
	});
    */
}

initialize();

var addressField = document.getElementById('search_address');
var geocoder = new google.maps.Geocoder();
function search() {
    geocoder.geocode(
        {'address': addressField.value}, 
        function(results, status) { 
            if (status == google.maps.GeocoderStatus.OK) { 
            	bounds  = new google.maps.LatLngBounds();
                var loc = results[0].geometry.location;
                // use loc.lat(), loc.lng()
                var prop = new google.maps.LatLng(loc.lat(), loc.lng());
                bounds.extend(prop);
                map.fitBounds(bounds);
                map.panToBounds(bounds);
                //map.setCenter(new google.maps.LatLng(loc.lat(), loc.lng()));
                //map.setZoom(10);
            } 
            else {
                alert("Not found: " + status); 
            } 
        }
    );
};


function getLatLng(){
    var ajax = $.ajax({
        url: '../action/carregarPessoaAction.php',
        type: 'POST',
        async: false,
        data: {facebookid: facebookid},
        success: function (data) {
            var text = data;
            var obj = JSON.parse(text);
            lat = obj.lat;
            lng = obj.lng;

        },

        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
    });
}
