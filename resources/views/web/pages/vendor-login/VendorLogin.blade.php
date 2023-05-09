@extends('web.layouts.master')
@section('header')
    @include('web.includes.pageHeader')
@endsection

@section('content')
    <main class="main login-page">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">My Account</h1>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="demo1.html">Home</a></li>
                    <li>My account</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->
        <div class="page-content">
            <div class="container">
                <div class="login-popup">
                    <div class="text-center">
                        <h4 class="vendor-title">Vendor Login</h4>
                    </div>
                    <form action="{{route('Vendor.VendorLoginProcess')}}" method="POST">
                        @csrf
                        <div class="form-group mb-5">
                            <label>You email *</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter your email" required="required">
                        </div>
                        <div class="form-group mb-5">
                            <label>Your password *</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter your password"  required="required">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary mb-2">Sign In</button>
                            <a href="" data-toggle="modal" data-target="#exampleModal">Forget your Password</a>
                        </div>
                        <div class="modal fade modal-dialog modal-dialog-centered" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Please Contact with this number +8801531144760
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection


@section('scripts')
    <script>
        $('#exampleModal').hide();
    </script>
@endsection
