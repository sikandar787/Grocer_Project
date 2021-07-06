@extends('admin.app')
@section('title','View Products')
@section('header_title','Dashboard')
@section('maincontent')



<div class="card oldCard">
    <div class="card-header">
        <h3 class="card-title"></h3>
        <a href="{{url('add-product')}}" class=" btn btn-primary card-title float-right">Add Product</a>
    </div>
    <div id="notifDiv"
        style="z-index:10000; display: none; background: green; font-weight: 450; width: 350px; position: fixed; top: 32%; left: 22%;  color: white; padding: 5px 20px">
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <button id="update_checked" class="btn btn-secondary" onclick="getid()">Edit Multiple Records</button>
        <table id="example1" class="table table-bordered table-striped">
            <div class="msg" style="text-align: left; background-color:rgb(129, 197, 129);">{{ session('success') }}</div>

            <thead>
                <tr>
                    <th>Option</th>
                    <th>Sr. #</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Urdu Name</th>
                    {{-- <th>Description</th>
                    <th>Urdu Description</th> --}}
                    <th>Category</th>
                    <th>Price</th>
                    <!-- <th>Discount Price</th> -->
                    <!-- <th>Maximum Purchase Limit</th> -->
                    <!-- <th>Weight</th> -->
                    <!-- <th>Unit</th> -->
                    {{-- <th>Featured</th> --}}

                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $i = 1
                @endphp
                @foreach($products as $key => $product)
                <tr>
                    <td class="text-right align-middle">
                        <div class="form-check ml-4">
                            <input class="form-check-input checkbox-sm" type="checkbox" id="cheek" value="{{$product->id}}" style="width:16px; height: 16px;">
                        </div>
                    </td>
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
                    <!-- <td class=" align-middle">{{$product->discount_price}}</td> -->
                    <!-- <td class=" align-middle">{{$product->max_limit}}</td> -->
                    <!-- <td class=" align-middle">{{$product->weight}}</td> -->
                    <!-- <td class=" align-middle">{{$product->units->name}}</td> -->
                    {{-- <td class=" align-middle">{{$product->is_featured}}</td> --}}
                    <td class="text-center align-middle">
                        @if($product->status == 1)
                        <a href="product/update-status/{{ $product->id }}" class="btn btn-success">
                            Active
                        </a>

                        @else
                        <a href="product/update-status/{{ $product->id }}" class="btn btn-danger">
                            Inactive
                        </a>

                        @endif
                    </td>
                    <td class=" text-center align-middle">
                        <a href="edit-product/{{$product->id}}" title="Edit">
                            <i class="fas fa-edit text-primary"></i>
                        </a>
                        <a href="product-details/{{$product->id}}" title="Details">
                            <i class="fa fa-list-alt" aria-hidden="true"></i>
                        </a>
                        <a href="delete-product/{{$product->id}}" title="Delete">
                            <i class="fas fa-trash text-danger"></i>
                        </a>
                    </td>
                    @endforeach
                </tr>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<div class="card newCard">
</div>
<!-- /.card -->

@endsection

@section('script')
@if(Session::has('product_deleted'))
<script>
toastr.success("{!! Session::get('product_deleted') !!}");
</script>
@endif
<script type="text/javascript">
    function getid(){
        var arr = [];
        $("#cheek:checked").each(function(){
            arr.push($(this).val());
        });
        console.log(arr);
        $.ajax({
            url: '/update-checked',
            type: 'get',
            data: {'id': arr},
            success: (function (response) {
                $('.oldCard').hide();
                $('.newCard').html(response);
            })
        });
    }
</script>
@endsection
