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
    <!-- End of Breadcrumb -->
    <div class="page-content">
        <div class="container">
            <div class="login-popup">
                <div class="text-center">
                    <h4 class="customer-title">Customer Registration</h4>
                </div>
                <form action="
                            @if(request()->get('rdrto') )
                {{route('Customer.RegisterProcess',
                    ['rdrto' => request()->get('rdrto')]
                )}}
                @else
                {{route('Customer.RegisterProcess')}}
                @endif
                    "method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-5">
                        <label>Your name *</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter your name" required="required" value="{{ old('name') }}">
                        @if ($errors->has('name'))
                            <span style="color: red">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-5">
                        <label>Your email *</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter your email" required="required" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <span style="color: red">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-5">
                        <label>your phone *</label>
                        <input type="text" name="phone" class="form-control" placeholder="Enter your phone number" required="required" value="{{ old('phone') }}">
                        @if ($errors->has('phone'))
                            <span style="color: red">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-5">
                        <label>Your password *</label>
                        <input type="password" name="password" class="form-control" placeholder="Set your password"  required="required">
                        @if ($errors->has('phone'))
                            <span style="color: red">{{ $errors->first('password') }}</span>
                        @endif

                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary mb-2">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>


@endsection
