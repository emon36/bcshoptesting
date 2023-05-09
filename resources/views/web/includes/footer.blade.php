<footer class="footer appear-animate" data-animation-options="{
            'name': 'fadeIn'
        }">
    {{--    <div class="footer-newsletter bg-primary">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row justify-content-center align-items-center">--}}
    {{--                <div class="col-xl-5 col-lg-6">--}}
    {{--                    <div class="icon-box icon-box-side text-white">--}}
    {{--                        <div class="icon-box-icon d-inline-flex">--}}
    {{--                            <i class="w-icon-envelop3"></i>--}}
    {{--                        </div>--}}
    {{--                        <div class="icon-box-content">--}}
    {{--                            <h4 class="icon-box-title text-white text-uppercase font-weight-bold">Subscribe To--}}
    {{--                                Our Newsletter</h4>--}}
    {{--                            <p class="text-white">Get all the latest information on Events, Sales and Offers.--}}
    {{--                            </p>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="col-xl-7 col-lg-6 col-md-9 mt-4 mt-lg-0 ">--}}
    {{--                    <form action="#" method="get"--}}
    {{--                          class="input-wrapper input-wrapper-inline input-wrapper-rounded">--}}
    {{--                        <input type="email" class="form-control mr-2 bg-white" name="email" id="email"--}}
    {{--                               placeholder="Your E-mail Address" />--}}
    {{--                        <button class="btn btn-dark btn-rounded" type="submit">Subscribe<i--}}
    {{--                                class="w-icon-long-arrow-right"></i></button>--}}
    {{--                    </form>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <div class="container">
        <div class="footer-top">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="widget widget-about">
                        <a href="demo1.html" class="logo-footer">
                            <img src="{{asset('front-end/assets/images/Red.png')}}" alt="logo-footer" width="144"
                                 height="45" />
                        </a>
                        <div class="widget-body">
                            <p class="widget-about-title">Got Question? Call us 24/7</p>
                            <a href="tel:18005707777" class="widget-about-call">+8801531144760</a>
                            <p class="widget-about-desc">Register now to get updates on pronot get up icons
                                & coupons ster now toon.
                            </p>

                            {{--                            <div class="social-icons social-icons-colored">--}}
                            {{--                                <a href="#" class="social-icon social-facebook w-icon-facebook"></a>--}}
                            {{--                                <a href="#" class="social-icon social-twitter w-icon-twitter"></a>--}}
                            {{--                                <a href="#" class="social-icon social-instagram w-icon-instagram"></a>--}}
                            {{--                                <a href="#" class="social-icon social-youtube w-icon-youtube"></a>--}}
                            {{--                                <a href="#" class="social-icon social-pinterest w-icon-pinterest"></a>--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h3 class="widget-title">Company</h3>
                        <ul class="widget-body">
                            <li><a href="{{route('About.Us')}}">About Us</a></li>
                            <li><a href="{{route('Contact.Us')}}">Contact</a></li>
                            <li><a href="{{route('Terms.Condition')}}">Terms and Condition</a></li>
                            <li><a href="{{route('Privacy.Policy')}}">Privacy and Policies</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h4 class="widget-title">My Account</h4>
                        <ul class="widget-body">
                            <li><a href="{{route('getCartItems')}}">View Cart</a></li>
                            <li><a href="{{route('Customer.LoginPage')}}">Sign In</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h4 class="widget-title">Customer Service</h4>
                        <ul class="widget-body">
                            <li><a href="{{route('Return.Policy')}}">Product Returns</a></li>
                            <li><a href="{{route('Shipping.Policy')}}">Shipping Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="mid-footer">
            <div class="row payment-items">
                <div class="col-md-4 payment-item payment-cards">
                    <h6 class="payment-title powered-title">Accepted Cards</h6>
                    <img src="{{asset('front-end/assets/images/payments/visa.png')}}" class="img-fluid p-cards-img">
                    <img src="{{asset('front-end/assets/images/payments/mastercard.png')}}" class="img-fluid p-cards-img">
                    <img src="{{asset('front-end/assets/images/payments/diners-club-international.png')}}" class="img-fluid p-cards-img">
                    <img src="{{asset('front-end/assets/images/payments/union.png')}}" class="img-fluid p-cards-img">
                    <img src="{{asset('front-end/assets/images/payments/american-express.png')}}" class="img-fluid">
                    <img src="{{asset('front-end/assets/images/payments/dbbl.png')}}" class="img-fluid p-cards-img">
                </div>
                <div class="col-md-4 payment-item payment-cards">
                    <h6 class="payment-title powered-title">Mobile Banking</h6>
                    <img src="{{asset('front-end/assets/images/payments/bkash.png')}}" class="img-fluid p-cards-img">
                    <img src="{{asset('front-end/assets/images/payments/nagad.png')}}" class="img-fluid p-cards-img">
                    <img src="{{asset('front-end/assets/images/payments/rocket.jpg')}}" class="img-fluid p-cards-img">
                    <img src="{{asset('front-end/assets/images/payments/upay.png')}}" class="img-fluid p-cards-img">
                    <img src="{{asset('front-end/assets/images/payments/tap.png')}}" class="img-fluid">
                    <img src="{{asset('front-end/assets/images/payments/sureCash.png')}}" class="img-fluid p-cards-img">
                    <img src="{{asset('front-end/assets/images/payments/mCash.png')}}" class="img-fluid p-cards-img">
                    <img src="{{asset('front-end/assets/images/payments/myCash.png')}}" class="img-fluid p-cards-img">
                    <img src="{{asset('front-end/assets/images/payments/qCash.png')}}" class="img-fluid p-cards-img">
                    <img src="{{asset('front-end/assets/images/payments/tapNpay.png')}}" class="img-fluid p-cards-img">
                </div>
                <div class="col-md-4 payment-item payment-cards">
                    <h6 class="payment-title powered-title">Sponsors</h6>
                    <img src="{{asset('front-end/assets/images/payments/v1.png')}}" class="img-fluid p-cards-img">
                    <img src="{{asset('front-end/assets/images/payments/v2.png')}}" class="img-fluid p-cards-img">
                    <img src="{{asset('front-end/assets/images/payments/v3.png')}}" class="img-fluid p-cards-img">
                    <img src="{{asset('front-end/assets/images/payments/v4.png')}}" class="img-fluid">
                    <img src="{{asset('front-end/assets/images/payments/v5.png')}}" class="img-fluid">
                </div>
                <div class="col-md-4 payment-item payment-cards">
                    <h6 class="payment-title powered-title">Internet Banking</h6>
                    <img src="{{asset('front-end/assets/images/payments/ab.png')}}" class="img-fluid p-cards-img">
                    <img src="{{asset('front-end/assets/images/payments/bangla-drive.png')}}" class="img-fluid p-cards-img">
                    <img src="{{asset('front-end/assets/images/payments/bdbl.png')}}" class="img-fluid p-cards-img">
                    <img src="{{asset('front-end/assets/images/payments/brack.png')}}" class="img-fluid">
                    <img src="{{asset('front-end/assets/images/payments/cellfin.png')}}" class="img-fluid">
                    <img src="{{asset('front-end/assets/images/payments/city.png')}}" class="img-fluid">
                    <img src="{{asset('front-end/assets/images/payments/ebl.png')}}" class="img-fluid">
                    <img src="{{asset('front-end/assets/images/payments/islami.png')}}" class="img-fluid">
                    <img src="{{asset('front-end/assets/images/payments/likeIslami.png')}}" class="img-fluid">
                    <img src="{{asset('front-end/assets/images/payments/madhumoti.png')}}" class="img-fluid">
                    <img src="{{asset('front-end/assets/images/payments/meghna.png')}}" class="img-fluid">
                    <img src="{{asset('front-end/assets/images/payments/mtb.png')}}" class="img-fluid">
                    <img src="{{asset('front-end/assets/images/payments/pMoney.png')}}" class="img-fluid">
                    <img src="{{asset('front-end/assets/images/payments/sb.png')}}" class="img-fluid">
                    <img src="{{asset('front-end/assets/images/payments/woori.png')}}" class="img-fluid">
                </div>
                <div class="col-md-4 payment-item payment-cards">
                    <h6 class="payment-title powered-title">E-Wallet</h6>
                    <img src="{{asset('front-end/assets/images/payments/eIpay.png')}}" class="img-fluid p-cards-img">
                    <img src="{{asset('front-end/assets/images/payments/eDmoney.png')}}" class="img-fluid p-cards-img">
                    <img src="{{asset('front-end/assets/images/payments/eRainbow.png')}}" class="img-fluid p-cards-img">
                </div>

                <div class="col-md-4 payment-item payment-cards">
                    <div class="row">
                        <div class="col-md-6 payment-item payment-cards">
                            <h6 class="payment-title powered-title">Powered by ICT Division</h6>
                            <img src="{{asset('front-end/assets/images/payments/ictMain.png')}}" class="img-fluid p-cards-img">
                        </div>
                        <div class="col-md-6 payment-item payment-cards">
                            <h6 class="payment-title powered-title">Supported by idea Project</h6>
                            <img src="{{asset('front-end/assets/images/payments/idea.png')}}" class="img-fluid p-cards-img">
                        </div>
                    </div>
                </div>

            </div>
        </div>



        <div class="footer-bottom">
            <div class="footer-left">
                <p class="copyright">Copyright © 2023 Boichitro Store. All Rights Reserved.</p>
            </div>
            <div class="footer-right">
                <span class="payment-label mr-lg-8">We're using safe payment for</span>
                <figure class="payment">
                    <img src="{{asset('front-end/assets/images/icons/Payment.png')}}" alt="payment" width="50" height="25" />
                </figure>
            </div>
        </div>
    </div>
</footer>
