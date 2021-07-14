@extends('admin.app')
@section('title','View Cities')
@section('header_title','Dashboard')
@section('maincontent')


{{-- <div id="notifDiv"
    style="z-index:10000; display: none; background: green; font-weight: 450; width: 350px; position: fixed; top: 32%; left: 22%;  color: white; padding: 5px 20px">
</div> --}}

<div class="card">
    <div class="card-header">
        <h3 class="card-title"></h3>
        <a href="{{url('add-city')}}" class=" btn btn-primary card-title float-right">Add Cities</a>
    </div>

    <!-- /.card-header -->
    <div class="card-body">
    @if(Session::has('error'))
        <div class="alert alert-danger ">{{session::get('error')}}</div>
    @endif
        <table id="example1" class="table table-bordered table-striped">
            <div class="msg" style="text-align: left; background-color:rgb(129, 197, 129);">{{ session('msg') }}</div>
            <thead>
                <tr>
                    <th>Sr. #</th>
                    <th>City Name</th>
                    <th>City Urdu Name</th>
                    <th>City Latitude</th>
                    <th>City Longitude</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cities as $key => $city)
                <tr>
                    <th class="text-right align-middle">{{$key+1}}</th>
                    <td class=" align-middle">{{$city->name}}</td>
                    <td class=" align-middle">{{$city->ur_name}}</td>
                    <td class=" align-middle">{{$city->latitude}}</td>
                    <td class=" align-middle">{{$city->longitude}}</td>
                    <td class="text-center align-middle">
                        @if($city->status == 1)
                        <a href="city/update-status/{{ $city->id }}" class="btn btn-success">
                            Active
                        </a>

                        @else
                        <a href="city/update-status/{{ $city->id }}" class="btn btn-danger">
                            Inactive
                        </a>

                        @endif
                    </td>
                    <td class=" text-center align-middle">
                        <a href="edit-city/{{$city->id}}">
                            <i class="fas fa-edit text-primary"></i>
                        </a>
                        <a href="delete-city/{{$city->id}}">
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
@if(Session::has('City_deleted'))
<script>
toastr.success("{!! Session::get('City_deleted') !!}");
</script>
@endif
@endsection
