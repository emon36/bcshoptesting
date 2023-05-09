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
                <h4 class="page-title">Edit Banner</h4>
            </div>
            <div class="card mb-md-0 mb-3">
                <div class="card-body ">
                    @include('admin.widgets.FlashMessage')
                    <form class="row g-3" method="POST" action="{{route('InAdmin.Update.Banner', $banner->id)}}" enctype="multipart/form-data" >
                        @csrf
                        <div class="row g-2">
                            <div class="mb-3 col-md-12">
                                <label  class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" value="{{$banner->title}}"  placeholder="Enter a Slider Title">
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="mb-3 col-md-12">
                                <label  class="form-label">Sub Title</label>
                                <input type="text" name="subtitle" class="form-control"   value="{{$banner->subtitle}}" placeholder="Enter a Sub Title">
                            </div>
                        </div>

                        <div class="row g-2">
                            <div class="mb-3 col-md-6">
                                <label  class="form-label">Banner Type</label>
                                <select class="form-control" name="banner_type">
                                    <option value="Slider Banner" @if($banner->banner_type == 'Slider Banner' ) selected @endif>Slider Banner</option>
                                    <option value="Main Section Banner" @if($banner->banner_type == 'Main Section Banner' ) selected @endif>Main Section Banner</option>
                                    <option value="Footer Banner" @if($banner->banner_type == 'Footer Banner' ) selected @endif>Footer Banner</option>
                                    <option value="Product Banner" @if($banner->banner_type == 'Product Banner' ) selected @endif>Product Banner</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label  class="form-label">URL</label>
                                <input type="text" name="url"  value="{{$banner->url}}" class="form-control" required  placeholder="Enter a url">
                            </div>
                        </div>

                        <div class="row g-2">
                            <div class="mb-3 col-md-12">
                                <label  class="form-label">Image</label>
                                <input type="file" name="image" class="form-control" onchange="loadFile(event)">
                                <img id="output" src="{{asset('uploads/images/banner/'.$banner->image)}}"  class="mt-2" width="900" height="300"/>
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
