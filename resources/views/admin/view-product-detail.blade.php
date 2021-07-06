
@extends('admin.app')
@section('title','View Products')
@section('header_title','Dashboard')
@section('maincontent')



<div class="card">
    <div class="card-header">
        <h3 class="card-title"></h3>
        <a href="{{url('view-products')}}" class=" btn btn-primary card-title float-right">Back</a>
    </div>

    <div class="card-body">
        <h2 style="text-align : center;">Product Details</h2>
        <table id="example1" class="table table-bordered table-striped">

                <tr>


                    <th>Product Name</th>
                    <td>{{ $detail->name }}</td>
                </tr>

                <tr>

                    <th>Product Urdu Name</th>
                    <td class=" align-middle">{{$detail->ur_name}}</td>
                </tr>
                <tr>

                    <th>Product Description</th>
                    <td class=" align-middle">{{$detail->description}}</td>
                </tr>
                <tr>

                    <th>Product Urdu Description</th>
                    <td class=" align-middle">{{$detail->ur_description}}</td>
                </tr>
                <tr>

                    <th>Product Price</th>
                    <td class=" align-middle">{{$detail->price}}</td>
                </tr>
                <tr>

                    <th>Product Category</th>
                    <td class=" align-middle">{{$detail->categories->name}}</td>
                </tr>

                <tr>
                    <th>Discounted Price</th>
                    <td class=" align-middle">{{$detail->discount_price}}</td>
                </tr>
                <tr>
                    <th>Maximum Purchase Limit	</th>
                    <td class=" align-middle">{{$detail->max_limit}}</td>
                </tr>
                <tr>
                    <th>Weight</th>
                    <td class=" align-middle">{{$detail->weight}}</td>
                </tr>
                <tr>
                    <th>Unit</th>
                    <td class=" align-middle">{{$detail->units->name}}</td>
                </tr>

                <tr>
                    <th>Location Status</th>
                    @if ($detail->location_status == 1)
                    <td class=" align-middle">All Over</td>
                    @else
                    <td class=" align-middle">Area Specific</td>
                    @endif

                </tr>


                </tr>

            <tbody>


        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

@endsection

