@extends('admin.app')
@section('title','Add Product')
@section('header_title','Dashboard')
@section('maincontent')
<!-- Horizontal Form -->
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Add Product</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->


    <form class="form-horizontal" method="POST" action="{{ route('add-product') }}" enctype="multipart/form-data">
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

            @if($errors->first('description'))
            <div class="alert alert-danger">
                {{$errors->first('description')}}
            </div>
            @endif
            <div class="form-group row">
                <label for="product" class="col-sm-2 col-form-label">Description</label>
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
                <label for="product" class="col-sm-2 col-form-label">Urdu Description</label>
                <div class="col-sm-6">
                    <textarea name="ur_description"class="form-control urduFont" id="description" cols="10" rows="3"></textarea>
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

            @if($errors->first('price'))
            <div class="alert alert-danger">
                {{$errors->first('price')}}
            </div>
            @endif
            <div class="form-group row">
                <label for="product" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-6">
                    <input type="text" name="price" class="form-control" id="product" placeholder="Price">
                </div>
            </div>

            {{-- @if($errors->first('discount_price'))
            <div class="alert alert-danger">
                {{$errors->first('discount_price')}}
            </div>
            @endif --}}
            <div class="form-group row">
                <label for="product" class="col-sm-2 col-form-label">Discount Price</label>
                <div class="col-sm-6">
                    <input type="text" name="discount_price" class="form-control" id="product" placeholder="Discount Price">
                </div>
            </div>

            @if($errors->first('max_limit'))
            <div class="alert alert-danger">
                {{$errors->first('max_limit')}}
            </div>
            @endif
            <div class="form-group row">
                <label for="product" class="col-sm-2 col-form-label">Maximum Purchase Limit</label>
                <div class="col-sm-6">
                    <input type="text" name="max_limit" class="form-control" id="product" placeholder="Maximum Purchase Limit">
                </div>
            </div>

            @if($errors->first('weight'))
            <div class="alert alert-danger">
                {{$errors->first('weight')}}
            </div>
            @endif
            <div class="form-group row">
                <label for="product" class="col-sm-2 col-form-label">Weight</label>
                <div class="col-sm-6">
                    <input type="text" name="weight" class="form-control" id="product" placeholder="Weight">
                </div>
            </div>

            @if($errors->first('unit_id'))
            <div class="alert alert-danger">
                {{$errors->first('unit_id')}}
            </div>
            @endif
            <div class="form-group row">
                <label for="product" class="col-sm-2 col-form-label">Unit</label>
                <div class="col-sm-6">
                    <select class="form-control select2" name="unit_id">
                        <option disabled selected hidden>Select Unit</option>
                        @if($units->count())
                        @foreach($units as $unit)
                        <option class="mt-5 p-5" value="{{$unit->id}}">{{$unit->name}}</option>
                        @endforeach
                        @else
                        <option>No Units Found</option>
                        @endif
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="shop" class="col-sm-2 col-form-label">Shop</label>
                <div class="col-sm-6">
                    <select class="form-control select2" name="location_status" onchange="getShops()" id="locationStatus">
                        <option disabled selected hidden>Select Location Status</option>
                        <option class="mt-2 p-5" value="0" >Area Specific</option>
                        <option class="mt-2 p-5" value="1">Over All</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="shop" class="col-sm-2 col-form-label">Shops</label>
                <div class="col-sm-6">
                    <select class="form-control select2 shops" name="shop_id">
                        <option disabled selected hidden>Select Shop</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="product" class="col-sm-2 col-form-label">Total Sold</label>
                <div class="col-sm-6">
                    <input type="text" name="total_sold" class="form-control" id="product" placeholder="Total Sold">
                </div>
            </div>

            @if($errors->first('is_featured'))
            <div class="alert alert-danger">
                {{$errors->first('is_featured')}}
            </div>
            @endif

            {{-- Feature &&Not Featured Products --}}
            <div class="form-group row">
                <label for="product" class="col-sm-2 col-form-label">Featured</label>
                <div class="col-sm-6">
                    <select class="form-control select2" name="is_featured">
                        <option disabled selected hidden>Select Option</option>
                        <option class="mt-5 p-5" value="0">Not Featured</option>
                        <option class="mt-5 p-5" value="1">Featured</option>
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
            <a href="{{ url('view-products') }}" class="btn btn-danger">Cancel</a>
        </div>
        <!-- /.card-footer -->
    </form>
</div>
<!-- /.card -->

<script>
    function getShops(){
        var location = jQuery('#locationStatus').val();
        $.ajax({
            url: 'get-specefic-shops',
            type: 'get',
            data: {id:location},
            success: function(data){
                // alert(data);
                var html = '<option>Select Shop</option>';
                jQuery.each(data, function(index, value){
                    html += '<option value="' + value.id + '">' + value.name + '</option>';
                });
                $('.shops').empty().append(html);
            }
        });
    }
</script>
@endsection
