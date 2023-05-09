@extends('admin.layouts.Master')
@section('title', 'Support Ticket View')

@section('content')

    <div class="content">
        @foreach($supportTicket as $ticket )
            <?php
            $userDetails = \App\Models\User::where('id', $ticket['customer_id'])->first();
            $conversations = \App\Models\SupportTicketConvo::where('support_ticket_id', $ticket['id'])->get();
            ?>
        <div class="card">
            <div class="card-body">
                <div class="media pb-4">
                    <div class="media-body">
                        <h6 class="font-size-md mb-2">{{isset($userDetails)?$userDetails['name']:'not found'}}</h6>
                        <p class="font-size-md mb-1">{{$ticket['description']}}</p>
                        <span class="font-size-ms text-muted">
                             <i class="czi-time align-middle>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$ticket['created_at'])->format('Y-m-d h:i A')}}</i></span>
                </div>
            </div>
            @foreach($conversations as $conversation)
                             @if($conversation['admin_message'] ==null )
                                 <div class="media pb-4">
                        <div class="media-body" style="text-align: left">
                            <h6 class="font-size-md mb-2">{{isset($userDetails)?$userDetails['name']:'not found'}}</h6>
                            <p class="font-size-md mb-1" >{{$conversation['customer_message']}}</p>
                            <span class="font-size-ms text-muted">
                         <i class="czi-time align-middle></i>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$conversation['created_at'])->format('Y-m-d h:i A')}}</span>
                        </div>
                    </div>
                @endif
                         @if($conversation['customer_message'] ==null )
                             <div class= "pb-4" style="text-align: right">
                        <div class="media-body">
                            <h6 class="font-size-md mb-2">{{session()->get('user')->name}}</h6>
                            <p class="font-size-md mb-1">{{$conversation['admin_message']}}</p>
                            <span
                                class="font-size-ms text-muted"> {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$conversation['updated_at'])->format('Y-m-d h:i A')}}</span>
                        </div>
                    </div>
                @endif
                        @endforeach

                        @endforeach
                        <!-- Leave message-->
        <h3 class="h5 mt-2 pt-4 pb-2">Leave a Message</h3>
        @foreach($supportTicket as $reply)
                                <form  action="{{route('InAdmin.Support-ticket.Reply', $reply['id'])}}" method="POST"
                                >
                @csrf
                <div class="form-group">
                <textarea class="form-control" name="reply" rows="8" placeholder="Write your message here..."
                          required></textarea>
                    <div class="invalid-tooltip">Please write the message</div>
                </div>
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                    <div class="custom-control custom-checkbox d-block">
                    </div>
                    <button class="btn btn-primary my-2" type="submit">Submit Reply</button>
                </div>
            </form>
                        @endforeach
                    </div>
        </div>

    </div>

@endsection

