@extends('admin.layouts.Master')
@section('title', 'Product List')

@section('content')

    @include('admin.pages.product.widgets.SearchProductsTable')
@endsection
