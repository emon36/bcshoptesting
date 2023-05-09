<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Vendor\CustomerController;

Route::group([
    'prefix'=>'customer',
    'middleware' => ['activeVendor']
], function(){
    Route::get('/review/list', [CustomerController::class, 'customerReviewList'])->name('Customer.Review.List');
});
