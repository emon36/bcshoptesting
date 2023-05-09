<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">

                </ol>
            </div>
            <h4 class="page-title">Add Product Categories</h4>
        </div>
        <div class="card">
            <div class="card-body">
                @include('admin.widgets.FlashMessage')
                <form action="{{route('InAdmin.Product.ProductCategoryStore', $id)}}" method="POST">
                    @csrf
                    <div class="mb-3 col-md-12">
                        <select name="category_id[]" class="form-control" required multiple>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}"> {{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-info" type="submit">Submit</button>

                </form>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script>

    </script>
@endsection


