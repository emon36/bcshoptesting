@extends('admin.layouts.Master')
@section('title', 'Announcement Setup')

@section('content')
    <div class="row ">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">

                    </ol>
                </div>
                <h4 class="page-title">Announcement Setup</h4>
            </div>
            <div class="card mb-md-0 mb-3">
                <div class="card-body ">
                    @include('admin.widgets.FlashMessage')
                    <form class="row g-3" method="POST" action="{{route('InAdmin.Update.Announcement',$announcement->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-3">
                            <div class="form-check">
                                <input type="radio" id="customRadio1" name="status" value="Active" @if($announcement->status == 'Active') checked @endif class="form-check-input">
                                <label class="form-check-label" for="customRadio1">Active</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="customRadio2" name="status" value="Inactive"  @if($announcement->status == 'Inactive') checked @endif class="form-check-input">
                                <label class="form-check-label" for="customRadio2">Inactive</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Text</label>
                            <input type="text" name="text" value="{{$announcement->text}}" class="form-control">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                </div>
            </div>

        </div>
    </div>
@endsection
