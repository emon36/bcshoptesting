<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">

                </ol>
            </div>
            <h4 class="page-title">Update Product</h4>
        </div>
        <div class="card mb-md-0 mb-3">
            <div class="card-body">
                @include('admin.widgets.FlashMessage')
                <form action="{{route('InAdmin.Product.UpdateProcess',$product->id)}}" id="productForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label  class="form-label">Select a Shop</label>
                        </div>
                        <div class="mb-3 col-md-6">
                            <select name="vendor_id" class="primary_select" required>
                                @if($vendors)
                                    @foreach($vendors as $vendor)
                                        <option value="{{$vendor->id}}" @if($vendor->id == $product->vendor_id) selected @endif>{{$vendor->shop_name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

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
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" id="editor" name="description"> {{$product->description}}</textarea>
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


                    @if($product->has_attributes == 1)
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <div class="product-attribute">
                                @foreach($product->attributes as $aKey => $attribute)
                                <div class="row">
                                    <div class="col-md-5">
                                        <label  class="form-label">Select Attribute</label>
                                        <select class="form-control" name="attribute[]" id="attribute" readonly="">
                                            @foreach($allAttributes as $option)
                                                <option value="{{$option->title}}" {{ $option->title == $attribute->attribute ? 'selected' : '' }}>{{$option->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-5">
                                        <label  class="form-label">Attribute Value</label>
                                        <input type="text" class="form-control tagifyValues" name="value[]" id="value"  value="{{ $attribute->value }}" required>

                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    @else
                    @endif

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label  class="form-label">Featured Image ( Size 600*600 )</label>
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
                            <label  class="form-label">Gallery Image ( Size 600*600 )</label>
                            <input type="file" name="image[]" class="form-control" multiple >
                            <?php
                            foreach ($product->images->where('position_key', '!=' , 1) as $image)
                            {
                                $galleryImage = $image->image;
                                ?>
                            <div  style="display: inline-block;text-align: center;">
                                <img src="{{asset('uploads/images/products/'.$galleryImage)}}" class="mt-2 img-fluid" width="100" height="100" style="display: block">
                                <a href="{{route('InAdmin.Product.DeleteGalleryImage', $image->id)}}" class="btn btn-danger mt-2"><i class="mdi mdi-trash-can"></i> </a>
                            </div>
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

</div>
@section('scripts')
    <script src="https://unpkg.com/@yaireo/tagify"></script>
    <script src="https://unpkg.com/@yaireo/tagify@3.1.0/dist/tagify.polyfills.min.js"></script>
    <script>

        $(document).ready(function() {
            $('.primary_select').niceSelect();
        });

        var input = $('.tagifyValues')
        console.log(input);
        for(let i=0 ; i<= input.length; i++)
        {
            console.log(input[i])
            new Tagify(input[i])
        }


        $('#addBtn').on('click', function() {
            var newAttribute = `
      <div class="row mt-2">
        <div class="col-md-5">
          <label class="form-label">Select Attribute</label>
          <select class="form-control" name="attribute[]">
            @foreach($allAttributes as $option)
            <option value="{{$option->title}}">{{$option->title}}</option>
            @endforeach
            </select>
          </div>
          <div class="col-md-5">
            <label class="form-label">Attribute Value</label>
            <input type="text" class="form-control" name="value[]">
          </div>

        </div>`;

            $('.product-attribute').append(newAttribute);

            var newInput = $('.product-attribute').find('input[name="value[]"]').last()[0];

            new Tagify(newInput);
        });

        $(document).on('click', '.deleteBtn', function (){
            $(this).parent().parent().remove();
        })


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
