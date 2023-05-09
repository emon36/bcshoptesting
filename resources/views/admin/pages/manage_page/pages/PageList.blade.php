@extends('admin.layouts.Master')
@section('title', 'Review List')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">

                    </ol>
                </div>
                <h4 class="page-title">Pages</h4>
            </div>

            <div class="card">
                <div class="card-body">
                    <table class="table dt-responsive nowrap w-100"  id="basic-datatable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>title</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pages as $page)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$page->title}}</td>
                                <td>
                                    <a href="{{route('InAdmin.Edit.Page', $page->id)}}"  class="edit btn btn-info btn-sm"> Edit Content </a>
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
            var status = $(this).prop('checked') == true ? 'Publish' : 'Hide';
            var review_id = $(this).data('id');
            $.ajax({
                type: 'GET',
                dataType: 'JSON',
                url: '{{ route('InAdmin.Customer.Review.Status') }}',
                data: {
                    'status': status,
                    'review_id': review_id
                },
                success:function(data) {
                    alert(data.success);
                }
            });
        });

    </script>


@endsection
