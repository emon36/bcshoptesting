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
                    <th>Total Earning</th>
                    <th>Total Payment Due</th>
                    <th>Total Commission Given</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($vendors as $vendor)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$vendor->users->name}}</td>
                        <td>{{$vendor->users->phone}}</td>
                        <td>{{$vendor->shop_name}}</td>
                        <td>{{$vendor->vendorAccount->total_earning/100}}</td>
                        <td>{{$vendor->vendorAccount->payment_due/100}}</td>
                        <td>{{$vendor->vendorAccount->total_commission_given/100}}</td>
                        <td>
                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#login-modal{{$vendor->id}}">Make Payment</button>
                        </td>

                        <div id="login-modal{{$vendor->id}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <form action="{{route('InAdmin.Vendor.Make.Payment')}}" method="POST" class="ps-3 pe-3">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="" class="form-label">Paying Amount</label>
                                                <input type="hidden" value="{{$vendor->id}}" name="vendor_id">
                                                <input type="hidden" value="{{$vendor->vendorAccount->id}}" name="vendor_account_id">
                                                <input class="form-control" type="paying_amount" name="paying_amount" id="payment_amount" required="">
                                            </div>
                                            <div class="mb-3 text-center">
                                                <button class="btn rounded-pill btn-primary" type="submit">Confirm</button>
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->

                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>
    </div>

@endsection
