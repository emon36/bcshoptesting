<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AttributeController;

Route::group([
    'prefix'=>'product'
], function(){

    Route::get('/attribute/create' , [AttributeController::class, 'attributeCreatePage'])->name('Product.Attribute.CreatePage');
    Route::post('/attribute/store' , [AttributeController::class, 'attributeCreateProcess'])->name('Product.Attribute.CreateProcess');
    Route::post('/get/attribute/values' , [AttributeController::class, 'attributeValues'])->name('Product.Attribute.AttributeValue');
    Route::get('/create', [ProductController::class, 'productCreatePage'])->name('Product.CreatePage');
    Route::post('/store', [ProductController::class, 'productCreateProcess'])->name('Product.CreateProcess');
    Route::get('/index', [ProductController::class, 'productIndex'])->name('Product.Index');
    Route::get('/edit/{id}', [ProductController::class, 'productEditPage'])->name('Product.EditPage');
    Route::post('/update/{id}', [ProductController::class, 'productUpdateProcess'])->name('Product.UpdateProcess');
    Route::get('/delete/{id}', [ProductController::class, 'productDelete'])->name('Product.Delete');
    Route::get('/change/product/status', [ProductController::class, 'productChangeStatus'])->name('Product.ChangeStatus');
    Route::get('/search', [ProductController::class, 'searchProduct'])->name('Product.Search');

    Route::get('/create/images/{id}', [ProductController::class, 'productCreateImagePage'])->name('Product.ProductCreateImagePage');
    Route::post('/product/image/upload/{id}', [ProductController::class, 'productImageUpload'])->name('Product.ProductImageUpload');
    Route::get('/product/image/delete/{id}', [ProductController::class, 'deleteGalleryImage'])->name('Product.DeleteGalleryImage');
    Route::get('/create/categories/{id}', [ProductController::class, 'productCategoryPage'])->name('Product.ProductCreateCategoryPage');
    Route::post('/store/categories/{id}', [ProductController::class, 'productCategoryStore'])->name('Product.ProductCategoryStore');

    Route::get('/discount/{id}', [ProductController::class, 'discountPage'])->name('Product.Discount.Page');
    Route::post('/add/discount/{id}', [ProductController::class, 'addDiscount'])->name('Product.Add.Discount');


    Route::get('/pending', [ProductController::class, 'pendingProduct'])->name('Product.Pending.List');


});
