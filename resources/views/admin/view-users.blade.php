@extends('admin.app')
@section('title','View Users')
@section('header_title','Dashboard')
@section('maincontent')



<div class="card">
    {{-- <div class="card-header">
        <h3 class="card-title"></h3>
        <a href="{{url('add-category')}}" class=" btn btn-primary card-title float-right">Add Category</a>
    </div> --}}
    <div id="notifDiv"
        style="z-index:10000; display: none; background: green; font-weight: 450; width: 350px; position: fixed; top: 32%; left: 22%;  color: white; padding: 5px 20px">
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Sr. #</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Area</th>
                    <th>Status</th>
                    <th>Change Status</th>
                    {{-- <th>Action</th> --}}
                </tr>
            </thead>
            <tbody>
                @php
                $i = 1
                @endphp
                @foreach($users as $key => $user)
                <tr>
                    <th class="text-right align-middle">{{$key+1}}</th>
                    <td class=" align-middle">{{$user->name}}</td>
                    <td class=" align-middle">{{$user->email}}</td>
                    <td class=" align-middle">{{$user->phone_number}}</td>
                    <td class=" align-middle">{{$user->complete_address}}</td>
                    <td class=" align-middle">{{$user->cities->name}}</td>
                    <td class=" align-middle">{{$user->areas->name}}</td>
                    <td class="text-center align-middle">
                        @if($user->status == 0)
                            <label for="Pending" class="text-secondary">Pending</label>
                        @elseif ($user->status == 1)
                        <label for="Approved" class="text-success">Approved</label>
                        @else
                        <label for="Rejected" class="text-danger">Rejected</label>
                        @endif
                    </td>
                    <td class=" text-center align-middle">
                        <a href="changeuserstatus/{{$user->id}}">
                            <i class="fas fa-edit text-primary"></i>
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
@if(Session::has('user_deleted'))
<script>
toastr.success("{!! Session::get('user_deleted') !!}");
</script>
@endif
@endsection
