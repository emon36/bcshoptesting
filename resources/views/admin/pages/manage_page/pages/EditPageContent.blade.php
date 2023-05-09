@extends('admin.layouts.Master')
@section('title', 'Edit Page Content')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">

                    </ol>
                </div>
                <h4 class="page-title">Edit {{$page->title}}</h4>
            </div>
        </div>

        <div class="card mb-md-0 mb-3">
            <div class="card-body">
                @include('admin.widgets.FlashMessage')
                <form action="{{route('InAdmin.Update.Page', $page->id)}}" id="productForm" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" id="editor" rows="5" name="description">{{$page->content}}</textarea>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>

            </div>
        </div>
    </div>
@endsection
