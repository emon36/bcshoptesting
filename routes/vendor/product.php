<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Vendor\ProductController;



Route::group([
    'prefix'=>'product',
    'middleware' => ['activeVendor']
], function(){

    Route::get('/create', [ProductController::class, 'vendorProductCreatePage'])->name('Product.CreatePage');
    Route::post('/store', [ProductController::class, 'vendorProductCreateProcess'])->name('Product.CreateProcess');
    Route::get('/index', [ProductController::class, 'VendorProductIndex'])->name('Product.Index');
    Route::get('/edit/{id}', [ProductController::class, 'productEditPage'])->name('Product.EditPage');
    Route::post('/update/{id}', [ProductController::class, 'productUpdateProcess'])->name('Product.UpdateProcess');
    Route::get('/delete/{id}', [ProductController::class, 'productDelete'])->name('Product.DeleteProcess');

    Route::get('/category/add/{id}', [ProductController::class, 'productCategoryPage'])->name('Product.CategoryPage');
    Route::post('/category/add/{id}', [ProductController::class, 'productCategoryStore'])->name('Product.CategoryStore');
    Route::get('/category/delete/{id}', [ProductController::class, 'productCategoryDelete'])->name('Product.CategoryDelete');

    Route::get('/add/images/{id}', [ProductController::class, 'productCreateImagePage'])->name('Product.ProductImagePage');
    Route::post('/product/image/upload/{id}', [ProductController::class, 'productImageUpload'])->name('Product.ProductImageUpload');

    Route::get('/discount/{id}', [ProductController::class, 'discountPage'])->name('Product.Discount.Page');
    Route::post('/add/discount/{id}', [ProductController::class, 'addDiscount'])->name('Product.Add.Discount');


});
