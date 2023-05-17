<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">

                </ol>
            </div>
            <h4 class="page-title">Create Blog</h4>
        </div>
        <div class="card mb-md-0 mb-3">
            <div class="card-body">
                @include('admin.widgets.FlashMessage')
                <form action="{{route('InAdmin.Blog.UpdateProcess', $blog->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-2">
                        <div class="mb-3 col-md-12">
                            <label  class="form-label">Title</label>
                            <input type="text" name="title"  class="form-control" value="{{$blog->title}}" required  placeholder="Give a Blog Title">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Content</label>
                        <textarea class="form-control" id="editor" name="description" required>{{$blog->content}} </textarea>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label  class="form-label">Image</label>
                        <input type="file" name="image" class="form-control" required>
                        <img class="mt-2" src="{{asset('uploads/images/blog/'.$blog->image)}}" width="100" height="100">
                    </div>

                    <button type="submit" formnovalidate="formnovalidate"  class="btn btn-primary">Submit</button>
                </form>

            </div>

        </div>
    </div>

</div>
