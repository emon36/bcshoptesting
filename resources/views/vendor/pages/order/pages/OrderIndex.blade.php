@extends('vendor.layouts.Master')
@section('title', 'Vendor Order List')

@section('content')
    @include('vendor.pages.order.widgets.IndexTable')
@endsection
