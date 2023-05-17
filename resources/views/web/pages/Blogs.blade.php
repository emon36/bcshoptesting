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
        <nav class="breadcrumb-nav mb-6">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{route('Home')}}">Home</a></li>
                    <li><a href="{{route('Blog.Page')}}">Blog</a></li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of Page Content -->
        <div class="page-content">
            <div class="container">
                <div class="row gutter-lg mb-10">
                    <div class="main-content">
                        @foreach($blogs as $blog)
                        <article class="post post-classic overlay-zoom mb-4">
                            <figure class="post-media br-sm">
                                <a href="{{route('Blog.View', $blog->id)}}">
                                    <img src="{{asset('uploads/images/blog/'.$blog->image)}}" width="930"
                                         height="500" alt="blog">
                                </a>
                            </figure>
                            <div class="post-details">
                                <h4 class="post-title">
                                    <a href="">{{$blog->title}}</a>
                                </h4>
                                <div class="post-content">
                                    <p>
                                        {!!  substr(strip_tags($blog->content), 0, 200) !!}
                                    </p>
                                    <a href="{{route('Blog.View', $blog->id)}}" class="btn btn-link btn-primary">(read more)</a>
                                </div>
                                <div class="post-meta">
                                    - <a href="#" class="post-date">{{$blog->created_at->format('d-m-Y')}}</a>
                                </div>
                            </div>
                        </article>
                        @endforeach
                            <div class="d-flex justify-content-center">
                            {{$blogs->links('pagination::bootstrap-5')}}
                            </div>
                    </div>
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
