    
    <!--map -->
    <div id="map" style="height: 100%; padding-top: 500px;"></div>
<!-- Async script executes immediately and must be after any DOM elements used in callback. -->
<script type="text/javascript"> 
    function showArea(){
        var cityId = jQuery('#citySelector').val();
        var arr = cityId.split(',');
        var city = arr[0];
        document.getElementById('city').value = city;
        var latitude = arr[1];
        var longitude = arr[2];
        showCity(latitude, longitude);
        var cityId = jQuery('#city').val();
        $.ajax({
            url: 'get-area',
            type: 'get',
            data: {id:city},
            success: function(data){
                var html = '<option>Select Area</option>';
                jQuery.each(data, function(index, value){
                    html += '<option value="' + value.id + ',' + value.latitude + ',' + value.longitude + '">' + value.name + '</option>';
                });
                $('.areas').empty().append(html);
            }
        });
    }

    //for edit shop page
    function showUpdateArea(){
        var cityId = jQuery('#citySelector').val();
        var arr = cityId.split(',');
        var city = arr[0];
        // alert(city);
        $.ajax({
            url: 'edit-shop/'+city,
            type: "GET",
            data : {"_token":"{{ csrf_token() }}"},
            dataType: "json",
            // url: 'get-update-area',
            // type: 'get',
            // dataType: 'json',
            // data: {"uid": "'+city+'"},
            success: function(data){
                alert(data);
                // var html = '<option>Select Area</option>';
                // jQuery.each(data, function(index, value){
                //     html += '<option value="' + value.id + ',' + value.latitude + ',' + value.longitude + '">' + value.name + '</option>';
                // });
                // $('.areas').empty().append(html);
            }
        });
    }
    function getArea(){
        var cityId = jQuery('.areas').val();
        var arr = cityId.split(',');
        var area = arr[0];
        document.getElementById('area').value = area;
        var latitude = arr[1];
        var longitude = arr[2];
        // showCity(latitude, longitude);

        const myLatlng = { lat:parseFloat(latitude) , lng: parseFloat(longitude) };
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 12,
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
        $.ajax({
            url: 'get-shops',
            type: 'get',
            data: {id:area},
            success: function(data){
                jQuery.each(data, function(index, value){
                    const myLatlng = { lat: parseFloat(value.latitude), lng: parseFloat(value.longitude) };
                    var marker = new google.maps.Marker({
                        position: myLatlng,
                        title:value.name,
                        icon: {
                            url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"
                        }
                    });
                    marker.setMap(map);
                    infoWindow.open(map);
                });
            }
        });  
    }

    
    function showCity(latitude, longitude) {
    const myLatlng = { lat:parseFloat(latitude) , lng: parseFloat(longitude) };
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 12,
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