<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\HomeBlocksController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\PageController;





Route::group([
    'prefix'=> 'home'
], function(){
    Route::get('/create/slider' , [HomeController::class, 'sliderCreate'])->name('Home.Slider.Create');
    Route::post('/upload/slider/image' , [HomeController::class, 'uploadSliderImage'])->name('Home.Slider.Image.Upload');
    Route::get('/page/section' , [HomeBlocksController::class, 'homeBlocksCreatePage'])->name('Home.Blocks.Section');
    Route::post('/create/page/section' , [HomeBlocksController::class, 'homeBlocksCreateProcess'])->name('Home.Blocks.SectionCreateProcess');
    Route::get('/page/section/list', [HomeBlocksController::class, 'index'])->name('Home.Blocks.Section.IndexPage');
    Route::get('/section/product/add/{id}' , [HomeBlocksController::class, 'homeBlocksAddProductPage'])->name('Home.Blocks.Product.AddPage');
    Route::get('/section/product/edit/{id}' , [HomeBlocksController::class, 'editHomeBlock'])->name('Home.Blocks.Product.EditPage');
    Route::post('/section/product/update/{id}' , [HomeBlocksController::class, 'updateHomeBlock'])->name('Home.Blocks.Product.UpdateProcess');
    Route::post('/section/product/add/process/{id}' , [HomeBlocksController::class, 'homeBlocksAddProductProcess'])->name('Home.Blocks.Product.AddProcess');
    Route::get('/section/product/delete/{id}' , [HomeBlocksController::class, 'removeHomeBlocksProduct'])->name('Home.Blocks.Product.Delete');
    Route::get('/section/change/status', [HomeBlocksController::class, 'changeStatus'])->name('Home.Section.Status.Change');

    Route::get('/shipping/charge', [HomeController::class, 'shippingChargePage'])->name('Shipping.Charge');
    Route::post('/update/shipping/charge/{id}', [HomeController::class, 'updateShippingCharge'])->name('Update.Shipping.Charge');


    //banner

    Route::get('create/banner', [BannerController::class, 'addBanner'])->name('Add.Banner');
    Route::post('store/banner', [BannerController::class, 'storeBanner'])->name('Store.Banner');
    Route::get('banner/list', [BannerController::class, 'bannerList'])->name('Banner.List');
    Route::get('banner/status/change', [BannerController::class, 'bannerStatusChange'])->name('Banner.Status.Change');
    Route::get('banner/edit/{id}', [BannerController::class, 'bannerEdit'])->name('Banner.Edit');
    Route::post('update/banner/{id}', [BannerController::class, 'updateBanner'])->name('Update.Banner');

//  Pages

    Route::get('page/list', [PageController::class, 'pageList'])->name('Page.list');
    Route::get('edit/page/content/{id}', [PageController::class, 'editPageContent'])->name('Edit.Page');
    Route::post('update/page/content/{id}', [PageController::class, 'updatePageContent'])->name('Update.Page');

    // announcement setup

    Route::get('announcement',[HomeController::class, 'announcementPage'])->name('Announcement');
    Route::post('update/announcement/{id}',[HomeController::class, 'updateAnnouncement'])->name('Update.Announcement');



});
