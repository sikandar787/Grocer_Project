<!-- Horizontal Form -->
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Edit Product</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal" method="POST" action="{{url('/edit-checked')}}"
        enctype="multipart/form-data">
        @csrf
        @foreach($products as $product)
        <div class="card-body">

            <!-- <div class="form-check ml-4" style="display:none;">
                <input class="form-check-input" type="checkbox" id="chunk" value="{{$product->id}}" checked>
            </div> -->

            <input type="hidden" value="{{$product->id}}" name="id[]">
        
            <div class="form-group row">
                <label for="product" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" name="name[]" value = "{{ $product->name }}" class="form-control" id="product" placeholder="Name">
                </div>
            </div>

            <div class="form-group row">
                <label for="product" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-6">
                    <input type="text" name="price[]" value = "{{ $product->price }}" class="form-control" id="product" placeholder="Price">
                </div>
            </div>

            <div class="form-group row">
                <label for="product" class="col-sm-2 col-form-label">Discount Price</label>
                <div class="col-sm-6">
                    <input type="text" name="discount_price[]" value = "{{ $product->discount_price }}" class="form-control" id="product" placeholder="Discount Price">
                </div>
            </div>
        </div>
        @endforeach
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-info" onclick="getid()">Edit</button>
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