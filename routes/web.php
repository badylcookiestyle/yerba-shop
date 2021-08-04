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
})->middleware('visitor');
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/about', function () {
    return view('about');
});

//--- Payment
Route::prefix('payment')->group(function () {
    Route::get('/', [App\Http\Controllers\PaymentController::class, 'index']);
    Route::post('/', [App\Http\Controllers\PaymentController::class, 'payment']);
});
Auth::routes();
//--- Admin dashboard
Route::prefix('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');
    Route::get('/productList', [App\Http\Controllers\AdminDashboardController::class, 'productList'])
        ->name('admin.productList');
    Route::get('/orders', [App\Http\Controllers\AdminDashboardController::class, 'orders'])
        ->name('admin.orders');
    Route::get('/userList', [App\Http\Controllers\AdminDashboardController::class, 'userList'])
        ->name('admin.userList');
});
//--- Home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');
//--- Settings

Route::prefix('settings')->group(function () {
    Route::get('/', [App\Http\Controllers\SettingsController::class, 'index']);
});
//--- Shop Routes
Route::get('/shop', [App\Http\Controllers\ShopController::class, 'index'])
    ->name('shop');
//--- Product Routes
Route::prefix('product')->group(function () {
    Route::get('/{id}', [App\Http\Controllers\ProductController::class, 'index'])
        ->name('current.product');
    Route::post('/', [App\Http\Controllers\ProductController::class, 'add'])
        ->name('add.product')
        ->middleware("auth");
    Route::put('/', [App\Http\Controllers\ProductController::class, 'edit'])
        ->name('edit.product')
        ->middleware("auth");
    Route::delete('/{id}', [App\Http\Controllers\ProductController::class, 'delete'])
        ->name('delete.product');
});
//--- Cart Controller
Route::prefix('cart')->group(function () {
    Route::get('/', [App\Http\Controllers\CartController::class, 'index'])
        ->name('current.cart');
    Route::post('/', [App\Http\Controllers\CartController::class, 'addItem'])
        ->name('add.item');
//btw it's not deleting a cart it's just deleting a category
    Route::delete('/{id}', [App\Http\Controllers\CartController::class, 'deleteItem'])
        ->name('delete.item');
    Route::patch('/', [App\Http\Controllers\CartController::class, 'editItem'])
        ->name('edit.item');
});
//--- Cms
Route::get('admin/cms', [App\Http\Controllers\AdminDashboardController::class, 'cms']);
Route::prefix('cms')->group(function () {
    Route::post('/main', [App\Http\Controllers\CmsController::class, 'editMain']);
    Route::post('/shop', [App\Http\Controllers\CmsController::class, 'editShop']);
    Route::post('/about', [App\Http\Controllers\CmsController::class, 'editAbout']);
});
//--- orders
Route::prefix('order')->group(function () {
    Route::get('/{id}', [App\Http\Controllers\PaymentController::class, 'getOrders']);
    Route::patch('/', [App\Http\Controllers\PaymentController::class, 'changeStatus']);
});
//---Another Routes
Route::delete('/user/{email}', [App\Http\Controllers\AdminDashboardController::class, 'deleteUser'])
    ->name('delete.user');
Route::get('/details/{id}', [App\Http\Controllers\PaymentController::class, 'details']);
//--- Search
Route::post('search', [App\Http\Controllers\SearchController::class, 'search']);

