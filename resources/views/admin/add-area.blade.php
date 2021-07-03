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
                    <select name="" id="cities" class="form-control select2" onchange="getCity()" required>
                        <option value="0">Select City</option>
                        @foreach($cities as $city)
                            <option value='{{$city->id}},{{$city->latitude}},{{$city->longitude}}'>{{$city->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @include('admin.map')

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <input type="submit" class="btn btn-info" value="Add">
            <a href="{{ url('view-areas') }}" class="btn btn-danger">Cancel</a>
        </div>
        <!-- /.card-footer -->
    </form>
</div>
<!-- /.card -->
@endsection
