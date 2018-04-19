function initMap() {
    // Create a map object and specify the DOM element for display.

    var key = '&key=AIzaSyC6eYPVrcBB2xUKn26N_oW7756dny5hgXo';
    var lanGeo = 'https://maps.googleapis.com/maps/api/geocode/json?latlng=';
    var adressGeo = 'https://maps.googleapis.com/maps/api/geocode/json?address=';
    var reqst = '';
    var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 50.46104435812501, lng: 30.52164411277704},
        zoom: 17,
        region: 'RU'
    });
    google.maps.event.addListener(map, 'click', function (e) {
        getLanLatLocation(e)

    });

    function getLanLatLocation(e) {
        var location = e.latLng;
        lat = location.lat();
        lng = location.lng();
        reqst = lanGeo + lat + ',' + lng + key + '&language=ru&region=RU';
        getAjax();
    }

    function getAjax() {
        console.log(reqst);
        $.ajax({
            type: 'POST',
            url: reqst,
            success: function (resp) {
                console.log(resp);
            }
        })
    }
}


