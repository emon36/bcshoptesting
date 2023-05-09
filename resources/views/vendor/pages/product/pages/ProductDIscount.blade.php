@extends('vendor.layouts.Master')
@section('title', 'Add Discount Product')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">

                    </ol>
                </div>
                <h4 class="page-title">Add Discount</h4>
            </div>
            <div class="card mb-md-0 mb-3">
                <div class="card-body">
                    @include('admin.widgets.FlashMessage')
                    <form action="{{route('InVendor.Product.Add.Discount', $product->id)}}" id="productForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="vendor_id" value="{{$vendor->id}}">
                        <div class="mb-3">
                            <label class="form-label">Current Price</label>
                            <input type="number" name="old_price" class="form-control" value="{{$product->current_selling_price/100}}" readonly>
                        </div>
                            <div class="mb-3" id="title_div">
                                <label  class="form-label"> Give a New Price</label>
                                <input type="number" name="current_selling_price" class="form-control" required>
                            </div>
                           <div class="mb-3">
                            <label class="form-label">Discount Percentage</label>
                               <input type="number" name="discount" class="form-control">
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>

            </div>

        </div>
    </div>
@endsection

@section('scripts')

@endsection


