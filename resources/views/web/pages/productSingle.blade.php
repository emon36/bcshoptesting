@extends('web.layouts.master')

@section('header')
    @include('web.includes.pageHeader')
@endsection

@section('content')

<main class="main mb-10 pb-1">
            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav container">
                <ul class="breadcrumb bb-no">
                    <li><a href="{{route('Home')}}">Home</a></li>
                    <li>Product View</li>
                </ul>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- Start of Page Content -->
            <div class="page-content">
                <div class="container">
                    <div class="row gutter-lg">
                        <div class="main-content">
                            <div class="product product-single row">
                                <div class="col-md-6 mb-6">
                                    <div class="product-gallery product-gallery-sticky">
                                        <div class="swiper-container product-single-swiper swiper-theme nav-inner" data-swiper-options="{
                                            'navigation': {
                                                'nextEl': '.swiper-button-next',
                                                'prevEl': '.swiper-button-prev'
                                            }
                                        }">
                                            <?php
                                            foreach ($product->images->where('position_key', 1) as $image)
                                            {
                                                $featureImage = $image->image;
                                            }
                                            ?>
                                            <div class="swiper-wrapper row cols-1 gutter-no">
                                                <div class="swiper-slide">
                                                    <figure class="product-image">
                                                        @if(isset($featureImage))

                                                        <img src="{{asset('uploads/images/products/'.$featureImage)}}"
                                                            data-zoom-image="assets/images/products/default/1-800x900.jpg"
                                                            alt="No Image Found" class="img-fluid">
                                                        @else
                                                            <img src=""
                                                                 alt="No Image found">
                                                            @endif
                                                    </figure>
                                                </div>

                                                <?php
                                                foreach ($product->images->where('position_key', '!=' , 1) as $image)
                                                {
                                                $galleryImage = $image->image;
                                                ?>
                                                    <div class="swiper-slide">
                                                    <figure class="product-image">
                                                        @if(isset($galleryImage))
                                                        <img src="{{asset('uploads/images/products/'.$galleryImage)}}"
                                                             data-zoom-image="{{asset('uploads/images/products/'.$galleryImage)}}"
                                                             alt="no image found" class="img-fluid" >
                                                        @else
                                                            <img src="" alt="No Image Found" >
                                                        @endif
                                                    </figure>
                                                </div>
                                                <?php
                                                }
                                                ?>

                                            </div>
                                            <button class="swiper-button-next"></button>
                                            <button class="swiper-button-prev"></button>
                                            <a href="#" class="product-gallery-btn product-image-full"><i class="w-icon-zoom"></i></a>
                                        </div>
                                        <div class="product-thumbs-wrap swiper-container" data-swiper-options="{
                                            'navigation': {
                                                'nextEl': '.swiper-button-next',
                                                'prevEl': '.swiper-button-prev'
                                            }
                                        }">
                                            <div class="product-thumbs swiper-wrapper row cols-4 gutter-sm">
                                                @if(isset($featureImage))
                                                <div class="product-thumb swiper-slide">
                                                    <img src="{{asset('uploads/images/products/'.$featureImage)}}"
                                                        alt="Product Thumb" class="img-fluid">
                                                </div>
                                                @else
                                                    <img src=""
                                                         alt="No Image found">
                                                @endif

                                                    <?php
                                                    foreach ($product->images->where('position_key', '!=' , 1) as $image)
                                                    {
                                                    $galleryImage = $image->image;
                                                    ?>
                                                    @if(isset($galleryImage))
                                                <div class="product-thumb swiper-slide">
                                                    <img src="{{asset('uploads/images/products/'.$galleryImage)}}"
                                                        alt="Product Thumb" class="img-fluid">
                                                </div>
                                                    @else
                                                        <img src="" alt="No Image Found" >
                                                    @endif
                                                        <?php
                                                        }
                                                        ?>
                                            </div>
                                            <button class="swiper-button-next"></button>
                                            <button class="swiper-button-prev"></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4 mb-md-6">
                                    <div class="product-details" data-sticky-options="{'minWidth': 767}">
                                        <h1 class="product-title">{{$product->title}}</h1>
                                        <div class="product-bm-wrapper">
{{--                                            <figure class="brand">--}}
{{--                                                <img src="assets/images/products/brand/brand-1.jpg" alt="Brand"--}}
{{--                                                    width="102" height="48" />--}}
{{--                                            </figure>--}}
                                            <div class="product-meta">
                                                <div class="product-categories">
                                                    Category:
                                                <?php
                                                foreach ($product->categories as $rows)
                                                    {
                                                        $category = $rows->category;
                                                ?>
                                                        <span class="product-category"><a href="#">{{$category->title}}</a></span>
                                                <?php
                                                    }

                                                ?>

                                                </div>

                                                <div class="product-sku">
                                                    SKU: <span>{{$product->sku}}</span>
                                                </div>

                                                <div class="product-sku mt-5">
                                                    Stock: <b>{{$product->current_stock}}</b>
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="product-divider">


                                        <div class="product-price">
                                            @if($product->discount != NUll)
                                                 <ins class="new-price"> {{$product->current_selling_price/100}}৳</ins>
                                                <del class="old-price">{{$product->old_price/100}}৳</del>
                                            @else
                                                <ins class="new-price">{{$product->current_selling_price/100}}৳</ins>
                                            @endif
                                        </div>

                                        <hr class="product-divider">

                                        <div class="product-form product-variation-form product-color-swatch product-variations">
                                            @foreach ($product->attributes as $attribute)
                                                @if ($attribute->attribute == 'Size')
                                                    <?php
                                                    $productSize = explode(',', $attribute->value)
                                                    ?>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">Size</label>
                                                            <select class="form-control input-lg "  id="size" name="size">
                                                                <option value="Select a Size">Select a Size</option>
                                                                @foreach($productSize as $size)
                                                                    <option value="{{ $size }}">{{ $size }}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                @else
                                                @endif

                                                    @if ($attribute->attribute == 'Color')
                                                        <?php
                                                        $productColor = explode(',', $attribute->value)
                                                        ?>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">Color</label>
                                                            <select class="form-control input-lg"  id="color" name="color">
                                                                <option value="Select a Color">Select a Color</option>
                                                                @foreach($productColor as $color)
                                                                    <option value="{{ $color }}">{{ $color }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    @else
                                                    @endif

                                        @endforeach
{{--                                            <div class="d-flex align-items-center product-variations">--}}
{{--                                                <a href="#" class="color" style="background-color: #ffcc01"></a>--}}
{{--                                                <a href="#" class="color" style="background-color: #ca6d00;"></a>--}}
{{--                                                <a href="#" class="color" style="background-color: #1c93cb;"></a>--}}
{{--                                                <a href="#" class="color" style="background-color: #ccc;"></a>--}}
{{--                                                <a href="#" class="color" style="background-color: #333;"></a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="product-form product-variation-form product-size-swatch">--}}
{{--                                            <label class="mb-1">Size:</label>--}}
{{--                                            <div class="flex-wrap d-flex align-items-center product-variations">--}}
{{--                                                <a href="#" class="size">Small</a>--}}
{{--                                                <a href="#" class="size">Medium</a>--}}
{{--                                                <a href="#" class="size">Large</a>--}}
{{--                                                <a href="#" class="size">Extra Large</a>--}}
{{--                                            </div>--}}
{{--                                            <a href="#" class="product-variation-clean">Clean All</a>--}}
                                        </div>


                                        <div class="fix-bottom product-sticky-content sticky-content product_data">
                                            <div class="product-form container">
                                                <div class="product-qty-form">
                                                    <div class="input-group">
                                                        <input type="hidden" name="product_id"  class="product_id" value="{{$product->id}}">
                                                        <input type="hidden" name="vendor_id"  class="vendor_id" value="{{$product->vendor_id}}">
                                                        <input class="quantity form-control product_qty" type="number" min="1"
                                                            max="100">
                                                        <button class="quantity-plus w-icon-plus"></button>
                                                        <button class="quantity-minus w-icon-minus"></button>
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary addToCart">
                                                    <i class="w-icon-cart "></i>
                                                    <span>Add to Cart</span>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="social-links-wrapper">
                                            <div class="social-links">
                                                <div class="social-icons social-no-color border-thin">
                                                    <a href="#" class="social-icon social-facebook w-icon-facebook" id="facebook_btn"></a>
                                                    <a href="#" class="social-icon social-twitter w-icon-twitter" id="twitter_btn"></a>
                                                    <a href="#"
                                                        class="social-icon social-youtube fab fa-linkedin-in" id="linkedin_btn"></a>
                                                </div>
                                            </div>
                                            <span class="divider d-xs-show"></span>
                                            <div class="product-link-wrapper d-flex">
                                                <a href="#"
                                                    class="btn-product-icon btn-wishlist w-icon-heart addwishlist" data-id="{{$product->id}}"><span></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
{{--                            <div class="frequently-bought-together mt-5">--}}
{{--                                <h2 class="title title-underline">Frequently Bought Together</h2>--}}
{{--                                <div class="bought-together-products row mt-8 pb-4">--}}
{{--                                    <div class="product product-wrap text-center">--}}
{{--                                        <figure class="product-media">--}}
{{--                                            <img src="assets/images/products/default/bought-1.jpg" alt="Product"--}}
{{--                                                width="138" height="138" />--}}
{{--                                            <div class="product-checkbox">--}}
{{--                                                <input type="checkbox" class="custom-checkbox" id="product_check1"--}}
{{--                                                    name="product_check1">--}}
{{--                                                <label></label>--}}
{{--                                            </div>--}}
{{--                                        </figure>--}}
{{--                                        <div class="product-details">--}}
{{--                                            <h4 class="product-name">--}}
{{--                                                <a href="#">Electronics Black Wrist Watch</a>--}}
{{--                                            </h4>--}}
{{--                                            <div class="product-price">$40.00</div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="product product-wrap text-center">--}}
{{--                                        <figure class="product-media">--}}
{{--                                            <img src="assets/images/products/default/bought-2.jpg" alt="Product"--}}
{{--                                                width="138" height="138" />--}}
{{--                                            <div class="product-checkbox">--}}
{{--                                                <input type="checkbox" class="custom-checkbox" id="product_check2"--}}
{{--                                                    name="product_check2">--}}
{{--                                                <label></label>--}}
{{--                                            </div>--}}
{{--                                        </figure>--}}
{{--                                        <div class="product-details">--}}
{{--                                            <h4 class="product-name">--}}
{{--                                                <a href="#">Apple Laptop</a>--}}
{{--                                            </h4>--}}
{{--                                            <div class="product-price">$1,800.00</div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="product product-wrap text-center">--}}
{{--                                        <figure class="product-media">--}}
{{--                                            <img src="assets/images/products/default/bought-3.jpg" alt="Product"--}}
{{--                                                width="138" height="138" />--}}
{{--                                            <div class="product-checkbox">--}}
{{--                                                <input type="checkbox" class="custom-checkbox" id="product_check3"--}}
{{--                                                    name="product_check3">--}}
{{--                                                <label></label>--}}
{{--                                            </div>--}}
{{--                                        </figure>--}}
{{--                                        <div class="product-details">--}}
{{--                                            <h4 class="product-name">--}}
{{--                                                <a href="#">White Lenovo Headphone</a>--}}
{{--                                            </h4>--}}
{{--                                            <div class="product-price">$34.00</div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-button">--}}
{{--                                        <div class="bought-price font-weight-bolder text-primary ls-50">$1,874.00</div>--}}
{{--                                        <div class="bought-count">For 3 items</div>--}}
{{--                                        <a href="cart.html" class="btn btn-dark btn-rounded">Add All To Cart</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="tab tab-nav-boxed tab-nav-underline product-tabs">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a href="#product-tab-description" class="nav-link active">Description</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#product-tab-vendor" class="nav-link">Vendor Info</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#product-tab-reviews" class="nav-link">Customer Reviews</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="product-tab-description">
                                        <div class="row mb-4">
                                            <div class="col-md-6 mb-5">
                                                <h4 class="title tab-pane-title font-weight-bold mb-2">Detail</h4>
                                                <p class="mb-4">{!! $product->description !!}</p>
                                                <ul class="list-type-check">
                                                </ul>
                                            </div>
{{--                                            <div class="col-md-6 mb-5">--}}
{{--                                                <div class="banner banner-video product-video br-xs">--}}
{{--                                                    <figure class="banner-media">--}}
{{--                                                        <a href="#">--}}
{{--                                                            <img src="assets/images/products/video-banner-610x300.jpg"--}}
{{--                                                                alt="banner" width="610" height="300"--}}
{{--                                                                style="background-color: #bebebe;">--}}
{{--                                                        </a>--}}
{{--                                                        <a class="btn-play-video btn-iframe"--}}
{{--                                                            href="assets/video/memory-of-a-woman.mp4"></a>--}}
{{--                                                    </figure>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                        </div>
{{--                                        <div class="row cols-md-3">--}}
{{--                                            <div class="mb-3">--}}
{{--                                                <h5 class="sub-title font-weight-bold"><span class="mr-3">1.</span>Free--}}
{{--                                                    Shipping &amp; Return</h5>--}}
{{--                                                <p class="detail pl-5">We offer free shipping for products on orders--}}
{{--                                                    above 50$ and offer free delivery for all orders in US.</p>--}}
{{--                                            </div>--}}
{{--                                            <div class="mb-3">--}}
{{--                                                <h5 class="sub-title font-weight-bold"><span>2.</span>Free and Easy--}}
{{--                                                    Returns</h5>--}}
{{--                                                <p class="detail pl-5">We guarantee our products and you could get back--}}
{{--                                                    all of your money anytime you want in 30 days.</p>--}}
{{--                                            </div>--}}
{{--                                            <div class="mb-3">--}}
{{--                                                <h5 class="sub-title font-weight-bold"><span>3.</span>Special Financing--}}
{{--                                                </h5>--}}
{{--                                                <p class="detail pl-5">Get 20%-50% off items over 50$ for a month or--}}
{{--                                                    over 250$ for a year with our special credit card.</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                    </div>
                                    <div class="tab-pane" id="product-tab-vendor">
                                        <div class="row mb-3">
                                            <div class="col-md-6 pl-2 pl-md-6 mb-4">
{{--                                                <div class="vendor-user">--}}
{{--                                                    <figure class="vendor-logo mr-4">--}}
{{--                                                        <a href="#">--}}
{{--                                                            <img src="assets/images/products/vendor-logo.jpg"--}}
{{--                                                                alt="Vendor Logo" width="80" height="80" />--}}
{{--                                                        </a>--}}
{{--                                                    </figure>--}}
{{--                                                    <div>--}}
{{--                                                        <div class="vendor-name"><a href="#">Jone Doe</a></div>--}}
{{--                                                        <div class="ratings-container">--}}
{{--                                                            <div class="ratings-full">--}}
{{--                                                                <span class="ratings" style="width: 90%;"></span>--}}
{{--                                                                <span class="tooltiptext tooltip-top"></span>--}}
{{--                                                            </div>--}}
{{--                                                            <a href="#" class="rating-reviews">(32 Reviews)</a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

                                                <ul class="vendor-info list-style-none">
                                                    <li class="store-name">
                                                        <label>Store Name:</label>
                                                        <span class="detail">{{$product->vendor->shop_name}}</span>
                                                    </li>
                                                    <li class="store-address">
                                                        <label>Address:</label>
                                                        <span class="detail">{{$product->vendor->shop_address}}</span>
                                                    </li>
                                                    <li class="store-phone">
                                                        <label>Phone:</label>
                                                        <a href="#tel:">{{$product->vendor->shop_address}}</a>
                                                    </li>
                                                </ul>
                                                <a href="{{route('Vendor.Details', $product->vendor->shop_url)}}"
                                                    class="btn btn-dark btn-link btn-underline btn-icon-right">Visit
                                                    Store<i class="w-icon-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                        <p class="mb-5">

                                        </p>

                                    </div>
                                    <div class="tab-pane" id="product-tab-reviews">
                                        <div class="row mb-4">

                                            @if(isset(session()->has('user')->id))
                                                <?php
                                                $order = App\Models\Order::where('customer_id', session()->get('user')->id)->where('delivery_status','Delivered')->first();
                                                $orderDetails =  App\Models\OrderDetails::where('product_id', $product->id)->where('order_id', $order->id)->first();
                                                ?>
                                            @if(isset($order) and isset($orderDetails))
                                                    <?php
                                                $review = App\Models\Review::where('order_id', $order->id)->first();
                                                ?>
                                                @if($review)
                                                    @else
                                                    <div class="c`ol-xl-8 col-lg-7 mb-4">
                                                <div class="review-form-wrapper">
                                                    <h3 class="title tab-pane-title font-weight-bold mb-1">Submit Your
                                                        Review</h3>
                                                    <form action="{{route('Review.Store')}}" method="POST" class="review-form">
                                                        @csrf
                                                        <div class="star-rating">
                                                            <input type="radio" id="5-stars" name="star_rating" value="5" />
                                                            <label for="5-stars" class="star">&#9733;</label>
                                                            <input type="radio" id="4-stars" name="star_rating" value="4" />
                                                            <label for="4-stars" class="star">&#9733;</label>
                                                            <input type="radio" id="3-stars" name="star_rating" value="3" />
                                                            <label for="3-stars" class="star">&#9733;</label>
                                                            <input type="radio" id="2-stars" name="star_rating" value="2" />
                                                            <label for="2-stars" class="star">&#9733;</label>
                                                            <input type="radio" id="1-star" name="star_rating" value="1" />
                                                            <label for="1-star" class="star">&#9733;</label>
                                                        </div>
                                                        <textarea class="form-control mt-4" placeholder="Please type your feedback" name="comments"></textarea>
                                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                                        <input type="hidden" name="customer_id" value="{{$order->customer_id}}">
                                                        <input type="hidden" name="vendor_id" value="{{$product->vendor_id}}">
                                                        <input type="hidden" name="order_id" value="{{$order->id}}">

                                                        <button type="submit" class="btn btn-dark">Submit
                                                            Review</button>
                                                    </form>
                                                </div>
                                            </div>
                                                    @endif
                                                @else
                                                @endif
                                            @else
                                            @endif
                                        </div>

                                        @if(isset($productRatings))
                                        <ul class="comments list-style-none">
                                            @foreach($productRatings as $row)
                                            <li class="comment">
                                                <div class="comment-body">
{{--                                                    <figure class="comment-avatar">--}}
{{--                                                        <img src="assets/images/agents/1-100x100.png"--}}
{{--                                                             alt="Commenter Avatar" width="90" height="90">--}}
{{--                                                    </figure>--}}
                                                    <div class="comment-content">
                                                        <h4 class="comment-author">
                                                            <a href="#">{{$row->customer->name}}</a>
                                                            <span class="comment-date">{{$row->created_at->format('d-m-Y')}}</span>
                                                        </h4>
                                                        <div class="col">
                                                            <div class="rated">
                                                                @for($i=1; $i<=$row->star_rating; $i++)
                                                                    <label class="star-rating-complete" title="text">{{$i}} stars</label>
                                                                @endfor
                                                            </div>
                                                        </div>
                                                        <p>{{$row->comments}}</p>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                        @else
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <section class="vendor-product-section">
                                <div class="title-link-wrapper mb-4">
                                    <h4 class="title text-left">More Products From This Vendor</h4>
                                    <a href="{{route('Vendor.Details', $product->vendor->shop_url)}}" class="btn btn-dark btn-link btn-slide-right btn-icon-right">More
                                        Products<i class="w-icon-long-arrow-right"></i></a>
                                </div>
                                <div class="swiper-container swiper-theme" data-swiper-options="{
                                    'spaceBetween': 20,
                                    'slidesPerView': 2,
                                    'breakpoints': {
                                        '576': {
                                            'slidesPerView': 3
                                        },
                                        '768': {
                                            'slidesPerView': 4
                                        },
                                        '992': {
                                            'slidesPerView': 3
                                        }
                                    }
                                }">
                                    <div class="swiper-wrapper row cols-lg-3 cols-md-4 cols-sm-3 cols-2">
                                        @foreach($vendorProducts as $row)
                                        <div class="swiper-slide product">
                                            <figure class="product-media">
                                                <a href="{{route('productSingleView', $row->slug)}}">
                                                    <img src="{{asset('uploads/images/products/'.$row->fImage->image)}}" alt="Product"
                                                        width="300" height="338" />

                                                </a>
                                                <div class="product-action-vertical">
{{--                                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                                        title="Add to cart"></a>--}}
                                                    <a href="#" class="btn-product-icon  w-icon-heart addwishlist"
                                                       title="Add to wishlist" data-id="{{$row->id}}"></a>
                                                </div>
{{--                                                <div class="product-action">--}}
{{--                                                    <a href="#" class="btn-product btn-quickview" title="Quick View">Quick--}}
{{--                                                        View</a>--}}
{{--                                                </div>--}}
                                            </figure>
                                            <div class="product-details">
                                                <?php
                                                foreach ($row->categories as $cat)
                                                {
                                                $category = $cat->category;
                                                ?>
                                                <span class="product-cat"><a href="">{{$category->title}}</a></span>
                                                <?php
                                                }
                                                ?>
                                                <h4 class="product-name"><a href="{{route('productSingleView', $row->slug)}}">{{$row->title}}</a>
                                                </h4>
{{--                                                <div class="ratings-container">--}}
{{--                                                    <div class="ratings-full">--}}
{{--                                                        <span class="ratings" style="width: 100%;"></span>--}}
{{--                                                        <span class="tooltiptext tooltip-top"></span>--}}
{{--                                                    </div>--}}
{{--                                                    <a href="product-default.html" class="rating-reviews">(3 reviews)</a>--}}
{{--                                                </div>--}}
                                                <div class="product-pa-wrapper">
                                                    <div class="product-price">
                                                        @if($row->discount != NUll)
                                                            <ins class="new-price">{{$row->current_selling_price/100}}</ins>
                                                            <del class="old-price">{{$row->old_price/100}}</del>
                                                        @else
                                                            <ins class="new-price">{{$row->current_selling_price/100}}৳</ins>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </section>
                            <section class="related-product-section">
                                <div class="title-link-wrapper mb-4">
                                    <h4 class="title">Related Products</h4>
{{--                                    <a href="#" class="btn btn-dark btn-link btn-slide-right btn-icon-right">More--}}
{{--                                        Products<i class="w-icon-long-arrow-right"></i></a>--}}
                                </div>
                                <div class="swiper-container swiper-theme" data-swiper-options="{
                                    'spaceBetween': 20,
                                    'slidesPerView': 2,
                                    'breakpoints': {
                                        '576': {
                                            'slidesPerView': 3
                                        },
                                        '768': {
                                            'slidesPerView': 4
                                        },
                                        '992': {
                                            'slidesPerView': 3
                                        }
                                    }
                                }">
                                    <div class="swiper-wrapper row cols-lg-3 cols-md-4 cols-sm-3 cols-2">
                                        @foreach($relatedProducts as $row)
                                            <div class="swiper-slide product">
                                                <figure class="product-media">
                                                    <a href="{{route('productSingleView', $row->slug)}}">
                                                        <img src="{{asset('uploads/images/products/'.$row->fImage->image)}}" alt="Product"
                                                             width="300" height="338" />

                                                    </a>
                                                    <div class="product-action-vertical">
                                                        {{--                                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
                                                        {{--                                                        title="Add to cart"></a>--}}
                                                        <a href="#" class="btn-product-icon  w-icon-heart addwishlist"
                                                           title="Add to wishlist" data-id="{{$row->id}}"></a>
                                                    </div>
                                                    {{--                                                <div class="product-action">--}}
                                                    {{--                                                    <a href="#" class="btn-product btn-quickview" title="Quick View">Quick--}}
                                                    {{--                                                        View</a>--}}
                                                    {{--                                                </div>--}}
                                                </figure>
                                                <div class="product-details">
                                                    <?php
                                                    foreach ($row->categories as $cat)
                                                    {
                                                    $category = $cat->category;
                                                    ?>
                                                    <span class="product-cat"><a href="">{{$category->title}}</a></span>
                                                    <?php
                                                    }
                                                    ?>
                                                    <h4 class="product-name"><a href="{{route('productSingleView', $row->slug)}}">{{$row->title}}</a>
                                                    </h4>
                                                    {{--                                                <div class="ratings-container">--}}
                                                    {{--                                                    <div class="ratings-full">--}}
                                                    {{--                                                        <span class="ratings" style="width: 100%;"></span>--}}
                                                    {{--                                                        <span class="tooltiptext tooltip-top"></span>--}}
                                                    {{--                                                    </div>--}}
                                                    {{--                                                    <a href="product-default.html" class="rating-reviews">(3 reviews)</a>--}}
                                                    {{--                                                </div>--}}
                                                    <div class="product-pa-wrapper">
                                                        <div class="product-price">
                                                            @if($row->discount != NUll)
                                                                <ins class="new-price">{{$row->current_selling_price/100}}</ins>
                                                                <del class="old-price">{{$row->old_price/100}}</del>
                                                            @else
                                                                <ins class="new-price">{{$row->current_selling_price/100}}৳</ins>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </section>
                        </div>
                        <!-- End of Main Content -->
                        <aside class="sidebar product-sidebar sidebar-fixed right-sidebar sticky-sidebar-wrapper">
                            <div class="sidebar-overlay"></div>
                            <a class="sidebar-close" href="#"><i class="close-icon"></i></a>
                            <a href="#" class="sidebar-toggle d-flex d-lg-none"><i class="fas fa-chevron-left"></i></a>
                            <div class="sidebar-content scrollable">
                                <div class="sticky-sidebar">
                                    <div class="widget widget-icon-box mb-6">
                                        <div class="icon-box icon-box-side">
                                            <span class="icon-box-icon text-dark">
                                                <i class="w-icon-bag"></i>
                                            </span>
                                            <div class="icon-box-content">
                                                <h4 class="icon-box-title">Secure Payment</h4>
                                                <p>We ensure secure payment</p>
                                            </div>
                                        </div>
                                        <div class="icon-box icon-box-side">
                                            <span class="icon-box-icon text-dark">
                                                <i class="w-icon-money"></i>
                                            </span>
                                            <div class="icon-box-content">
                                                <h4 class="icon-box-title">Money Back Guarantee</h4>
                                                <p>Any back within 30 days</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Widget Icon Box -->

                                    <div class="widget widget-banner mb-9">
                                        <div class="banner banner-fixed br-sm">
                                            <?php
                                            $banner = \App\Models\Banner::where('banner_type', 'Product Banner')->where('status', 'Active')->take(1)->get();
                                            ?>
                                                @if(isset($banner))
                                                    @foreach($banner as $row)
                                                        <a href="{{$row->url}}">
                                                            <figure>
                                                                <img src="{{asset('uploads/images/banner/'.$row->image)}}" alt="Banner" width="266" height="220" style="background-color: #1D2D44;">
                                                            </figure>
                                                        </a>
                                                    @endforeach
                                                @else
                                            @endif
                                        </div>
                                    </div>


                                    <!-- End of Widget Banner -->

                                    <div class="widget widget-products">
                                        <div class="title-link-wrapper mb-2">
                                            <h4 class="title title-link font-weight-bold">More Products</h4>
                                        </div>

                                        <div class="swiper nav-top">
                                            <div class="swiper-container swiper-theme nav-top" data-swiper-options = "{
                                                'slidesPerView': 1,
                                                'spaceBetween': 20,
                                                'navigation': {
                                                    'prevEl': '.swiper-button-prev',
                                                    'nextEl': '.swiper-button-next'
                                                }
                                            }">
                                                <div class="swiper-wrapper">
                                                    <div class="widget-col swiper-slide">
                                                        @foreach($moreProducts as $row)
                                                        <div class="product product-widget">
                                                            <figure class="product-media">
                                                                <a href="#">
                                                                    <img src="{{asset('uploads/images/products/'.$row->fImage->image)}}" alt="Product"
                                                                        width="100" height="113" />
                                                                </a>
                                                            </figure>
                                                            <div class="product-details">
                                                                <h4 class="product-name">
                                                                    <a href="#">{{$row->title}}</a>
                                                                </h4>
                                                                <div class="ratings-container">
                                                                    <div class="ratings-full">
                                                                        <span class="ratings" style="width: 100%;"></span>
                                                                        <span class="tooltiptext tooltip-top"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="product-price">
                                                                    @if($row->discount != NUll)
                                                                        <ins class="new-price">{{$row->current_selling_price/100}}</ins>
                                                                        <del class="old-price">{{$row->old_price/100}}</del>
                                                                    @else
                                                                        <ins class="new-price">{{$row->current_selling_price/100}}৳</ins>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="widget-col swiper-slide">
                                                        @foreach($moreProducts as $row)
                                                            <div class="product product-widget">
                                                                <figure class="product-media">
                                                                    <a href="#">
                                                                        <img src="{{asset('uploads/images/products/'.$row->fImage->image)}}" alt="Product"
                                                                             width="100" height="113" />
                                                                    </a>
                                                                </figure>
                                                                <div class="product-details">
                                                                    <h4 class="product-name">
                                                                        <a href="#">{{$row->title}}</a>
                                                                    </h4>
                                                                    <div class="ratings-container">
                                                                        <div class="ratings-full">
                                                                            <span class="ratings" style="width: 100%;"></span>
                                                                            <span class="tooltiptext tooltip-top"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-price">
                                                                        @if($row->discount != NUll)
                                                                            <ins class="new-price">{{$row->current_selling_price/100}}</ins>
                                                                            <del class="old-price">{{$row->old_price/100}}</del>
                                                                        @else
                                                                            <ins class="new-price">{{$row->current_selling_price/100}}৳</ins>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <button class="swiper-button-next"></button>
                                                <button class="swiper-button-prev"></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </aside>
                        <!-- End of Sidebar -->
                    </div>
                </div>
            </div>
    <!-- Modal -->
    <div class="modal fade" id="cartAddedModal" tabindex="-1" role="dialog" aria-labelledby="cartAddedModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartAddedModalLabel">Product added </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Add your message here -->
                    <p>Product has been added for pre-order</p>
                    <!-- Add a button to view cart -->
                    <a href="" class="btn btn-primary">Checkout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- End of Page Content -->
        </main>

 @endsection

 @section('scripts')

 <script>
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });

     var selectedSize;
     var selectedColor;

     // $('#size').on('change', function() {
     //     selectedSize = $(this).val();
     //     console.log(selectedSize);
     //     return selectedSize;
     // });

     $('#color').on('change', function() {
         selectedColor = $(this).val();
     });

     $(document).ready(function () {
         $('.addToCart').click(function (e) {
             e.preventDefault();
             var product_id = $(this).closest('.product_data').find('.product_id').val();
             var vendor_id = $(this).closest('.product_data').find('.vendor_id').val();
             var quantity = $(this).closest('.product_data').find('.product_qty').val();
             var size =  $('#size').val();
             var color = $('#color').val();

             $.ajax({
                 method: "POST",
                 url:  "{{route('Product.AddToCart')}}",
                 data: {
                     "_token": "{{ csrf_token() }}",
                     'product_id' : product_id,
                     'vendor_id' : vendor_id,
                     'quantity' : quantity,
                     'size' : size,
                     'color' : color
                 },

                 success:function (response) {
                     toastr.success(response.status);
                     let total = response.cartCount
                     $('.cart-count').html(total);
                 },
                 error:function (response) {
                     if(response.status == 400)
                         toastr.error('Please Select Size,Colors');
                 },

             });

         });

     });

     {{--$(document).ready(function () {--}}
     {{--    $('.preorder').click(function (e) {--}}
     {{--        e.preventDefault();--}}
     {{--        var product_id = $(this).closest('.product_data').find('.product_id').val();--}}
     {{--        var vendor_id = $(this).closest('.product_data').find('.vendor_id').val();--}}
     {{--        var quantity = $(this).closest('.product_data').find('.product_qty').val();--}}

     {{--        $.ajax({--}}
     {{--            method: "POST",--}}
     {{--            url:  "{{route('Product.PreOrder.AddToCart')}}",--}}
     {{--            data: {--}}
     {{--                "_token": "{{ csrf_token() }}",--}}
     {{--                'product_id' : product_id,--}}
     {{--                'vendor_id' : vendor_id,--}}
     {{--                'quantity' : quantity,--}}
     {{--            },--}}
     {{--            success:function (response) {--}}
     {{--                   if(response.status === 'please login' || response.status === 'you have already added product'){--}}
     {{--                       alert(response.status);--}}
     {{--                   }else{--}}
     {{--                       $('#cartAddedModal').modal('show');--}}
     {{--                   }--}}
     {{--            }--}}

     {{--        });--}}

     {{--    });--}}

     {{--});--}}

     const facebook_btn =  document.getElementById('facebook_btn');
     const twitter_btn =  document.getElementById('twitter_btn');
     const linkedin_btn =  document.getElementById('linkedin_btn');

     let postUrl = encodeURI(document.location.href);
     let postTitle = encodeURI('{{$product->title}}');

     facebook_btn.setAttribute("href",`https://www.facebook.com/sharer.php?u=${postUrl}`);
     twitter_btn.setAttribute("href", `https://twitter.com/share?url=${postUrl}&text=${postTitle}`);
     linkedin_btn.setAttribute("href", `https://www.linkedin.com/shareArticle?url=${postUrl}&title=${postTitle}`);


</script>

 @endsection
