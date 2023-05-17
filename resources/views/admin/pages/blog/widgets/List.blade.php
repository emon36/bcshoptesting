<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
            </div>
            <h4 class="page-title">All Blogs</h4>
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
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($blogs as $blog)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$blog->title}}</td>

                        <td><img src="{{asset('uploads/images/blog/'.$blog->image)}}" width="100" height="100"></td>
                        <td>
                            <input type="checkbox" data-id="{{$blog->id}}" class="toggle" id="switch{{$blog->id}}" @if($blog->status == 'Publish') checked @endif data-switch="success"/>
                            <label for="switch{{$blog->id}}" data-on-label="" width data-off-label=""></label>
                        </td>
                        <td>
                            <a href="{{route('InAdmin.Blog.EditPage', $blog->id)}}"  class="edit btn btn-info btn-sm"> <i class="mdi mdi-pencil"></i> </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>



@section('scripts')
    <script>
        $('.toggle').on('change', function() {
            var status = $(this).prop('checked') == true ? 'Publish' : 'UnPublish';
            var blog_id = $(this).data('id');
            $.ajax({
                type: 'GET',
                dataType: 'JSON',
                url: '{{ route('InAdmin.Blog.ChangeStatus') }}',
                data: {
                    'status': status,
                    'blog_id': blog_id
                },
                success:function(data) {
                    alert(data.success);
                }
            });
        });

    </script>


@endsection
