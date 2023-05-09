<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <?php
                $announcement = \App\Models\Annoucment::where('id', 1)->first();
                ?>
                <p class="welcome-msg" style="margin:0!important; color: red; font-weight: bold">
                {{$announcement->text}}
                </p>
            </div>
            <div class="header-right">

                <!-- End of Dropdown Menu -->
                <span class="divider d-lg-show"></span>
{{--                <a href="" class="d-lg-show">Blog</a>--}}
                <a href="{{route('Contact.Us')}}" class="d-lg-show">Contact Us</a>

                @if(session()->get('user') == NULL)
                    <a href="{{route('Customer.LoginPage')}}" class="d-lg-show login"><i
                            class="w-icon-account"></i>Sign In</a>
                    <span class="delimiter d-lg-show">/</span>
                    <a href="{{route('Customer.RegistrationPage')}}" class="ml-0 d-lg-show login">Register</a>
                @else
                    <a href="{{route('Customer.Dashboard')}}" class="d-lg-show">My Account</a>
                    <a href="{{route('Customer.Logout')}}" class="d-lg-show"><i
                            class="w-icon-account"></i>Log Out</a>
                @endif
            </div>
        </div>
    </div>
    <!-- End of Header Top -->

    <div class="header-middle">
        <div class="container">
            <div class="header-left mr-md-4">
                <a href="#" class="mobile-menu-toggle  w-icon-hamburger" aria-label="menu-toggle">
                </a>
                <a href="{{'/'}}" class="logo ml-lg-0">
                    <img src="{{asset('front-end/assets/images/Red.png')}}" alt="logo" width="144" height="45" />
                </a>
                <form method="get" action="{{route('Product.Search')}}"
                      class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper" role="search">
{{--                    <div class="select-box">--}}
{{--                        <select id="category" name="category">--}}
{{--                            <option value="">All Categories</option>--}}
{{--                            <option value="4">Fashion</option>--}}
{{--                            <option value="5">Furniture</option>--}}
{{--                            <option value="6">Shoes</option>--}}
{{--                            <option value="7">Sports</option>--}}
{{--                            <option value="8">Games</option>--}}
{{--                            <option value="9">Computers</option>--}}
{{--                            <option value="10">Electronics</option>--}}
{{--                            <option value="11">Kitchen</option>--}}
{{--                            <option value="12">Clothing</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
                    <input type="text" class="form-control" name="search" id="search" placeholder="Search in..."
                           required />
                    <button class="btn btn-search" type="submit"><i class="w-icon-search"></i>
                    </button>
                </form>
            </div>
            <div class="header-right ml-4">
                <div class="header-call d-xs-show d-lg-flex align-items-center">
                    <a href="tel:#" class="w-icon-call"></a>
                    <div class="call-info d-lg-show">
                        <h4 class="chat font-weight-normal font-size-md text-normal ls-normal text-light mb-0">
                            <a href="mailto:#" class="text-capitalize">Live Chat</a> or :</h4>
                        <a href="tel:#" class="phone-number font-weight-bolder ls-50">01531144760</a>
                    </div>
                </div>
                @if(session()->get('user') != NULL)
                    <a class="wishlist label-down link d-xs-show" href="{{route('GetWishList')}}">
                        <i class="w-icon-heart"></i>
                        <span class="wishlist-label d-lg-show">Wishlist</span>
                    </a>
                @else
                @endif
{{--                <a class="compare label-down link d-xs-show" href="compare.html">--}}
{{--                    <i class="w-icon-compare"></i>--}}
{{--                    <span class="compare-label d-lg-show">Compare</span>--}}
{{--                </a>--}}
                <div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2">
                    <div class="cart-overlay"></div>
                    <a href="" class="cart-toggle label-down link">
                        <i class="w-icon-cart">
                            <span class="cart-count">0</span>
                        </i>
                        <span class="cart-label">Cart</span>
                    </a>
                    <div class="dropdown-box">
                        <div class="cart-header">
                            <span>Shopping Cart</span>
                            <a href="#" class="btn-close">Close<i class="w-icon-long-arrow-right"></i></a>
                        </div>

{{--                        <div class="products">--}}
{{--                            <div class="product product-cart">--}}
{{--                                <div class="product-detail">--}}
{{--                                    <a href="" class="product-name">Beige knitted--}}
{{--                                        elas<br>tic--}}
{{--                                        runner shoes</a>--}}
{{--                                    <div class="price-box">--}}
{{--                                        <span class="product-quantity">1</span>--}}
{{--                                        <span class="product-price">$25.68</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="{{asset('front-end/assets/images/cart/product-1.jpg')}}" alt="product" height="84"--}}
{{--                                             width="94" />--}}
{{--                                    </a>--}}
{{--                                </figure>--}}
{{--                                <button class="btn btn-link btn-close" aria-label="button">--}}
{{--                                    <i class="fas fa-times"></i>--}}
{{--                                </button>--}}
{{--                            </div>--}}

{{--                            <div class="product product-cart">--}}
{{--                                <div class="product-detail">--}}
{{--                                    <a href="product-default.html" class="product-name">Blue utility--}}
{{--                                        pina<br>fore--}}
{{--                                        denim dress</a>--}}
{{--                                    <div class="price-box">--}}
{{--                                        <span class="product-quantity">1</span>--}}
{{--                                        <span class="product-price">$32.99</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="{{asset('front-end/assets/images/cart/product-2.jpg')}}" alt="product" width="84"--}}
{{--                                             height="94" />--}}
{{--                                    </a>--}}
{{--                                </figure>--}}
{{--                                <button class="btn btn-link btn-close" aria-label="button">--}}
{{--                                    <i class="fas fa-times"></i>--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="cart-total">--}}
{{--                            <label>Subtotal:</label>--}}
{{--                            <span class="price">$58.67</span>--}}
{{--                        </div>--}}

                        <div class="cart-action">
                            <a href="{{route('getCartItems')}}" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
                            <a href="{{route('checkoutPage')}}" class="btn btn-primary  btn-rounded">Checkout</a>
                        </div>
                    </div>
                    <!-- End of Dropdown Box -->
                </div>
            </div>
        </div>
    </div>
    <!-- End of Header Middle -->

    <div class="header-bottom sticky-content fix-top sticky-header has-dropdown">
        <div class="container">
            <div class="inner-wrap">
                <div class="header-left">
                    <div class="dropdown category-dropdown has-border" data-visible="true">
                        <a href="#" class="category-toggle text-dark" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="true" data-display="static"
                           title="Browse Categories">
                            <i class="w-icon-category"></i>
                            <span>Browse Categories</span>
                        </a>

                        <div class="dropdown-box">
                            <ul class="menu vertical-menu category-menu">
                                @php
                                 $categories = \App\Models\Category::where('parent_id', null)->get();
                                 @endphp
                                @foreach($categories as $category)
                                <li>
                                    <a href="{{route('Category.ProductView', ['id'=>$category->id, 'slug'=>$category->slug])}}">
                                       </i>{{$category->title}}
                                    </a>

                                    <ul class="megamenu">
                                        @php
                                        $children = \App\Models\Category::where('parent_id', $category->id)->get();
                                        @endphp
                                        @if($children->isNotEmpty())
                                        @foreach($children as $child)
                                        <li>
                                            <a href="{{route('Category.ProductView', ['id'=>$child->id, 'slug'=>$child->slug])}}">{{$child->title}} </a>
                                            <hr class="divider">
                                            @php
                                                $grandChildren = \App\Models\Category::where('parent_id', $child->id)->get();
                                            @endphp
                                            <ul>
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
                    <nav class="main-nav">
                        <ul class="menu active-underline">
                            <li class="active">
                                <a href="">Home</a>
                            </li>
{{--                            <li>--}}
{{--                                <a href="shop-banner-sidebar.html">Shop</a>--}}

{{--                                <!-- Start of Megamenu -->--}}
{{--                                <ul class="megamenu">--}}
{{--                                    <li>--}}
{{--                                        <h4 class="menu-title">Shop Pages</h4>--}}
{{--                                        <ul>--}}
{{--                                            <li><a href="shop-banner-sidebar.html">Banner With Sidebar</a></li>--}}
{{--                                            <li><a href="shop-boxed-banner.html">Boxed Banner</a></li>--}}
{{--                                            <li><a href="shop-fullwidth-banner.html">Full Width Banner</a></li>--}}
{{--                                            <li><a href="shop-horizontal-filter.html">Horizontal Filter<span--}}
{{--                                                        class="tip tip-hot">Hot</span></a></li>--}}
{{--                                            <li><a href="shop-off-canvas.html">Off Canvas Sidebar<span--}}
{{--                                                        class="tip tip-new">New</span></a></li>--}}
{{--                                            <li><a href="shop-infinite-scroll.html">Infinite Ajax Scroll</a>--}}
{{--                                            </li>--}}
{{--                                            <li><a href="shop-right-sidebar.html">Right Sidebar</a></li>--}}
{{--                                            <li><a href="shop-both-sidebar.html">Both Sidebar</a></li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <h4 class="menu-title">Shop Layouts</h4>--}}
{{--                                        <ul>--}}
{{--                                            <li><a href="shop-grid-3cols.html">3 Columns Mode</a></li>--}}
{{--                                            <li><a href="shop-grid-4cols.html">4 Columns Mode</a></li>--}}
{{--                                            <li><a href="shop-grid-5cols.html">5 Columns Mode</a></li>--}}
{{--                                            <li><a href="shop-grid-6cols.html">6 Columns Mode</a></li>--}}
{{--                                            <li><a href="shop-grid-7cols.html">7 Columns Mode</a></li>--}}
{{--                                            <li><a href="shop-grid-8cols.html">8 Columns Mode</a></li>--}}
{{--                                            <li><a href="shop-list.html">List Mode</a></li>--}}
{{--                                            <li><a href="shop-list-sidebar.html">List Mode With Sidebar</a></li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <h4 class="menu-title">Product Pages</h4>--}}
{{--                                        <ul>--}}
{{--                                            <li><a href="product-variable.html">Variable Product</a></li>--}}
{{--                                            <li><a href="product-featured.html">Featured &amp; Sale</a></li>--}}
{{--                                            <li><a href="product-accordion.html">Data In Accordion</a></li>--}}
{{--                                            <li><a href="product-section.html">Data In Sections</a></li>--}}
{{--                                            <li><a href="product-swatch.html">Image Swatch</a></li>--}}
{{--                                            <li><a href="product-extended.html">Extended Info</a>--}}
{{--                                            </li>--}}
{{--                                            <li><a href="product-without-sidebar.html">Without Sidebar</a></li>--}}
{{--                                            <li><a href="product-video.html">360<sup>o</sup> &amp; Video<span--}}
{{--                                                        class="tip tip-new">New</span></a></li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <h4 class="menu-title">Product Layouts</h4>--}}
{{--                                        <ul>--}}
{{--                                            <li><a href="product-default.html">Default<span--}}
{{--                                                        class="tip tip-hot">Hot</span></a></li>--}}
{{--                                            <li><a href="product-vertical.html">Vertical Thumbs</a></li>--}}
{{--                                            <li><a href="product-grid.html">Grid Images</a></li>--}}
{{--                                            <li><a href="product-masonry.html">Masonry</a></li>--}}
{{--                                            <li><a href="product-gallery.html">Gallery</a></li>--}}
{{--                                            <li><a href="product-sticky-info.html">Sticky Info</a></li>--}}
{{--                                            <li><a href="product-sticky-thumb.html">Sticky Thumbs</a></li>--}}
{{--                                            <li><a href="product-sticky-both.html">Sticky Both</a></li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                                <!-- End of Megamenu -->--}}
{{--                            </li>--}}
                            <li>
                                <a href="#">Vendor</a>
                                <ul>
                                    <li>
                                        <a href="{{route('Vendor.RegisterPage')}}">Become a Vendor?</a>
                                    </li>
                                    <li>
                                        <a href="{{route('Vendor.LoginPage')}}">Vendor Login</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{route('Vendor.List')}}">Stores</a>
                            </li>

                            <li>
                                @php
                                    $category = \App\Models\Category::where('id',1)->first();
                                @endphp
                                <a href="{{route('Category.ProductView', ['id'=>$category->id, 'slug'=>$category->slug])}}">
                                    </i> {{$category->title}}
                                </a>
                            </li>

                            <li>
                                @php
                                    $category = \App\Models\Category::where('id',2)->first();
                                @endphp
                                <a href="{{route('Category.ProductView', ['id'=>$category->id, 'slug'=>$category->slug])}}">
                                    </i> {{$category->title}}
                                </a>
                            </li>

                            {{--                            <li>--}}
{{--                                <a href="blog.html">Blog</a>--}}
{{--                                <ul>--}}
{{--                                    <li><a href="blog.html">Classic</a></li>--}}
{{--                                    <li><a href="blog-listing.html">Listing</a></li>--}}
{{--                                    <li>--}}
{{--                                        <a href="blog-grid-3cols.html">Grid</a>--}}
{{--                                        <ul>--}}
{{--                                            <li><a href="blog-grid-2cols.html">Grid 2 columns</a></li>--}}
{{--                                            <li><a href="blog-grid-3cols.html">Grid 3 columns</a></li>--}}
{{--                                            <li><a href="blog-grid-4cols.html">Grid 4 columns</a></li>--}}
{{--                                            <li><a href="blog-grid-sidebar.html">Grid sidebar</a></li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="blog-masonry-3cols.html">Masonry</a>--}}
{{--                                        <ul>--}}
{{--                                            <li><a href="blog-masonry-2cols.html">Masonry 2 columns</a></li>--}}
{{--                                            <li><a href="blog-masonry-3cols.html">Masonry 3 columns</a></li>--}}
{{--                                            <li><a href="blog-masonry-4cols.html">Masonry 4 columns</a></li>--}}
{{--                                            <li><a href="blog-masonry-sidebar.html">Masonry sidebar</a></li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="blog-mask-grid.html">Mask</a>--}}
{{--                                        <ul>--}}
{{--                                            <li><a href="blog-mask-grid.html">Blog mask grid</a></li>--}}
{{--                                            <li><a href="blog-mask-masonry.html">Blog mask masonry</a></li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="post-single.html">Single Post</a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="about-us.html">Pages</a>--}}
{{--                                <ul>--}}

{{--                                    <li><a href="about-us.html">About Us</a></li>--}}
{{--                                    <li><a href="become-a-vendor.html">Become A Vendor</a></li>--}}
{{--                                    <li><a href="contact-us.html">Contact Us</a></li>--}}
{{--                                    <li><a href="faq.html">FAQs</a></li>--}}
{{--                                    <li><a href="error-404.html">Error 404</a></li>--}}
{{--                                    <li><a href="coming-soon.html">Coming Soon</a></li>--}}
{{--                                    <li><a href="wishlist.html">Wishlist.blade</a></li>--}}
{{--                                    <li><a href="cart.html">Cart</a></li>--}}
{{--                                    <li><a href="checkout.html">Checkout</a></li>--}}
{{--                                    <li><a href="my-account.html">My Account</a></li>--}}
{{--                                    <li><a href="compare.html">Compare</a></li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="elements.html">Elements</a>--}}
{{--                                <ul>--}}
{{--                                    <li><a href="element-accordions.html">Accordions</a></li>--}}
{{--                                    <li><a href="element-alerts.html">Alert &amp; Notification</a></li>--}}
{{--                                    <li><a href="element-blog-posts.html">Blog Posts</a></li>--}}
{{--                                    <li><a href="element-buttons.html">Buttons</a></li>--}}
{{--                                    <li><a href="element-cta.html">Call to Action</a></li>--}}
{{--                                    <li><a href="element-icons.html">Icons</a></li>--}}
{{--                                    <li><a href="element-icon-boxes.html">Icon Boxes</a></li>--}}
{{--                                    <li><a href="element-instagrams.html">Instagrams</a></li>--}}
{{--                                    <li><a href="element-categories.html">Product Category</a></li>--}}
{{--                                    <li><a href="element-products.html">Products</a></li>--}}
{{--                                    <li><a href="element-tabs.html">Tabs</a></li>--}}
{{--                                    <li><a href="element-testimonials.html">Testimonials</a></li>--}}
{{--                                    <li><a href="element-titles.html">Titles</a></li>--}}
{{--                                    <li><a href="element-typography.html">Typography</a></li>--}}

{{--                                    <li><a href="element-vendors.html">Vendors</a></li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
                        </ul>
                    </nav>
                </div>
{{--                <div class="header-right">--}}
{{--                    <a href="#" class="d-xl-show"><i class="w-icon-map-marker mr-1"></i>Track Order</a>--}}
{{--                    <a href="#"><i class="w-icon-sale"></i>Daily Deals</a>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
</header>
