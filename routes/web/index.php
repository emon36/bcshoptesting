<?php

use App\Http\Controllers\web\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Vendor\RegistrationController;
use App\Http\Controllers\Vendor\LoginController;
use App\Http\Controllers\web\CartController;
use App\Http\Controllers\web\ProductController;
use App\Http\Controllers\web\CheckoutController;
use App\Http\Controllers\web\AuthController;
use App\Http\Controllers\web\WishlistController;
use App\Http\Controllers\web\ShopController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\web\ReviewController;
use App\Http\Controllers\web\PreOrderController;
use App\Http\Controllers\web\BlogController;

Route::group(['middleware' => 'cart'], function(){
    Route::get('/cart', [CartController::class, 'CartPage']);

    Route::get('/', [HomeController::class, 'HomePage'])->name('Home');

    Route::get('/product/{slug}/details/', [ProductController::class, 'productSingleView'])->name('productSingleView');

    Route::get('search/result', [HomeController::class, 'productSearch'])->name('Product.Search');

    Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('Product.AddToCart');
    Route::get('/carts', [CartController::class,'getCartItems'])->name('getCartItems');
    Route::get('/cart/count', [CartController::class,'cartCount'])->name('cartCount');
    Route::post('/cart/update', [CartController::class, 'updateCart'])->name('UpdateCart');
    Route::get('/cart/delete/{id}', [CartController::class, 'deleteCart'])->name('DeleteCart');
    Route::post('/guest/cart/update', [CartController::class, 'guestUpdateCart'])->name('UpdateGuestCart');
    Route::get('/guest/cart/delete/{id}', [CartController::class, 'guestDeleteCart'])->name('DeleteGuestCart');
    Route::get('add/wishlist/{id}', [WishlistController::class, 'addToWishlist'])->name('Product.AddToWishList');


//    Route::post('preorder/cart', [PreOrderController::class, 'preOrderCart'])->name('Product.PreOrder.AddToCart');
//    Route::get('preorder/checkout', [PreOrderController::class, 'preOrderCheckout'])->name('Product.PreOrder.Checkout');

    Route::group(['middleware' => 'customer'], function() {
        Route::get('/wishlist', [WishlistController::class, 'getWishlist'])->name('GetWishList');
        Route::get('/delete/wishlist/{id}', [WishlistController::class, 'deleteWishlist'])->name('DeleteWishlist');
    });



    Route::get('/checkout', [CheckoutController::class, 'checkoutPage'])->name('checkoutPage');
    Route::post('apply/coupon', [CheckoutController::class, 'applyCoupon'])->name('applyCoupon');
    Route::get('remove/coupon', [CheckoutController::class, 'removeCoupon'])->name('removeCoupon');

    Route::post('/place/order', [CheckoutController::class, 'customerPlaceOrder'])->name('customerPlaceOrder');

    Route::get('/customer/login', [AuthController::class, 'pageCustomerLogin'])->name('Customer.LoginPage');
    Route::get('/customer/registration', [AuthController::class, 'pageCustomerRegistration'])->name('Customer.RegistrationPage');
    Route::post('/customer/register' , [AuthController::class, 'customerRegisterProcess'])->name('Customer.RegisterProcess');

    Route::post('/customer/login', [AuthController::class, 'customerLoginProcess'])->name('Customer.LoginProcess');
    Route::get('/customer/logout', [AuthController::class, 'logout'])->name('Customer.Logout');

    Route::post('customer/review/submit', [ReviewController::class, 'reviewStore'])->name('Review.Store');


    //category wise product route
    Route::get('/product/{id}/{slug}/', [ProductController::class, 'categoryProductsView'])->name('Category.ProductView');

    Route::get('/privacy-policy', [HomeController::class, 'privacyPolicyPage'])->name('Privacy.Policy');
    Route::get('/terms-conditions', [HomeController::class, 'termsAndConditionPage'])->name('Terms.Condition');
    Route::get('/about-us', [HomeController::class, 'aboutUsPage'])->name('About.Us');
    Route::get('/contact-us', [HomeController::class, 'contactUsPage'])->name('Contact.Us');
    Route::post('/contact', [HomeController::class, 'contact'])->name('Contact');
    Route::get('/return/policy', [HomeController::class, 'returnPolicy'])->name('Return.Policy');
    Route::get('/shipping/policy', [HomeController::class, 'shippingPolicy'])->name('Shipping.Policy');

    Route::get('blog/{id}/view', [BlogController::class, 'singleView'])->name('Blog.View');
    Route::get('blogs', [BlogController::class, 'blogList'])->name('Blog.Page');

    Route::get('/vendor/shop/list', [HomeController::class, 'vendorList'])->name('Vendor.List');
    Route::get('/vendor/shop/{url}/details', [HomeController::class, 'vendorDetails'])->name('Vendor.Details');




    //shop

//    Route::get('/shop', [ShopController::class, 'shopPage'])->name('shop.page');



    Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
    Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

    Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
    Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

    Route::post('/success', [SslCommerzPaymentController::class, 'success']);
    Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
    Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

    Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);



});

  Route::get('/mobile/error/', [HomeController::class, 'mobileError'])->name('Mobile.Error');



Route::get('/vendor/registration', [RegistrationController::class, 'vendorRegisterPage'])->name('Vendor.RegisterPage');
Route::get('/vendor/registration/complete', [RegistrationController::class, 'registrationComplete'])->name('Vendor.RegisterComplete');

Route::post('/vendor/register' , [RegistrationController::class, 'vendorRegisterProcess'])->name('Vendor.RegisterProcess');
Route::get('/vendor/login', [LoginController::class, 'vendorLoginPage'])->name('Vendor.LoginPage');
Route::post('/vendor/login', [LoginController::class, 'vendorLoginProcess'])->name('Vendor.VendorLoginProcess');
Route::get('/vendor/logout', [LoginController::class, 'logout'])->name('Vendor.Logout');

Route::get('/vendor/password/reset', [LoginController::class, 'passwordReset'])->name('Vendor.Password.Reset');
Route::post('forget-password', [LoginController::class, 'submitForgetPasswordForm'])->name('Vendor.Password.Reset.Post');


