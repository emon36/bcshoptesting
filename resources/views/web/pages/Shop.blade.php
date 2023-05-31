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
                    <li><a href="">Home</a></li>
                    <li><a href="">Shop</a></li>
                    <li>List</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of Page Content -->
        <div class="page-content mb-10">
            <!-- Start of Shop Banner -->
            <?php
            $banner = \App\Models\Banner::where('banner_type', 'Shop Page Banner')->where('status', 'Active')->take(1)->get();
            ?>
            @if(isset($banner))
                @foreach($banner as $row)
            <div class="shop-default-banner shop-boxed-banner banner d-flex align-items-center mb-6"
                 style="background-image: url({{asset('uploads/images/banner/'.$row->image)}}); background-color: #FFC74E;">
                <div class="container banner-content">
                    <h4 class="banner-subtitle font-weight-bold">{{$row->title}}</h4>
                    <h3 class="banner-title text-white text-uppercase font-weight-bolder ls-10">{{$row->subtitle}}</h3>
                    <a href="{{$row->url}}" class="btn btn-dark btn-rounded btn-icon-right">Discover
                        Now<i class="w-icon-long-arrow-right"></i></a>
                </div>
            </div>
                @endforeach
                @else
                @endif
            <!-- End of Shop Banner -->
            <div class="container-fluid">
                <!-- Start of Shop Content -->
                <div class="shop-content">
                    <!-- Start of Sidebar, Shop Sidebar -->
                    <aside class="sidebar shop-sidebar left-sidebar sticky-sidebar-wrapper">
                        <!-- Start of Sidebar Overlay -->
                        <div class="sidebar-overlay"></div>
                        <a class="sidebar-close" href="#"><i class="close-icon"></i></a>


                        <!-- Start of Sidebar Content -->
                        <div class="sidebar-content scrollable">
                            <!-- Start of Collapsible widget -->
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title"><span>All Categories</span></h3>
                                <ul class="widget-body filter-items search-ul">
                                    @foreach($categories as $category)
                                    <li><a href="{{route('Category.ProductView', ['id'=>$category->id, 'slug'=>$category->slug])}}">{{$category->title}}</a></li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                        <!-- End of Sidebar Content -->
                    </aside>

                    <div class="main-content">
                        <nav class="toolbox sticky-toolbox sticky-content fix-top">
                            <div class="toolbox-left">
                                <a href="#" class="btn btn-primary btn-outline btn-rounded left-sidebar-toggle
                                        btn-icon-left"><i class="w-icon-category"></i><span>Filters</span></a>
                                <div class="toolbox-item toolbox-sort select-box text-dark">
                                    <form action="{{route('shop.page')}}" method="GET">
                                        <div class="d-flex align-items-center">
                                            <label>Sort By :</label>
                                            <select name="sort" class="form-select me-2">
                                                <option value="default">Default</option>
                                                <option value="price_low">Sort by price: low to high</option>
                                                <option value="price_high">Sort by price: high to low</option>
                                            </select>
                                            <button class="btn btn-sm btn-primary" type="submit">Sort</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </nav>
                        <div class="product-wrapper row cols-xl-2 cols-sm-1 cols-xs-2 cols-1">
                            @foreach($products as $product)
                            <div class="product product-list">
                                <figure class="product-media">
                                    <a href="{{route('productSingleView', $product->slug)}}">
                                        <img src="{{asset('uploads/images/products/'.$product->fImage->image)}}" alt="Product" width="330"
                                             height="338" />
                                    </a>
{{--                                    <div class="product-action-vertical">--}}
{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                           title="Quick View"></a>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-countdown-container">--}}
{{--                                        <div class="product-countdown countdown-compact" data-until="2021, 9, 9"--}}
{{--                                             data-format="DHMS" data-compact="false"--}}
{{--                                             data-labels-short="Days, Hours, Mins, Secs">--}}
{{--                                            00:00:00:00</div>--}}
{{--                                    </div>--}}
                                </figure>
                                <div class="product-details">
                                    <div class="product-cat">
                                        <?php
                                        foreach ($product->categories as $rows)
                                        {
                                        $category = $rows->category;
                                        ?>
                                            <a href="{{route('Category.ProductView', ['id'=>$category->id, 'slug'=>$category->slug])}}">{{$category->title}}</a>
                                             <?php
                                                    }
                                                ?>
                                    </div>
                                    <h4 class="product-name">
                                        <a href="">{{$product->title}}</a>
                                    </h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="" class="rating-reviews"></a>
                                    </div>
                                    <div class="product-price">
                                        @if($product->discount != NULL)
                                            <ins class="new-price">{{$product->current_selling_price/100}}৳</ins>
                                            <del class="old-price">{{$product->old_price/100}}৳</del>
                                        @else
                                            <ins class="new-price">{{$product->current_selling_price/100}}৳</ins>
                                        @endif
                                    </div>
                                    <div class="product-desc">
                                        {!!  substr(strip_tags($product->description), 0, 150) !!}
                                    </div>
                                    <div class="product-action">
                                        <a href="{{route('productSingleView', $product->slug)}}" class="btn-product" title="Add to Cart"><i
                                                class="w-icon-cart"></i>View Details</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="mt-2 d-flex justify-content-center">
                            {{$products->links('pagination::bootstrap-5')}}
                        </div>
                    </div>
                    <!-- End of Shop Main Content -->
                </div>
                <!-- End of Shop Content -->
            </div>
        </div>
        <!-- End of Page Content -->
    </main>
@endsection
