@extends('admin.layouts.Master')
@section('title', 'Order List')

@section('content')

    @include('admin.pages.order.widgets.IndexTable')
@endsection
