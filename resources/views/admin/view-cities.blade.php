@extends('admin.app')
@section('title','View Cities')
@section('header_title','Dashboard')
@section('maincontent')


{{-- <div id="notifDiv"
    style="z-index:10000; display: none; background: green; font-weight: 450; width: 350px; position: fixed; top: 32%; left: 22%;  color: white; padding: 5px 20px">
</div> --}}

<div class="card">
    <div class="card-header">
        <h3 class="card-title">View Units</h3>
        <a href="{{url('add-city')}}" class=" btn btn-primary card-title float-right">Add Cities</a>
    </div>

    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Sr. #</th>
                    <th>Cities Name</th>
                    <th>Cities Urdu Name</th>
                    {{-- <th>Status</th> --}}
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cities as $key => $city)
                <tr>
                    <th class="text-right align-middle">{{$key+1}}</th>
                    <td class=" align-middle">{{$city->name}}</td>
                    <td class=" align-middle">{{$city->ur_name}}</td>
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