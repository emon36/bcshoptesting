@extends('admin.layouts.Master')
@section('title', 'Banner List')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">

                    </ol>
                </div>
                <h4 class="page-title">Banner</h4>
            </div>

            <div class="card">
                <div class="card-body">
                    <table class="table dt-responsive nowrap w-100"  id="basic-datatable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Banner Type</th>
                            <th>Publish</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($banners as $banner)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td><img src="{{asset('uploads/images/banner/'.$banner->image)}}" height="100" width="100"></td>
                                <td>{{$banner->banner_type}}</td>
                                <td>
                                    <input type="checkbox" data-id="{{$banner->id}}" class="toggle" id="switch{{$banner->id}}" @if($banner->status == 'Active') checked @endif data-switch="success"/>
                                    <label for="switch{{$banner->id}}" data-on-label="" width data-off-label=""></label>
                                </td>
                                <td>
                                    <a href="{{route('InAdmin.Banner.Edit', $banner->id)}}"  class="edit btn btn-info btn-sm"> <i class="mdi mdi-pencil"></i> </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>

@endsection





@section('scripts')
    <script>
        $('.toggle').on('change', function() {
            var status = $(this).prop('checked') == true ? 'Active' : 'Inactive';
            var banner_id = $(this).data('id');
            $.ajax({
                type: 'GET',
                dataType: 'JSON',
                url: '{{ route('InAdmin.Banner.Status.Change') }}',
                data: {
                    'status': status,
                    'banner_id': banner_id
                },
                success:function(data) {
                    alert(data.success);
                }
            });
        });

    </script>


@endsection
