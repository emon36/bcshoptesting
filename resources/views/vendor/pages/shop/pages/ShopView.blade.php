@extends('vendor.layouts.Master')
@section('title', 'Shop View')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div>
                        <h4 class="mb-0">My shop Info </h4>
                    </div>
                    <div class="float-end">
                        <a class="btn btn-primary text-white" href="{{route('InVendor.Edit.Shop', $vendor->id)}}">
                            Edit
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center flex-wrap gap-5">
                        <div class="text-left">
                            <img src="{{asset('uploads/images/vendor/logo/'.$vendor->shop_logo)}}"  class="rounded-circle border" height="200" width="200" alt="">
                        </div>
                        <div class="">
                            <div class="flex-start">
                                <h4>Name : </h4>
                                <h4 >{{$vendor->shop_name}}</h4>
                            </div>
                            <div class="flex-start">
                                <h6>Phone : </h6>
                                <h6>{{$vendor->shop_phone}}</h6>
                            </div>
                            <div class="flex-start">
                                <h6>Address : </h6>
                                <h6>{{$vendor->shop_address}}</h6>
                            </div>
                        </div>
                        <div class=""></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
