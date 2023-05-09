<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
            </div>
            <h4 class="page-title">All Products</h4>
            <form action="" method="">
                <div class="input-group mb-3">
                    <input type="search" class="form-control" name="search"  placeholder="Search with Product title" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="table-data">
            <table class="table table-striped  table-centered mb-0 table-responsive">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Stock</th>
                    <th>Approved</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$product->title}}</td>
                        <?php
                        foreach ($product->images->where('position_key', 1) as $image)
                        {
                            $featureImage = $image->image;
                        }
                        ?>


                        <td><img src="{{asset('uploads/images/products/'.$featureImage)}}" width="100" height="100"></td>
                        <td>{{$product->current_stock}}</td>
                        <td>
                            <input type="checkbox" data-id="{{$product->id}}" class="toggle" id="switch{{$product->id}}" @if($product->status == 'Approved') checked @endif data-switch="success"/>
                            <label for="switch{{$product->id}}" data-on-label="" width data-off-label=""></label>
                        </td>
                        <td>
                            <a href="{{route('InAdmin.Product.EditPage', $product->id)}}"  class="edit btn btn-info btn-sm"> <i class="mdi mdi-pencil"></i> </a>
                            <a href="{{route('InAdmin.Product.Delete', $product->id)}}"  class="delete btn btn-danger btn-sm"> <i class="mdi mdi-trash-can"></i> </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center mt-5">
            {!! $products->links() !!}
        </div>
    </div>
</div>



@section('scripts')
    <script>
        $('.toggle').on('change', function() {
            var status = $(this).prop('checked') == true ? 'Approved' : 'Pending';
            var product_id = $(this).data('id');
            $.ajax({
                type: 'GET',
                dataType: 'JSON',
                url: '{{ route('InAdmin.Product.ChangeStatus') }}',
                data: {
                    'status': status,
                    'product_id': product_id
                },
                success:function(data) {
                    alert(data.success);
                }
            });
        });

    </script>


@endsection
