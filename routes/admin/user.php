<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::group([
    'prefix'=>'user'
], function(){

    Route::get('/', function () {
        dd('User Index');
    });

    Route::get('/create', function () {
        dd('User Create');
    });

    Route::get('/list', function () {
        dd('User List');
    });

    Route::get('/details/{id}', function () {
        dd('User Details');
    });

});
