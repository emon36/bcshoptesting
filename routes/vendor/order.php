<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Vendor\OrderController;




Route::group([
    'prefix'=>'order',
    'middleware' => ['activeVendor']
], function(){
    Route::get('/index', [OrderController::class, 'orderIndex'])->name('Order.OrderIndex');
    Route::get('/view/{id}', [OrderController::class, 'orderView'])->name('Order.OrderView');
    Route::post('/order/status/{id}', [OrderController::class, 'orderStatusChange'])->name('Order.Status.Change');
    Route::post('/order/delivery/status/{id}', [OrderController::class, 'orderDeliveryStatus'])->name('Order.Delivery.Status');
    Route::post('/courier/add/{id}', [OrderController::class, 'addCourier'])->name('Order.Add.Courier');

});
