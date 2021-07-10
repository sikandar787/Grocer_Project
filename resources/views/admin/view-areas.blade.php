@extends('admin.app')
@section('title','View Areas')
@section('header_title','Dashboard')
@section('maincontent')



<div class="card">
    <div class="card-header">
        <h3 class="card-title"></h3>
        <a href="{{url('enter-area')}}" class=" btn btn-primary card-title float-right">Add Area</a>
    </div>
    <div id="notifDiv"
        style="z-index:10000; display: none; background: green; font-weight: 450; width: 350px; position: fixed; top: 32%; left: 22%;  color: white; padding: 5px 20px">
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <div class="msg" style="text-align: left; background-color:rgb(129, 197, 129);">{{ session('msg') }}</div>
            <thead>
                <tr>
                    <th>Sr. #</th>
                    <th>Name</th>
                    <th>Urdu Name</th>
                    <th>City</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Coverage Area (Km)</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $i = 1
                @endphp
                @foreach($areas as $key => $area)
                <tr>
                    <th class="text-right align-middle">{{$key+1}}</th>
                    </td>
                    <td class=" align-middle">{{$area->name}}</td>
                    <td class=" align-middle">{{$area->ur_name}}</td>
                    <td class=" align-middle">{{$area->cities->name}}</td>
                    <td class=" align-middle">{{$area->latitude}}</td>
                    <td class=" align-middle">{{$area->longitude}}</td>
                    <td class=" align-middle">{{$area->coverage_km}}</td>
                    <td class="text-center align-middle">
                        @if($area->status == 1)
                        <a href="area/update-status/{{ $area->id }}" class="btn btn-success">
                            Active
                        </a>

                        @else
                        <a href="area/update-status/{{ $area->id }}" class="btn btn-danger">
                            Inactive
                        </a>

                        @endif
                    </td>
                    <td class=" text-center align-middle">
                        <a href="edit-area/{{$area->id}}">
                            <i class="fas fa-edit text-primary"></i>
                        </a>
                        <a href="delete-area/{{$area->id}}">
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
@if(Session::has('area_deleted'))
<script>
toastr.success("{!! Session::get('area_deleted') !!}");
</script>
@endif
@endsection
