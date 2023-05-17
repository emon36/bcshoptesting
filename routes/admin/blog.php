<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogController;

Route::group([
    'prefix'=>'blog'
], function() {
    Route::get('create', [BlogController::class, 'createPage'])->name('Blog.CreatePage');
    Route::post('store', [BlogController::class, 'createProcess'])->name('Blog.CreateProcess');
    Route::get('list', [BlogController::class,'blogList'])->name('Blog.List');
    Route::get('edit/{id}', [BlogController::class, 'editBlog'])->name('Blog.EditPage');
    Route::post('update/{id}', [BlogController::class, 'updateBlog'])->name('Blog.UpdateProcess');
    Route::get('change/status', [BlogController::class, 'changeStatus'])->name('Blog.ChangeStatus');
});
