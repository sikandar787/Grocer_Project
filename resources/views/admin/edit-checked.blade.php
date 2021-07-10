<!-- Horizontal Form -->
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Edit Product</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal" method="POST" action="{{url('/edit-checked')}}"
        enctype="multipart/form-data">
        <div class="container">
            @csrf
            <div class="form-group row">
                <label class="col-sm-1 col-form-label">Sr. No</label>
                <label class="col-sm-4 col-form-label">Product Name</label>
                <label class="col-sm-1 col-form-label">Image</label>
                <label class="col-sm-3 col-form-label">Price</label>
                <label class="col-sm-3 col-form-label">Discount Price</label>
            </div>
            @foreach($products as $key => $product)
            <input type="hidden" value="{{$product->id}}" name="id[]">
                <div class="form-group row">
                    <div class="col-sm-1">
                        <input type="text" value = "{{ $key+1}}" class="form-control text-bold">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="name[]" value = "{{ $product->name }}" class="form-control" id="product" placeholder="Name">
                    </div>
                    <div class="col-sm-1">
                        <img src="{{$product->image}}" class="rounded" height="35" width="35" alt="">
                    </div>
                    <div class="col-sm-3">
                        <input type="text" name="price[]" value = "{{ $product->price }}" class="form-control" id="product" placeholder="Price">
                    </div>
                    <div class="col-sm-3">
                        <input type="text" name="discount_price[]" value = "{{ $product->discount_price }}" class="form-control" id="product" placeholder="Discount Price">
                    </div>
                </div>
            @endforeach
        </div>
        
        
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-info" onclick="getid()">Edit All</button>
            <a href="{{ url('view-products') }}" class="btn btn-danger">Cancel</a>
        </div>
        <!-- /.card-footer -->
    </form>

</div>
<!-- /.card -->
<script type="text/javascript">
    function getid(){
        var arr = [];
        $("#chunk:checked").each(function(){
            arr.push($(this).val());
        });
        console.log(arr);
        $.ajax({
            url: '/edit-checked',
            type: 'post',
            data: {'id': arr},
            success: (function (response) {
                console.log(response);
                // $('.oldCard').hide();
                // $('.newCard').html(response);
            })
        });
    }
</script>