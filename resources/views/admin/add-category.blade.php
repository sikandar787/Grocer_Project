@extends('admin.app')
@section('title','Add Category')
@section('header_title','Dashboard')
@section('maincontent')
<!-- Horizontal Form -->
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Add Category</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->


    <form class="form-horizontal" method="POST" action="{{ route('add-category') }}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            @if($errors->first('name'))
            <div class="alert alert-danger">
                {{$errors->first('name')}}
            </div>
            @endif
            <div class="form-group row">
                <label for="category" class="col-sm-2 col-form-label">Category Name</label>
                <div class="col-sm-6">
                    <input type="text" name="name" class="form-control" id="category" placeholder="Category Name">
                </div>
            </div>

            @if($errors->first('ur_name'))
            <div class="alert alert-danger">
                {{$errors->first('ur_name')}}
            </div>
            @endif
            <div class="form-group row">
                <label for="category" class="col-sm-2 col-form-label">Category Urdu Name</label>
                <div class="col-sm-6">
                    <input type="text" name="ur_name" class="form-control urduFont" id="category" placeholder="کیٹیگری درج کریں">
                </div>
            </div>

            @if($errors->first('description'))
            <div class="alert alert-danger">
                {{$errors->first('description')}}
            </div>
            @endif
            <div class="form-group row">
                <label for="category" class="col-sm-2 col-form-label">Description</label>
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
                <label for="category" class="col-sm-2 col-form-label">Urdu Description</label>
                <div class="col-sm-6">
                    <textarea name="description" class="form-control urduFont" id="description" cols="10" rows="3"></textarea>
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
            <a href="{{ url('view-categories') }}" class="btn btn-danger">Cancel</a>
        </div>
        <!-- /.card-footer -->
    </form>
</div>
<!-- /.card -->
@endsection
