@extends('admin.app')
@section('title','Edit Profile')
@section('header_title','Dashboard')
@section('maincontent')
<!-- Horizontal Form -->
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Edit Profile</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->




    <form class="form-horizontal" method="POST" action="{{route('update-profile')}}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            @if($errors->first('name'))
            <div class="alert alert-danger">
                {{$errors->first('name')}}
            </div>
            @endif
            @if(session()->has('update-profile'))
            <div class="alert alert-success">
                {{ session()->get('update-profile') }}
            </div>
            @endif
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" name="name" value="{{$profile->name}}" class="form-control" id="name"
                        placeholder="Add salesman Name">
                </div>
            </div>

            @if($errors->first('email'))
            <div class="alert alert-danger">
                {{$errors->first('email')}}
            </div>
            @endif

            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="email" name="email" value="{{$profile->email}}" class="form-control" id="email"
                        placeholder="Add salesman Email">
                </div>
            </div>

            @if($errors->first('password'))
            <div class="alert alert-danger">
                {{$errors->first('password')}}
            </div>
            @endif

            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-6">
                    <input type="password" name="new_password" class="form-control" id="password">
                </div>
            </div>

            @if($errors->first('phone'))
            <div class="alert alert-danger">
                {{$errors->first('phone')}}
            </div>
            @endif

            <div class="form-group row">
                <label for="number" class="col-sm-2 col-form-label">Phone no.</label>
                <div class="col-sm-6">
                    <input type="number" name="phone" value="{{$profile->phone}}" class="form-control" id="number">
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-info">Edit</button>
            <a href="{{url('dashboard')}}" class="btn btn-danger">Cancel</a>
        </div>
        <!-- /.card-footer -->
    </form>
</div>
<!-- /.card -->



@endsection
