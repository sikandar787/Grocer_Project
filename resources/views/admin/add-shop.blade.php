@extends('admin.app')
@section('title','Add Shop')
@section('header_title','Dashboard')
@section('maincontent')
<!-- Horizontal Form -->
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Add Shop</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->


    <form class="form-horizontal" method="POST" action="{{ route('add-shop') }}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            @if($errors->first('name'))
            <div class="alert alert-danger">
                {{$errors->first('name')}}
            </div>
            @endif
            <div class="form-group row">
                <label for="shop" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" name="name" class="form-control" id="shop" placeholder="Name">
                </div>
            </div>

            @if($errors->first('ur_name'))
            <div class="alert alert-danger">
                {{$errors->first('ur_name')}}
            </div>
            @endif
            <div class="form-group row">
                <label for="shop" class="col-sm-2 col-form-label">Urdu Name</label>
                <div class="col-sm-6">
                    <input type="text" name="ur_name" class="form-control urduFont" id="shop" placeholder="نام درج کریں">
                </div>
            </div>

            @if($errors->first('description'))
            <div class="alert alert-danger">
                {{$errors->first('description')}}
            </div>
            @endif
            <div class="form-group row">
                <label for="shop" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-6">
                    <textarea name="description" class="form-control" id="description" cols="10" rows="3"></textarea>
                </div>
            </div>

            @if($errors->first('ur_description'))
            <div class="alert alert-danger">
                {{$errors->first('ur_description')}}
            </div>
            @endif
            <div class="form-group row">
                <label for="shop" class="col-sm-2 col-form-label">Urdu Description</label>
                <div class="col-sm-6">
                    <textarea name="ur_description" class="form-control urduFont" id="ur_description" cols="10" rows="3"></textarea>
                </div>
            </div>

            @if($errors->first('number'))
            <div class="alert alert-danger">
                {{$errors->first('number')}}
            </div>
            @endif
            <div class="form-group row">
                <label for="shop" class="col-sm-2 col-form-label">Mobile No.</label>
                <div class="col-sm-6">
                    <input type="text" name="number" class="form-control" id="shop" placeholder="Mobile No.">
                </div>
            </div>

            @if($errors->first('password'))
            <div class="alert alert-danger">
                {{$errors->first('password')}}
            </div>
            @endif
            <div class="form-group row">
                <label for="shop" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-6">
                    <input type="text" name="password" class="form-control" id="shop" placeholder="Password">
                </div>
            </div>

            <div class="form-group row">
                <label for="shop" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" name="email" class="form-control" id="shop" placeholder="Email">
                </div>
            </div>

            @if($errors->first('latitude'))
            <div class="alert alert-danger">
                {{$errors->first('latitude')}}
            </div>
            @endif
            <div class="form-group row">
                <label for="shop" class="col-sm-2 col-form-label">Latitude</label>
                <div class="col-sm-6">
                    <input type="text" name="latitude" class="form-control" id="shop" placeholder="Latitude">
                </div>
            </div>

            @if($errors->first('longitude'))
            <div class="alert alert-danger">
                {{$errors->first('longitude')}}
            </div>
            @endif
            <div class="form-group row">
                <label for="shop" class="col-sm-2 col-form-label">Longitude</label>
                <div class="col-sm-6">
                    <input type="text" name="longitude" class="form-control" id="shop" placeholder="Longitude">
                </div>
            </div>

            <div class="form-group row">
                <label for="shop" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-6">
                    <input type="text" name="address" class="form-control" id="shop" placeholder="Address">
                </div>
            </div>

            @if($errors->first('coverage_km'))
            <div class="alert alert-danger">
                {{$errors->first('coverage_km')}}
            </div>
            @endif
            <div class="form-group row">
                <label for="shop" class="col-sm-2 col-form-label">Coverage Area (Km)</label>
                <div class="col-sm-6">
                    <input type="text" name="coverage_km" class="form-control" id="shop" placeholder="Coverage Area (Km)">
                </div>
            </div>

            @if($errors->first('city_id'))
            <div class="alert alert-danger">
                {{$errors->first('city_id')}}
            </div>
            @endif
            <div class="form-group row">
                <label for="shop" class="col-sm-2 col-form-label">City</label>
                <div class="col-sm-6">
                    <select class="form-control select2" name="city_id">
                        <option disabled selected hidden>Select City</option>
                        @if($cities->count())
                        @foreach($cities as $city)
                        <option class="mt-5 p-5" value="{{$city->id}}">{{$city->name}}</option>
                        @endforeach
                        @else
                        <option>No Cities Found</option>
                        @endif
                    </select>
                </div>
            </div>

            @if($errors->first('area_id'))
            <div class="alert alert-danger">
                {{$errors->first('area_id')}}
            </div>
            @endif
            <div class="form-group row">
                <label for="shop" class="col-sm-2 col-form-label">Area</label>
                <div class="col-sm-6">
                    <select class="form-control select2" name="area_id">
                        <option disabled selected hidden>Select Area</option>
                        @if($areas->count())
                        @foreach($areas as $area)
                        <option class="mt-5 p-5" value="{{$area->id}}">{{$area->name}}</option>
                        @endforeach
                        @else
                        <option>No Areas Found</option>
                        @endif
                    </select>
                </div>
            </div>

            @if($errors->first('image'))
            <div class="alert alert-danger">
                {{$errors->first('image')}}
            </div>
            @endif
            <div class="form-group row mt-5">
                <label for="image" class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-6">
                    <input type="file" name="image" class="form-control-file" id="image">
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-info">Add</button>
            <a href="{{ url('view-shops') }}" class="btn btn-danger">Cancel</a>
        </div>
        <!-- /.card-footer -->
    </form>
</div>
<!-- /.card -->
@endsection
