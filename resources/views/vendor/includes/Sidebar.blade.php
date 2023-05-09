<div class="leftside-menu">

    <!-- Brand Logo Light -->
    <a href="{{route('InVendor.Dashboard')}}" class="logo logo-light">
                    <span class="logo-lg">
                        <img src="{{asset('front-end/assets/images/Red.png')}}" height="100" alt="logo">
                    </span>
        <span class="logo-sm">
                        <img src="{{asset('front-end/assets/images/Red.png')}}" alt="small logo">
                    </span>
    </a>

    <!-- Brand Logo Dark -->
    <a href="{{route('InVendor.Dashboard')}}" class="logo logo-dark">
                    <span class="logo-lg">
                        <img src="{{asset('front-end/assets/images/Red.png')}}  alt="dark logo">
                    </span>
        <span class="logo-sm">
                        <img src="{{asset('front-end/assets/images/Red.png')}}" alt="small logo">
                    </span>
    </a>

    <!-- Sidebar Hover Menu Toggle Button -->
    <div class="button-sm-hover" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
        <i class="ri-checkbox-blank-circle-line align-middle"></i>
    </div>

    <!-- Full Sidebar Menu Close Button -->
    <div class="button-close-fullsidebar">
        <i class="ri-close-fill align-middle"></i>
    </div>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!-- Leftbar User -->
        <div class="leftbar-user">
            <a href="pages-profile.html">
                <img src={{asset('front-end/assets/images/users/avatar-1.jpg')}}" alt="user-image" height="42" class="rounded-circle shadow-sm">
                <span class="leftbar-user-name mt-2">Dominic Keller</span>
            </a>
        </div>

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title">Navigation</li>
            <li class="side-nav-item">
                <a  href="{{route('InVendor.Dashboard')}}" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Dashboards </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a  href="{{route('InVendor.Shop')}}" class="side-nav-link">
                    <i class="uil-store"></i>
                    <span> My Shop </span>
                </a>
            </li>

            <?php
             $vendor = \App\Models\Vendor::where('owner_id', session()->get('user')->id)->where('status', 'Approved')->first();
            ?>
            @if(isset($vendor))
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                    <i class="uil-shopping-basket"></i>
                    <span> Products </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEcommerce">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('InVendor.Product.CreatePage')}}">Add Product</a>
                        </li>
                        <li>
                            <a href="{{route('InVendor.Product.Index')}}">Product List</a>
                        </li>
                    </ul>
                </div>
            </li>


            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEcommerce1" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                    <i class="uil-store"></i>
                    <span> Orders </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEcommerce1">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('InVendor.Order.OrderIndex')}}">Order List</a>
                        </li>
                    </ul>
                </div>
            </li>

                <li class="side-nav-item">
                    <a  href="{{route('InVendor.Customer.Review.List')}}" class="side-nav-link">
                        <i class="uil-user-check"></i>
                        <span> Customer Reviews </span>
                    </a>
                </li>


            @else
            @endif

        </ul>
        <!--- End Sidemenu -->

        <div class="clearfix"></div>
    </div>
</div>
