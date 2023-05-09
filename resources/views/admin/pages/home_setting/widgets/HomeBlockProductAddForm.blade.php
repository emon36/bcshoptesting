<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">

                </ol>
            </div>
            <h4 class="page-title">Add Product to {{$homeBlock->title}} Section</h4>
        </div>
        <div class="card mb-md-0 mb-3">
            <div class="card-body ">
                @include('admin.widgets.FlashMessage')
                <form class="row g-3" method="POST" action="{{route('InAdmin.Home.Blocks.Product.AddProcess', $homeBlock->id)}}">
                    @csrf
                    <div class="input-group ">
                        <label class="form-label">Add Products</label>
                        <select name="product_id" class="primary_select" required>
                            @foreach($products as $product)
                                <option value="{{$product->id}}"> {{$product->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <table class="table table-responsive">
                    <thead>
                   <tr>
                       <th>Product Title</th>
                       <th>Action</th>
                       </th>
                   </tr>
                    </thead>
                    <tbody>
                    @foreach($homeBlockProducts as $row)
                    <tr>
                        <td>{{$row->product->title}}</td>
                        <td><a href="{{route('InAdmin.Home.Blocks.Product.Delete', $row->id)}}" class="delete btn btn-danger btn-sm"> <i class="mdi mdi-trash-can"></i> </a> </td>
                    </tr>
                    @endforeach
                    </tbody>

                    <div class="d-flex justify-content-center mt-5">
                        {!! $homeBlockProducts->links() !!}
                    </div>

                </table>

            </div>
        </div>

    </div>
</div>
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.primary_select').niceSelect();
        });
    </script>
@endsection
