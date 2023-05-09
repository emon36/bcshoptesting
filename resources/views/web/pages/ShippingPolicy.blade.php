@extends('web.layouts.master')


@section('header')
    @include('web.includes.pageHeader')
@endsection

@section('content')
    <div class="container">
        <h1 class="text-center">Shipping & Delivery</h1>
        <div class="about-wrapper">
            {!! $page->content !!}
        </div>
    </div>
@endsection
