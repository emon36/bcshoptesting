<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\DashboardController;


Route::group([
    'prefix'=>'in-admin',
    'as'=>'InAdmin.',
    'middleware' => ['admin']
], function(){

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('Dashboard');
    Route::get('/incomes', [DashboardController::class, 'income'])->name('Income');

    // admin routes
    require __DIR__.'/user.php';
    require __DIR__.'/category.php';
    require __DIR__.'/product.php';
    require __DIR__.'/vendor.php';
    require __DIR__.'/order.php';
    require __DIR__.'/home.php';
    require __DIR__.'/customer.php';
    require __DIR__.'/attribute.php';
    require __DIR__.'/ticket.php';
    require __DIR__.'/coupon.php';
    require __DIR__ . '/blog.php';

});


Route::get('/in-admin/login', [AuthController::class, 'pageAdminLogin'])->name('InAdmin.LoginPage');
Route::post('/in-admin/login', [AuthController::class, 'processAdminLogin'])->name('InAdmin.LoginProcess');
Route::get('/in-admin/logout', [AuthController::class, 'logout'])->name('InAdmin.LogoutPage');
