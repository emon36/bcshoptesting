<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Vendor\VendorProfileController;

Route::group([
    'prefix'=>'shop'
], function(){

    Route::get('view', [VendorProfileController::class, 'viewShop'])->name('Shop');
    Route::get('info/edit/{id}', [VendorProfileController::class, 'editShop'])->name('Edit.Shop');
    Route::post('update/details/{id}', [VendorProfileController::class, 'updateShopDetails'])->name('Update.Shop');

});
