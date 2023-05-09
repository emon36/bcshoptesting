@extends('web.layouts.master')

@section('header')
    @include('web.includes.pageHeader')
@endsection

@section('content')
    <main class="main wishlist-page">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">Wishlist</h1>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav mb-10">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{route('Home')}}">Home</a></li>
                    <li>Wishlist</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of PageContent -->
        <div class="page-content">
            <div class="container">
                <h3 class="wishlist-title">My wishlist</h3>
                <table class="shop-table wishlist-table">
                    <thead>
                    <tr>
                        <th class="product-name"><span>Product</span></th>
                        <th></th>
                        <th class="product-price"><span>Price</span></th>
                        <th class="product-stock-status"><span>Stock Status</span></th>
                        <th class="wishlist-action">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($wishlists as $wishlist)
                    <tr>
                        <?php
                        foreach ($wishlist->product->images->where('position_key', 1) as $row)
                        {
                            $image = $row->image;
                        }
                        ?>
                        <td class="product-thumbnail">
                            <div class="p-relative">
                                <a href="product-default.html">

                                    <figure>
                                        <img src="{{asset('uploads/images/products/'.$image)}}" alt="product" width="300"
                                             height="338">
                                    </figure>
                                </a>
                                <a href="{{route('DeleteWishlist', $wishlist->id)}}"  class="btn btn-close"><i
                                        class="fas fa-times"></i></a>
                            </div>
                        </td>
                        <td class="product-name">
                            <a href="product-default.html">
                               {{$wishlist->product->title}}
                            </a>
                        </td>
                        <td class="product-price">
                            <ins class="new-price">{{$wishlist->product->current_selling_price/100}}tk</ins>
                        </td>
                        <td class="product-stock-status">
                            <span class="wishlist-in-stock">In Stock</span>
                        </td>
                        <td class="wishlist-action ">
                            <div class="d-lg-flex  product_data">
                                <input type="hidden" name="product_id"  class="product_id" value="{{$wishlist->product->id}}">
                                <input type="hidden" name="vendor_id"  class="vendor_id" value="{{$wishlist->product->vendor_id}}">
                                <input type="hidden" name="unit_price" class="unit_price"  value="{{$wishlist->product->current_selling_price}}">
                                <a href="#" class="btn btn-dark btn-rounded btn-sm ml-lg-2 btn-cart addToCart">Add to
                                    cart</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
                <div class="social-links">
                    <label>Share On:</label>
                    <div class="social-icons social-no-color border-thin">
                        <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                        <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                        <a href="#" class="social-icon social-pinterest w-icon-pinterest"></a>
                        <a href="#" class="social-icon social-email far fa-envelope"></a>
                        <a href="#" class="social-icon social-whatsapp fab fa-whatsapp"></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of PageContent -->
    </main>
@endsection

@section('scripts')

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {
            $('.addToCart').click(function (e) {
                e.preventDefault();
                var product_id = $(this).closest('.product_data').find('.product_id').val();
                var vendor_id = $(this).closest('.product_data').find('.vendor_id').val();
                var unit_price = $(this).closest('.product_data').find('.unit_price').val();

                $.ajax({
                    method: "POST",
                    url:  "{{route('Product.AddToCart')}}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'product_id' : product_id,
                        'vendor_id' : vendor_id,
                        'quantity' :  1,
                        'unit_price' : unit_price,
                    },

                    success:function (response) {
                        toastr.success(response.status);
                        let total = response.cartCount
                        $('.cart-count').html(total);
                    }

                });

            });

        });

    </script>

@endsection
