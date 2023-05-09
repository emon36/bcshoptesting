`<div class="row">
    <div class="page-title-box">
        <div class="page-title-right">
            <ol class="breadcrumb m-0">

            </ol>
        </div>
        <h4 class="page-title">Add Product Categories</h4>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                @include('admin.widgets.FlashMessage')
                <form action="{{route('InVendor.Product.CategoryStore', $product->id)}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="mb-3">
                            <select name="category_id[]" class="primary_select" required multiple>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}"> {{$category->title}}
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-info" type="submit">Submit</button>
                </form>
            </div>
        </div>

        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <table class="table table-borderless table-responsive">
                        <thead>
                        <tr>
                            <th>Product Category Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($productCategory as $row)
                        <tr>

                            <td>
                                {{$row->category->title}}
                            </td>
                            <td>
                                <a href="{{route('InVendor.Product.CategoryDelete', $row->id)}}" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
</div>

@section('scripts')
    <script>
        $(document).ready(function() {
            $('select').niceSelect();
        });

    </script>
@endsection
`
