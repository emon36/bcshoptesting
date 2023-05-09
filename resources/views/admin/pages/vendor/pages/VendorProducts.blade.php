@extends('admin.layouts.Master')
@section('title', 'Vendor Products')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">

                    </ol>
                </div>
                <h4 class="page-title">Vendor Products</h4>
            </div>

            <div class="card vendor-card">
                <div class="card-body">
                    <table class="table dt-responsive nowrap w-100" id="basic-datatable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Product title</th>
                            <th>Image</th>
                            <th>Stock</th>
                            <th>Status</th>
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

            </div>

        </div>
    </div>

@endsection

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

