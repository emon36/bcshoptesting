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
                <h4 class="page-title">Reviews</h4>
            </div>

            <div class="card">
                <div class="card-body">
                    <table class="table dt-responsive nowrap w-100"  id="basic-datatable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th>Customer</th>
                            <th>Rating</th>
                            <th>Review</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reviews as $review)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$review->product->title}}</td>
                                <td>{{$review->customer->name}}</td>
                                <td>{{$review->star_rating}} <i class="mdi mdi-star"></i></td>
                                <td>{{$review->comments}}</td>
                                <td>{{$review->created_at->format('d-m-Y')}}</td>
                                <td>
                                    <input type="checkbox" data-id="{{$review->id}}" class="toggle" id="switch{{$review->id}}" @if($review->status == 'Publish') checked @endif data-switch="success"/>
                                    <label for="switch{{$review->id}}" data-on-label="" width data-off-label=""></label>
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
