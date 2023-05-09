<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Vendor\WalletController;


Route::group([
    'prefix'=>'wallet'
], function(){

    Route::post('/withdraw/request', [WalletController::class,  'withdrawRequest'])->name('Withdraw.Request');

});

