@extends('web.layouts.master')




@section('header')
    @include('web.includes.pageHeader')
@endsection

@section('content')


<div class="container c-main">
<h1 class="text-center">{{$page->title}}</h1>
    {!! $page->content !!}
</div>

@endsection
