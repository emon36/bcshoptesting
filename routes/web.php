<?php
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/clear', function () {

    \Artisan::call('optimize:clear');

    dd("Cache is cleared");
});

Route::get('/customer-registration', function () {
    return view('web.pages.customer-registration.CustomerRegistration');
});
Route::get('/customer-login', function () {
    return view('web.pages.customer-login.CustomerLogin');
});

// admin routes
require __DIR__.'/admin/index.php';

// vendor routes
require __DIR__.'/vendor/index.php';

// web routes
require __DIR__.'/web/index.php';
require __DIR__.'/web/customer-account.php';
