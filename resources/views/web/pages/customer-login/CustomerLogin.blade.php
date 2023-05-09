@extends('web.layouts.master')
@section('header')
    @include('web.includes.pageHeader')
@endsection

@section('content')

        <main class="main login-page">

            <!-- End of Breadcrumb -->
            <div class="page-content">
                <div class="container">
                    <div class="login-popup">
                            <div class="text-center">
                            <h4 class="vendor-title">User Login</h4>
                            </div>
                        <form action="
                            @if(request()->get('rdrto') )
                                {{route('Customer.LoginProcess',
                                    ['rdrto' => request()->get('rdrto')]
                                )}}
                            @else
                                {{route('Customer.LoginProcess')}}
                            @endif
                            " method="POST" enctype="multipart/form-data">
                            @csrf

                        <div class="form-group mb-5">
                            <label>Your email *</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter your email" required="required">
                        </div>
                        <div class="form-group mb-5">
                            <label>Your password *</label>
                            <input type="password" name="password" class="form-control" placeholder="Set your password"  required="required">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary mb-2">Sign In</button>
                            <a href="{{route('Customer.RegistrationPage')}}">Don't Have account?</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
@endsection

        <!-- End of Ma


