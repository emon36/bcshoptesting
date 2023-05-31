<section class="intro-section">
    <div class="swiper-container swiper-theme nav-inner pg-inner swiper-nav-lg animation-slider pg-xxl-hide nav-xxl-show nav-hide"
         data-swiper-options="{
                    'slidesPerView': 1,
                    'autoplay': {
                        'delay': 8000000,
                        'disableOnInteraction': false
                    }
                }">
        <div class="swiper-wrapper">
            <?php
            $slider = \App\Models\Banner::where('banner_type', 'Slider Banner')->where('status', 'Active')->get();
            ?>
            @foreach($slider as $row)
            <div class="swiper-slide banner banner-fixed intro-slide "
                 style="background-image: url({{asset('uploads/images/banner/'.$row->bg_image)}}); background-color: #ebeef2;">
                <div class="container">
                    <figure class="slide-image mhk-banner skrollable slide-animate">
                        <img src="{{asset('uploads/images/banner/'.$row->image)}}" alt="Banner"
                             >
                    </figure>
                    <div class="banner-content y-50 text-right">
                        <h5 class="banner-subtitle font-weight-normal text-default ls-50 lh-1 mb-2 slide-animate" style="color: {{$row->color_code}}!important;;"
                            data-animation-options="{
                                    'name': 'fadeInRightShorter',
                                    'duration': '1s',
                                    'delay': '.2s'
                                }">
                            <span class="p-relative d-inline-block">  {{$row->subtitle}}</span>
                        </h5>
                        <h3 class="banner-title font-weight-bolder ls-25 lh-1 slide-animate"  style="color: {{$row->color_code}}!important;"
                            data-animation-options="{
                                    'name': 'fadeInRightShorter',
                                    'duration': '1s',
                                    'delay': '.4s'
                                }">
                            {{$row->title}}
                        </h3>
                        <p class="font-weight-normal text-default slide-animate" data-animation-options="{
                                    'name': 'fadeInRightShorter',
                                    'duration': '1s',
                                    'delay': '.6s'
                                }">
                        </p>

                        <a href="{{$row->url}}"
                           class="btn btn-dark btn-outline btn-rounded btn-icon-right slide-animate"
                           data-animation-options="{
                                    'name': 'fadeInRightShorter',
                                    'duration': '1s',
                                    'delay': '.8s'
                                }">SHOP NOW<i class="w-icon-long-arrow-right"></i></a>

                    </div>
                    <!-- End of .banner-content -->
                </div>
                <!-- End of .container -->
            </div>
            @endforeach
            <!-- End of .intro-slide1 -->
            <!-- End of .intro-slide3 -->
        </div>
        <div class="swiper-pagination"></div>
        <button class="swiper-button-next"></button>
        <button class="swiper-button-prev"></button>
    </div>
    <!-- End of .swiper-container -->
          </section>
