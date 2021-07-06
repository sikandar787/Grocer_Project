@extends('admin.app')
@section('title','View Shops')
@section('header_title','Dashboard')
@section('maincontent')



<div class="card">
    <div class="card-header">
        <h3 class="card-title"></h3>
        <a href="{{url('add-shop')}}" class=" btn btn-primary card-title float-right">Add Shop</a>
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
                    <th>Mobile No.</th>
                    <th>City</th>
                    {{-- <th>Area</th> --}}
                    {{-- <th>Maximum Purchase Limit</th>
                    <th>Weight</th>
                    <th>Unit</th> --}}
                    {{-- <th>Featured</th> --}}

                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $i = 1
                @endphp
                @foreach($shops as $key => $shop)
                <tr>
                    <th class="text-right align-middle">{{$key+1}}</th>
                    <td class="text-center align-middle"><img src="{{$shop->image}}" class="rounded" height="70"
                            width="70" alt="">
                    </td>
                    <td class=" align-middle">{{$shop->name}}</td>
                    <td class=" align-middle">{{$shop->ur_name}}</td>
                    {{-- <td class=" align-middle">{{$shop->description}}</td>
                    <td class=" align-middle">{{$shop->ur_description}}</td> --}}
                    <td class=" align-middle">{{$shop->number}}</td>
                    <td class=" align-middle">{{$shop->cities->name}}</td>
                    {{-- <td class=" align-middle">{{$shop->areas->name}}</td> --}}
                    {{-- <td class=" align-middle">{{$shop->discount_price}}</td>
                    <td class=" align-middle">{{$shop->max_limit}}</td>
                    <td class=" align-middle">{{$shop->weight}}</td> --}}
                    {{-- <td class=" align-middle">{{$shop->is_featured}}</td> --}}
                    <td class="text-center align-middle">
                        @if($shop->status == 1)
                        <a href="shop/update-status/{{ $shop->id }}" class="btn btn-success">
                            Active
                        </a>

                        @else
                        <a href="shop/update-status/{{ $shop->id }}" class="btn btn-danger">
                            Inactive
                        </a>

                        @endif
                    </td>
                    <td class=" text-center align-middle">
                        <a href="edit-shop/{{$shop->id}}">
                            <i class="fas fa-edit text-primary"></i>
                        </a>
                        <a href="delete-shop/{{$shop->id}}">
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
@if(Session::has('shop_deleted'))
<script>
toastr.success("{!! Session::get('shop_deleted') !!}");
</script>
@endif
@endsection
