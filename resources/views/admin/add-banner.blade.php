@extends('admin.app')
@section('title','Add Banner')
@section('header_title','Dashboard')
@section('maincontent')
<!-- Horizontal Form -->
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Add Banner</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->


    <form class="form-horizontal" method="POST" action="{{ route('add-banner') }}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            @if($errors->first('name'))
            <div class="alert alert-danger">
                {{$errors->first('name')}}
            </div>
            @endif
            <div class="form-group row">
                <label for="product" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" name="name" class="form-control" id="product" placeholder="Name">
                </div>
            </div>

            @if($errors->first('ur_name'))
            <div class="alert alert-danger">
                {{$errors->first('ur_name')}}
            </div>
            @endif
            <div class="form-group row">
                <label for="product" class="col-sm-2 col-form-label">Urdu Name</label>
                <div class="col-sm-6">
                    <input type="text" name="ur_name" class="form-control urduFont" id="product" placeholder="نام درج کریں">
                </div>
            </div>

            @if($errors->first('category_id'))
            <div class="alert alert-danger">
                {{$errors->first('category_id')}}
            </div>
            @endif
            <div class="form-group row">
                <label for="product" class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-6">
                    <select class="form-control select2" name="category_id">
                        <option disabled selected hidden>Select Category</option>
                        @if($categories->count())
                        @foreach($categories as $category)
                        <option class="mt-5 p-5" value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                        @else
                        <option>No Categories Found</option>
                        @endif
                    </select>
                </div>
            </div>
            
            @if($errors->first('city_id'))
            <div class="alert alert-danger">
                {{$errors->first('city_id')}}
            </div>
            @endif
            <div class="form-group row">
                <label for="product" class="col-sm-2 col-form-label">City</label>
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

            @if($errors->first('shop_id'))
            <div class="alert alert-danger">
                {{$errors->first('shop_id')}}
            </div>
            @endif
            <div class="form-group row">
                <label for="product" class="col-sm-2 col-form-label">Shop</label>
                <div class="col-sm-6">
                    <select class="form-control select2" name="shop_id">
                        <option disabled selected hidden>Select Shop</option>
                        @if($shops->count())
                        @foreach($shops as $shop)
                        <option class="mt-5 p-5" value="{{$shop->id}}">{{$shop->name}}</option>
                        @endforeach
                        @else
                        <option>No Shops Found</option>
                        @endif
                    </select>
                </div>
            </div>

            @if($errors->first('product_id'))
            <div class="alert alert-danger">
                {{$errors->first('product_id')}}
            </div>
            @endif
            <div class="form-group row">
                <label for="product" class="col-sm-2 col-form-label">Product</label>
                <div class="col-sm-6">
                    <select class="form-control select2" name="product_id">
                        <option disabled selected hidden>Select Product</option>
                        @if($products->count())
                        @foreach($products as $product)
                        <option class="mt-5 p-5" value="{{$product->id}}">{{$product->name}}</option>
                        @endforeach
                        @else
                        <option>No Products Found</option>
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
            <a href="{{ url('view-banners') }}" class="btn btn-danger">Cancel</a>
        </div>
        <!-- /.card-footer -->
    </form>
</div>
<!-- /.card -->
@endsection
