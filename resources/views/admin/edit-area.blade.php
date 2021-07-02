@extends('admin.app')
@section('title','Edit Area')
@section('header_title','Dashboard')
@section('maincontent')
<!-- Horizontal Form -->
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Edit Area</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->



    <form class="form-horizontal" method="POST" action="{{route('update-area', $area->id)}}"
        enctype="multipart/form-data">
        @csrf
        <div class="card-body">

            {{-- @if($errors->first('city_id'))
            <div class="alert alert-danger">
                {{$errors->first('city_id')}}
            </div>
            @endif --}}
            <div class="form-group row mt-5">
                <label for="city_id" class="col-sm-2 col-form-label">City</label>
                <div class="col-sm-6">
                    {{-- <input type="hidden" name="city_id" class="form-control"> --}}
                    <input type="text" value="{{$city->name}}" class="form-control" readonly>
                </div>
            </div>

            @if($errors->first('name'))
            <div class="alert alert-danger">
                {{$errors->first('name')}}
            </div>
            @endif
            <div class="form-group row">
                <label for="area" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" name="name" value="{{$area->name}}" class="form-control"
                        id="area" placeholder="Name">
                </div>
            </div>

            @if($errors->first('ur_name'))
            <div class="alert alert-danger">
                {{$errors->first('ur_name')}}
            </div>
            @endif
            <div class="form-group row">
                <label for="area" class="col-sm-2 col-form-label">Urdu Name</label>
                <div class="col-sm-6">
                    <input type="text" name="ur_name" value="{{$area->ur_name}}" class="form-control urduFont"
                        id="area" placeholder="علاقہ درج کریں">
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
                    <input type="text" name="coverage_km" value="{{$area->coverage_km}}" class="form-control" id="area" placeholder="Coverage Area (Km)">
                </div>
            </div>
            @include('admin.map')
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-info">Edit</button>
            <a href="{{ url('view-areas') }}" class="btn btn-danger">Cancel</a>
        </div>
        <!-- /.card-footer -->
    </form>
</div>
<!-- /.card -->
@endsection
