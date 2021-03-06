    <div class="form-group row">
        <input type="hidden" name="latitude" class="form-control" id="lats" placeholder="Latitude">
        <input type="hidden" name="longitude" class="form-control" id="longs" placeholder="Longitude">
        <input type="hidden" name="city_id" class="form-control" id="city" placeholder="Longitude">
    </div>
    <!--map -->
    <div id="map" style="height: 100%; padding-top: 500px;"></div>
<!-- Async script executes immediately and must be after any DOM elements used in callback. -->
<script type="text/javascript">
    function getCity(){
    var cityId = jQuery('#cities').val();
    var arr = cityId.split(',');
    var city = arr[0];
    document.getElementById('city').value = city;
    var latitude = arr[1];
    var longitude = arr[2];
    showCity(latitude, longitude);
    }
    function showCity(latitude, longitude) {
    const myLatlng = { lat:parseFloat(latitude) , lng: parseFloat(longitude) };
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 10,
        center: myLatlng,
    });
    // Create the initial InfoWindow.
    let infoWindow = new google.maps.InfoWindow({
    });
    var marker = new google.maps.Marker({
        position: myLatlng,
        title:"Hello World!"
    });
    marker.setMap(map);
    infoWindow.open(map);
    map.addListener("click", (mapsMouseEvent) => {
        // Close the current InfoWindow.
        infoWindow.close();
        // Create a new InfoWindow.
        infoWindow = new google.maps.InfoWindow({
        position: mapsMouseEvent.latLng,
        });
        infoWindow.setContent(
        JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
        );
        infoWindow.open(map);
        var data = mapsMouseEvent.latLng.toJSON();
        var data_arr = Object.values(data);
        var lats = data_arr[0].toFixed(4);
        var longs = data_arr[1].toFixed(4);
        document.getElementById('lats').value = lats;
        document.getElementById('longs').value = longs;
    });
    }
    function initMap() {
    const myLatlng = { lat: 30.3753, lng: 69.3451 };
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 4,
        center: myLatlng,
    });
    // Create the initial InfoWindow.
    let infoWindow = new google.maps.InfoWindow({
        content: "Click the map to get Lat/Lng!",
        position: myLatlng,
    });
    infoWindow.open(map);
    // Configure the click listener.
    map.addListener("click", (mapsMouseEvent) => {
        // Close the current InfoWindow.
        infoWindow.close();
        // Create a new InfoWindow.
        infoWindow = new google.maps.InfoWindow({
        position: mapsMouseEvent.latLng,
        });
        infoWindow.setContent(
        JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
        );
        infoWindow.open(map);
        var data = mapsMouseEvent.latLng.toJSON();
        var data_arr = Object.values(data);
        var lats = data_arr[0].toFixed(4);
        var longs = data_arr[1].toFixed(4);
        document.getElementById('lats').value = lats;
        document.getElementById('longs').value = longs;
    });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCXON2AjhpEmCSJzX0NvpkWwc9BnISEKM&callback=initMap&libraries=&v=weekly"
    async
></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
