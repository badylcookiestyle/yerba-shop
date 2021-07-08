<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//--- General Routes
Route::get('/', function () {
    return view('welcome');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/about', function () {
    return view('about');
});

Auth::routes();
//--- Admin dashboard
Route::get('/admin',[App\Http\Controllers\AdminDashboardController::class,'index'])->name('admin.dashboard');
Route::get('/admin/productList',[App\Http\Controllers\AdminDashboardController::class,'productList'])->name('admin.productList');
//--- home?
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//--- Shop Routes
Route::get('/shop', [App\Http\Controllers\ShopController::class, 'index'])->name('shop');
//--- Product Routes
Route::get('/product/{id}', [App\Http\Controllers\ProductController::class,'index'])->name('current.product');
