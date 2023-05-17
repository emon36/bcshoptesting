@extends('web.layouts.master')

@section('header')
    @include('web.includes.pageHeader')
@endsection


@section('content')
    <main class="main">
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb bb-no">
                    <li><a href="{{route('Home')}}">Home</a></li>
{{--                    <li><a href="shop-banner-sidebar.html">Shop</a></li>--}}
                    <li>{{$category->title}}</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of Page Content -->
        <div class="page-content mb-10">
            <div class="container">
                <!-- Start of Shop Banner -->
                <!--
                <div class="shop-default-banner banner d-flex align-items-center mb-5 br-xs"
                     style="background-image: url(assets/images/shop/banner1.jpg); background-color: #FFC74E;">
                    <div class="banner-content">
                        <h4 class="banner-subtitle font-weight-bold">Accessories Collection</h4>
                        <h3 class="banner-title text-white text-uppercase font-weight-bolder ls-normal">Smart Wrist
                            Watches</h3>
                        <a href="shop-banner-sidebar.html" class="btn btn-dark btn-rounded btn-icon-right">Discover
                            Now<i class="w-icon-long-arrow-right"></i></a>
                    </div>
                </div>


                <div class="shop-default-category category-ellipse-section mb-6">
                    <div class="swiper-container swiper-theme shadow-swiper"
                         data-swiper-options="{
                            'spaceBetween': 20,
                            'slidesPerView': 2,
                            'breakpoints': {
                                '480': {
                                    'slidesPerView': 3
                                },
                                '576': {
                                    'slidesPerView': 4
                                },
                                '768': {
                                    'slidesPerView': 6
                                },
                                '992': {
                                    'slidesPerView': 7
                                },
                                '1200': {
                                    'slidesPerView': 8,
                                    'spaceBetween': 30
                                }
                            }
                        }">
                        <div class="swiper-wrapper row gutter-lg cols-xl-8 cols-lg-7 cols-md-6 cols-sm-4 cols-xs-3 cols-2">
                            <div class="swiper-slide category-wrap">
                                <div class="category category-ellipse">
                                    <figure class="category-media">
                                        <a href="shop-banner-sidebar.html">
                                            <img src="assets/images/categories/category-4.jpg" alt="Categroy"
                                                 width="190" height="190" style="background-color: #5C92C0;" />
                                        </a>
                                    </figure>
                                    <div class="category-content">
                                        <h4 class="category-name">
                                            <a href="shop-banner-sidebar.html">Sports</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide category-wrap">
                                <div class="category category-ellipse">
                                    <figure class="category-media">
                                        <a href="shop-banner-sidebar.html">
                                            <img src="assets/images/categories/category-5.jpg" alt="Categroy"
                                                 width="190" height="190" style="background-color: #B8BDC1;" />
                                        </a>
                                    </figure>
                                    <div class="category-content">
                                        <h4 class="category-name">
                                            <a href="shop-banner-sidebar.html">Babies</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide category-wrap">
                                <div class="category category-ellipse">
                                    <figure class="category-media">
                                        <a href="shop-banner-sidebar.html">
                                            <img src="assets/images/categories/category-6.jpg" alt="Categroy"
                                                 width="190" height="190" style="background-color: #99C4CA;" />
                                        </a>
                                    </figure>
                                    <div class="category-content">
                                        <h4 class="category-name">
                                            <a href="shop-banner-sidebar.html">Sneakers</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide category-wrap">
                                <div class="category category-ellipse">
                                    <figure class="category-media">
                                        <a href="shop-banner-sidebar.html">
                                            <img src="assets/images/categories/category-7.jpg" alt="Categroy"
                                                 width="190" height="190" style="background-color: #4E5B63;" />
                                        </a>
                                    </figure>
                                    <div class="category-content">
                                        <h4 class="category-name">
                                            <a href="shop-banner-sidebar.html">Cameras</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide category-wrap">
                                <div class="category category-ellipse">
                                    <figure class="category-media">
                                        <a href="shop-banner-sidebar.html">
                                            <img src="assets/images/categories/category-8.jpg" alt="Categroy"
                                                 width="190" height="190" style="background-color: #D3E5EF;" />
                                        </a>
                                    </figure>
                                    <div class="category-content">
                                        <h4 class="category-name">
                                            <a href="shop-banner-sidebar.html">Games</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide category-wrap">
                                <div class="category category-ellipse">
                                    <figure class="category-media">
                                        <a href="shop-banner-sidebar.html">
                                            <img src="assets/images/categories/category-9.jpg" alt="Categroy"
                                                 width="190" height="190" style="background-color: #65737C;" />
                                        </a>
                                    </figure>
                                    <div class="category-content">
                                        <h4 class="category-name">
                                            <a href="shop-banner-sidebar.html">Kitchen</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide category-wrap">
                                <div class="category category-ellipse">
                                    <figure class="category-media">
                                        <a href="shop-banner-sidebar.html">
                                            <img src="assets/images/categories/category-20.jpg" alt="Categroy"
                                                 width="190" height="190" style="background-color: #E4E4E4;" />
                                        </a>
                                    </figure>
                                    <div class="category-content">
                                        <h4 class="category-name">
                                            <a href="shop-banner-sidebar.html">Watches</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide category-wrap">
                                <div class="category category-ellipse">
                                    <figure class="category-media">
                                        <a href="shop-banner-sidebar.html">
                                            <img src="assets/images/categories/category-21.jpg" alt="Categroy"
                                                 width="190" height="190" style="background-color: #D3D8DE;" />
                                        </a>
                                    </figure>
                                    <div class="category-content">
                                        <h4 class="category-name">
                                            <a href="shop-banner-sidebar.html">Clothes</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                -->
                <!-- End of Shop Category -->
                <div class="col-md-12 mb-5">
                        <a class="btn btn-primary cat-wish-btn" href="{{URL::current()."?sort=price_asc"}}">Price low to high</a>
                         <a class="btn btn-primary cat-wish-btn" href="{{URL::current()."?sort=price_desc"}}">Price High to low</a>
                         <a class="btn btn-primary cat-wish-btn" href="{{URL::current()."?sort=latest"}}">Latest</a>
                </div>

                <div class="shop-content toolbox-horizontal">
                    <!-- Start of Toolbox --
{{--                    <nav class="toolbox sticky-toolbox sticky-content fix-top">--}}
{{--                        <aside class="sidebar sidebar-fixed shop-sidebar">--}}
{{--                            <div class="sidebar-overlay"></div>--}}
{{--                            <a class="sidebar-close" href="#"><i class="close-icon"></i></a>--}}
{{--                            <div class="sidebar-content toolbox-left">--}}
{{--                                <!-- Start of Collapsible widget -->--}}
{{--                                <div class="toolbox-item select-menu">--}}
{{--                                    <a class="select-menu-toggle" href="#">Filter</a>--}}
{{--                                    <ul class="filter-items">--}}
{{--                                        <li><a href="{{URL::current()."?sort=price_asc"}}">Price low to high</a></li>--}}
{{--                                        <li><a href="{{URL::current()."?sort=price_desc"}}">riceHigh to low</a></li>--}}
{{--                                        <li><a href="{{URL::current()."?sort=latest"}}">Latest</a></li>--}}
{{--                                        <li><a href="#polo">Popular</a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                                <div class="toolbox-item select-menu">--}}
{{--                                    <a class="select-menu-toggle" href="#">Size</a>--}}
{{--                                    <ul class="filter-items item-check">--}}
{{--                                        <li><a href="#">Extra Large</a></li>--}}
{{--                                        <li><a href="#">Large</a></li>--}}
{{--                                        <li><a href="#">Medium</a></li>--}}
{{--                                        <li><a href="#">Small</a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}

{{--                                <!-- End of Collapsible Widget -->--}}
{{--                            </div>--}}
{{--                        </aside>--}}
{{--                        <div class="toolbox-left">--}}
{{--                            <div class="toolbox-item toolbox-sort select-menu">--}}
{{--                                <a href="#" class="btn btn-primary btn-outline btn-rounded left-sidebar-toggle--}}
{{--                                        btn-icon-left d-block d-lg-none"><i--}}
{{--                                        class="w-icon-category"></i><span>Filters</span></a>--}}
{{--                                <select name="orderby" class="form-control">--}}
{{--                                    <option value="default" selected="selected">Default sorting</option>--}}
{{--                                    <option value="popularity">Sort by popularity</option>--}}
{{--                                    <option value="rating">Sort by average rating</option>--}}
{{--                                    <option value="date">Sort by latest</option>--}}
{{--                                    <option value="price-low">Sort by pric: low to high</option>--}}
{{--                                    <option value="price-high">Sort by price: high to low</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="toolbox-right">--}}
{{--                            <div class="toolbox-item toolbox-show select-box">--}}
{{--                                <select name="count" class="form-control">--}}
{{--                                    <option value="12">Show 12</option>--}}
{{--                                    <option value="24">Show 24</option>--}}
{{--                                    <option value="36">Show 36</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                            <div class="toolbox-item toolbox-layout">--}}
{{--                                <a href="shop-horizontal-filter.html" class="icon-mode-grid btn-layout active">--}}
{{--                                    <i class="w-icon-grid"></i>--}}
{{--                                </a>--}}
{{--                                <a href="shop-list.html" class="icon-mode-list btn-layout">--}}
{{--                                    <i class="w-icon-list"></i>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </nav>--}}
                    <!-- End of Toolbox -->

                    <!-- Start of Selected Items -->

                    <!-- End of Selected Items -->

                    <!-- Start of Product Wrapper -->
                    <div class="product-wrapper row cols-lg-4 cols-md-3 cols-sm-2 cols-2">
                        @foreach($products as $product)
                        <div class="product-wrap">
                            <div class="product text-center">
                                <figure class="product-media">
                                    @if($product->product->discount)
                                        <div class="discount-tag">
                                            <span>{{$product->product->discount}}%</span>
                                        </div>
                                    @else
                                    @endif
                                    <a href="{{route('productSingleView',$product->product->slug)}}">
                                        <?php
                                        $productImage = \App\Models\ProductImage::where('product_id', $product->product->id)->where('position_key', 1)->first();
                                        ?>
                                        @if(isset($productImage))
                                        <img src="{{asset('uploads/images/products/'.$productImage->image)}}" alt="Product" width="300"
                                             height="338" />
                                            @else
                                                <img src="" alt="No Image found" width="300"
                                                     height="338" />
                                            @endif

                                    </a>
{{--                                    <div class="product-action-horizontal">--}}
{{--                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                           title="Add to cart"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                           title="Wishlist.blade"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                           title="Compare"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                           title="Quick View"></a>--}}
{{--                                    </div>--}}
                                </figure>
                                <div class="product-details">
                                    <div class="product-cat">
                                        <a href="">{{$product->category->title}}</a>
                                    </div>
                                    <h3 class="product-name">
                                        <a href="{{route('productSingleView',$product->product->slug)}}">{{$product->product->title}}</a>
                                    </h3>
{{--                                    <div class="ratings-container">--}}
{{--                                        <div class="ratings-full">--}}
{{--                                            <span class="ratings" style="width: 100%;"></span>--}}
{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--                                        </div>--}}
{{--                                        <a href="product-default.html" class="rating-reviews">(3 reviews)</a>--}}
{{--                                    </div>--}}
                                    <div class="product-pa-wrapper">
                                        <div class="product-price">
                                            @if($product->product->discount != NULL)
                                                <ins class="new-price">{{$product->product->current_selling_price/100}}৳</ins>
                                                <del class="old-price">{{$product->product->old_price/100}}৳</del>
                                            @else
                                                <ins class="new-price">{{$product->product->current_selling_price/100}}৳</ins>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- End of Product Wrapper -->

                    <!-- Start of Pagination -->
{{--                    <div class="toolbox toolbox-pagination justify-content-between">--}}
{{--                        <p class="showing-info mb-2 mb-sm-0">--}}
{{--                            Showing<span>1-12 of 60</span>Products--}}
{{--                        </p>--}}
{{--                        <ul class="pagination">--}}
{{--                            <li class="prev disabled">--}}
{{--                                <a href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">--}}
{{--                                    <i class="w-icon-long-arrow-left"></i>Prev--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="page-item active">--}}
{{--                                <a class="page-link" href="#">1</a>--}}
{{--                            </li>--}}
{{--                            <li class="page-item">--}}
{{--                                <a class="page-link" href="#">2</a>--}}
{{--                            </li>--}}
{{--                            <li class="next">--}}
{{--                                <a href="#" aria-label="Next">--}}
{{--                                    Next<i class="w-icon-long-arrow-right"></i>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
                    <!-- End of Pagination -->
                </div>
            </div>
        </div>
        <!-- End of Page Content -->
    </main>
@endsection
