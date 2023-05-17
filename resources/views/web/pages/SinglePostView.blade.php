@extends('web.layouts.master')

@section('header')
    @include('web.includes.pageHeader')
@endsection

@section('content')
    <main class="main">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">Boichitro</h1>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb bb-no">
                    <li><a href="">Home</a></li>
                    <li><a href="">Blog</a></li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of Page Content -->
        <div class="page-content mb-8">
            <div class="container">
                <div class="row gutter-lg">
                    <div class="main-content post-single-content">
                        <div class="post post-grid post-single">
                            <figure class="post-media br-sm">
                                <img src="{{asset('uploads/images/blog/'.$blog->image)}}" alt="Blog" width="930" height="500" />
                            </figure>
                            <div class="post-details">
                                <div class="post-meta">
                                    - <a href="#" class="post-date">{{$blog->created_at->format('d-m-Y')}}
                                    </a></div>
                                <h2 class="post-title"><a href="#">{{$blog->title}}</a></h2>
                                <div class="post-content">
                                    {!! $blog->content !!}
                                </div>
                            </div>
                        </div>

                        <h4 class="title title-lg font-weight-bold mt-10 pt-1 mb-5">Related Posts</h4>
                        <div class="swiper">
                            <div class="post-slider swiper-container swiper-theme nav-top pb-2" data-swiper-options="{
                                    'spaceBetween': 20,
                                    'slidesPerView': 1,
                                    'breakpoints': {
                                        '576': {
                                            'slidesPerView': 2
                                        },
                                        '768': {
                                            'slidesPerView': 3
                                        },
                                        '992': {
                                            'slidesPerView': 2
                                        },
                                        '1200': {
                                            'slidesPerView': 3
                                        }
                                    }
                                }">
                                <div class="swiper-wrapper row cols-lg-3 cols-md-4 cols-sm-3 cols-xs-2 cols-1">
                                    @foreach($relatedBlog as $blog)
                                    <div class="swiper-slide post post-grid">
                                        <figure class="post-media br-sm">
                                            <a href="{{route('Blog.View', $blog->id)}}">
                                                <img src="{{asset('uploads/images/blog/'.$blog->image)}}" alt="Post" width="296"
                                                     height="190" style="background-color: #bcbcb4;" />
                                            </a>
                                        </figure>
                                        <div class="post-details text-center">
                                            <div class="post-meta">
                                                - <a href="#" class="post-date">{{$blog->created_at->format('d-m-Y')}}</a>
                                            </div>
                                            <h4 class="post-title mb-3"><a href="">{{$blog->title}}</a></h4>
                                            <a href="{{route('Blog.View', $blog->id)}}" class="btn btn-link btn-dark btn-underline font-weight-normal">Read More<i class="w-icon-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <button class="swiper-button-next"></button>
                                <button class="swiper-button-prev"></button>
                            </div>
                        </div>
                        <!-- End Related Posts -->
                    </div>
                    <!-- End of Main Content -->
                    <aside class="sidebar right-sidebar blog-sidebar sidebar-fixed sticky-sidebar-wrapper">
                        <div class="sidebar-overlay">
                            <a href="#" class="sidebar-close">
                                <i class="close-icon"></i>
                            </a>
                        </div>
                        <a href="#" class="sidebar-toggle">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                        <div class="sidebar-content">
                            <div class="sticky-sidebar">
                                <!-- End of Widget search form -->

                                <!-- End of Widget categories -->
                                <div class="widget widget-posts">
                                    <h3 class="widget-title bb-no">Popular Posts</h3>
                                    <div class="widget-body">
                                        <div class="swiper">
                                            <div class="swiper-container swiper-theme nav-top" data-swiper-options="{
                                                    'spaceBetween': 20,
                                                    'slidesPerView': 1
                                                }">
                                                <div class="swiper-wrapper row cols-1">

                                                    <div class="swiper-slide widget-col">
                                                        @foreach($popularBlog as $blog)
                                                        <div class="post-widget mb-4">
                                                            <figure class="post-media br-sm">
                                                                <img src="{{asset('uploads/images/blog/'.$blog->image)}}" alt="150" height="150" />
                                                            </figure>
                                                            <div class="post-details">
                                                                <div class="post-meta">
                                                                    <a href="#" class="post-date">{{$blog->created_at->format('d-m-Y')}}</a>
                                                                </div>
                                                                <h4 class="post-title">
                                                                    <a href="{{route('Blog.View', $blog->id)}}">{{$blog->title}}</a>
                                                                </h4>
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
                        </div>
                    </aside>
                </div>
            </div>
        </div>
        <!-- End of Page Content -->
    </main>
@endsection
