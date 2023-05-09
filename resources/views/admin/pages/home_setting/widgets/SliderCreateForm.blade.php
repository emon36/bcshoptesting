<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">

                </ol>
            </div>
            <h4 class="page-title">Create Slide</h4>
        </div>
        <div class="card mb-md-0 mb-3">
            <div class="card-body ">
                @include('admin.widgets.FlashMessage')
                <form class="row g-3" method="POST" action="{{route('InAdmin.Home.Slider.Image.Upload')}}" enctype="multipart/form-data" >
                    @csrf
                    <div class="row g-2">
                        <div class="mb-3 col-md-12">
                            <label  class="form-label">Title*</label>
                            <input type="text" name="title" class="form-control" required  placeholder="Enter a Slider Title">
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="mb-3 col-md-12">
                            <label  class="form-label">Sub Title</label>
                            <input type="text" name="subtitle" class="form-control" required  placeholder="Enter a Sub Title">
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="mb-3 col-md-12">
                            <label  class="form-label">Image</label>
                            <input type="file" name="image" class="form-control" required onchange="loadFile(event)">
                            <img id="output" class="mt-2" width="100" height="100"/>
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form><!-- Vertical Form -->
            </div>
        </div>

    </div>
@section('scripts')
    <script>
        var loadFile = function(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('output');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
@endsection
