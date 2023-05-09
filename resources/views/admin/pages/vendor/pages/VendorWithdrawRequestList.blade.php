@extends('admin.layouts.Master')
@section('title', 'Vendor Withdraw Requests')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">

                    </ol>
                </div>
                <h4 class="page-title">Vendor Withdraw Requests</h4>
            </div>
            <table class="table dt-responsive nowrap w-100" id="basic-datatable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Owner Name</th>
                    <th>Owner Phone</th>
                    <th>Shop Name</th>
                    <th>Withdraw Method</th>
                    <th>Account Number</th>
                    <th>Amount</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($withdrawList as $row)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$row->vendor->users->name}}</td>
                        <td>{{$row->vendor->users->phone}}</td>
                        <td>{{$row->vendor->shop_name}}</td>
                        <td>{{$row->withdraw_method}}</td>
                        <td>{{$row->account_number}}</td>
                        <td>{{$row->amount/100}}</td>
                        <td>
                            <input type="checkbox" data-id="{{$row->id}}" class="toggle" id="switch{{$row->id}}" @if($row->status == 'Approved') checked @endif data-switch="success"/>
                            <label for="switch{{$row->id}}" data-on-label="" width data-off-label=""></label>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>
    </div>
@endsection


@section('scripts')

    <script>
        $('.toggle').on('change', function() {
            var status = $(this).prop('checked') == true ? 'Approved' : 'Pending';
            var id = $(this).data('id');
            $.ajax({
                type: 'GET',
                dataType: 'JSON',
                url: '{{ route('InAdmin.Vendor.Withdraw.Status.Change') }}',
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
