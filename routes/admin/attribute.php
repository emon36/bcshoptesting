<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AttributeController;




Route::group([
    'prefix'=>'attribute'
], function(){

    Route::get('/create' , [AttributeController::class, 'attributeCreatePage'])->name('Attribute.CreatePage');
    Route::get('/index' , [AttributeController::class, 'index'])->name('Attribute.IndexPage');
    Route::get('/edit/{id}' , [AttributeController::class, 'edit'])->name('Attribute.EditPage');
    Route::post('/store' , [AttributeController::class, 'store'])->name('Attribute.CreateProcess');
    Route::post('/update/{id}' , [AttributeController::class, 'update'])->name('Attribute.UpdateProcess');

});
