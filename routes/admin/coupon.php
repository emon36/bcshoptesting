<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CouponController;

Route::group([
    'prefix'=>'coupon'
], function(){
    Route::get('/create' , [CouponController::class, 'couponCreatePage'])->name('Coupon.CreatePage');
    Route::get('/index' , [CouponController::class, 'index'])->name('Coupon.IndexPage');
    Route::get('/edit/{id}' , [CouponController::class, 'edit'])->name('Coupon.EditPage');
    Route::post('/store' , [CouponController::class, 'store'])->name('Coupon.CreateProcess');
    Route::post('/update/{id}' , [CouponController::class, 'update'])->name('Coupon.UpdateProcess');
    Route::get('/change/status', [CouponController::class, 'statusChange'])->name('Coupon.StatusChange');

});
