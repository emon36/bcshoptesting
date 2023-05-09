@extends('web.layouts.master')

@section('header')
    @include('web.includes.pageHeader')
@endsection


@section('content')
    <main class="main">
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

        <!-- Start of PageContent -->
        <div class="page-content pt-2">
            <div class="container">
                <div class="tab tab-vertical row gutter-lg">
                    <ul class="nav nav-tabs mb-6" role="tablist">
                        <li class="nav-item">
                            <a href="#account-dashboard" class="nav-link active">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a href="#account-orders" class="nav-link">Orders</a>
                        </li>

                        <li class="nav-item">
                            <a href="#account-addresses" class="nav-link">Addresses</a>
                        </li>
                        <li class="nav-item">
                            <a href="#account-details" class="nav-link">Account details</a>
                        </li>
                        <li class="nav-item">
                            <a href="#support-ticket" class="nav-link">Support Ticket</a>
                        </li>
                        <li class="link-item">
                            <a href="{{route('GetWishList')}}">Wishlist</a>
                        </li>
                        <li class="link-item">
                            <a href="{{route('Customer.Logout')}}">Logout</a>
                        </li>
                    </ul>

                    <div class="tab-content mb-6">
                        <div class="tab-pane active in" id="account-dashboard">
                            <p class="greeting">
                                Hello
                                <span class="text-dark font-weight-bold">{{session()->get('user')->name}}</span>
                            </p>

                            <p class="mb-4">
                                From your account dashboard you can view your <a href="#account-orders"
                                                                                 class="text-primary link-to-tab">recent orders</a>,
                                manage your <a href="#account-addresses" class="text-primary link-to-tab">shipping
                                    and billing
                                    addresses</a>, and
                                <a href="#account-details" class="text-primary link-to-tab">edit your password and
                                    account details.</a>
                            </p>

                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="#account-orders" class="link-to-tab">
                                        <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-orders">
                                                    <i class="w-icon-orders"></i>
                                                </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">Orders</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="#account-addresses" class="link-to-tab">
                                        <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-address">
                                                    <i class="w-icon-map-marker"></i>
                                                </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">Addresses</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="#account-details" class="link-to-tab">
                                        <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-account">
                                                    <i class="w-icon-user"></i>
                                                </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">Account Details</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="{{route('GetWishList')}}" class="link-to-tab">
                                        <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-wishlist">
                                                    <i class="w-icon-heart"></i>
                                                </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">Wishlist</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="#">
                                        <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-logout">
                                                    <i class="w-icon-logout"></i>
                                                </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">Logout</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane mb-4" id="account-orders">
                            <div class="icon-box icon-box-side icon-box-light">
                                    <span class="icon-box-icon icon-orders">
                                        <i class="w-icon-orders"></i>
                                    </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title text-capitalize ls-normal mb-0">Orders</h4>
                                </div>
                            </div>

                            <table class="shop-table account-orders-table mb-6">
                                <thead>
                                <tr>
                                    <th class="order-id">Order</th>
                                    <th class="order-date">Date</th>
                                    <th class="order-status">Status</th>
                                    <th class="order-total">Total</th>
                                    <th class="order-actions">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td class="order-id">#{{$order->order_number}}</td>
                                    <td class="order-date">{{$order->created_at->format('d-m-Y')}}</td>
                                    <td class="order-status">{{$order->status}}</td>
                                    <td class="order-total">
                                        <span class="order-price">{{$order->subtotal/100}}tk</span> for
                                        <span class="order-quantity"> {{$order->orderDetails->quantity}}</span> item
                                    </td>
                                    <td class="order-action">
                                        <a href="{{route('productSingleView', $order->orderDetails->products->slug)}}"
                                           class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                                    </td>
{{--                                    <td class="">--}}
{{--                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$order->id}}">Review</button>--}}
{{--                                    </td>--}}

                                    <div class="modal" id="exampleModal{{$order->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Give Review</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form id="review{{$order->id}}" action="{{route('Review.Store')}}" method="POST">
                                                <div class="modal-body">

                                                        <div class="mb-3">

                                                                @csrf
                                                                <div class="star-rating">
                                                                    <input type="radio" id="5-stars" name="rating" value="5" />
                                                                    <label for="5-stars" class="star">&#9733;</label>
                                                                    <input type="radio" id="4-stars" name="star_rating" value="4" />
                                                                    <label for="4-stars" class="star">&#9733;</label>
                                                                    <input type="radio" id="3-stars" name="star_rating" value="3" />
                                                                    <label for="3-stars" class="star">&#9733;</label>
                                                                    <input type="radio" id="2-stars" name="star_rating" value="2" />
                                                                    <label for="2-stars" class="star">&#9733;</label>
                                                                    <input type="radio" id="1-star" name="star_rating" value="1" />
                                                                    <label for="1-star" class="star">&#9733;</label>
                                                                </div>
                                                                <textarea class="form-control" placeholder="Please type your feedback" name="comments"></textarea>
                                                                <input type="hidden" name="product_id" value="{{$order->orderDetails->product_id}}">
                                                                <input type="hidden" name="customer_id" value="{{$order->customer_id}}">
                                                                <input type="hidden" name="vendor_id" value="{{$order->vendor_id}}">

                                                        </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Send message</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>


                                </tr>

                                @endforeach
                                </tbody>
                            </table>

                        </div>

                        <div class="tab-pane" id="account-downloads">
                            <div class="icon-box icon-box-side icon-box-light">
                                    <span class="icon-box-icon icon-downloads mr-2">
                                        <i class="w-icon-download"></i>
                                    </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title ls-normal">Downloads</h4>
                                </div>
                            </div>
                            <p class="mb-4">No downloads available yet.</p>
                            <a href="shop-banner-sidebar.html" class="btn btn-dark btn-rounded btn-icon-right">Go
                                Shop<i class="w-icon-long-arrow-right"></i></a>
                        </div>

                        <div class="tab-pane" id="account-addresses">
                            <div class="icon-box icon-box-side icon-box-light">
                                    <span class="icon-box-icon icon-map-marker">
                                        <i class="w-icon-map-marker"></i>
                                    </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title mb-0 ls-normal">Addresses</h4>
                                </div>
                            </div>
                            <p>The following addresses will be used on the checkout page
                                by default.</p>
                            <div class="row">
                                <div class="col-sm-12 mb-12">
                                    @if(isset($address))
                                        <form action="{{route('Customer.UpdateAddress', $address->id)}}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Name</label>
                                                <input type="text" name="name" value="{{$address->name}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Email</label>
                                                <input type="email" name="email" value="{{$address->email}}"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Phone</label>
                                                <input type="number" name="phone" value="{{$address->phone}}"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputState">Division</label>
                                                <select id="inputState" class="form-control" name="division">
                                                    @foreach($divisions as $division)
                                                        <option value="{{$division->name}}" @if($division->name == $address->division) selected @endif >{{$division->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputState">District</label>
                                                <select id="inputState" class="form-control" name="district">
                                                    @foreach($districts as $district)
                                                        <option value="{{$district->name}}" @if($district->name == $address->district) selected @endif >{{$district->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">City</label>
                                                <input type="text" class="form-control" value="{{$address->city}}" name="city">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Address</label>
                                                <input type="text" name="address" value="{{$address->address}}" class="form-control">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="">Zip</label>
                                                <input type="number" name="zip" value="{{$address->zip}}" class="form-control">
                                            </div>
                                            <div class="form-group" >
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>

                                    @else
                                        <form action="{{route('Customer.CreateAddress')}}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Name</label>
                                                <input type="text" name="name" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Email</label>
                                                <input type="email" name="email" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Phone</label>
                                                <input type="number" name="phone" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputState">Division</label>
                                                <select id="inputState" class="form-control" name="division">
                                                    @foreach($divisions as $division)
                                                        <option>{{$division->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputState">District</label>
                                                <select id="inputState" class="form-control" name="district">
                                                    @foreach($districts as $district)
                                                        <option>{{$district->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">City</label>
                                                <input type="text" class="form-control" name="city">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Address</label>
                                                <input type="text" name="address" class="form-control">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="">Zip</label>
                                                <input type="number" name="zip" class="form-control">
                                            </div>
                                            <div class="form-group" >
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    @endif

                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="account-details">
                            <div class="icon-box icon-box-side icon-box-light">
                                    <span class="icon-box-icon icon-account mr-2">
                                        <i class="w-icon-user"></i>
                                    </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title mb-0 ls-normal">Account Details</h4>
                                </div>
                            </div>
                            <form class="form account-details-form" action="{{route('Customer.UpdateProfile')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="firstname">Full Name</label>
                                            <input type="text"  id="firstname" name="name" value="{{$customer->name}}" placeholder="John"
                                                   class="form-control form-control-md">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-6">
                                    <label for="email_1">Email address *</label>
                                    <input type="email" value="{{$customer->email}}" id="email" name="email"
                                           class="form-control form-control-md">
                                </div>

                                <div class="form-group mb-6">
                                    <label for="email_1">Phone</label>
                                    <input type="number" value="{{$customer->phone}}" id="phone" name="phone"
                                           class="form-control form-control-md">
                                </div>
                                <button type="submit" class="btn btn-dark btn-rounded btn-sm mb-4">Save Changes</button>
                            </form>
                            <form action="{{route('Customer.UpdatePassword')}}" method="POST">
                                @csrf
                                <h4 class="title title-password ls-25 font-weight-bold">Password change</h4>
                                <div class="form-group">
                                    <label class="text-dark" for="cur-password">Current Password leave blank to leave unchanged</label>
                                    <input id="oldpass" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" value="" required autofocus placeholder="Current password">

                                    @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                             </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="new-password">New Password leave blank to leave unchanged</label>
                                    <input id="password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required placeholder="New password">

                                    @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-10">
                                    <label class="text-dark" for="conf-password">Confirm Password</label>
                                    <input id="password-confirm" type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" required placeholder="Confirm password">
                                    @error('confirm_password')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-dark btn-rounded btn-sm mb-4">Save Changes</button>
                            </form>
                        </div>
                        <div class="tab-pane" id="support-ticket">

                            <table class="shop-table account-orders-table mb-6">
                                <thead>
                                <tr>
                                    <th class="order-id">Topic</th>
                                    <th class="order-date">Submition Date</th>
                                    <th class="order-status">Status</th>
                                    <th class="order-actions">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($supportTickets as $ticket)
                                    <tr>
                                        <td class="order-id">{{$ticket->subject}}</td>
                                        <td class="order-date">{{$ticket->created_at->format('d-m-Y')}}</td>
                                        <td class="order-status">{{$ticket->status}}</td>
                                        <td class="order-action">
                                            <a href="{{route('Customer.Support.Ticket.View', $ticket->id)}}"
                                               class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                                        </td>

                                    </tr>

                                @endforeach
                                </tbody>
                            </table>

                            <div class="icon-box icon-box-side icon-box-light">
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title mb-0 ls-normal">Submit a new ticket</h4>
                                </div>
                            </div>
                            <form class="form account-details-form" action="{{route('Customer.Support.Ticket')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="subject">Subject</label>
                                            <input type="text"  id="" name="subject"  placeholder="subject"
                                                   class="form-control form-control-md">
                                        </div>
                                    </div>
                                </div>

                                    <label for="Type">Type</label>
                                    <select class="form-control" id="ticket-type" name="type" required="">
                                        <option value="Website problem">Website Problem</option>
                                        <option value="Complaint">Complaint</option>
                                        <option value="Info inquiry">Info Inquiry </option>
                                    </select>

                                <div class="form-group mb-6">
                                    <label for="Type">Priority</label>
                                    <select class="form-control" id="ticket-priority" name="priority" required="">
                                        <option value="">Choose priority</option>
                                        <option value="Urgent">Urgent</option>
                                        <option value="High">High</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Low">Low</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="detaaddressils">Describe your issue</label>
                                    <textarea class="form-control" rows="6" id="ticket-description" name="description"></textarea>
                                </div>

                                <button type="submit" class="btn btn-dark btn-rounded btn-sm mb-4">Submit</button>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- End of PageContent -->
    </main>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection
