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


    <form class="form-horizontal" method="POST" action="{{ route('add-area') }}" enctype="multipart/form-data">
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

            @if($errors->first('city_id'))
            <div class="alert alert-danger">
                {{$errors->first('city_id')}}
            </div>
            @endif
            <div class="form-group row">
                <label for="category" class="col-sm-2 col-form-label">City Id</label>
                <div class="col-sm-6">
                    <input type="text" name="city_id" class="form-control" id="category" placeholder="City Id">
                </div>
            </div>

            @if($errors->first('latitude'))
            <div class="alert alert-danger">
                {{$errors->first('latitude')}}
            </div>
            @endif
            <div class="form-group row">
                <label for="category" class="col-sm-2 col-form-label">Latitude</label>
                <div class="col-sm-6">
                    <input type="text" name="latitude" class="form-control" id="category" placeholder="Latitude">
                </div>
            </div>

            @if($errors->first('longitude'))
            <div class="alert alert-danger">
                {{$errors->first('longitude')}}
            </div>
            @endif
            <div class="form-group row">
                <label for="category" class="col-sm-2 col-form-label">Longitude</label>
                <div class="col-sm-6">
                    <input type="text" name="longitude" class="form-control" id="category" placeholder="Longitude">
                </div>
            </div>

            @if($errors->first('coverage_km'))
            <div class="alert alert-danger">
                {{$errors->first('coverage_km')}}
            </div>
            @endif
            <div class="form-group row mt-5">
                <label for="image" class="col-sm-2 col-form-label">Coverage Area (Km)</label>
                <div class="col-sm-6">
                    <input type="text" name="coverage_km" class="form-control" id="category" placeholder="Coverage Area (Km)">
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-info">Add</button>
            <button type="submit" class="btn btn-danger">Cancel</button>
        </div>
        <!-- /.card-footer -->
    </form>
</div>
<!-- /.card -->
@endsection
