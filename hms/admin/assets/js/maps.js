let Maps = function () {
	"use strict";
    //function to initiate GMaps
    //Gmaps.js allows you to use the potential of Google Maps in a simple way.
    //For more information, please visit http://hpneo.github.io/gmaps/documentation.html
    let runMaps = function () {
        // Basic Map 
       let map = new GMaps({
            el: '#map1',
            lat: -12.043333,
            lng: -77.028333
        });
        //Markers
        let map2 = new GMaps({
            div: '#map2',
            lat: -12.043333,
            lng: -77.028333
        });
        map2.addMarker({
            lat: -12.043333,
            lng: -77.03,
            title: 'Lima',
            details: {
                database_id: 42,
                author: 'HPNeo'
            },
            click: function (e) {
                if (console.log)
                    console.log(e);
                alert('You clicked in this marker');
            }
        });
        map2.addMarker({
            lat: -12.042,
            lng: -77.028333,
            title: 'Marker with InfoWindow',
            height: '200px',
            infoWindow: {
                content: '<p>HTML Content</p>'
            }
        });
        //Street View 
        let panorama = GMaps.createPanorama({
            el: '#map3',
            lat: 42.3455,
            lng: -71.0983
        });
        //Search Address
        let map4 = new GMaps({
            div: '#map4',
            lat: -12.043333,
            lng: -77.028333
        });
        $('#geocoding_form').submit(function (e) {
            e.preventDefault();
            GMaps.geocode({
                address: $('#address').val().trim(),
                callback: function (results, status) {
                    if (status == 'OK') {
                        let latlng = results[0].geometry.location;
                        map4.setCenter(latlng.lat(), latlng.lng());
                        map4.addMarker({
                            lat: latlng.lat(),
                            lng: latlng.lng()
                        });
                    }
                }
            });
        });
        //Interacting
        let map5;
        // Update position
        $(document).on('submit', '.edit_marker', function (e) {
            e.preventDefault();
            let $index = $(this).data('marker-index');
            let $lat = $('#marker_' + $index + '_lat').val();
            let $lng = $('#marker_' + $index + '_lng').val();
            let template = $('#edit_marker_template').text();
            // Update form values=
            let content = template.replace(/{{index}}/g, $index).replace(/{{lat}}/g, $lat).replace(/{{lng}}/g, $lng);
            map5.markers[$index].setPosition(new google.maps.LatLng($lat, $lng));
            map5.markers[$index].infoWindow.setContent(content);
            let $marker = $('#markers-with-coordinates').find('li').eq(0).find('a');
            $marker.data('marker-lat', $lat);
            $marker.data('marker-lng', $lng);
        });
        // Update center
        $(document).on('click', '.pan-to-marker', function (e) {
            e.preventDefault();
            let lat, lng;
            let $index = $(this).data('marker-index');
            let $lat = $(this).data('marker-lat');
            let $lng = $(this).data('marker-lng');
            if ($index != undefined) {
                // using indices
                var position = map5.markers[$index].getPosition();
                lat = position.lat();
                lng = position.lng();
            } else {
                // using coordinates
                lat = $lat;
                lng = $lng;
            }
            map5.setCenter(lat, lng);
        });
        map5 = new GMaps({
            div: '#map5',
            lat: -12.043333,
            lng: -77.028333
        });
        GMaps.on('marker_added', map5, function (marker) {
            $('#map-ui').append('<tr><td><a href="#" class="pan-to-marker" data-marker-index="' + map5.markers.indexOf(marker) + '">' + marker.title + '</a></td><td><a href="#" class="pan-to-marker" data-marker-lat="' + marker.getPosition().lat() + '" data-marker-lng="' + marker.getPosition().lng() + '">' + marker.title + '</a></td></tr>');
        });
        GMaps.on('click', map5.map, function (event) {
            let index = map5.markers.length;
            let lat = event.latLng.lat();
            let lng = event.latLng.lng();
            let template = $('#edit_marker_template').text();
            let content = template.replace(/{{index}}/g, index).replace(/{{lat}}/g, lat).replace(/{{lng}}/g, lng);
            map5.addMarker({
                lat: lat,
                lng: lng,
                title: 'Marker #' + index,
                infoWindow: {
                    content: content
                }
            });
        });
    };
    return {
        //main function to initiate template pages
        init: function () {
            runMaps();
        }
    };
}();