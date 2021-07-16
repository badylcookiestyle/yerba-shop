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
//Route::get('/admin/',[App\Http\Controllers\AdminDashboardController::class,'productList'])->name('admin.productList');
Route::get('/admin/userList',[App\Http\Controllers\AdminDashboardController::class,'userList'])->name('admin.userList');
//--- home?
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//--- Shop Routes
Route::get('/shop', [App\Http\Controllers\ShopController::class, 'index'])->name('shop');
//--- Product Routes
Route::get('/product/{id}', [App\Http\Controllers\ProductController::class,'index'])->name('current.product');
Route::post('/product', [App\Http\Controllers\ProductController::class,'add'])
    ->name('add.product')
    ->middleware("auth");
Route::put('/product', [App\Http\Controllers\ProductController::class,'edit'])
    ->name('edit.product')
    ->middleware("auth");
Route::delete('/product/{id}', [App\Http\Controllers\ProductController::class,'delete'])->name('delete.product');
//--- Another Routes
Route::delete('/user/{email}', [App\Http\Controllers\AdminDashboardController::class,'deleteUser'])->name('delete.user');
