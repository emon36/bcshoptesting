<div class="leftside-menu">

    <!-- Brand Logo Light -->
    <a href="{{route('InAdmin.Dashboard')}}" class="logo logo-light">
                    <span class="logo-lg">
                        <img src="{{asset('front-end/assets/images/Red.png')}}" alt="logo">
                    </span>
        <span class="logo-sm">
                        <img src="{{asset('front-end/assets/images/Red.png')}}" alt="small logo">
                    </span>
    </a>

    <!-- Brand Logo Dark -->
    <a href="{{route('InAdmin.Dashboard')}}" class="logo logo-dark">
                    <span class="logo-lg">
                        <img src="{{asset('front-end/assets/images/Red.png')}}" alt="dark logo">
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
                <img src="assets/images/users/avatar-1.jpg" alt="user-image" height="42" class="rounded-circle shadow-sm">
                <span class="leftbar-user-name mt-2">Dominic Keller</span>
            </a>
        </div>

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title">Navigation</li>

            <li class="side-nav-item">
                <a  href="{{route('InAdmin.Dashboard')}}" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Dashboard </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a  href="{{route('InAdmin.Income')}}" class="side-nav-link">
                    <i class="uil-money-bill"></i>
                    <span>Income</span>
                </a>
            </li>



            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                    <i class="uil-store"></i>
                    <span> Product Category </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEcommerce">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('InAdmin.Category.CreatePage')}}">Add Category</a>
                        </li>
                        <li>
                            <a href="{{route('InAdmin.Category.IndexPage')}}">Category List</a>
                        </li>
                    </ul>
                </div>
            </li>
{{--            <li class="side-nav-item">--}}
{{--                <a data-bs-toggle="collapse" href="#sidebarAttribute" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">--}}
{{--                    <i class="uil-store"></i>--}}
{{--                    <span> Product Attribute </span>--}}
{{--                    <span class="menu-arrow"></span>--}}
{{--                </a>--}}
{{--                <div class="collapse" id="sidebarAttribute">--}}
{{--                    <ul class="side-nav-second-level">--}}
{{--                        <li>--}}
{{--                            <a href="{{route('InAdmin.Attribute.CreatePage')}}">Add Attribute </a>--}}
{{--                        </li>--}}
{{--                        --}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </li>--}}

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false" aria-controls="sidebarEmail" class="side-nav-link">
                    <i class="uil-shopping-basket"></i>
                    <span> Product </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEmail">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('InAdmin.Product.CreatePage')}}">Add Product</a>
                        </li>
                        <li>
                            <a href="{{route('InAdmin.Product.Index')}}">Product List</a>
                        </li>

                        <li>
                            <a href="{{route('InAdmin.Product.Pending.List')}}">Pending Products</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarProjects" aria-expanded="false" aria-controls="sidebarProjects" class="side-nav-link">
                    <i class="uil-user-circle"></i>
                    <span> Vendor</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarProjects">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('InAdmin.Vendor.CreatePage')}}">Add Vendor</a>
                        </li>
                        <li>
                            <a href="{{route('InAdmin.Vendor.List')}}">All Vendor List</a>
                        </li>
                        <li>
                            <a href="{{route('InAdmin.Vendor.Request.List')}}">Vendor Request</a>
                        </li>

                        <li>
                            <a href="{{route('InAdmin.Vendor.IndexPage')}}">Vendor Shop</a>
                        </li>

                        <li>
                            <a href="{{route('InAdmin.Vendor.Accounts')}}">Vendor Accounts</a>
                        </li>
                        <li>
                            <a href="{{route('InAdmin.Vendor.Payment.History')}}">Payment History</a>
                        </li>
                        <li>
                            <a href="{{route('InAdmin.Vendor.Withdraw.List')}}">Withdraw Request</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarProjects2" aria-expanded="false" aria-controls="sidebarProjects" class="side-nav-link">
                    <i class="uil-shopping-cart-alt"></i>
                    <span> Order </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarProjects2">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('InAdmin.Order.IndexPage')}}">All Order</a>
                        </li>

                        <li>
                            <a href="{{route('InAdmin.Order.PendingOrderList')}}">Pending Order</a>
                        </li>

                        <li>
                            <a href="{{route('InAdmin.Order.ApproveOrderList')}}">Approved Order</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a href="{{route('InAdmin.Customer.Review.List')}}" class="side-nav-link">
                    <i class="uil-user-check"></i>
                    <span> Customer Reviews </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{route('InAdmin.Support.Ticket.list')}}" class="side-nav-link">
                    <i class="uil-rss"></i>
                    <span> Support Ticket</span>
                </a>
            </li>


            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarProjects3" aria-expanded="false" aria-controls="sidebarProjects" class="side-nav-link">
                    <i class="uil-server"></i>
                    <span> Website Setting </span>
                    <span class="menu-arrow"></span>
                </a>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarBlog" aria-expanded="false" aria-controls="sidebarProjects" class="side-nav-link">
                    <i class="uil-pen"></i>
                    <span> Blog </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarBlog">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('InAdmin.Blog.CreatePage')}}">Blog Create</a>
                        </li>
                        <li>
                            <a href="{{route('InAdmin.Blog.List')}}">All Blogs</a>
                        </li>
                    </ul>
                </div>
            </li>
                <div class="collapse" id="sidebarProjects3">
                    <ul class="side-nav-second-level">

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarPagesAuth" aria-expanded="false" aria-controls="sidebarPagesAuth">
                                <span>Homepage</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarPagesAuth">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="{{route('InAdmin.Home.Blocks.Section')}}">Add Section</a>
                                    </li>
                                    <li>
                                        <a href="{{route('InAdmin.Home.Blocks.Section.IndexPage')}}">Section List</a>
                                    </li>
                                </ul>


                            </div>
                        </li>

                        <li>
                            <a href="{{route('InAdmin.Announcement')}}">Announcement Setup</a>
                        </li>
                    </ul>
                </div>
            </li>


            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarProjects10" aria-expanded="false" aria-controls="sidebarProjects" class="side-nav-link">
                    <i class="uil-image-edit"></i>
                    <span> Banner </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarProjects10">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('InAdmin.Add.Banner')}}">Add Banner</a>
                        </li>

                        <li>
                            <a href="{{route('InAdmin.Banner.List')}}">Banner List</a>
                        </li>

                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a href="{{route('InAdmin.Page.list')}}" class="side-nav-link">
                    <i class="uil-paperclip"></i>
                    <span> Pages </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarBSetting" aria-expanded="false" aria-controls="sidebarBSetting" class="side-nav-link">
                    <i class="uil-briefcase"></i>
                    <span> Business Setting </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarBSetting">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('InAdmin.Shipping.Charge')}}">Shipping Charge</a>
                        </li>

                    </ul>
                </div>
            </li>

{{--            <li class="side-nav-item">--}}
{{--                <a data-bs-toggle="collapse" href="#sidebarPages" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">--}}
{{--                    <i class="uil-copy-alt"></i>--}}
{{--                    <span> Website Setting </span>--}}
{{--                    <span class="menu-arrow"></span>--}}
{{--                </a>--}}
{{--                <div class="collapse" id="sidebarPages">--}}
{{--                    <ul class="side-nav-second-level">--}}

{{--                        <li class="side-nav-item">--}}
{{--                            <a data-bs-toggle="collapse" href="#sidebarPagesAuth" aria-expanded="false" aria-controls="sidebarPagesAuth">--}}
{{--                                <span> </span>--}}
{{--                                <span class="menu-arrow"></span>--}}
{{--                            </a>--}}
{{--                            <div class="collapse" id="sidebarPagesAuth">--}}
{{--                                <ul class="side-nav-third-level">--}}
{{--                                    <li>--}}
{{--                                        <a href="pages-login.html">Login</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="pages-login-2.html">Login 2</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="pages-register.html">Register</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="pages-register-2.html">Register 2</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="pages-logout.html">Logout</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="pages-logout-2.html">Logout 2</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="pages-recoverpw.html">Recover Password</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="pages-recoverpw-2.html">Recover Password 2</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="pages-lock-screen.html">Lock Screen</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="pages-lock-screen-2.html">Lock Screen 2</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="pages-confirm-mail.html">Confirm Mail</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="pages-confirm-mail-2.html">Confirm Mail 2</a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </li>--}}

{{--            <li class="side-nav-item">--}}
{{--                <a href="landing.html" target="_blank" class="side-nav-link">--}}
{{--                    <i class="uil-globe"></i>--}}
{{--                    <span class="badge bg-secondary text-light float-end">New</span>--}}
{{--                    <span> Landing </span>--}}
{{--                </a>--}}
{{--            </li>--}}

{{--            <li class="side-nav-item">--}}
{{--                <a data-bs-toggle="collapse" href="#sidebarLayouts" aria-expanded="false" aria-controls="sidebarLayouts" class="side-nav-link">--}}
{{--                    <i class="uil-window"></i>--}}
{{--                    <span> Layouts </span>--}}
{{--                    <span class="menu-arrow"></span>--}}
{{--                </a>--}}
{{--                <div class="collapse" id="sidebarLayouts">--}}
{{--                    <ul class="side-nav-second-level">--}}
{{--                        <li>--}}
{{--                            <a href="layouts-horizontal.html" target="_blank">Horizontal</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="layouts-detached.html" target="_blank">Detached</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="layouts-full.html" target="_blank">Full View</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="layouts-fullscreen.html" target="_blank">Fullscreen View</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="layouts-hover.html" target="_blank">Hover Menu</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="layouts-compact.html" target="_blank">Compact</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="layouts-icon-view.html" target="_blank">Icon View</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </li>--}}

{{--            <li class="side-nav-title">Components</li>--}}

{{--            <li class="side-nav-item">--}}
{{--                <a data-bs-toggle="collapse" href="#sidebarBaseUI" aria-expanded="false" aria-controls="sidebarBaseUI" class="side-nav-link">--}}
{{--                    <i class="uil-box"></i>--}}
{{--                    <span> Base UI </span>--}}
{{--                    <span class="menu-arrow"></span>--}}
{{--                </a>--}}
{{--                <div class="collapse" id="sidebarBaseUI">--}}
{{--                    <ul class="side-nav-second-level">--}}
{{--                        <li>--}}
{{--                            <a href="ui-accordions.html">Accordions & Collapse</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="ui-alerts.html">Alerts</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="ui-avatars.html">Avatars</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="ui-badges.html">Badges</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="ui-breadcrumb.html">Breadcrumb</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="ui-buttons.html">Buttons</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="ui-cards.html">Cards</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="ui-carousel.html">Carousel</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="ui-dropdowns.html">Dropdowns</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="ui-embed-video.html">Embed Video</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="ui-grid.html">Grid</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="ui-list-group.html">List Group</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="ui-modals.html">Modals</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="ui-notifications.html">Notifications</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="ui-offcanvas.html">Offcanvas</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="ui-placeholders.html">Placeholders</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="ui-pagination.html">Pagination</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="ui-popovers.html">Popovers</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="ui-progress.html">Progress</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="ui-ribbons.html">Ribbons</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="ui-spinners.html">Spinners</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="ui-tabs.html">Tabs</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="ui-tooltips.html">Tooltips</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="ui-typography.html">Typography</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="ui-utilities.html">Utilities</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </li>--}}

{{--            <li class="side-nav-item">--}}
{{--                <a data-bs-toggle="collapse" href="#sidebarExtendedUI" aria-expanded="false" aria-controls="sidebarExtendedUI" class="side-nav-link">--}}
{{--                    <i class="uil-package"></i>--}}
{{--                    <span> Extended UI </span>--}}
{{--                    <span class="menu-arrow"></span>--}}
{{--                </a>--}}
{{--                <div class="collapse" id="sidebarExtendedUI">--}}
{{--                    <ul class="side-nav-second-level">--}}
{{--                        <li>--}}
{{--                            <a href="extended-dragula.html">Dragula</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="extended-range-slider.html">Range Slider</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="extended-ratings.html">Ratings</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="extended-scrollbar.html">Scrollbar</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="extended-scrollspy.html">Scrollspy</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="extended-treeview.html">Treeview</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </li>--}}

{{--            <li class="side-nav-item">--}}
{{--                <a href="widgets.html" class="side-nav-link">--}}
{{--                    <i class="uil-layer-group"></i>--}}
{{--                    <span> Widgets </span>--}}
{{--                </a>--}}
{{--            </li>--}}

{{--            <li class="side-nav-item">--}}
{{--                <a data-bs-toggle="collapse" href="#sidebarIcons" aria-expanded="false" aria-controls="sidebarIcons" class="side-nav-link">--}}
{{--                    <i class="uil-streering"></i>--}}
{{--                    <span> Icons </span>--}}
{{--                    <span class="menu-arrow"></span>--}}
{{--                </a>--}}
{{--                <div class="collapse" id="sidebarIcons">--}}
{{--                    <ul class="side-nav-second-level">--}}
{{--                        <li>--}}
{{--                            <a href="icons-remixicons.html">Remix Icons</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="icons-mdi.html">Material Design</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="icons-unicons.html">Unicons</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </li>--}}

{{--            <li class="side-nav-item">--}}
{{--                <a data-bs-toggle="collapse" href="#sidebarCharts" aria-expanded="false" aria-controls="sidebarCharts" class="side-nav-link">--}}
{{--                    <i class="uil-chart"></i>--}}
{{--                    <span> Charts </span>--}}
{{--                    <span class="menu-arrow"></span>--}}
{{--                </a>--}}
{{--                <div class="collapse" id="sidebarCharts">--}}
{{--                    <ul class="side-nav-second-level">--}}
{{--                        <li class="side-nav-item">--}}
{{--                            <a data-bs-toggle="collapse" href="#sidebarApexCharts" aria-expanded="false" aria-controls="sidebarApexCharts">--}}
{{--                                <span> Apex Charts </span>--}}
{{--                                <span class="menu-arrow"></span>--}}
{{--                            </a>--}}
{{--                            <div class="collapse" id="sidebarApexCharts">--}}
{{--                                <ul class="side-nav-third-level">--}}
{{--                                    <li>--}}
{{--                                        <a href="charts-apex-area.html">Area</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="charts-apex-bar.html">Bar</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="charts-apex-bubble.html">Bubble</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="charts-apex-candlestick.html">Candlestick</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="charts-apex-column.html">Column</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="charts-apex-heatmap.html">Heatmap</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="charts-apex-line.html">Line</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="charts-apex-mixed.html">Mixed</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="charts-apex-timeline.html">Timeline</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="charts-apex-boxplot.html">Boxplot</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="charts-apex-treemap.html">Treemap</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="charts-apex-pie.html">Pie</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="charts-apex-radar.html">Radar</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="charts-apex-radialbar.html">RadialBar</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="charts-apex-scatter.html">Scatter</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="charts-apex-polar-area.html">Polar Area</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="charts-apex-sparklines.html">Sparklines</a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <li class="side-nav-item">--}}
{{--                            <a data-bs-toggle="collapse" href="#sidebarChartJSCharts" aria-expanded="false" aria-controls="sidebarChartJSCharts">--}}
{{--                                <span> ChartJS </span>--}}
{{--                                <span class="menu-arrow"></span>--}}
{{--                            </a>--}}
{{--                            <div class="collapse" id="sidebarChartJSCharts">--}}
{{--                                <ul class="side-nav-third-level">--}}
{{--                                    <li>--}}
{{--                                        <a href="charts-chartjs-area.html">Area</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="charts-chartjs-bar.html">Bar</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="charts-chartjs-line.html">Line</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="charts-chartjs-other.html">Other</a>--}}
{{--                                    </li>--}}

{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="charts-brite.html">Britecharts</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="charts-sparkline.html">Sparklines</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </li>--}}

{{--            <li class="side-nav-item">--}}
{{--                <a data-bs-toggle="collapse" href="#sidebarForms" aria-expanded="false" aria-controls="sidebarForms" class="side-nav-link">--}}
{{--                    <i class="uil-document-layout-center"></i>--}}
{{--                    <span> Forms </span>--}}
{{--                    <span class="menu-arrow"></span>--}}
{{--                </a>--}}
{{--                <div class="collapse" id="sidebarForms">--}}
{{--                    <ul class="side-nav-second-level">--}}
{{--                        <li>--}}
{{--                            <a href="form-elements.html">Basic Elements</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="form-advanced.html">Form Advanced</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="form-validation.html">Validation</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="form-wizard.html">Wizard</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="form-fileuploads.html">File Uploads</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="form-editors.html">Editors</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </li>--}}

{{--            <li class="side-nav-item">--}}
{{--                <a data-bs-toggle="collapse" href="#sidebarTables" aria-expanded="false" aria-controls="sidebarTables" class="side-nav-link">--}}
{{--                    <i class="uil-table"></i>--}}
{{--                    <span> Tables </span>--}}
{{--                    <span class="menu-arrow"></span>--}}
{{--                </a>--}}
{{--                <div class="collapse" id="sidebarTables">--}}
{{--                    <ul class="side-nav-second-level">--}}
{{--                        <li>--}}
{{--                            <a href="tables-basic.html">Basic Tables</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="tables-datatable.html">Data Tables</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </li>--}}

{{--            <li class="side-nav-item">--}}
{{--                <a data-bs-toggle="collapse" href="#sidebarMaps" aria-expanded="false" aria-controls="sidebarMaps" class="side-nav-link">--}}
{{--                    <i class="uil-location-point"></i>--}}
{{--                    <span> Maps </span>--}}
{{--                    <span class="menu-arrow"></span>--}}
{{--                </a>--}}
{{--                <div class="collapse" id="sidebarMaps">--}}
{{--                    <ul class="side-nav-second-level">--}}
{{--                        <li>--}}
{{--                            <a href="maps-google.html">Google Maps</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="maps-vector.html">Vector Maps</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </li>--}}

{{--            <li class="side-nav-item">--}}
{{--                <a data-bs-toggle="collapse" href="#sidebarMultiLevel" aria-expanded="false" aria-controls="sidebarMultiLevel" class="side-nav-link">--}}
{{--                    <i class="uil-folder-plus"></i>--}}
{{--                    <span> Multi Level </span>--}}
{{--                    <span class="menu-arrow"></span>--}}
{{--                </a>--}}
{{--                <div class="collapse" id="sidebarMultiLevel">--}}
{{--                    <ul class="side-nav-second-level">--}}
{{--                        <li class="side-nav-item">--}}
{{--                            <a data-bs-toggle="collapse" href="#sidebarSecondLevel" aria-expanded="false" aria-controls="sidebarSecondLevel">--}}
{{--                                <span> Second Level </span>--}}
{{--                                <span class="menu-arrow"></span>--}}
{{--                            </a>--}}
{{--                            <div class="collapse" id="sidebarSecondLevel">--}}
{{--                                <ul class="side-nav-third-level">--}}
{{--                                    <li>--}}
{{--                                        <a href="javascript: void(0);">Item 1</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="javascript: void(0);">Item 2</a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <li class="side-nav-item">--}}
{{--                            <a data-bs-toggle="collapse" href="#sidebarThirdLevel" aria-expanded="false" aria-controls="sidebarThirdLevel">--}}
{{--                                <span> Third Level </span>--}}
{{--                                <span class="menu-arrow"></span>--}}
{{--                            </a>--}}
{{--                            <div class="collapse" id="sidebarThirdLevel">--}}
{{--                                <ul class="side-nav-third-level">--}}
{{--                                    <li>--}}
{{--                                        <a href="javascript: void(0);">Item 1</a>--}}
{{--                                    </li>--}}
{{--                                    <li class="side-nav-item">--}}
{{--                                        <a data-bs-toggle="collapse" href="#sidebarFourthLevel" aria-expanded="false" aria-controls="sidebarFourthLevel">--}}
{{--                                            <span> Item 2 </span>--}}
{{--                                            <span class="menu-arrow"></span>--}}
{{--                                        </a>--}}
{{--                                        <div class="collapse" id="sidebarFourthLevel">--}}
{{--                                            <ul class="side-nav-forth-level">--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript: void(0);">Item 2.1</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript: void(0);">Item 2.2</a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </li>--}}


        </ul>
        <!--- End Sidemenu -->

        <div class="clearfix"></div>
    </div>
</div>
