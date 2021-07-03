@extends('admin.app')
@section('title','View Units')

@section('header_title','Dashboard')
@section('maincontent')


{{-- <div id="notifDiv"
    style="z-index:10000; display: none; background: green; font-weight: 450; width: 350px; position: fixed; top: 32%; left: 22%;  color: white; padding: 5px 20px">
</div> --}}

<div class="card">
    <div class="card-header">
        <h3 class="card-title">View Units</h3>
        <a href="{{url('add-unit')}}" class=" btn btn-primary card-title float-right">Add Units</a>
    </div>

    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            {{ session('msg') }}
            <thead>
                <tr>
                    <th>Sr. #</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($units as $key => $unit)
                <tr>
                    <th class="text-right align-middle">{{$key+1}}</th>
                    <td class=" align-middle">{{$unit->name}}</td>
                    <td class="text-center align-middle">
                        @if($unit->status == 1)
                        <a href="unit/update-status/{{ $unit->id }}" class="btn btn-success">
                            Active
                        </a>

                        @else
                        <a href="unit/update-status/{{ $unit->id }}" class="btn btn-danger">
                            Inactive
                        </a>

                        @endif
                    </td>
                    <td class=" text-center align-middle">

                        <a href="edit-unit/{{$unit->id}}">
                            <i class="fas fa-edit text-primary"></i>
                        </a>
                        <a href="delete-unit/{{$unit->id}}">
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
@if(Session::has('Unit_deleted'))
<script>
toastr.success("{!! Session::get('Unit_deleted') !!}");
</script>
@endif
@endsection
