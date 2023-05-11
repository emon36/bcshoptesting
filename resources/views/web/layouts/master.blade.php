<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>Boichitro Shop </title>


    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{asset('front-end/assets/images/favicon.png')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- WebFont.js -->
    <script>
        WebFontConfig = {
            google: { families: ['Poppins:400,500,600,700,800'] }
        };
        (function (d) {
            var wf = d.createElement('script'), s = d.scripts[0];
            wf.src = 'assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <link rel="preload" href="{{asset('front-end/assets/vendor/fontawesome-free/webfonts/fa-regular-400.woff2')}}" as="font" type="font/woff2"
          crossorigin="anonymous">
    <link rel="preload" href="{{asset('front-end/assets/vendor/fontawesome-free/webfonts/fa-solid-900.woff2')}}" as="font" type="font/woff2"
          crossorigin="anonymous">
    <link rel="preload" href="{{asset('front-end/assets/vendor/fontawesome-free/webfonts/fa-brands-400.woff2')}}" as="font" type="font/woff2"
          crossorigin="anonymous">
    <link rel="preload" href="{{asset('front-end/assets/fonts/wolmart87d5.woff?png09e')}}" as="font" type="font/woff" crossorigin="anonymous">

    <!-- Vendor CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('front-end/assets/vendor/fontawesome-free/css/all.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <!-- Plugins CSS -->
    <!-- <link rel="stylesheet" href="assets/vendor/swiper/swiper-bundle.min.css"> -->
    <link rel="stylesheet" type="text/css" href="{{asset('front-end/assets/vendor/animate/animate.min.css')}}">
    <!-- <link rel="stylesheet" type="text/css" href="{{asset('assets/assets/front-end/vendor/magnific-popup/magnific-popup.min.css')}}"> -->
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="{{asset('front-end/assets/vendor/swiper/swiper-bundle.min.css')}}">

    <!-- Default CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" rel="stylesheet">

    @yield('css')

    <link rel="stylesheet" type="text/css" href="{{asset('front-end/assets/css/style.min.cs')}}s">

    <!-- front-end custom css  -->
    <link rel="stylesheet" type="text/css" href="{{asset('front-end/assets/css/custom.css')}}">


</head>

<body class="home">
<div class="page-wrapper">
    <!-- Start of Header -->
   @yield('header')
    <!-- End of Header -->

    <!-- Start of Main-->
       @yield('content')
    <!-- End of Main -->

    <!-- Start of Footer -->
   @include('web.includes.footer')
    <!-- End of Footer -->
</div>
<!-- End of Page-wrapper-->

<!-- Start of Sticky Footer -->
<div class="sticky-footer sticky-content fix-bottom">
    <a href="{{route('Home')}}" class="sticky-link active">
        <i class="w-icon-home"></i>
        <p>Home</p>
    </a>
    <a href="{{route('Vendor.List')}}" class="sticky-link">
        <i class="w-icon-category"></i>
        <p>Shop</p>
    </a>

    <a href="{{route('getCartItems')}}" class="sticky-link">
        <i class="w-icon-cart"></i>
        <p>Cart</p>
    </a>
    @if(session()->get('user'))
    <a href="{{route('Customer.Dashboard')}}" class="sticky-link">
        <i class="w-icon-account"></i>
        <p>Account</p>
    </a>
    @else
   @endif

{{--    <div class="cart-dropdown dir-up">--}}
{{--        <a href="" class="sticky-link">--}}
{{--            <i class="w-icon-cart"></i>--}}
{{--            <p>Cart</p>--}}
{{--        </a>--}}
{{--        <div class="dropdown-box">--}}
{{--            <div class="products">--}}
{{--                <div class="product product-cart">--}}
{{--                    <div class="product-detail">--}}
{{--                        <h3 class="product-name">--}}
{{--                            <a href="product-default.html">Beige knitted elas<br>tic--}}
{{--                                runner shoes</a>--}}
{{--                        </h3>--}}
{{--                        <div class="price-box">--}}
{{--                            <span class="product-quantity">1</span>--}}
{{--                            <span class="product-price">$25.68</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <figure class="product-media">--}}
{{--                        <a href="product-default.html">--}}
{{--                            <img src="assets/images/cart/product-1.jpg" alt="product" height="84" width="94" />--}}
{{--                        </a>--}}
{{--                    </figure>--}}
{{--                    <button class="btn btn-link btn-close" aria-label="button">--}}
{{--                        <i class="fas fa-times"></i>--}}
{{--                    </button>--}}
{{--                </div>--}}

{{--                <div class="product product-cart">--}}
{{--                    <div class="product-detail">--}}
{{--                        <h3 class="product-name">--}}
{{--                            <a href="product-default.html">Blue utility pina<br>fore--}}
{{--                                denim dress</a>--}}
{{--                        </h3>--}}
{{--                        <div class="price-box">--}}
{{--                            <span class="product-quantity">1</span>--}}
{{--                            <span class="product-price">$32.99</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <figure class="product-media">--}}
{{--                        <a href="product-default.html">--}}
{{--                            <img src="assets/images/cart/product-2.jpg" alt="product" width="84" height="94" />--}}
{{--                        </a>--}}
{{--                    </figure>--}}
{{--                    <button class="btn btn-link btn-close" aria-label="button">--}}
{{--                        <i class="fas fa-times"></i>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="cart-total">--}}
{{--                <label>Subtotal:</label>--}}
{{--                <span class="price">$58.67</span>--}}
{{--            </div>--}}

{{--            <div class="cart-action">--}}
{{--                <a href="cart.html" class="btn btn-dark btn-outline btn-rounded">View Cart</a>--}}
{{--                <a href="checkout.html" class="btn btn-primary  btn-rounded">Checkout</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- End of Dropdown Box -->--}}
{{--    </div>--}}

    <!--

    <div class="header-search hs-toggle dir-up">
        <a href="#" class="search-toggle sticky-link">
            <i class="w-icon-search"></i>
            <p>Search</p>
        </a>
        <form action="#" class="input-wrapper">
            <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Search"
                   required />
            <button class="btn btn-search" type="submit">
                <i class="w-icon-search"></i>
            </button>
        </form>
    </div>
    -->
</div>
<!-- End of Sticky Footer -->

<!-- Start of Scroll Top -->
<a id="scroll-top" class="scroll-top" href="#top" title="Top" role="button"> <i class="w-icon-angle-up"></i> <svg
        version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70 70">
        <circle id="progress-indicator" fill="transparent" stroke="#000000" stroke-miterlimit="10" cx="35" cy="35"
                r="34" style="stroke-dasharray: 16.4198, 400;"></circle>
    </svg> </a>
<!-- End of Scroll Top -->

<!-- Start of Mobile Menu -->
<div class="mobile-menu-wrapper">
    <div class="mobile-menu-overlay"></div>
    <!-- End of .mobile-menu-overlay -->

    <a href="#" class="mobile-menu-close"><i class="close-icon"></i></a>
    <!-- End of .mobile-menu-close -->

    <div class="mobile-menu-container scrollable">
        <form action="#" method="get" class="input-wrapper">
            <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Search"
                   required />
            <button class="btn btn-search" type="submit">
                <i class="w-icon-search"></i>
            </button>
        </form>
        <!-- End of Search Form -->
        <div class="tab">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a href="#main-menu" class="nav-link active">Main Menu</a>
                </li>
                <li class="nav-item">
                    <a href="#categories" class="nav-link">Categories</a>
                </li>

            </ul>

        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="main-menu">
                <ul class="mobile-menu">
                    <li><a href="{{route('Home')}}">Home</a></li>
                    <li>
                        <a href="#">Vendor</a>
                        <ul>
                            <li>
                                <a href="{{route('Vendor.RegisterPage')}}">Become a vendor?</a>
                            </li>
                            <li>
                                <a href="{{route('Vendor.LoginPage')}}">Vendor Login</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Customer</a>
                        <ul>
                            <li>
                                <a href="{{route('Customer.RegistrationPage')}}">Register</a>
                            </li>
                            <li>
                                <a href="{{route('Customer.LoginPage')}}">Customer Login</a>
                            </li>
                        </ul>
                    </li>
                    <li> <a href="{{route('Vendor.List')}}">
                            Stores
                        </a>

                    </li>
                </ul>
            </div>
            <div class="tab-pane" id="categories">
                <ul class="mobile-menu">
                    @php
                        $categories = \App\Models\Category::where('parent_id', null)->get();
                    @endphp
                    @foreach($categories as $category)
                    <li>
                        <a href="{{route('Category.ProductView', ['id'=>$category->id, 'slug'=>$category->slug])}}">
                            </i>{{$category->title}}
                        </a>
                        <ul>
                            @php
                                $children = \App\Models\Category::where('parent_id', $category->id)->get();
                            @endphp
                            @if($children->isNotEmpty())
                                @foreach($children as $child)
                            <li>
                                <a href="{{route('Category.ProductView', ['id'=>$child->id, 'slug'=>$child->slug])}}">{{$child->title}} </a>

                                <ul>
                                    @php
                                        $grandChildren = \App\Models\Category::where('parent_id', $child->id)->get();
                                    @endphp
                                    @if($grandChildren->isNotEmpty())
                                        @foreach($grandchildren as $row)
                                            <li><a href="{{route('Category.ProductView', ['id'=>$row->id, 'slug'=>$row->slug])}}">{{$row->title}}</a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </li>
                                @endforeach
                            @endif
                        </ul>
                    </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End of Mobile Menu -->

<!-- Start of Newsletter popup -->
<div class="newsletter-popup mfp-hide">
    <div class="newsletter-content">
        <h4 class="text-uppercase font-weight-normal ls-25">Get Up to<span class="text-primary">25% Off</span></h4>
        <h2 class="ls-25">Sign up to Wolmart</h2>
        <p class="text-light ls-10">Subscribe to the Wolmart market newsletter to
            receive updates on special offers.</p>
        <form action="#" method="get" class="input-wrapper input-wrapper-inline input-wrapper-round">
            <input type="email" class="form-control email font-size-md" name="email" id="email2"
                   placeholder="Your email address" required="">
            <button class="btn btn-dark" type="submit">SUBMIT</button>
        </form>
        <div class="form-checkbox d-flex align-items-center">
            <input type="checkbox" class="custom-checkbox" id="hide-newsletter-popup" name="hide-newsletter-popup"
                   required="">
            <label for="hide-newsletter-popup" class="font-size-sm text-light">Don't show this popup again.</label>
        </div>
    </div>
</div>
<!-- End of Newsletter popup -->

<!-- Start of Quick View -->
<div class="product product-single product-popup">
    <div class="row gutter-lg">
        <div class="col-md-6 mb-4 mb-md-0">
            <div class="product-gallery product-gallery-sticky">
                <div class="swiper-container product-single-swiper swiper-theme nav-inner">
                    <div class="swiper-wrapper row cols-1 gutter-no">
                        <div class="swiper-slide">
                            <figure class="product-image">
                                <img src="assets/images/products/popup/1-440x494.jpg"
                                     data-zoom-image="assets/images/products/popup/1-800x900.jpg"
                                     alt="Water Boil Black Utensil" width="800" height="900">
                            </figure>
                        </div>
                        <div class="swiper-slide">
                            <figure class="product-image">
                                <img src="assets/images/products/popup/2-440x494.jpg"
                                     data-zoom-image="assets/images/products/popup/2-800x900.jpg"
                                     alt="Water Boil Black Utensil" width="800" height="900">
                            </figure>
                        </div>
                        <div class="swiper-slide">
                            <figure class="product-image">
                                <img src="assets/images/products/popup/3-440x494.jpg"
                                     data-zoom-image="assets/images/products/popup/3-800x900.jpg"
                                     alt="Water Boil Black Utensil" width="800" height="900">
                            </figure>
                        </div>
                        <div class="swiper-slide">
                            <figure class="product-image">
                                <img src="assets/images/products/popup/4-440x494.jpg"
                                     data-zoom-image="assets/images/products/popup/4-800x900.jpg"
                                     alt="Water Boil Black Utensil" width="800" height="900">
                            </figure>
                        </div>
                    </div>
                    <button class="swiper-button-next"></button>
                    <button class="swiper-button-prev"></button>
                </div>
                <div class="product-thumbs-wrap swiper-container" data-swiper-options="{
                        'navigation': {
                            'nextEl': '.swiper-button-next',
                            'prevEl': '.swiper-button-prev'
                        }
                    }">
                    <div class="product-thumbs swiper-wrapper row cols-4 gutter-sm">
                        <div class="product-thumb swiper-slide">
                            <img src="assets/images/products/popup/1-103x116.jpg" alt="Product Thumb" width="103"
                                 height="116">
                        </div>
                        <div class="product-thumb swiper-slide">
                            <img src="assets/images/products/popup/2-103x116.jpg" alt="Product Thumb" width="103"
                                 height="116">
                        </div>
                        <div class="product-thumb swiper-slide">
                            <img src="assets/images/products/popup/3-103x116.jpg" alt="Product Thumb" width="103"
                                 height="116">
                        </div>
                        <div class="product-thumb swiper-slide">
                            <img src="assets/images/products/popup/4-103x116.jpg" alt="Product Thumb" width="103"
                                 height="116">
                        </div>
                    </div>
                    <button class="swiper-button-next"></button>
                    <button class="swiper-button-prev"></button>
                </div>
            </div>
        </div>
        <div class="col-md-6 overflow-hidden p-relative">
            <div class="product-details scrollable pl-0">
                <h2 class="product-title">Electronics Black Wrist Watch</h2>
                <div class="product-bm-wrapper">
                    <figure class="brand">
                        <img src="assets/images/products/brand/brand-1.jpg" alt="Brand" width="102" height="48" />
                    </figure>
                    <div class="product-meta">
                        <div class="product-categories">
                            Category:
                            <span class="product-category"><a href="#">Electronics</a></span>
                        </div>
                        <div class="product-sku">
                            SKU: <span>MS46891340</span>
                        </div>
                    </div>
                </div>

                <hr class="product-divider">

                <div class="product-price">$40.00</div>

                <div class="ratings-container">
                    <div class="ratings-full">
                        <span class="ratings" style="width: 80%;"></span>
                        <span class="tooltiptext tooltip-top"></span>
                    </div>
                    <a href="#" class="rating-reviews">(3 Reviews)</a>
                </div>

                <div class="product-short-desc">
                    <ul class="list-type-check list-style-none">
                        <li>Ultrices eros in cursus turpis massa cursus mattis.</li>
                        <li>Volutpat ac tincidunt vitae semper quis lectus.</li>
                        <li>Aliquam id diam maecenas ultricies mi eget mauris.</li>
                    </ul>
                </div>

                <hr class="product-divider">

                <div class="product-form product-variation-form product-color-swatch">
                    <label>Color:</label>
                    <div class="d-flex align-items-center product-variations">
                        <a href="#" class="color" style="background-color: #ffcc01"></a>
                        <a href="#" class="color" style="background-color: #ca6d00;"></a>
                        <a href="#" class="color" style="background-color: #1c93cb;"></a>
                        <a href="#" class="color" style="background-color: #ccc;"></a>
                        <a href="#" class="color" style="background-color: #333;"></a>
                    </div>
                </div>
                <div class="product-form product-variation-form product-size-swatch">
                    <label class="mb-1">Size:</label>
                    <div class="flex-wrap d-flex align-items-center product-variations">
                        <a href="#" class="size">Small</a>
                        <a href="#" class="size">Medium</a>
                        <a href="#" class="size">Large</a>
                        <a href="#" class="size">Extra Large</a>
                    </div>
                    <a href="#" class="product-variation-clean">Clean All</a>
                </div>

                <div class="product-variation-price">
                    <span></span>
                </div>

                <div class="product-form">
                    <div class="product-qty-form">
                        <div class="input-group">
                            <input class="quantity form-control" type="number" min="1" max="10000000">
                            <button class="quantity-plus w-icon-plus"></button>
                            <button class="quantity-minus w-icon-minus"></button>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-cart">
                        <i class="w-icon-cart"></i>
                        <span>Add to Cart</span>
                    </button>
                </div>

                <div class="social-links-wrapper">
                    <div class="social-links">
                        <div class="social-icons social-no-color border-thin">
                            <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                            <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                            <a href="#" class="social-icon social-pinterest fab fa-pinterest-p"></a>
                            <a href="#" class="social-icon social-whatsapp fab fa-whatsapp"></a>
                            <a href="#" class="social-icon social-youtube fab fa-linkedin-in"></a>
                        </div>
                    </div>
                    <span class="divider d-xs-show"></span>
                    <div class="product-link-wrapper d-flex">
                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"><span></span></a>
                        <a href="#"
                           class="btn-product-icon btn-compare btn-icon-left w-icon-compare"><span></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Quick view -->

<!-- Plugin JS File -->
<script src="{{asset('front-end/assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('front-end/assets/vendor/jquery.plugin/jquery.plugin.min.js')}}"></script>
<script src="{{asset('front-end/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('front-end/assets/vendor/zoom/jquery.zoom.js')}}"></script>
<script src="{{asset('front-end/assets/vendor/jquery.countdown/jquery.countdown.min.js')}}"></script>
<!-- <script src="{{asset('front-end/assets/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script> -->
<script src="{{asset('front-end/assets/vendor/skrollr/skrollr.min.js')}}"></script>

<!-- Swiper JS -->
<script src="{{asset('front-end/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<!-- Main JS -->
<script src="{{asset('front-end/assets/js/main.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>



@yield('scripts')


<script>
    $(document).ready(function() {
        toastr.options.timeOut = 10000;
        @if (Session::has('error'))
        toastr.error('{{ Session::get('error') }}');
        @elseif(Session::has('success'))
        toastr.success('{{ Session::get('success') }}');
        @endif
    });
    $.ajax({
        method: "GET",
        url:  "{{route('cartCount')}}",

        success:function (response) {
            let total = response.cartCount
            $('.cart-count').html(total);
        }

    });

    $(document).ready(function() {

        $('.addwishlist').on('click', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            console.log(id);
            var url = "{{route('Product.AddToWishList',':id')}}";
            url = url.replace(':id', id);
            $.ajax({
                method: "GET",
                url: url,
                success:function (response) {
                    toastr.success(response.message);
                },
                error:function (response) {
                    if(response.status == 400)
                        toastr.error("Product already Exists in Wishlist");
                    else
                        toastr.error("Please login first");
                },

            });


        });
    });



</script>
</body>

</html>
