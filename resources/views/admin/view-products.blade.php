@extends('admin.app')
@section('title','View Products')
@section('header_title','Dashboard')
@section('maincontent')



<div class="card">
    <div class="card-header">
        <h3 class="card-title"></h3>
        <a href="{{url('add-product')}}" class=" btn btn-primary card-title float-right">Add Product</a>
    </div>
    <div id="notifDiv"
        style="z-index:10000; display: none; background: green; font-weight: 450; width: 350px; position: fixed; top: 32%; left: 22%;  color: white; padding: 5px 20px">
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Sr. #</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Urdu Name</th>
                    {{-- <th>Description</th>
                    <th>Urdu Description</th> --}}
                    <th>Category</th>
                    <th>Price</th>
                    <th>Discount Price</th>
                    <th>Maximum Purchase Limit</th>
                    <th>Weight</th>
                    <th>Unit</th>
                    {{-- <th>Featured</th> --}}

                    {{-- <th>Status</th> --}}
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $i = 1
                @endphp
                @foreach($products as $key => $product)
                <tr>
                    <th class="text-right align-middle">{{$key+1}}</th>
                    <td class="text-center align-middle"><img src="{{$product->image}}" class="rounded" height="70"
                            width="70" alt="">
                    </td>
                    <td class=" align-middle">{{$product->name}}</td>
                    <td class=" align-middle">{{$product->ur_name}}</td>
                    {{-- <td class=" align-middle">{{$product->description}}</td>
                    <td class=" align-middle">{{$product->ur_description}}</td> --}}
                    <td class=" align-middle">{{$product->categories->name}}</td>
                    <td class=" align-middle">{{$product->price}}</td>
                    <td class=" align-middle">{{$product->discount_price}}</td>
                    <td class=" align-middle">{{$product->max_limit}}</td>
                    <td class=" align-middle">{{$product->weight}}</td>
                    <td class=" align-middle">{{$product->units->name}}</td>
                    {{-- <td class=" align-middle">{{$product->is_featured}}</td> --}}
                    <!-- <td>{{$product->status}}</td> -->
                    {{-- <td class="text-center align-middle">
                        @if($category->status == 1)
                        <button
                            class="pushy__btn pushy__btn--sm pushy__btn--red change_status_btn enable_disable_category"
                            id="{{$category->id}}">Disable</button>
                        @else
                        <button
                            class="pushy__btn pushy__btn--sm pushy__btn--green change_status_btn enable_disable_category"
                            id="{{$category->id}}">Enable</button>
                        <!-- <label class="switch">
                            <input type="checkbox" class="enable_disable_product" id="{{$category->id}}" checked>
                            <span class="slider round"></span>
                        </label> -->
                        @endif
                    </td> --}}
                    <td class=" text-center align-middle">
                        <a href="edit-product/{{$product->id}}">
                            <i class="fas fa-edit text-primary"></i>
                        </a>
                        <a href="delete-product/{{$product->id}}">
                            <i class="fas fa-trash text-danger"></i>
                        </a>
                    </td>
                    @endforeach
                </tr>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

@endsection

@section('script')
@if(Session::has('product_deleted'))
<script>
toastr.success("{!! Session::get('product_deleted') !!}");
</script>
@endif
@endsection
