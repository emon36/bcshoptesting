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
                    <li><a href="">Home</a></li>
                    <li>My account</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->
        <div class="page-content">
            <div class="container">
                <div class="login-popup">
                    <div class="text-center">
                        <h4 class="vendor-title">Password Reset</h4>
                    </div>
                    <form action="{{route('Vendor.Password.Reset.Post')}}}" method="POST">
                        @csrf
                        <div class="form-group mb-5">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter your email" required="required">
                        </div>
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Send Password Reset Link
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </main>
@endsection
