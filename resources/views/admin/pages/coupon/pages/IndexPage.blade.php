@extends('admin.layouts.Master')
@section('title', 'Coupons')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">

                    </ol>
                </div>
                <h4 class="page-title">Coupons</h4>
            </div>

            <div class="card vendor-card">
                <div class="card-body">
                    <table class="table dt-responsive nowrap w-100"  id="basic-datatable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Coupon Title</th>
                            <th>Code</th>
                            <th>Discount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($coupons as $coupon)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$coupon->title}}</td>
                                <td>{{$coupon->code}}</td>
                                <td>{{$coupon->discount}}</td>
                                <td>
                                    <h4>  <input type="checkbox" data-id="{{$coupon->id}}" class="toggle" id="switch{{$coupon->id}}" @if($coupon->status == 'Active') checked @endif data-switch="success"/>
                                        <label for="switch{{$coupon->id}}" data-on-label="" width data-off-label=""></label></h4>
                                </td>
                                <td>
                                    <a href="{{route('InAdmin.Coupon.EditPage', $coupon->id)}}" class="btn btn-success btn-sm">  <i class="mdi mdi-pencil"></i></a>
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
            var status = $(this).prop('checked') == true ? 'Active' : 'Deactivate';
            var coupon_id = $(this).data('id');
            $.ajax({
                type: 'GET',
                dataType: 'JSON',
                url: '{{ route('InAdmin.Coupon.StatusChange') }}',
                data: {
                    'status': status,
                    'coupon_id': coupon_id
                },
                success:function(data) {
                    alert(data.success);
                }
            });
        });

    </script>


@endsection
