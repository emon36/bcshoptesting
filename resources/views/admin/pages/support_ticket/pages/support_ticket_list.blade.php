@extends('admin.layouts.Master')
@section('title', 'Support Ticket List')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">Support Tickets</h4>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @foreach($tickets as $ticket)
            <div class="card">
                <div class="card-body align-items-center d-flex flex-wrap justify-content-between gap-3 border-bottom">
                    <div class="media gap-3">
                        <div class="media-body">
                            <h6 class="mb-0 text-left">{{$ticket->user->name}}</h6>
                            <div class="mb-2 fz-12 text-left">{{$ticket->user->email}}</div>
                            <div class="d-flex flex-wrap gap-2 align-items-center">
                                <span class="badge-soft-danger fz-12 font-weight-bold px-2 radius-50">{{$ticket->priority}}</span>
                                <span class="badge-soft-info fz-12 font-weight-bold px-2 radius-50">{{$ticket->status}}</span>
                                <span class="badge-soft-info fz-12 font-weight-bold px-2 radius-50"><b>{{$ticket->subject}}</b> </span>
                                <div class="text-nowrap pl-9">
                                    {{$ticket->created_at->format('d-m-Y')}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <label class="switcher">
                        <input type="checkbox" data-id="{{$ticket->id}}" class="toggle" id="switch{{$ticket->id}}" @if($ticket->status == 'open') checked @endif data-switch="success"/>
                        <label for="switch{{$ticket->id}}" data-on-label="" width data-off-label=""></label>
                    </label>
                </div>
                <div class="card-body align-items-end d-flex flex-wrap flex-md-nowrap justify-content-between gap-4">
                    <div>
                       {{$ticket->description}}
                    </div>
                    <div class="text-nowrap">
                        <a class="btn btn-primary" href="{{route('InAdmin.Support.Ticket.Single.View', $ticket->id)}}">
                           View
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('.toggle').on('change', function() {
            var status = $(this).prop('checked') == false ? 'close' : 'open';
            var support_id = $(this).data('id');
            $.ajax({
                type: 'GET',
                dataType: 'JSON',
                url: '{{ route('InAdmin.Support.Ticket.ChangeStatus') }}',
                data: {
                    'status': status,
                    'support_id': support_id
                },
                success:function(data) {
                    alert(data.success);
                }
            });
        });

    </script>


@endsection
