@extends('web.layouts.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('front-end/assets/css/demo1.min.css')}}">
@endsection

@section('header')
    @include('web.includes.homeHeader')
@endsection

@section('content')

    <main class="main">
        <!-- Banner start -->

    @include('web.includes.banner')

    <!-- End of Banner  -->

        <div class="container">

            <div class="swiper-container appear-animate icon-box-wrapper br-sm mt-6 mb-6" data-swiper-options="{
                        'slidesPerView': 1,
                        'loop': false,
                        'breakpoints': {
                            '576': {
                                'slidesPerView': 2
                            },
                            '768': {
                                'slidesPerView': 3
                            },
                            '1200': {
                                'slidesPerView': 4
                            }
                        }
                    }">
                <div class="swiper-wrapper row cols-md-4 cols-sm-3 cols-1">
                    <div class="swiper-slide icon-box icon-box-side icon-box-primary">
                                <span class="icon-box-icon icon-shipping">
                                    <i class="w-icon-truck"></i>
                                </span>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title font-weight-bold mb-1">Free Shipping & Returns</h4>
                            <p class="text-default">For all orders over ৳15000 </p>
                        </div>
                    </div>
                    <div class="swiper-slide icon-box icon-box-side icon-box-primary">
                                <span class="icon-box-icon icon-payment">
                                    <i class="w-icon-bag"></i>
                                </span>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title font-weight-bold mb-1">Secure Payment</h4>
                            <p class="text-default">We ensure secure payment</p>
                        </div>
                    </div>
                    <div class="swiper-slide icon-box icon-box-side icon-box-primary icon-box-money">
                                <span class="icon-box-icon icon-money">
                                    <i class="w-icon-money"></i>
                                </span>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title font-weight-bold mb-1">Money Back Guarantee</h4>
                            <p class="text-default">Any back within 30 days</p>
                        </div>
                    </div>
                    <div class="swiper-slide icon-box icon-box-side icon-box-primary icon-box-chat">
                                <span class="icon-box-icon icon-chat">
                                    <i class="w-icon-chat"></i>
                                </span>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title font-weight-bold mb-1">Customer Support</h4>
                            <p class="text-default">Call or email us 24/7</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Iocn Box Wrapper -->
            @if($mostSellingProduct)
            <div class="row deals-wrapper appear-animate mb-8">
                <div class="col-lg-12 mb-12">
                    <div class="widget widget-products widget-products-bordered h-100">
                        <div class="widget-body br-sm h-100">
                            <h4 class="title-sm title-underline font-weight-bolder ls-normal mb-2">Best
                                Selling Products</h4>
                            <div class="swiper">
                                <div class="swiper-container swiper-theme nav-top" data-swiper-options="{
                                        'slidesPerView': 1,
                                        'spaceBetween': 20,
                                        'breakpoints': {
                                            '576': {
                                                'slidesPerView': 2
                                            },
                                            '768': {
                                                'slidesPerView': 3
                                            },
                                            '992': {
                                                'slidesPerView': 1
                                            }
                                        }
                                    }">
                                    <div class="swiper-wrapper row cols-lg-1 cols-md-3">
                                        <div class="swiper-slide product-widget-wrap row">
                                            @foreach($mostSellingProduct as $product)
                                            <div class="product bb-no col-md-2 col-lg-2">
                                                <figure class="product-media">
                                                    <a href="{{route('productSingleView', $product->slug)}}">
                                                        <img class="Top20Image" src="{{asset('uploads/images/products/'.$product->fImage->image)}}" alt="Product"
                                                             width="216" height="243" />
                                                    </a>
                                                </figure>
                                                <div class="mt-20">
                                                    <h4 class="product-name">
                                                        <a href="">{{$product->title}}</a>
                                                    </h4>
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width: 60%;"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                    </div>
                                                    <div class="product-price">
                                                        @if($product->discount != NULL)
                                                            <ins class="new-price">{{$product->current_selling_price/100}}৳</ins>
                                                            <del class="old-price">{{$product->old_price/100}}৳</del>
                                                        @else
                                                            <ins class="new-price">{{$product->current_selling_price/100}}৳</ins>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            @else
            @endif

            <!-- End of Deals Wrapper -->
        </div>

{{--        <div class="container">--}}
{{--            <h2 class="title justify-content-center ls-normal mb-4 mt-10 pt-1 appear-animate">Preorder Products--}}
{{--            </h2>--}}
{{--            <div class="tab tab-nav-boxed tab-nav-outline appear-animate">--}}
{{--                <ul class="nav nav-tabs justify-content-center" role="tablist">--}}
{{--                    <li class="nav-item mr-2 mb-2">--}}
{{--                        <a class="nav-link active br-sm font-size-md ls-normal" href="#preorderTab-1">New arrivals</a>--}}
{{--                    </li>--}}
{{--                    --}}{{--                    <li class="nav-item mr-2 mb-2">--}}
{{--                    --}}{{--                        <a class="nav-link br-sm font-size-md ls-normal" href="#tab1-2">Best seller</a>--}}
{{--                    --}}{{--                    </li>--}}
{{--                    <li class="nav-item mr-2 mb-2">--}}
{{--                        <a class="nav-link br-sm font-size-md ls-normal" href="#preorderTab-2">Most popular</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item mr-0 mb-2">--}}
{{--                        <a class="nav-link br-sm font-size-md ls-normal" href="#preorderTab-3">Featured</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--            <!-- End of Tab -->--}}
{{--            <div class="tab-content product-wrapper appear-animate">--}}
{{--                <div class="tab-pane active pt-4" id="preorderTab-1">--}}
{{--                    <div class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">--}}
{{--                        @foreach($preorderRecentProducts as $product)--}}
{{--                            <div class="product-wrap product text-center">--}}
{{--                                <figure class="product-media">--}}
{{--                                    @if($product->discount != NULL)--}}
{{--                                        <div class="discount-tag">--}}
{{--                                            <span>{{$product->discount}}%</span>--}}
{{--                                        </div>--}}
{{--                                    @else--}}
{{--                                    @endif--}}
{{--                                    <a href="{{route('productSingleView', $product->slug)}}">--}}
{{--                                        <img src="{{asset('uploads/images/products/'.$product->fImage->image)}}" alt="Product"--}}
{{--                                             width="216" height="243" />--}}
{{--                                    </a>--}}
{{--                                </figure>--}}
{{--                                <div class="product-action-vertical">--}}
{{--                                    --}}{{--                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                    --}}{{--                                                   title="Add to cart"></a>--}}
{{--                                    <a href="#" class="btn-product-icon  w-icon-heart addwishlist"--}}
{{--                                       title="Add to wishlist" data-id="{{$product->id}}"></a>--}}
{{--                                </div>--}}

{{--                                <div class="product-details">--}}
{{--                                    <h4 class="product-name"><a href="{{route('productSingleView', $product->slug)}}">{{$product->title}}</a>--}}
{{--                                    </h4>--}}

{{--                                    <div class="product-price">--}}
{{--                                        @if($product->discount != NULL)--}}
{{--                                            <ins class="new-price">{{$product->current_selling_price/100}}</ins>--}}
{{--                                            <del class="old-price">{{$product->old_price/100}}</del>--}}
{{--                                        @else--}}
{{--                                            <ins class="new-price">{{$product->current_selling_price/100}}</ins>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- End of Tab Pane -->--}}
{{--            --}}{{--                <div class="tab-pane pt-4" id="tab1-2">--}}
{{--            --}}{{--                    <div class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">--}}
{{--            --}}{{--                        <div class="product-wrap">--}}
{{--            --}}{{--                            <div class="product text-center">--}}
{{--            --}}{{--                                <figure class="product-media">--}}
{{--            --}}{{--                                    <a href="product-default.html">--}}
{{--            --}}{{--                                        <img src="assets/images/demos/demo1/products/3-4-1.jpg" alt="Product"--}}
{{--            --}}{{--                                             width="300" height="338" />--}}
{{--            --}}{{--                                        <img src="assets/images/demos/demo1/products/3-4-2.jpg" alt="Product"--}}
{{--            --}}{{--                                             width="300" height="338" />--}}
{{--            --}}{{--                                    </a>--}}
{{--            --}}{{--                                    <div class="product-action-vertical">--}}
{{--            --}}{{--                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--            --}}{{--                                           title="Add to cart"></a>--}}
{{--            --}}{{--                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--            --}}{{--                                           title="Add to wishlist"></a>--}}
{{--            --}}{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--            --}}{{--                                           title="Quickview"></a>--}}
{{--            --}}{{--                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--            --}}{{--                                           title="Add to Compare"></a>--}}
{{--            --}}{{--                                    </div>--}}
{{--            --}}{{--                                </figure>--}}
{{--            --}}{{--                                <div class="product-details">--}}
{{--            --}}{{--                                    <h4 class="product-name"><a href="product-default.html">Fashion Blue Towel</a>--}}
{{--            --}}{{--                                    </h4>--}}
{{--            --}}{{--                                    <div class="ratings-container">--}}
{{--            --}}{{--                                        <div class="ratings-full">--}}
{{--            --}}{{--                                            <span class="ratings" style="width: 100%;"></span>--}}
{{--            --}}{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--            --}}{{--                                        </div>--}}
{{--            --}}{{--                                        <a href="product-default.html" class="rating-reviews">(8 reviews)</a>--}}
{{--            --}}{{--                                    </div>--}}
{{--            --}}{{--                                    <div class="product-price">--}}
{{--            --}}{{--                                        <ins class="new-price">$26.55 - $29.99</ins>--}}
{{--            --}}{{--                                    </div>--}}
{{--            --}}{{--                                </div>--}}
{{--            --}}{{--                            </div>--}}
{{--            --}}{{--                        </div>--}}
{{--            --}}{{--                        <div class="product-wrap">--}}
{{--            --}}{{--                            <div class="product text-center">--}}
{{--            --}}{{--                                <figure class="product-media">--}}
{{--            --}}{{--                                    <a href="product-default.html">--}}
{{--            --}}{{--                                        <img src="assets/images/demos/demo1/products/3-3.jpg" alt="Product"--}}
{{--            --}}{{--                                             width="300" height="338" />--}}
{{--            --}}{{--                                    </a>--}}
{{--            --}}{{--                                    <div class="product-action-vertical">--}}
{{--            --}}{{--                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--            --}}{{--                                           title="Add to cart"></a>--}}
{{--            --}}{{--                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--            --}}{{--                                           title="Add to wishlist"></a>--}}
{{--            --}}{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--            --}}{{--                                           title="Quickview"></a>--}}
{{--            --}}{{--                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--            --}}{{--                                           title="Add to Compare"></a>--}}
{{--            --}}{{--                                    </div>--}}
{{--            --}}{{--                                    <div class="product-label-group">--}}
{{--            --}}{{--                                        <label class="product-label label-discount">7% Off</label>--}}
{{--            --}}{{--                                    </div>--}}
{{--            --}}{{--                                </figure>--}}
{{--            --}}{{--                                <div class="product-details">--}}
{{--            --}}{{--                                    <h4 class="product-name"><a href="product-default.html">Multi Funtional Apple--}}
{{--            --}}{{--                                            iPhone</a></h4>--}}
{{--            --}}{{--                                    <div class="ratings-container">--}}
{{--            --}}{{--                                        <div class="ratings-full">--}}
{{--            --}}{{--                                            <span class="ratings" style="width: 100%;"></span>--}}
{{--            --}}{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--            --}}{{--                                        </div>--}}
{{--            --}}{{--                                        <a href="product-default.html" class="rating-reviews">(5 reviews)</a>--}}
{{--            --}}{{--                                    </div>--}}
{{--            --}}{{--                                    <div class="product-price">--}}
{{--            --}}{{--                                        <ins class="new-price">136.26</ins>--}}
{{--            --}}{{--                                        <del class="old-price">$145.90</del>--}}
{{--            --}}{{--                                    </div>--}}
{{--            --}}{{--                                </div>--}}
{{--            --}}{{--                            </div>--}}
{{--            --}}{{--                        </div>--}}
{{--            --}}{{--                        <div class="product-wrap">--}}
{{--            --}}{{--                            <div class="product text-center">--}}
{{--            --}}{{--                                <figure class="product-media">--}}
{{--            --}}{{--                                    <a href="product-default.html">--}}
{{--            --}}{{--                                        <img src="assets/images/demos/demo1/products/3-8-1.jpg" alt="Product"--}}
{{--            --}}{{--                                             width="300" height="338" />--}}
{{--            --}}{{--                                        <img src="assets/images/demos/demo1/products/3-8-2.jpg" alt="Product"--}}
{{--            --}}{{--                                             width="300" height="338" />--}}
{{--            --}}{{--                                    </a>--}}
{{--            --}}{{--                                    <div class="product-action-vertical">--}}
{{--            --}}{{--                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--            --}}{{--                                           title="Add to cart"></a>--}}
{{--            --}}{{--                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--            --}}{{--                                           title="Add to wishlist"></a>--}}
{{--            --}}{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--            --}}{{--                                           title="Quickview"></a>--}}
{{--            --}}{{--                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--            --}}{{--                                           title="Add to Compare"></a>--}}
{{--            --}}{{--                                    </div>--}}
{{--            --}}{{--                                </figure>--}}
{{--            --}}{{--                                <div class="product-details">--}}
{{--            --}}{{--                                    <h4 class="product-name"><a href="product-default.html">Comfortable Backpack</a>--}}
{{--            --}}{{--                                    </h4>--}}
{{--            --}}{{--                                    <div class="ratings-container">--}}
{{--            --}}{{--                                        <div class="ratings-full">--}}
{{--            --}}{{--                                            <span class="ratings" style="width: 100%;"></span>--}}
{{--            --}}{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--            --}}{{--                                        </div>--}}
{{--            --}}{{--                                        <a href="product-default.html" class="rating-reviews">(6 reviews)</a>--}}
{{--            --}}{{--                                    </div>--}}
{{--            --}}{{--                                    <div class="product-price">--}}
{{--            --}}{{--                                        <ins class="new-price">$45.90</ins>--}}
{{--            --}}{{--                                    </div>--}}
{{--            --}}{{--                                </div>--}}
{{--            --}}{{--                            </div>--}}
{{--            --}}{{--                        </div>--}}
{{--            --}}{{--                        <div class="product-wrap">--}}
{{--            --}}{{--                            <div class="product text-center">--}}
{{--            --}}{{--                                <figure class="product-media">--}}
{{--            --}}{{--                                    <a href="product-default.html">--}}
{{--            --}}{{--                                        <img src="assets/images/demos/demo1/products/3-9.jpg" alt="Product"--}}
{{--            --}}{{--                                             width="300" height="338" />--}}
{{--            --}}{{--                                    </a>--}}
{{--            --}}{{--                                    <div class="product-action-vertical">--}}
{{--            --}}{{--                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--            --}}{{--                                           title="Add to cart"></a>--}}
{{--            --}}{{--                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--            --}}{{--                                           title="Add to wishlist"></a>--}}
{{--            --}}{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--            --}}{{--                                           title="Quickview"></a>--}}
{{--            --}}{{--                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--            --}}{{--                                           title="Add to Compare"></a>--}}
{{--            --}}{{--                                    </div>--}}
{{--            --}}{{--                                </figure>--}}
{{--            --}}{{--                                <div class="product-details">--}}
{{--            --}}{{--                                    <h4 class="product-name"><a href="product-default.html">Data Transformer Tool--}}
{{--            --}}{{--                                        </a></h4>--}}
{{--            --}}{{--                                    <div class="ratings-container">--}}
{{--            --}}{{--                                        <div class="ratings-full">--}}
{{--            --}}{{--                                            <span class="ratings" style="width: 60%;"></span>--}}
{{--            --}}{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--            --}}{{--                                        </div>--}}
{{--            --}}{{--                                        <a href="product-default.html" class="rating-reviews">(3 reviews)</a>--}}
{{--            --}}{{--                                    </div>--}}
{{--            --}}{{--                                    <div class="product-price">--}}
{{--            --}}{{--                                        <span class="price">$64.47</span>--}}
{{--            --}}{{--                                    </div>--}}
{{--            --}}{{--                                </div>--}}
{{--            --}}{{--                            </div>--}}
{{--            --}}{{--                        </div>--}}
{{--            --}}{{--                        <div class="product-wrap">--}}
{{--            --}}{{--                            <div class="product text-center">--}}
{{--            --}}{{--                                <figure class="product-media">--}}
{{--            --}}{{--                                    <a href="product-default.html">--}}
{{--            --}}{{--                                        <img src="assets/images/demos/demo1/products/3-5.jpg" alt="Product"--}}
{{--            --}}{{--                                             width="300" height="338" />--}}
{{--            --}}{{--                                    </a>--}}
{{--            --}}{{--                                    <div class="product-action-vertical">--}}
{{--            --}}{{--                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--            --}}{{--                                           title="Add to cart"></a>--}}
{{--            --}}{{--                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--            --}}{{--                                           title="Add to wishlist"></a>--}}
{{--            --}}{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--            --}}{{--                                           title="Quickview"></a>--}}
{{--            --}}{{--                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--            --}}{{--                                           title="Add to Compare"></a>--}}
{{--            --}}{{--                                    </div>--}}
{{--            --}}{{--                                    <div class="product-label-group">--}}
{{--            --}}{{--                                        <label class="product-label label-discount">4% Off</label>--}}
{{--            --}}{{--                                    </div>--}}
{{--            --}}{{--                                </figure>--}}
{{--            --}}{{--                                <div class="product-details">--}}
{{--            --}}{{--                                    <h4 class="product-name"><a href="product-default.html">Apple Super Notecom</a>--}}
{{--            --}}{{--                                    </h4>--}}
{{--            --}}{{--                                    <div class="ratings-container">--}}
{{--            --}}{{--                                        <div class="ratings-full">--}}
{{--            --}}{{--                                            <span class="ratings" style="width: 100%;"></span>--}}
{{--            --}}{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--            --}}{{--                                        </div>--}}
{{--            --}}{{--                                        <a href="product-default.html" class="rating-reviews">(4 reviews)</a>--}}
{{--            --}}{{--                                    </div>--}}
{{--            --}}{{--                                    <div class="product-price">--}}
{{--            --}}{{--                                        <ins class="new-price">$243.30</ins>--}}
{{--            --}}{{--                                        <del class="old-price">$253.50</del>--}}
{{--            --}}{{--                                    </div>--}}
{{--            --}}{{--                                </div>--}}
{{--            --}}{{--                            </div>--}}
{{--            --}}{{--                        </div>--}}
{{--            --}}{{--                        <div class="product-wrap">--}}
{{--            --}}{{--                            <div class="product text-center">--}}
{{--            --}}{{--                                <figure class="product-media">--}}
{{--            --}}{{--                                    <a href="product-default.html">--}}
{{--            --}}{{--                                        <img src="assets/images/demos/demo1/products/3-6-1.jpg" alt="Product"--}}
{{--            --}}{{--                                             width="300" height="338" />--}}
{{--            --}}{{--                                        <img src="assets/images/demos/demo1/products/3-6-2.jpg" alt="Product"--}}
{{--            --}}{{--                                             width="300" height="338" />--}}
{{--            --}}{{--                                    </a>--}}
{{--            --}}{{--                                    <div class="product-action-vertical">--}}
{{--            --}}{{--                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--            --}}{{--                                           title="Add to cart"></a>--}}
{{--            --}}{{--                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--            --}}{{--                                           title="Add to wishlist"></a>--}}
{{--            --}}{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--            --}}{{--                                           title="Quickview"></a>--}}
{{--            --}}{{--                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--            --}}{{--                                           title="Add to Compare"></a>--}}
{{--            --}}{{--                                    </div>--}}
{{--            --}}{{--                                </figure>--}}
{{--            --}}{{--                                <div class="product-details">--}}
{{--            --}}{{--                                    <h4 class="product-name"><a href="product-default.html">Women’s Comforter</a>--}}
{{--            --}}{{--                                    </h4>--}}
{{--            --}}{{--                                    <div class="ratings-container">--}}
{{--            --}}{{--                                        <div class="ratings-full">--}}
{{--            --}}{{--                                            <span class="ratings" style="width: 100%;"></span>--}}
{{--            --}}{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--            --}}{{--                                        </div>--}}
{{--            --}}{{--                                        <a href="product-default.html" class="rating-reviews">(10 reviews)</a>--}}
{{--            --}}{{--                                    </div>--}}
{{--            --}}{{--                                    <div class="product-price">--}}
{{--            --}}{{--                                        <ins class="new-price">$32.00 - $33.26</ins>--}}
{{--            --}}{{--                                    </div>--}}
{{--            --}}{{--                                </div>--}}
{{--            --}}{{--                            </div>--}}
{{--            --}}{{--                        </div>--}}
{{--            --}}{{--                        <div class="product-wrap">--}}
{{--            --}}{{--                            <div class="product text-center">--}}
{{--            --}}{{--                                <figure class="product-media">--}}
{{--            --}}{{--                                    <a href="product-default.html">--}}
{{--            --}}{{--                                        <img src="assets/images/demos/demo1/products/3-7.jpg" alt="Product"--}}
{{--            --}}{{--                                             width="300" height="338" />--}}
{{--            --}}{{--                                    </a>--}}
{{--            --}}{{--                                    <div class="product-action-vertical">--}}
{{--            --}}{{--                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--            --}}{{--                                           title="Add to cart"></a>--}}
{{--            --}}{{--                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--            --}}{{--                                           title="Add to wishlist"></a>--}}
{{--            --}}{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--            --}}{{--                                           title="Quickview"></a>--}}
{{--            --}}{{--                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--            --}}{{--                                           title="Add to Compare"></a>--}}
{{--            --}}{{--                                    </div>--}}
{{--            --}}{{--                                </figure>--}}
{{--            --}}{{--                                <div class="product-details">--}}
{{--            --}}{{--                                    <h4 class="product-name"><a href="product-default.html">Multi-colorful Music</a>--}}
{{--            --}}{{--                                    </h4>--}}
{{--            --}}{{--                                    <div class="ratings-container">--}}
{{--            --}}{{--                                        <div class="ratings-full">--}}
{{--            --}}{{--                                            <span class="ratings" style="width: 60%;"></span>--}}
{{--            --}}{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--            --}}{{--                                        </div>--}}
{{--            --}}{{--                                        <a href="product-default.html" class="rating-reviews">(3 reviews)</a>--}}
{{--            --}}{{--                                    </div>--}}
{{--            --}}{{--                                    <div class="product-price">--}}
{{--            --}}{{--                                        <ins class="new-price">$260.59 - $297.83</ins>--}}
{{--            --}}{{--                                    </div>--}}
{{--            --}}{{--                                </div>--}}
{{--            --}}{{--                            </div>--}}
{{--            --}}{{--                        </div>--}}
{{--            --}}{{--                        <div class="product-wrap">--}}
{{--            --}}{{--                            <div class="product text-center">--}}
{{--            --}}{{--                                <figure class="product-media">--}}
{{--            --}}{{--                                    <a href="product-default.html">--}}
{{--            --}}{{--                                        <img src="assets/images/demos/demo1/products/3-1-1.jpg" alt="Product"--}}
{{--            --}}{{--                                             width="300" height="338" />--}}
{{--            --}}{{--                                        <img src="assets/images/demos/demo1/products/3-1-2.jpg" alt="Product"--}}
{{--            --}}{{--                                             width="300" height="338" />--}}
{{--            --}}{{--                                    </a>--}}
{{--            --}}{{--                                    <div class="product-action-vertical">--}}
{{--            --}}{{--                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--            --}}{{--                                           title="Add to cart"></a>--}}
{{--            --}}{{--                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--            --}}{{--                                           title="Add to wishlist"></a>--}}
{{--            --}}{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--            --}}{{--                                           title="Quickview"></a>--}}
{{--            --}}{{--                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--            --}}{{--                                           title="Add to Compare"></a>--}}
{{--            --}}{{--                                    </div>--}}
{{--            --}}{{--                                </figure>--}}
{{--            --}}{{--                                <div class="product-details">--}}
{{--            --}}{{--                                    <h4 class="product-name"><a href="product-default.html">Classic Hat</a></h4>--}}
{{--            --}}{{--                                    <div class="ratings-container">--}}
{{--            --}}{{--                                        <div class="ratings-full">--}}
{{--            --}}{{--                                            <span class="ratings" style="width: 60%;"></span>--}}
{{--            --}}{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--            --}}{{--                                        </div>--}}
{{--            --}}{{--                                        <a href="product-default.html" class="rating-reviews">(1 Reviews)</a>--}}
{{--            --}}{{--                                    </div>--}}
{{--            --}}{{--                                    <div class="product-price">--}}
{{--            --}}{{--                                        <ins class="new-price">$53.00</ins>--}}
{{--            --}}{{--                                    </div>--}}
{{--            --}}{{--                                </div>--}}
{{--            --}}{{--                            </div>--}}
{{--            --}}{{--                        </div>--}}
{{--            --}}{{--                        <div class="product-wrap">--}}
{{--            --}}{{--                            <div class="product text-center">--}}
{{--            --}}{{--                                <figure class="product-media">--}}
{{--            --}}{{--                                    <a href="product-default.html">--}}
{{--            --}}{{--                                        <img src="assets/images/demos/demo1/products/3-2.jpg" alt="Product"--}}
{{--            --}}{{--                                             width="300" height="338" />--}}
{{--            --}}{{--                                    </a>--}}
{{--            --}}{{--                                    <div class="product-action-vertical">--}}
{{--            --}}{{--                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--            --}}{{--                                           title="Add to cart"></a>--}}
{{--            --}}{{--                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--            --}}{{--                                           title="Add to wishlist"></a>--}}
{{--            --}}{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--            --}}{{--                                           title="Quickview"></a>--}}
{{--            --}}{{--                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--            --}}{{--                                           title="Add to Compare"></a>--}}
{{--            --}}{{--                                    </div>--}}
{{--            --}}{{--                                </figure>--}}
{{--            --}}{{--                                <div class="product-details">--}}
{{--            --}}{{--                                    <h4 class="product-name"><a href="product-default.html">Women’s White--}}
{{--            --}}{{--                                            Handbag</a></h4>--}}
{{--            --}}{{--                                    <div class="ratings-container">--}}
{{--            --}}{{--                                        <div class="ratings-full">--}}
{{--            --}}{{--                                            <span class="ratings" style="width: 80%;"></span>--}}
{{--            --}}{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--            --}}{{--                                        </div>--}}
{{--            --}}{{--                                        <a href="product-default.html" class="rating-reviews">(3 reviews)</a>--}}
{{--            --}}{{--                                    </div>--}}
{{--            --}}{{--                                    <div class="product-price">--}}
{{--            --}}{{--                                        <ins class="new-price">$26.62</ins>--}}
{{--            --}}{{--                                    </div>--}}
{{--            --}}{{--                                </div>--}}
{{--            --}}{{--                            </div>--}}
{{--            --}}{{--                        </div>--}}
{{--            --}}{{--                        <div class="product-wrap">--}}
{{--            --}}{{--                            <div class="product text-center">--}}
{{--            --}}{{--                                <figure class="product-media">--}}
{{--            --}}{{--                                    <a href="product-default.html">--}}
{{--            --}}{{--                                        <img src="assets/images/demos/demo1/products/3-10.jpg" alt="Product"--}}
{{--            --}}{{--                                             width="300" height="338" />--}}
{{--            --}}{{--                                    </a>--}}
{{--            --}}{{--                                    <div class="product-action-vertical">--}}
{{--            --}}{{--                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--            --}}{{--                                           title="Add to cart"></a>--}}
{{--            --}}{{--                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--            --}}{{--                                           title="Add to wishlist"></a>--}}
{{--            --}}{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--            --}}{{--                                           title="Quickview"></a>--}}
{{--            --}}{{--                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--            --}}{{--                                           title="Add to Compare"></a>--}}
{{--            --}}{{--                                    </div>--}}
{{--            --}}{{--                                </figure>--}}
{{--            --}}{{--                                <div class="product-details">--}}
{{--            --}}{{--                                    <h4 class="product-name"><a href="product-default.html">Women’s hairdye</a></h4>--}}
{{--            --}}{{--                                    <div class="ratings-container">--}}
{{--            --}}{{--                                        <div class="ratings-full">--}}
{{--            --}}{{--                                            <span class="ratings" style="width: 60%;"></span>--}}
{{--            --}}{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--            --}}{{--                                        </div>--}}
{{--            --}}{{--                                        <a href="product-default.html" class="rating-reviews">(3 reviews)</a>--}}
{{--            --}}{{--                                    </div>--}}
{{--            --}}{{--                                    <div class="product-price">--}}
{{--            --}}{{--                                        <span class="price">$173.84</span>--}}
{{--            --}}{{--                                    </div>--}}
{{--            --}}{{--                                </div>--}}
{{--            --}}{{--                            </div>--}}
{{--            --}}{{--                        </div>--}}
{{--            --}}{{--                    </div>--}}
{{--            --}}{{--                </div>--}}
{{--            <!-- End of Tab Pane -->--}}
{{--                <div class="tab-pane pt-4" id="preorderTab-2">--}}
{{--                    <div class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">--}}
{{--                        @foreach($preorderPopularProducts as $product)--}}
{{--                            <div class="product-wrap product text-center">--}}
{{--                                <figure class="product-media">--}}
{{--                                    @if($product->discount != NULL)--}}
{{--                                        <div class="discount-tag">--}}
{{--                                            <span>{{$product->discount}}%</span>--}}
{{--                                        </div>--}}
{{--                                    @else--}}
{{--                                    @endif--}}
{{--                                    <a href="{{route('productSingleView', $product->slug)}}">--}}
{{--                                        <img src="{{asset('uploads/images/products/'.$product->fImage->image)}}" alt="Product"--}}
{{--                                             width="216" height="243" />--}}
{{--                                    </a>--}}
{{--                                </figure>--}}
{{--                                <div class="product-action-vertical">--}}
{{--                                    --}}{{--                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                    --}}{{--                                                   title="Add to cart"></a>--}}
{{--                                    <a href="#" class="btn-product-icon  w-icon-heart addwishlist"--}}
{{--                                       title="Add to wishlist" data-id="{{$product->id}}"></a>--}}
{{--                                </div>--}}

{{--                                <div class="product-details">--}}
{{--                                    <h4 class="product-name"><a href="{{route('productSingleView', $product->slug)}}">{{$product->title}}</a>--}}
{{--                                    </h4>--}}

{{--                                    <div class="product-price">--}}
{{--                                        @if($product->discount != NULL)--}}
{{--                                            <ins class="new-price">{{$product->current_selling_price/100}}</ins>--}}
{{--                                            <del class="old-price">{{$product->old_price/100}}</del>--}}
{{--                                        @else--}}
{{--                                            <ins class="new-price">{{$product->current_selling_price/100}}</ins>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- End of Tab Pane -->--}}
{{--                <div class="tab-pane pt-4" id="preorderTab-3">--}}
{{--                    <div class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">--}}
{{--                        @foreach($preorderFeatureProducts as $product)--}}
{{--                            <div class="product-wrap product text-center">--}}
{{--                                <figure class="product-media">--}}
{{--                                    @if($product->discount != NULL)--}}
{{--                                        <div class="discount-tag">--}}
{{--                                            <span>{{$product->discount}}%</span>--}}
{{--                                        </div>--}}
{{--                                    @else--}}
{{--                                    @endif--}}
{{--                                    <a href="{{route('productSingleView', $product->slug)}}">--}}
{{--                                        <img src="{{asset('uploads/images/products/'.$product->fImage->image)}}" alt="Product"--}}
{{--                                             width="216" height="243" />--}}
{{--                                    </a>--}}
{{--                                </figure>--}}
{{--                                <div class="product-action-vertical">--}}
{{--                                    --}}{{--                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                    --}}{{--                                                   title="Add to cart"></a>--}}
{{--                                    <a href="#" class="btn-product-icon  w-icon-heart addwishlist"--}}
{{--                                       title="Add to wishlist" data-id="{{$product->id}}"></a>--}}
{{--                                </div>--}}

{{--                                <div class="product-details">--}}
{{--                                    <h4 class="product-name"><a href="{{route('productSingleView', $product->slug)}}">{{$product->title}}</a>--}}
{{--                                    </h4>--}}

{{--                                    <div class="product-price">--}}
{{--                                        @if($product->discount != NULL)--}}
{{--                                            <ins class="new-price">{{$product->current_selling_price/100}}</ins>--}}
{{--                                            <del class="old-price">{{$product->old_price/100}}</del>--}}
{{--                                        @else--}}
{{--                                            <ins class="new-price">{{$product->current_selling_price/100}}</ins>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- End of Tab Pane -->--}}
{{--            </div>--}}
{{--        </div>--}}


        <div class="container">
            <h2 class="title justify-content-center ls-normal mb-4 mt-10 pt-1 appear-animate">Popular Departments
            </h2>
            <div class="tab tab-nav-boxed tab-nav-outline appear-animate">
                <ul class="nav nav-tabs justify-content-center" role="tablist">
                    <li class="nav-item mr-2 mb-2">
                        <a class="nav-link active br-sm font-size-md ls-normal" href="#tab1-1">New arrivals</a>
                    </li>
{{--                    <li class="nav-item mr-2 mb-2">--}}
{{--                        <a class="nav-link br-sm font-size-md ls-normal" href="#tab1-2">Best seller</a>--}}
{{--                    </li>--}}
                    <li class="nav-item mr-2 mb-2">
                        <a class="nav-link br-sm font-size-md ls-normal" href="#tab1-3">most popular</a>
                    </li>
                    <li class="nav-item mr-0 mb-2">
                        <a class="nav-link br-sm font-size-md ls-normal" href="#tab1-4">Featured</a>
                    </li>
                </ul>
                </ul>
            </div>
            <!-- End of Tab -->
            <div class="tab-content product-wrapper appear-animate">
                <div class="tab-pane active pt-4" id="tab1-1">
                    <div class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">
                        @foreach($recentProducts as $product)
                            <div class="product-wrap product text-center">
                                <figure class="product-media">
                                    @if($product->discount)
                                        <div class="discount-tag">
                                            <span>{{$product->discount}}%</span>
                                        </div>
                                    @else
                                    @endif
                                    <a href="{{route('productSingleView', $product->slug)}}">
                                        <img src="{{asset('uploads/images/products/'.$product->fImage->image)}}" alt="Product"
                                             width="216" height="243" />
                                    </a>
                                </figure>
                                <div class="product-action-vertical">
                                    {{--                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
                                    {{--                                                   title="Add to cart"></a>--}}
                                    <a href="#" class="btn-product-icon  w-icon-heart addwishlist"
                                       title="Add to wishlist" data-id="{{$product->id}}"></a>
                                </div>

                                <div class="product-details">
                                    <h4 class="product-name"><a href="{{route('productSingleView', $product->slug)}}">{{$product->title}}</a>
                                    </h4>

                                    <div class="product-price">
                                        @if($product->discount)
                                            <ins class="new-price">{{$product->current_selling_price/100}}৳</ins>
                                            <del class="old-price">{{$product->old_price/100}}৳</del>
                                        @else
                                            <ins class="new-price">{{$product->current_selling_price/100}}৳</ins>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- End of Tab Pane -->
{{--                <div class="tab-pane pt-4" id="tab1-2">--}}
{{--                    <div class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">--}}
{{--                        <div class="product-wrap">--}}
{{--                            <div class="product text-center">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="assets/images/demos/demo1/products/3-4-1.jpg" alt="Product"--}}
{{--                                             width="300" height="338" />--}}
{{--                                        <img src="assets/images/demos/demo1/products/3-4-2.jpg" alt="Product"--}}
{{--                                             width="300" height="338" />--}}
{{--                                    </a>--}}
{{--                                    <div class="product-action-vertical">--}}
{{--                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                           title="Add to cart"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                           title="Add to wishlist"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                           title="Quickview"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                           title="Add to Compare"></a>--}}
{{--                                    </div>--}}
{{--                                </figure>--}}
{{--                                <div class="product-details">--}}
{{--                                    <h4 class="product-name"><a href="product-default.html">Fashion Blue Towel</a>--}}
{{--                                    </h4>--}}
{{--                                    <div class="ratings-container">--}}
{{--                                        <div class="ratings-full">--}}
{{--                                            <span class="ratings" style="width: 100%;"></span>--}}
{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--                                        </div>--}}
{{--                                        <a href="product-default.html" class="rating-reviews">(8 reviews)</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-price">--}}
{{--                                        <ins class="new-price">$26.55 - $29.99</ins>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="product-wrap">--}}
{{--                            <div class="product text-center">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="assets/images/demos/demo1/products/3-3.jpg" alt="Product"--}}
{{--                                             width="300" height="338" />--}}
{{--                                    </a>--}}
{{--                                    <div class="product-action-vertical">--}}
{{--                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                           title="Add to cart"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                           title="Add to wishlist"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                           title="Quickview"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                           title="Add to Compare"></a>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-label-group">--}}
{{--                                        <label class="product-label label-discount">7% Off</label>--}}
{{--                                    </div>--}}
{{--                                </figure>--}}
{{--                                <div class="product-details">--}}
{{--                                    <h4 class="product-name"><a href="product-default.html">Multi Funtional Apple--}}
{{--                                            iPhone</a></h4>--}}
{{--                                    <div class="ratings-container">--}}
{{--                                        <div class="ratings-full">--}}
{{--                                            <span class="ratings" style="width: 100%;"></span>--}}
{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--                                        </div>--}}
{{--                                        <a href="product-default.html" class="rating-reviews">(5 reviews)</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-price">--}}
{{--                                        <ins class="new-price">136.26</ins>--}}
{{--                                        <del class="old-price">$145.90</del>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="product-wrap">--}}
{{--                            <div class="product text-center">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="assets/images/demos/demo1/products/3-8-1.jpg" alt="Product"--}}
{{--                                             width="300" height="338" />--}}
{{--                                        <img src="assets/images/demos/demo1/products/3-8-2.jpg" alt="Product"--}}
{{--                                             width="300" height="338" />--}}
{{--                                    </a>--}}
{{--                                    <div class="product-action-vertical">--}}
{{--                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                           title="Add to cart"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                           title="Add to wishlist"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                           title="Quickview"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                           title="Add to Compare"></a>--}}
{{--                                    </div>--}}
{{--                                </figure>--}}
{{--                                <div class="product-details">--}}
{{--                                    <h4 class="product-name"><a href="product-default.html">Comfortable Backpack</a>--}}
{{--                                    </h4>--}}
{{--                                    <div class="ratings-container">--}}
{{--                                        <div class="ratings-full">--}}
{{--                                            <span class="ratings" style="width: 100%;"></span>--}}
{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--                                        </div>--}}
{{--                                        <a href="product-default.html" class="rating-reviews">(6 reviews)</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-price">--}}
{{--                                        <ins class="new-price">$45.90</ins>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="product-wrap">--}}
{{--                            <div class="product text-center">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="assets/images/demos/demo1/products/3-9.jpg" alt="Product"--}}
{{--                                             width="300" height="338" />--}}
{{--                                    </a>--}}
{{--                                    <div class="product-action-vertical">--}}
{{--                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                           title="Add to cart"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                           title="Add to wishlist"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                           title="Quickview"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                           title="Add to Compare"></a>--}}
{{--                                    </div>--}}
{{--                                </figure>--}}
{{--                                <div class="product-details">--}}
{{--                                    <h4 class="product-name"><a href="product-default.html">Data Transformer Tool--}}
{{--                                        </a></h4>--}}
{{--                                    <div class="ratings-container">--}}
{{--                                        <div class="ratings-full">--}}
{{--                                            <span class="ratings" style="width: 60%;"></span>--}}
{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--                                        </div>--}}
{{--                                        <a href="product-default.html" class="rating-reviews">(3 reviews)</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-price">--}}
{{--                                        <span class="price">$64.47</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="product-wrap">--}}
{{--                            <div class="product text-center">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="assets/images/demos/demo1/products/3-5.jpg" alt="Product"--}}
{{--                                             width="300" height="338" />--}}
{{--                                    </a>--}}
{{--                                    <div class="product-action-vertical">--}}
{{--                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                           title="Add to cart"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                           title="Add to wishlist"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                           title="Quickview"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                           title="Add to Compare"></a>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-label-group">--}}
{{--                                        <label class="product-label label-discount">4% Off</label>--}}
{{--                                    </div>--}}
{{--                                </figure>--}}
{{--                                <div class="product-details">--}}
{{--                                    <h4 class="product-name"><a href="product-default.html">Apple Super Notecom</a>--}}
{{--                                    </h4>--}}
{{--                                    <div class="ratings-container">--}}
{{--                                        <div class="ratings-full">--}}
{{--                                            <span class="ratings" style="width: 100%;"></span>--}}
{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--                                        </div>--}}
{{--                                        <a href="product-default.html" class="rating-reviews">(4 reviews)</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-price">--}}
{{--                                        <ins class="new-price">$243.30</ins>--}}
{{--                                        <del class="old-price">$253.50</del>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="product-wrap">--}}
{{--                            <div class="product text-center">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="assets/images/demos/demo1/products/3-6-1.jpg" alt="Product"--}}
{{--                                             width="300" height="338" />--}}
{{--                                        <img src="assets/images/demos/demo1/products/3-6-2.jpg" alt="Product"--}}
{{--                                             width="300" height="338" />--}}
{{--                                    </a>--}}
{{--                                    <div class="product-action-vertical">--}}
{{--                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                           title="Add to cart"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                           title="Add to wishlist"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                           title="Quickview"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                           title="Add to Compare"></a>--}}
{{--                                    </div>--}}
{{--                                </figure>--}}
{{--                                <div class="product-details">--}}
{{--                                    <h4 class="product-name"><a href="product-default.html">Women’s Comforter</a>--}}
{{--                                    </h4>--}}
{{--                                    <div class="ratings-container">--}}
{{--                                        <div class="ratings-full">--}}
{{--                                            <span class="ratings" style="width: 100%;"></span>--}}
{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--                                        </div>--}}
{{--                                        <a href="product-default.html" class="rating-reviews">(10 reviews)</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-price">--}}
{{--                                        <ins class="new-price">$32.00 - $33.26</ins>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="product-wrap">--}}
{{--                            <div class="product text-center">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="assets/images/demos/demo1/products/3-7.jpg" alt="Product"--}}
{{--                                             width="300" height="338" />--}}
{{--                                    </a>--}}
{{--                                    <div class="product-action-vertical">--}}
{{--                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                           title="Add to cart"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                           title="Add to wishlist"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                           title="Quickview"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                           title="Add to Compare"></a>--}}
{{--                                    </div>--}}
{{--                                </figure>--}}
{{--                                <div class="product-details">--}}
{{--                                    <h4 class="product-name"><a href="product-default.html">Multi-colorful Music</a>--}}
{{--                                    </h4>--}}
{{--                                    <div class="ratings-container">--}}
{{--                                        <div class="ratings-full">--}}
{{--                                            <span class="ratings" style="width: 60%;"></span>--}}
{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--                                        </div>--}}
{{--                                        <a href="product-default.html" class="rating-reviews">(3 reviews)</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-price">--}}
{{--                                        <ins class="new-price">$260.59 - $297.83</ins>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="product-wrap">--}}
{{--                            <div class="product text-center">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="assets/images/demos/demo1/products/3-1-1.jpg" alt="Product"--}}
{{--                                             width="300" height="338" />--}}
{{--                                        <img src="assets/images/demos/demo1/products/3-1-2.jpg" alt="Product"--}}
{{--                                             width="300" height="338" />--}}
{{--                                    </a>--}}
{{--                                    <div class="product-action-vertical">--}}
{{--                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                           title="Add to cart"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                           title="Add to wishlist"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                           title="Quickview"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                           title="Add to Compare"></a>--}}
{{--                                    </div>--}}
{{--                                </figure>--}}
{{--                                <div class="product-details">--}}
{{--                                    <h4 class="product-name"><a href="product-default.html">Classic Hat</a></h4>--}}
{{--                                    <div class="ratings-container">--}}
{{--                                        <div class="ratings-full">--}}
{{--                                            <span class="ratings" style="width: 60%;"></span>--}}
{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--                                        </div>--}}
{{--                                        <a href="product-default.html" class="rating-reviews">(1 Reviews)</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-price">--}}
{{--                                        <ins class="new-price">$53.00</ins>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="product-wrap">--}}
{{--                            <div class="product text-center">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="assets/images/demos/demo1/products/3-2.jpg" alt="Product"--}}
{{--                                             width="300" height="338" />--}}
{{--                                    </a>--}}
{{--                                    <div class="product-action-vertical">--}}
{{--                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                           title="Add to cart"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                           title="Add to wishlist"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                           title="Quickview"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                           title="Add to Compare"></a>--}}
{{--                                    </div>--}}
{{--                                </figure>--}}
{{--                                <div class="product-details">--}}
{{--                                    <h4 class="product-name"><a href="product-default.html">Women’s White--}}
{{--                                            Handbag</a></h4>--}}
{{--                                    <div class="ratings-container">--}}
{{--                                        <div class="ratings-full">--}}
{{--                                            <span class="ratings" style="width: 80%;"></span>--}}
{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--                                        </div>--}}
{{--                                        <a href="product-default.html" class="rating-reviews">(3 reviews)</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-price">--}}
{{--                                        <ins class="new-price">$26.62</ins>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="product-wrap">--}}
{{--                            <div class="product text-center">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="assets/images/demos/demo1/products/3-10.jpg" alt="Product"--}}
{{--                                             width="300" height="338" />--}}
{{--                                    </a>--}}
{{--                                    <div class="product-action-vertical">--}}
{{--                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                           title="Add to cart"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                           title="Add to wishlist"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                           title="Quickview"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                           title="Add to Compare"></a>--}}
{{--                                    </div>--}}
{{--                                </figure>--}}
{{--                                <div class="product-details">--}}
{{--                                    <h4 class="product-name"><a href="product-default.html">Women’s hairdye</a></h4>--}}
{{--                                    <div class="ratings-container">--}}
{{--                                        <div class="ratings-full">--}}
{{--                                            <span class="ratings" style="width: 60%;"></span>--}}
{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--                                        </div>--}}
{{--                                        <a href="product-default.html" class="rating-reviews">(3 reviews)</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-price">--}}
{{--                                        <span class="price">$173.84</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <!-- End of Tab Pane -->
                <div class="tab-pane pt-4" id="tab1-3">
                    <div class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">
                        @foreach($popularProductsRand as $product)
                            <div class="product-wrap product text-center">
                                <figure class="product-media">
                                    @if($product->discount)
                                        <div class="discount-tag">
                                            <span>{{$product->discount}}%</span>
                                        </div>
                                    @else
                                    @endif
                                    <a href="{{route('productSingleView', $product->slug)}}">
                                        <img src="{{asset('uploads/images/products/'.$product->fImage->image)}}" alt="Product"
                                             width="216" height="243" />
                                    </a>
                                </figure>
                                <div class="product-action-vertical">
                                    {{--                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
                                    {{--                                                   title="Add to cart"></a>--}}
                                    <a href="#" class="btn-product-icon  w-icon-heart addwishlist"
                                       title="Add to wishlist" data-id="{{$product->id}}"></a>
                                </div>

                                <div class="product-details">
                                    <h4 class="product-name"><a href="{{route('productSingleView', $product->slug)}}">{{$product->title}}</a>
                                    </h4>

                                    <div class="product-price">
                                        @if($product->discount)
                                            <ins class="new-price">{{$product->current_selling_price/100}}</ins>
                                            <del class="old-price">{{$product->old_price/100}}</del>
                                        @else
                                            <ins class="new-price">{{$product->current_selling_price/100}}</ins>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- End of Tab Pane -->
                <div class="tab-pane pt-4" id="tab1-4">
                    <div class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">
                        @foreach($featureProductsRand as $product)
                            <div class="product-wrap product text-center">
                                <figure class="product-media">
                                    @if($product->discount)
                                        <div class="discount-tag">
                                            <span>{{$product->discount}}%</span>
                                        </div>
                                    @else
                                    @endif
                                    <a href="{{route('productSingleView', $product->slug)}}">
                                        <img src="{{asset('uploads/images/products/'.$product->fImage->image)}}" alt="Product"
                                             width="216" height="243" />
                                    </a>
                                </figure>
                                <div class="product-action-vertical">
                                    {{--                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
                                    {{--                                                   title="Add to cart"></a>--}}
                                    <a href="#" class="btn-product-icon  w-icon-heart addwishlist"
                                       title="Add to wishlist" data-id="{{$product->id}}"></a>
                                </div>

                                <div class="product-details">
                                    <h4 class="product-name"><a href="{{route('productSingleView', $product->slug)}}">{{$product->title}}</a>
                                    </h4>
                                    <?php
                                    $reviews = \App\Models\Review::where('product_id', $product->id)->pluck('star_rating'); // get all ratings for a specific product
                                    ?>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 60%;"></span>
                                            <span class="tooltiptext tooltip-top">{{$reviews}}</span>
                                        </div>
                                    </div>

                                    <div class="product-price">
                                        @if($product->discount != NULL)
                                            <ins class="new-price">{{$product->current_selling_price/100}}৳</ins>
                                            <del class="old-price">{{$product->old_price/100}}৳</del>
                                        @else
                                            <ins class="new-price">{{$product->current_selling_price/100}}৳</ins>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- End of Tab Pane -->
            </div>
        </div>


        <!-- End of Tab Content -->


        <section class="category-section top-category bg-grey pt-10 pb-10 appear-animate">
                <div class="container pb-2">
                    <h2 class="title justify-content-center pt-1 ls-normal mb-5">Top Categories Of The Month</h2>
                    <div class="swiper">
                        <div class="swiper-container swiper-theme pg-show" data-swiper-options="{
                                    'spaceBetween': 20,
                                    'slidesPerView': 2,
                                    'breakpoints': {
                                        '576': {
                                            'slidesPerView': 3
                                        },
                                        '768': {
                                            'slidesPerView': 5
                                        },
                                        '992': {
                                            'slidesPerView': 6
                                        }
                                    }
                                }">
                            <div class="swiper-wrapper row cols-lg-6 cols-md-5 cols-sm-3 cols-2">
                                @foreach($categories as $category)
                                <div
                                    class="swiper-slide category category-classic category-absolute overlay-zoom br-xs">
                                    <a href="" class="category-media">
                                        <img src="{{asset('uploads/images/category/'.$category->image)}}" alt="Category"
                                             width="130" height="130" >
                                    </a>
                                    <div class="category-content">
                                        <h4 class="category-name">{{$category->title}}</h4>
                                        <a href="{{route('Category.ProductView', ['id'=>$category->id, 'slug'=>$category->slug])}}"
                                           class="btn btn-primary btn-link btn-underline">Shop
                                            Now</a>
                                    </div>
                                </div>
                                @endforeach
                        </div>
                    </div>
                </div>
            </section>
    <!-- End of .category-section top-category -->

        <div class="container">

            <div class="row category-cosmetic-lifestyle appear-animate mb-5">
                <?php
                $banner = \App\Models\Banner::where('banner_type', 'Main Section Banner')->where('status', 'Active')->take(2)->get();
                ?>
                @if(isset($banner))
                    @foreach($banner as $row)
                <div class="col-md-6 mb-4">
                    <div class="banner banner-fixed category-banner-1 br-xs">
                        <a href="{{$row->url}}">
                            <figure>
                                <img src="{{asset('uploads/images/banner/'.$row->image)}}" alt="Category Banner"
                                     width="610" height="200" style="background-color: #3B4B48;" />
                            </figure>
                        </a>
                        <div class="banner-content y-50 pt-1">
                            <h5 class="banner-subtitle font-weight-bold text-uppercase"></h5>
                            <h3 class="banner-title font-weight-bolder text-capitalize text-white"><br></h3>
                            <!-- <a href="shop-banner-sidebar.html"
                                class="btn btn-white btn-link btn-underline btn-icon-right">Shop Now<i
                                    class="w-icon-long-arrow-right"></i></a> -->
                        </div>
                    </div>
                </div>
                        @endforeach
                    @else
                @endif
            </div>
            <!-- End of Category Cosmetic Lifestyle -->


            @foreach($homeBlocks as $row)
                <div class="container">
                    <div class="product-wrapper-1 appear-animate mb-5">
                        <div class="title-link-wrapper pb-1 mb-4">
                            <h2 class="title ls-normal mb-0">{{$row->title}}</h2>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-sm-4 mb-4">
                                <div class="banner h-100 br-sm" style="background-image: url({{asset('uploads/images/section/'.$row->image)}});
                                    background-color: #ebeced;">
                                    <div class="banner-content content-top">
                                        <hr class="banner-divider bg-dark mb-2">
                                        <h3 class="banner-title font-weight-bolder ls-25 text-uppercase">
                                            New Arrivals<br> <span
                                                class="font-weight-normal text-capitalize">Collection</span>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Banner -->
                            <div class="col-lg-9 col-sm-8">
                                <div class="row ">
                                    @foreach($row->items as $item)
                                        <div class="product-col col-lg-3 col-sm-4 mb-4 mobile-view-product-width">
                                            <div class="product-wrap product text-center">
                                                <figure class="product-media">
                                                    @if($item->product->discount  ?? false)
                                                    <div class="discount-tag">
                                                        <span>{{$item->product->discount}}%</span>
                                                    </div>
                                                    @else
                                                    @endif
                                                    <a href="{{route('productSingleView', $item->product->slug)}}">
                                                        <img src="{{asset('uploads/images/products/'.$item->product->fImage->image)}}" alt="Product"
                                                             width="216" height="243" />
                                                    </a>
                                                </figure>
                                                <div class="product-action-vertical">
                                                    {{--                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
                                                    {{--                                                   title="Add to cart"></a>--}}
                                                    <a href="#" class="btn-product-icon  w-icon-heart addwishlist"
                                                       title="Add to wishlist" data-id="{{$item->product->id}}"></a>
                                                </div>

                                                <div class="product-details">
                                                    <h4 class="product-name"><a href="{{route('productSingleView', $item->product->slug)}}">{{$item->product->title}}</a>
                                                    </h4>

                                                    <div class="product-price">
                                                        @if($item->product->discount  ?? false)
                                                            <ins class="new-price">{{$item->product->current_selling_price/100}}৳</ins>
                                                            <del class="old-price">{{$item->product->old_price/100}}৳</del>
                                                        @else
                                                            <ins class="new-price">{{$item->product->current_selling_price/100}}৳</ins>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
            <!-- End of Product Wrapper 1 -->
            <!-- End of Product Wrapper 1 -->

        <div class="container">
            <?php
            $banner = \App\Models\Banner::where('banner_type', 'Footer Banner')->where('status', 'Active')->take(1)->get();
            ?>
            @if(isset($banner))
                @foreach($banner as $row)
                        <a href="{{$row->url}}">
            <div class="banner banner-fashion appear-animate br-sm mb-9" style="background-image: url('{{asset('uploads/images/banner/'.$row->image)}}');background-position: center center;
                background-repeat: no-repeat;
                background-color: #383839;">
                <div class="banner-content align-items-center">
                    <div class="content-left d-flex align-items-center mb-3">
                        <div class="banner-price-info font-weight-bolder text-secondary text-uppercase lh-1 ls-25">

                            <sup class="font-weight-bold"></sup><sub class="font-weight-bold ls-25"></sub>
                        </div>
                        <hr class="banner-divider bg-white mt-0 mb-0 mr-8">
                    </div>
                    <div class="content-right d-flex align-items-center flex-1 flex-wrap">
                        <div class="banner-info mb-0 mr-auto pr-4 mb-3">
                            <h3 class="banner-title text-white font-weight-bolder text-uppercase ls-25"></h3>
                            <p class="text-white mb-0">
                                    <span
                                        class="text-dark bg-white font-weight-bold ls-50 pl-1 pr-1 d-inline-block">
                                        <strong></strong></span></p>
                        </div>
                        <!-- <a href="shop-banner-sidebar.html"
                            class="btn btn-white btn-outline btn-rounded btn-icon-right mb-3">Shop Now<i
                                class="w-icon-long-arrow-right"></i></a> -->
                    </div>
                </div>
            </div>
                        </a>
                    @endforeach
                @else
            @endif

                <div class="post-wrapper appear-animate mb-4">
                    <div class="title-link-wrapper pb-1 mb-4">
                        <h2 class="title ls-normal mb-0">From Our Blog</h2>
                        <a href="" class="font-weight-bold font-size-normal">View All Articles</a>
                    </div>
                    <div class="swiper">
                        <div class="swiper-container swiper-theme" data-swiper-options="{
                            'slidesPerView': 1,
                            'spaceBetween': 20,
                            'breakpoints': {
                                '576': {
                                    'slidesPerView': 2
                                },
                                '768': {
                                    'slidesPerView': 3
                                },
                                '992': {
                                    'slidesPerView': 4
                                }
                            }
                        }">
                            <div class="swiper-wrapper row cols-lg-4 cols-md-3 cols-sm-2 cols-1">
                                @foreach($blogs as $blog)
                                <div class="swiper-slide post text-center overlay-zoom">
                                    <figure class="post-media br-sm">
                                        <a href="{{route('Blog.View', $blog->id)}}">
                                            <img src ="{{asset('uploads/images/blog/'.$blog->image)}}" alt="Post" width="280"
                                                 height="180" style="background-color: #4b6e91;" />
                                        </a>
                                    </figure>
                                    <div class="post-details">
                                        <div class="post-meta">
                                            - <a href="#" class="post-date mr-0">{{$blog->created_at->format('d-m-Y')}}</a>
                                        </div>
                                        <h4 class="post-title"><a href="">{{$blog->title}}</a>
                                        </h4>
                                        <a href="{{route('Blog.View', $blog->id)}}" class="btn btn-link btn-dark btn-underline">Read
                                            More<i class="w-icon-long-arrow-right"></i></a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

        </div>


            <!-- End of Banner Fashion -->
    </main>
@endsection
