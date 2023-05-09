@extends('web.layouts.master')




@section('header')
    @include('web.includes.pageHeader')
@endsection

@section('content')


<div class="container c-main">
<div class="row">
    <div class="col-md-12">
        <h1 class="text-center">{{$page->title}}</h1>
        {!! $page->content !!}
    </div>
</div>
</div>


@endsection

