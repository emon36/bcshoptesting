<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">

                </ol>
            </div>
            <h4 class="page-title">Edit Product</h4>
        </div>
        <div class="card mb-md-0 mb-3">
            <div class="card-body">
                @include('admin.widgets.FlashMessage')
                <form action="{{route('InVendor.Product.UpdateProcess' , $product->id)}}" id="productForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="vendor_id" value="{{$vendor->id}}">
                    <div class="row g-2">
                        <div class="mb-3 col-md-4" id="title_div">
                            <label  class="form-label">Title</label>

                            <input type="text" name="title" value="{{$product->title}}" class="form-control" required>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label">Category</label>
                            <select name="category_id" class="primary_select" required>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" @if($category->id == $productCategories->category_id) selected @endif > {{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-md-4" id="sku_div">
                            <label class="form-label">SKU</label>
                            <input type="text" class="form-control" id="sku"  name="sku" value="{{$product->sku}}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" id="editor" name="description">{{$product->description}}</textarea>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-md-3">
                            <select name="unit" class="primary_select" required>
                                <option>Unit</option>
                                @foreach($units as $unit)
                                    <option value="{{$unit->title}}"  @if($unit->title == $product->unit) selected @endif>{{$unit->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-md-9">
                            <div class="row">
                                <div class="col-md-4">
                                    <label  class="form-label float-end" >Weight</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="number" name="unit_weight" value="{{$product->unit_weight}}" required class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <select name="unit_weight_helper" class="primary_select" required>
                                        <option value="Grams" >Grams</option>
                                        <option value="KGs">KGs</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">

                        <div class="mb-3 col-md-4">
                            <label  class="form-label">Purchase Price</label>
                            <input type="text" name="current_purchase_price" value="{{$product->current_purchase_price / 100}}" required class="form-control">
                        </div>

                        <div class="mb-3 col-md-4">
                            <label  class="form-label">Selling Price</label>
                            <input type="text" name="current_selling_price" value="{{$product->current_selling_price / 100}}"  required class="form-control">
                        </div>

                        <div class="mb-3 col-md-4">
                            <label  class="form-label">Current Stock</label>
                            <input type="text" name="current_stock" value="{{$product->current_stock}}" required class="form-control">
                        </div>

                    </div>
                    <div class="row">

                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="preorder" value="1" @if($product->preorder == 1) checked @endif id="preorder" onchange="myFunction();">
                                <label class="form-check-label">
                                    Does this product has Pre-Order?
                                </label>
                            </div>
                        </div>
                        <div class="mb-3 col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="perishable" value="1" @if($product->perishable == 1) checked @endif id="perishable">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Is this product perishable?
                                </label>
                            </div>
                        </div>

                    </div>

                    <div class="mb-3 col-md-3" id="preorder_div">
                        <label  class="form-label">Pre-Order Amount</label>
                        <input type="number"  name="preorder_advance_amount" value="{{$product->preorder_advance_amount}}" id="preorder_amount" class="form-control">
                    </div>

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label  class="form-label">Featured Image</label>
                            <input type="file" name="featured_image" class="form-control" >
                            <?php
                            foreach ($product->images->where('position_key', 1) as $image)
                            {
                                $featureImage = $image->image;
                            }
                            ?>
                            <img src="{{asset('uploads/images/products/'.$featureImage)}}"  class="mt-2" height="100" width="100">
                        </div>

                        <div class="mb-3 col-md-6">
                            <label  class="form-label">Image</label>
                            <input type="file" name="image[]" class="form-control"  multiple >
                            <?php
                            foreach ($product->images->where('position_key', '!=' , 1) as $image)
                            {
                            $galleryImage = $image->image;
                            ?>
                            <img src="{{asset('uploads/images/products/'.$galleryImage)}}" class="mt-2 img-fluid" width="100" height="100">
                            <?php
                            }
                            ?>

                        </div>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>

            </div>

        </div>

    </div>
</div>

@section('scripts')

    <script>

        $(document).ready(function() {
            $('select').niceSelect();
        });

        if($('#preorder').is(':checked')) {
            $('#preorder_div').show();
            $('#preorder_amount').removeAttr('disabled', true);

        }else{
            $('#preorder_amount').attr('disabled', true);
            $('#preorder_div').hide();
        }
        function myFunction() {
            if($('#preorder').prop('checked')) {
                $('#preorder_div').show();
                $('#preorder_amount').removeAttr('disabled', true);

            }else{
                $('#preorder_amount').attr('disabled', true);
                $('#preorder_div').hide();
            }

        }

    </script>
@endsection
