@extends('web.layouts.master')


@section('header')
    @include('web.includes.pageHeader')
@endsection

@section('content')
    <section class="return-policy-section">
        <div class="container">
            <div class="row">
                <h1 class="text-center">Returns Policy</h1>
                {!! $page->content !!}
            </div>

        </div>
    </section>
@endsection
