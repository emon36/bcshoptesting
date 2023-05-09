<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CustomerController;


Route::group([
    'prefix'=> 'customer'
], function(){
    Route::get('/review/list', [CustomerController::class, 'customerReviewList'])->name('Customer.Review.List');
    Route::get('review/status/change', [CustomerController::class, 'reviewStatus'])->name('Customer.Review.Status');
});
