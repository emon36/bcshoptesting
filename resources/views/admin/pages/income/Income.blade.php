@extends('admin.layouts.Master')

@section('title', 'Admin Dashboard')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Income</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-5 col-lg-6">

        <div class="row">
            <div class="col-sm-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-account-multiple widget-icon"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Today's Commission</h5>
                        <h3 class="mt-3 mb-3">{{$todayCommission/100}}৳</h3>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col-sm-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-account-multiple widget-icon"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Current Week Commission</h5>
                        <h3 class="mt-3 mb-3">{{$weekCommission/100}}৳</h3>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div> <!-- end row -->


    </div> <!-- end col -->

    <div class="col-lg-6">
        <div class="row">
            <div class="col-sm-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-cart widget-icon"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Average Revenue">This Month Commission</h5>
                        <h3 class="mt-3 mb-3">{{$currentMonthCommission/100}}৳</h3>
                    </div> <!-- end card-body-->
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-cart widget-icon"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Average Revenue">This year Commission</h5>
                        <h3 class="mt-3 mb-3">{{$yearlyCommission/100}}৳</h3>
                    </div> <!-- end card-body-->
                </div>
            </div>

        </div>

    </div> <!-- end col -->
</div>


<div class="row">
    <div class="col-xl-5 col-lg-6">

        <div class="row">
            <div class="col-sm-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-account-multiple widget-icon"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Today's Customer Paid</h5>
                        <h3 class="mt-3 mb-3">{{$todayCustomerPaid/100}}৳</h3>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col-sm-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-account-multiple widget-icon"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Number of Orders">This Month Customer Paid</h5>
                        <h3 class="mt-3 mb-3">{{$monthCustomerPaid/100}}৳</h3>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div> <!-- end row -->


    </div> <!-- end col -->

    <div class="col-lg-6">
        <div class="row">
            <div class="col-sm-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-cart widget-icon"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Average Revenue">This year Customer Paid</h5>
                        <h3 class="mt-3 mb-3">{{$yearCustomerPaid/100}}৳</h3>
                    </div> <!-- end card-body-->
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-cart widget-icon"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Average Revenue">This year Customer Paid</h5>
                        <h3 class="mt-3 mb-3">{{$yearCustomerPaid/100}}৳</h3>
                    </div> <!-- end card-body-->
                </div>
            </div>

        </div>

    </div> <!-- end col -->
</div>
<!-- end row -->
 @endsection
