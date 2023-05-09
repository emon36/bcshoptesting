@extends('web.layouts.master')

@section('header')
    @include('web.includes.pageHeader')
@endsection


@section('content')
    <main class="main">
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">My Account</h1>
            </div>
        </div>

        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{route('Home')}}">Home</a></li>
                    <li>My account</li>
                </ul>
            </div>
        </nav>
        <!-- Page Title-->

        <h1 class="h3  mb-5 text-center">SUPPORT TICKET ANSWER</h1>
        <!-- Page Content-->
        <div class="container pb-5 mb-2 mb-md-3 rtl">
            <div class="row">
                <!-- Sidebar-->
            <!-- Content  -->
                <section class="col-lg-12">
                    <!-- Toolbar-->
                    <table class="shop-table account-orders-table mb-6">
                        <thead>
                        <tr>
                            <th>Topic</th>
                            <th>Date Submitted</th>
                            <th>Last Updated</th>
                            <th >Status</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$ticket->subject}}</td>
                                <td>{{$ticket->created_at->format('d-m-Y')}}</td>
                                <td>{{$ticket->updated_at->format('d-m-Y')}}</td>
                                <td>{{$ticket->status}}</td>
                            </tr>

                        </tbody>
                    </table>

                    <!-- Ticket details (visible on mobile)-->

                    {{-- <div class="media pb-4" style="text-align: right;">

                    </div> --}}
                    <div class="col-sm-6 col-lg-5 media pb-4  for-margin-sms">
                        <div class="media-body">
                            <h6 class="font-size-md mb-2">{{session()->get('user')->name}}</h6>
                            <p class="font-size-md mb-1">{{$ticket['description']}}</p>
                            <span class="font-size-ms text-muted">
                                 <i class="czi-time align-middle"></i>
                            {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$ticket['created_at'])->format('Y-m-d h:i A')}}
                        </span>
                        </div>
                    </div>
                    @foreach($ticket->conversations as $conversation)
                        {{--                    {{dd($conversation)}}--}}
                        @if($conversation['customer_message'] == null )
                            <div class="media pb-4 ">
                                <div class="media-body">
                                    <h6 class="font-size-md mb-2">Admin</h6>
                                    <p class="font-size-md mb-1">{{$conversation['admin_message']}}</p>
                                    <span class="font-size-ms text-muted"> {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$conversation['updated_at'])->format('Y-m-d h:i A')}}</span>
                                </div>
                            </div>
                        @endif
                        @if($conversation['admin_message'] == null)
                            <div class="col-sm-6 col-lg-5 media pb-4 for-margin-sms">
                                <div class="media-body">
                                    <h6 class="font-size-md mb-2">{{session()->get('user')->name}}</h6>
                                    <p class="font-size-md mb-1">{{$conversation['customer_message']}}</p>
                                    <span class="font-size-ms text-muted">
                                             <i class="czi-time align-middle"></i>
                                    {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$conversation['created_at'])->format('Y-m-d h:i A')}}
                                </span>
                                </div>
                            </div>
                    @endif
                @endforeach
                <!-- Leave message-->
                    <div class="col-sm-12">
                        <h3 class="h5 mt-2 pt-4 pb-2">Leave a Message</h3>
                        <form  action="{{route('Customer.Support.Ticket.Reply', $ticket->id)}}"
                              method="post" >
                            @csrf
                            <div class="form-group">
                            <textarea class="form-control" name="comment" rows="8"
                                      placeholder="Write your message here..." required></textarea>
                                <div class="invalid-tooltip">Please write the message'</div>
                            </div>
                            <div class="d-flex flex-wrap justify-content-between align-items-center">
                                <button class="btn btn-primary my-2" type="submit">Submit message</button>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>


    </main>
@endsection
