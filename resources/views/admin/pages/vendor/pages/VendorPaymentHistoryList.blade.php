@extends('admin.layouts.Master')
@section('title', 'Vendor Lists')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">

                    </ol>
                </div>
                <h4 class="page-title">Vendors</h4>
            </div>
            <table class="table dt-responsive nowrap w-100" id="basic-datatable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Owner Name</th>
                    <th>Owner Phone</th>
                    <th>Shop Name</th>
                    <th>Paying Amount</th>
                    <th>Payment Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($paymentHistories as $row)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$row->vendor->users->name}}</td>
                        <td>{{$row->vendor->users->phone}}</td>
                        <td>{{$row->vendor->shop_name}}</td>
                        <td>{{$row->paying_amount/100}}</td>
                        <td>{{$row->created_at->format('d-m-Y')}}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>
    </div>

@endsection
