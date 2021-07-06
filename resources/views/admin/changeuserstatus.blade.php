@extends('admin.app')
@section('title','Change User Status')
@section('header_title','Dashboard')
@section('maincontent')
<!-- Horizontal Form -->
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Change User Status</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->


    <form class="form-horizontal" method="POST" action="{{ route('update-status',  $user->id) }}">
        @csrf
        <div class="card-body">


            <div class="form-group row">
                <label for="product" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-6">
                    <select class="form-control select2" name="status">
                        <option disabled selected hidden>Select Status</option>
                        <option class="mt-5 p-5" value="1">Approve</option>
                        <option class="mt-5 p-5" value="2">Reject</option>

                    </select>
                </div>
            </div>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-info">Change</button>
            <a href="{{ url('view-users') }}" class="btn btn-danger">Cancel</a>
        </div>
        <!-- /.card-footer -->
    </form>
</div>
<!-- /.card -->
<script>
    function showArea(){
        var cityId = jQuery('#citySelector').val();
        $.ajax({
            url: '/get-area',
            type: 'get',
            data: {id:cityId},
            success: function(data){
                var html = '';
                jQuery.each(data, function(index, value){
                    html += '<option value="' + value.id + ',' + value.latitude + ',' + value.longitude + '">' + value.name + '</option>';
                });
                $('#areas').append(html);
            }
        });
    }
</script>
@endsection
