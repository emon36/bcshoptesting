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
                <li><a href="{{route('Home')}}">Home</a></li>
                <li>My account</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->
    <div class="page-content">
        <div class="container">
            <div class="login-popup">
                <div class="text-center">
                    <h4 class="vendor-title">Vendor Registration</h4>
                </div>
                <form action="{{route('Vendor.RegisterProcess')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-5">
                        <label>Applicant Name</label>
                        <input type="text" name="name" class="form-control" required="required" value="{{ old('name') }}">
                        @if ($errors->has('name'))
                            <span style="color: red">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <div class="form-group mb-5">
                        <label>Applicant Phone</label>
                        <input type="text" name="phone" class="form-control"  value="{{ old('phone') }}" required="required">
                        @if ($errors->has('phone'))
                            <span style="color: red">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-5">
                        <label>Applicant Email</label>
                        <input type="text" name="email" class="form-control" required="required" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <span style="color: red">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-5">
                        <label>NID <small style="font-style: italic;">(Image size should be less than 2 MB)</small></label>
                        <input type="file" name="nid" class="form-control" required="required" >
                        @if ($errors->has('nid'))
                            <span style="color: red">{{ $errors->first('nid') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-5">
                        <label>Trade License Number  <small style="font-style: italic;">(Image size should be less than 2 MB)</small></label>
                        <input type="file" name="trade_licence" class="form-control">
                        @if ($errors->has('trade_licence'))
                            <span style="color: red">{{ $errors->first('trade_license') }}</span>
                        @endif
                    </div>

                    <div class="form-group mb-5">
                        <label>Applicant Passport Size Photo <small style="font-style: italic;">(Image size should be less than 2 MB and Resolution should be 600 x 600)</small> *</label>
                        <input type="file" name="owner_image" class="form-control"  required="required">
                        @if ($errors->has('owner_image'))
                            <span style="color: red">{{ $errors->first('owner_image') }}</span>
                        @endif
                    </div>

                    <div class="form-group mb-5">
                        <label>Shop Name *</label>
                        <input type="text" name="shop_name" class="form-control" required="required"  value="{{ old('shop_name') }}">
                        @if ($errors->has('shop_name'))
                            <span style="color: red">{{ $errors->first('shop_name') }}</span>
                        @endif
                    </div>

                    <div class="form-group mb-5">
                        <label>Shop email *</label>
                        <input type="email" name="shop_email" class="form-control"  required="required"  value="{{ old('shop_email') }}">
                        @if ($errors->has('shop_email'))
                            <span style="color: red">{{ $errors->first('shop_email') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-5">
                        <label>Shop Username *</label>
                        <input type="text" name="shop_url" class="form-control"  required="required"  value="{{ old('shop_url') }}">
                        @if ($errors->has('shop_url'))
                            <span style="color: red">{{ $errors->first('shop_url') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-5">
                        <label>Shop phone *</label>
                        <input type="text" name="shop_phone" class="form-control"  required="required"  value="{{ old('shop_phone') }}">
                        @if ($errors->has('shop_phone'))
                            <span style="color: red">{{ $errors->first('shop_phone') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-5">
                        <label>Shop address *</label>
                        <textarea name="shop_address" cols="30" rows="7" class="form-control" placeholder="Enter your shop address"></textarea>
                        @if ($errors->has('shop_address'))
                            <span style="color: red">{{ $errors->first('shop_address') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-5">
                        <label>Shop city *</label>
                        <select name="shop_city" class="form-control city" >
                            <option>Select Your City</option>
                        @foreach($districts as $city)
                            <option value="{{$city->name}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('shop_city'))
                            <span class="text-danger">{{ $errors->first('shop_city') }}</span>
                        @endif
                    </div>
                    <!-- city  -->
                    <div class="form-group mb-5">
                        <label>ZIP *</label>
                        <input type="text" name="shop_zip" class="form-control" placeholder="Enter your zip code" required="required"  value="{{ old('shop_zip') }}">
                        @if ($errors->has('shop_zip'))
                            <span style="color: red">{{ $errors->first('shop_zip') }}</span>
                        @endif
                    </div>

                    <div class="form-group mb-5">
                        <label>Shop description *</label>
                        <textarea name="shop_description" cols="30" rows="7" class="form-control" placeholder="Enter your shop address"></textarea>
                    </div>
                    <div class="form-group mb-5">
                        <label>Shop logo <small style="font-style: italic;">(Logo size should be less than 1 MB and Resolution should be 100 x 30)</small> *</label>
                        <input type="file" name="shop_logo" class="form-control"  required="required">
                        @if ($errors->has('shop_logo'))
                            <span style="color: red">{{ $errors->first('shop_logo') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-5">
                        <label>Banner * <small style="font-style: italic;">(Banner size should not be more than 2 MB and Resolution should be 1240 x 460)</small> </label>
                        <input type="file" name="shop_banner" class="form-control" required="required">
                        @if ($errors->has('shop_banner'))
                            <span style="color: red">{{ $errors->first('shop_banner') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-5">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control"  required="required">
                        @if ($errors->has('password'))
                            <span style="color: red">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary mb-2">Sign Up</button>
                        <a href="#">Lost your password?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

@endsection
