<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;




Route::group([
    'prefix'=>'category'
], function(){
    Route::get('/create' , [CategoryController::class, 'create'])->name('Category.CreatePage');
    Route::get('/index' , [CategoryController::class, 'index'])->name('Category.IndexPage');
    Route::get('/edit/{id}' , [CategoryController::class, 'edit'])->name('Category.EditPage');
    Route::post('/store' , [CategoryController::class, 'store'])->name('Category.CreateProcess');
    Route::post('/update/{id}' , [CategoryController::class, 'update'])->name('Category.UpdateProcess');

});
