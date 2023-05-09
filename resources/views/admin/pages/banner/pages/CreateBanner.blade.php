@extends('admin.layouts.Master')
@section('title', 'Create Banner')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">

                    </ol>
                </div>
                <h4 class="page-title">Create Banner</h4>
            </div>
            <div class="card mb-md-0 mb-3">
                <div class="card-body ">
                    @include('admin.widgets.FlashMessage')
                    <form class="row g-3" method="POST" action="{{route('InAdmin.Store.Banner')}}" enctype="multipart/form-data" >
                        @csrf
                        <div class="row g-2">
                            <div class="mb-3 col-md-12">
                                <label  class="form-label">Title</label>
                                <input type="text" name="title" class="form-control"  placeholder="Enter a Slider Title">
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="mb-3 col-md-12">
                                <label  class="form-label">Sub Title</label>
                                <input type="text" name="subtitle" class="form-control"   placeholder="Enter a Sub Title">
                            </div>
                        </div>

                        <div class="row g-2">
                            <div class="mb-3 col-md-6">
                                <label  class="form-label">Banner Type</label>
                                <select class="form-control" name="banner_type">
                                    <option value="Slider Banner">Slider Banner</option>
                                    <option value="Main Section Banner">Main Section Banner</option>
                                    <option value="Footer Banner">Footer Banner</option>
                                    <option value="Product Banner">Product Banner</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label  class="form-label">URL</label>
                                <input type="text" name="url" class="form-control" required  placeholder="Enter a url">
                            </div>
                        </div>

                        <div class="row g-2">
                            <div class="mb-3 col-md-12">
                                <label  class="form-label">Image</label>
                                <input type="file" name="image" class="form-control" required onchange="loadFile(event)">
                                <img id="output" class="mt-2" width="900" height="300"/>
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </form><!-- Vertical Form -->
                </div>
            </div>

        </div>
@endsection
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
