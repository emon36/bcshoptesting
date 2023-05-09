<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Vendor\DashboardController;
use App\Http\Controllers\Vendor\LoginController;



Route::group([
    'prefix'=>'in-vendor',
    'as'=>'InVendor.',
    'middleware' => ['vendor']
], function(){

    Route::get('/dashboard', [DashboardController::class, 'dashboardPage'])->name('Dashboard');


    // vendor routes
    require __DIR__.'/shop.php';
    require __DIR__.'/product.php';
    require __DIR__.'/order.php';
    require __DIR__.'/wallet.php';
    require __DIR__.'/customer.php';

});



