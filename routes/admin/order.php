<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\OrderController;












Route::group([
    'prefix'=>'order'
], function() {
    Route::get('/index',[OrderController::class, 'orderIndexPage'])->name('Order.IndexPage');
    Route::get('/pending',[OrderController::class, 'pendingOrder'])->name('Order.PendingOrderList');
    Route::get('/approve',[OrderController::class, 'approveOrder'])->name('Order.ApproveOrderList');
    Route::get('/view/{id}',[OrderController::class, 'orderView'])->name('Order.ViewPage');
    Route::post('/order/status/{id}',[OrderController::class, 'orderStatus'])->name('Order.Status');
    Route::post('/delivery/status/{id}',[OrderController::class, 'deliveryStatus'])->name('Order.Delivery.Status');
    Route::post('/courier/add/{id}', [OrderController::class, 'addCourier'])->name('Order.Add.Courier');



});
