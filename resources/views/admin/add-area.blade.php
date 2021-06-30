@extends('admin.app')
@section('title','Add Area')
@section('header_title','Dashboard')
@section('maincontent')
<!-- Horizontal Form -->
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Add Area</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->


    <form class="form-horizontal area_form" method="POST" action="{{route('add-area')}}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            @if($errors->first('name'))
            <div class="alert alert-danger">
                {{$errors->first('name')}}
            </div>
            @endif
            <div class="form-group row">
                <label for="category" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" name="name" class="form-control" id="category" placeholder="Area Name">
                </div>
            </div>

            @if($errors->first('ur_name'))
            <div class="alert alert-danger">
                {{$errors->first('ur_name')}}
            </div>
            @endif
            <div class="form-group row">
                <label for="category" class="col-sm-2 col-form-label">Urdu Name</label>
                <div class="col-sm-6">
                    <input type="text" name="ur_name" class="form-control urduFont" id="category" placeholder="علاقہ درج کریں">
                </div>
            </div>

            <input type="hidden" name="latitude" class="form-control" id="lats" placeholder="Latitude">
            <input type="hidden" name="longitude" class="form-control" id="longs" placeholder="Longitude">
            <input type="hidden" name="city_id" class="form-control" id="city" placeholder="Longitude">

            @if($errors->first('coverage_km'))
            <div class="alert alert-danger">
                {{$errors->first('coverage_km')}}
            </div>
            @endif
            <div class="form-group row mt-3">
                <label for="image" class="col-sm-2 col-form-label">Coverage Area (Km)</label>
                <div class="col-sm-6">
                    <input type="text" name="coverage_km" class="form-control" id="category" placeholder="Coverage Area (Km)">
                </div>
            </div>
            <div class="form-group row">
                <label for="area" class="col-sm-2 col-form-label" >Select City</label>
                <div class="col-sm-6">
                    <select name="" id="cities" class="form-control" onchange="getCity()" required>
                        <option value="0">Select City</option>
                        @foreach($cities as $city)
                            <option value='{{$city->id}},{{$city->latitude}},{{$city->longitude}}'>{{$city->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!--map -->
            <div id="map" style="height: 100%; padding-top: 500px;"></div>

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <input type="submit" class="btn btn-info" value="Add">
            <button type="submit" class="btn btn-danger">Cancel</button>
        </div>
        <!-- /.card-footer -->
    </form>
</div>
<!-- /.card -->

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
@endsection
