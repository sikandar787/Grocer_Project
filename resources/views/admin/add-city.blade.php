@extends('admin.app')
@section('title','Add City')
@section('header_title','Dashboard')
@section('maincontent')



<!-- Horizontal Form -->
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Add City</h3>
    </div>

    <!-- /.card-header -->
    <!-- form start -->


    <form class="form-horizontal" method="POST" action="{{ route('add-city') }}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            @if($errors->first('name'))
            <div class="alert alert-danger">
                {{$errors->first('name')}}
            </div>
            @endif
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">City Name</label>
                <div class="col-sm-6">
                    <input type="text" name="name" class="form-control" id="name">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label" >City Urdu Name</label>
                <div class="col-sm-6">
                    <input type="text" name="ur_name" class="form-control urduFont"  id="name">
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info">Add</button>
            <a href="{{ url('view-cities') }}" class="btn btn-danger">Cancel</a>
        </div>
        <!-- /.card-footer -->
    </form>
</div>
<!-- /.card -->

@endsection
