<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">

                </ol>
            </div>
            <h4 class="page-title">Create Product</h4>
        </div>
        <div class="card mb-md-0 mb-3">
            <div class="card-body">
                @include('admin.widgets.FlashMessage')
                <form action="{{route('InAdmin.Product.CreateProcess')}}" id="productForm" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label  class="form-label">Select a Shop</label>
                        </div>
                        <div class="mb-3 col-md-6">
                            <select name="vendor_id" class="primary_select" required>
                                @if($vendors)
                                        @foreach($vendors as $vendor)
                                            <option value="{{$vendor->id}}">{{$vendor->shop_name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="mb-3 col-md-4" id="title_div">
                            <label  class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label">Category</label>
                            <select name="category_id" class="form-control" required>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}"> {{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3 col-md-4" id="sku_div">
                            <label class="form-label">SKU</label>
                            <input type="text" class="form-control" id="sku"  name="sku" value="{{ $sku }}" required>
                        </div>
                    </div>



                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" id="editor" rows="5" name="description"></textarea>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-md-3">
                            <select name="unit" class="primary_select" required>
                                <option>Unit</option>
                                    @foreach($units as $unit)
                                        <option value="{{$unit->title}}">{{$unit->title}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-md-9">
                            <div class="row">
                                <div class="col-md-4">
                                    <label  class="form-label float-end" >Weight</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="number" value="0" name="unit_weight" required class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <select name="unit_weight_helper" class="primary_select" required>
                                        <option value="Grams">Grams</option>
                                        <option value="KGs">KGs</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">

                        <div class="mb-3 col-md-4">
                            <label  class="form-label">Purchase Price</label>
                            <input type="text" name="current_purchase_price" required class="form-control">
                        </div>

                        <div class="mb-3 col-md-4">
                            <label  class="form-label">Selling Price</label>
                            <input type="text" name="current_selling_price" required class="form-control">
                        </div>

                        <div class="mb-3 col-md-4">
                            <label  class="form-label">Current Stock</label>
                            <input type="text" name="current_stock" required class="form-control">
                        </div>

                    </div>
                    <div class="row">

                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="preorder" value="1" id="preorder" onchange="myFunction();">
                                <label class="form-check-label">
                                    Does this product has Pre-Order?
                                </label>
                            </div>
                        </div>
                        <div class="mb-3 col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="perishable" value="1" id="perishable">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Is this product perishable?
                                </label>
                            </div>
                        </div>

                    </div>

                    <div class="mb-3 col-md-3" id="preorder_div">
                        <label  class="form-label">Pre-Order Amount</label>
                        <input type="number"  name="preorder_advance_amount" id="preorder_amount" class="form-control">
                    </div>

{{--                    <div class="mb-3 col-md-4">--}}
{{--                        <div class="form-check">--}}
{{--                            <input class="form-check-input" type="checkbox" name="attribute_check" value="1" id="attribute_check" onchange="attributeFunction();">--}}
{{--                            <label class="form-check-label" for="flexCheckDefault">--}}
{{--                               Does product has attributes?--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div id="example"></div>--}}
{{--                    <div id="attribute"></div>--}}
{{--                    @viteReactRefresh--}}
{{--                    @vite('resources/js/app.js')--}}

                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <div class="product-attribute">
                                <div class="row">
                                    <div class="col-md-5">
                                        <label  class="form-label">Select Attribute</label>
                                        <select class="form-control" name="attribute[]" id="attribute">
                                            @foreach($attributes as $attribute)
                                            <option value="{{$attribute->title}}">{{$attribute->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-5">
                                        <label  class="form-label">Attribute Value</label>
                                        <input type="text" class="form-control" name="value[]" id="value" required>
                                    </div>
                                    <div class="col-md-2 mt-3">
                                        <a class="btn btn-primary" id="addBtn">Add More</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label  class="form-label">Featured Image</label>
                            <input type="file" name="featured_image" class="form-control" required onchange="loadFile(event)" >
                            <img id="output" class="mt-2" width="100" height="100"/>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label  class="form-label">Image</label>
                            <input type="file" name="image[]" id="file-input" class="form-control" required multiple >
                            <div  class="mt-2" id="preview"></div>
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
    <script src="https://unpkg.com/@yaireo/tagify"></script>
    <script src="https://unpkg.com/@yaireo/tagify@3.1.0/dist/tagify.polyfills.min.js"></script>
    <script>

        $(document).ready(function() {
            $('.primary_select').niceSelect();
        });

        var input = document.querySelector('input[name="value[]"]');

        // initialize Tagify on the above input node reference
        new Tagify(input)


        $('.product-attribute').hide();
        $('#attribute').attr('disabled', true);
        $('#value').attr('disabled', true);

        function attributeFunction() {
            if($('#attribute_check').prop('checked')) {
                $('.product-attribute').show();
                $('#attribute').removeAttr('disabled', true);
                $('#value').removeAttr('disabled', true);
            }else{
                $('#attribute').attr('disabled', true);
                $('#value').attr('disabled', true);
                $('.product-attribute').hide();
            }
        }

        $('#addBtn').on('click', function() {
            var newAttribute = `
      <div class="row mt-2">
        <div class="col-md-5">
          <label class="form-label">Select Attribute</label>
          <select class="form-control" name="attribute[]">
            @foreach($attributes as $attribute)
            <option value="{{$attribute->title}}">{{$attribute->title}}</option>
            @endforeach
            </select>
          </div>
          <div class="col-md-5">
            <label class="form-label">Attribute Value</label>
            <input type="text" class="form-control" name="value[]">
          </div>
          <div class="col-md-2 mt-3">
            <a class="btn btn-danger deleteBtn"> <i class="mdi mdi-trash-can"></i></a>
          </div>
        </div>`;

            $('.product-attribute').append(newAttribute);

            var newInput = $('.product-attribute').find('input[name="value[]"]').last()[0];

            new Tagify(newInput);
        });

        $(document).on('click', '.deleteBtn', function (){
            $(this).parent().parent().remove();
        })


        var loadFile = function(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('output');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };

        $('#preorder_div').hide();
        $('#preorder_amount').attr('disabled', true);



        function myFunction() {
            if($('#preorder').prop('checked')) {
                $('#preorder_div').show();
                $('#preorder_amount').removeAttr('disabled', true);

            }else{
                $('#preorder_amount').attr('disabled', true);
                $('#preorder_div').hide();
            }

        }

        function previewImages() {

            var preview = document.querySelector('#preview');

            if (this.files) {
                [].forEach.call(this.files, readAndPreview);
            }

            function readAndPreview(file) {

                var reader = new FileReader();

                reader.addEventListener("load", function() {
                    var image = new Image();
                    image.height = 100;
                    image.title  = file.name;
                    image.src    = this.result;
                    preview.appendChild(image);
                });

                reader.readAsDataURL(file);

            }

        }

        document.querySelector('#file-input').addEventListener("change", previewImages);





    </script>
@endsection
