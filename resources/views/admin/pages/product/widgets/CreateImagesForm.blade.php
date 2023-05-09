<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">

                </ol>
            </div>
            <h4 class="page-title">Create Product Gallery Images</h4>
        </div>
        <div class="card mb-md-0 mb-3">
            <div class="card-body">
                @include('admin.widgets.FlashMessage')
                <form action="{{route('InAdmin.Product.ProductImageUpload', $id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 col-md-6">
                            <label  class="form-label">Gallery Image</label>
                            <input type="file" multiple class="form-control" name="image[]"/>
                        </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>

            </div>

        </div>
    </div>

</div>
@section('scripts')


    <script>

    </script>
@endsection
