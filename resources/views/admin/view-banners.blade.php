@extends('admin.app')
@section('title','View Banners')
@section('header_title','Dashboard')
@section('maincontent')



<div class="card">
    <div class="card-header">
        <h3 class="card-title"></h3>
        <a href="{{url('add-banner')}}" class=" btn btn-primary card-title float-right">Add Banner</a>
    </div>
    <div id="notifDiv"
        style="z-index:10000; display: none; background: green; font-weight: 450; width: 350px; position: fixed; top: 32%; left: 22%;  color: white; padding: 5px 20px">
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <div class="msg" style="text-align: left; background-color:rgb(129, 197, 129);">{{ session('success') }}</div>

            <thead>
                <tr>
                    <th>Sr. #</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Urdu Name</th>
                    <th>City</th>
                    {{-- <th>Description</th>
                    <th>Urdu Description</th> --}}
                    <th>Category</th>
                    <!--<th>Shop</th>-->
                    <th>Product</th>
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
                @foreach($banners as $key => $banner)
                <tr>
                    <th class="text-right align-middle">{{$key+1}}</th>
                    <td class="text-center align-middle"><img src="{{$banner->image}}" class="rounded" height="70"
                            width="70" alt="">
                    </td>
                    <td class=" align-middle">{{$banner->name}}</td>
                    <td class=" align-middle">{{$banner->ur_name}}</td>
                    <td class=" align-middle">{{$banner->cities->name}}</td>
                    {{-- <td class=" align-middle">{{$banner->description}}</td>
                    <td class=" align-middle">{{$banner->ur_description}}</td> --}}
                    <td class=" align-middle">{{$banner->categories->name}}</td>
                    <!--<td class=" align-middle">{{$banner->shops->name}}</td>-->
                    <td class=" align-middle">{{$banner->products->name}}</td>
                    {{-- <td class=" align-middle">{{$banner->max_limit}}</td>
                    <td class=" align-middle">{{$banner->weight}}</td>
                    <td class=" align-middle">{{$banner->units->name}}</td> --}}
                    {{-- <td class=" align-middle">{{$banner->is_featured}}</td> --}}
                    <td class="text-center align-middle">
                        @if($banner->status == 1)
                        <a href="banner/update-status/{{ $banner->id }}" class="btn btn-success">
                            Active
                        </a>

                        @else
                        <a href="banner/update-status/{{ $banner->id }}" class="btn btn-danger">
                            Inactive
                        </a>

                        @endif
                    </td>
                    <td class=" text-center align-middle">
                        <a href="edit-banner/{{$banner->id}}">
                            <i class="fas fa-edit text-primary"></i>
                        </a>
                        <a href="delete-banner/{{$banner->id}}">
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
@if(Session::has('banner_deleted'))
<script>
toastr.success("{!! Session::get('banner_deleted') !!}");
</script>
@endif
@endsection
