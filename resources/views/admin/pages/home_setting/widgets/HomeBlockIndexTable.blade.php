<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
            </div>
            <h4 class="page-title">All Home Page Sections</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-12">
        <table class="table table-responsive">
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
            @foreach($homeBlocks as $homeBlock)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$homeBlock->title}}</td>
                    <td><img src="{{asset('uploads/images/section/'.$homeBlock->image)}}" width="100" height="100"></td>
                    <td>
                        <input type="checkbox" data-id="{{$homeBlock->id}}" class="toggle" id="switch{{$homeBlock->id}}" @if($homeBlock->status == 'active') checked @endif data-switch="success"/>
                        <label for="switch{{$homeBlock->id}}" data-on-label="" width data-off-label=""></label>
                    </td>
                    <td>
                        <a href="{{route('InAdmin.Home.Blocks.Product.AddPage', $homeBlock->id)}}"  class=" btn btn-info btn-sm">Add Products</a>
                        <a href="{{route('InAdmin.Home.Blocks.Product.EditPage', $homeBlock->id)}}"  class="delete btn btn-info btn-sm"> <i class="mdi mdi-pencil"></i>  </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@section('scripts')
    <script>
        $('.toggle').on('change', function() {
            var status = $(this).prop('checked') == true ? 'active' : 'inactive';
            var id = $(this).data('id');
            $.ajax({
                type: 'GET',
                dataType: 'JSON',
                url: '{{ route('InAdmin.Home.Section.Status.Change') }}',
                data: {
                    'status': status,
                    'id': id
                },
                success:function(data) {
                    alert(data.success);
                }
            });
        });

    </script>


@endsection
