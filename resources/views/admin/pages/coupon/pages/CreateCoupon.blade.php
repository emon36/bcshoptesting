@extends('admin.layouts.Master')
@section('title', 'Attribute Create')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">

                    </ol>
                </div>
                <h4 class="page-title">Create Coupon</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card mb-md-0 mb-3">
                    <div class="card-body ">
                        @include('admin.widgets.FlashMessage')
                        <form class="row g-3" method="POST" action="{{route('InAdmin.Coupon.CreateProcess')}}">
                            @csrf
                            <div class="col-12">
                                <label class="form-label">Coupon Title</label>
                                <input type="text" name="title" class="form-control" placeholder="give a title" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Coupon Code</label>
                                <input type="text" name="code" class="form-control" value="{{$code}}" placeholder="give a unique code" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Discount</label>
                                <input type="number" name="discount" class="form-control" placeholder="input % rate" required>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form><!-- Vertical Form -->

                    </div>

                </div>
            </div>

        </div>
@endsection


@section('scripts')

@endsection
