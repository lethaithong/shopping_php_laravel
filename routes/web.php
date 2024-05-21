<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Page\PageController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Page\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Page\CartController;
use App\Http\Controllers\MailController;


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
// ================ USER ==================




//Route::middleware(['checkcus'])->group(function () {
    Route::get('/', [PageController::class, 'getHome'])->name('home');

    route::get('/product', [PageController::class, 'product_paginate'])->name('product');
    route::get('/product_detail/{id}', [PageController::class, 'product_detail']);
    
    route::get('/contact', [PageController::class, 'contact'])->name('contact');
    
    route::get('/login', [PageController::class, 'getLogin'])->name('login');
    route::post('/login', [PageController::class, 'postLogin'])->name('login');
    
    Route::get('logout', [PageController::class, 'getLogout'])->name('logout');
    
    route::get('/register', [PageController::class, 'register'])->name('register');
    route::post('/register', [PageController::class, 'PostRegister'])->name('register');
    
    route::get('/shopping_cart', [CartController::class, 'get_shopping_cart'])->name('shopping_cart');
    route::post('/shopping_cart', [CartController::class, 'post_shopping_cart']);
    route::delete('/shopping_cart', [CartController::class, 'remove']);
    route::get('/shopping_cart_all', [CartController::class, 'remove_all']);
    route::put('/shopping_cart', [CartController::class, 'update']);
    
    route::get('/profile', [PageController::class, 'profile']);
    route::put('/profile', [UserController::class, 'update_profile'])->name('update_profile');
    
    route::get('product_by_category/{id}', [PageController::class, 'product_by_category'])->name('product_by_category');
    route::get('/search', [PageController::class, 'search'])->name('search');
    
    route::get('/check_out', [CartController::class, 'checkout'])->name('checkout');
    route::post('/check_out', [CartController::class, 'post_checkout'])->name('checkout');
    route::post('/momo', [CartController::class, 'momo']);
    
    route::get('/SE', [PageController::class, 'SE'])->name('SE');
    
    route::get('/order', [CartController::class, 'get_order'])->name('order');
    route::get('/order_detail/{id}', [CartController::class, 'order_detail'])->name('order_detail');
    
    route::post('/check_coupon', [CartController::class, 'check_coupon']);
    
    route::get('/delete_coupon', [CartController::class, 'delete_coupon'])->name('delete_coupon');
    
    //route::get('/qr', [CartController::class, 'qr'])->name('qr');
 

// ================ ADMIN ==================
Route::middleware(['auth','checkAdmin'])->group(function () {

    route::prefix('admin')->group (function(){

        route::get('/', [AdminController::class, 'getAdmin']);
        route::post('/', [AdminController::class, 'index_ad'])->name('admin_index');

        route::post('/filter_by_date', [AdminController::class, 'filter_by_date']);//loc theo ngay
        route::post('/change', [AdminController::class, 'change']);//loc theo option
        route::post('/refesh', [AdminController::class, 'refesh']);//refesh trang

        route::get('/charts', [PageController::class, 'charts']);

        route::get('/Order', [OrderController::class, 'get_order_ad']);
        route::get('/Order_detail_ad/{id}', [OrderController::class, 'get_order_detail_ad']);
        route::get('/active_Order/{id}', [OrderController::class, 'active_order']);

        route::get('/register_ad', [PageController::class, 'register_ad']);
        route::get('/layout_static', [PageController::class, 'layout_static']);
        route::get('/password', [PageController::class, 'password']);
        route::get('/login_admin', [PageController::class, 'login_admin']);

        route::prefix('category')->group (function(){
            route::get('/', [CategoryController::class, 'index']);
            route::get('/add_category', [CategoryController::class, 'create']);
            route::get('/active_category/{id}', [CategoryController::class, 'active']);
            route::post('/add_category', [CategoryController::class, 'store']);
            route::put('/update_category', [CategoryController::class, 'update']);
            route::get('/edit_category/{id}', [CategoryController::class, 'edit']);
            route::delete('/delete_category', [CategoryController::class, 'destroy']);
            });

        route::prefix('product')->group (function(){
            route::get('/', [productController::class, 'index']);
            route::get('/add_product', [productController::class, 'create']);
            route::get('/active_product/{id}', [productController::class, 'active']);
            route::post('/add_product', [productController::class, 'store']);
            route::put('/update_product', [productController::class, 'update']);
            route::get('/edit_product/{id}', [productController::class, 'edit']);
            route::delete('/delete_product', [productController::class, 'destroy']);
            //route::get('/delete_product', [productController::class, 'destroy']);
        });

        route::prefix('coupon')->group (function(){
            route::get('/', [CartController::class, 'show_coupon']);
            route::get('/add_coupon', [CartController::class, 'add_coupon']);
            route::post('/add_coupon', [CartController::class, 'store_coupon']);
            route::put('/update_coupon', [CartController::class, 'update_coupon']);
            route::get('/edit_coupon/{id}', [CartController::class, 'edit']);
            route::delete('/delete_coupon', [CartController::class, 'destroy']);
        });

        route::prefix('user')->group (function(){

            route::prefix('vuser')->group (function(){

            route::get('/', [userController::class, 'index']);
            route::get('/edit_user/{User_id}', [userController::class, 'edit']);
            route::put('/update_user', [userController::class, 'update']);
            route::get('/active_user/{id}', [userController::class, 'active']);
            route::get('/edit_user/{User_id}', [userController::class, 'edit']);
            route::get('/add_user', [userController::class, 'create']);
            route::post('/add_user', [userController::class, 'store']);
            // route::put('/update_user', [userController::class, 'update']);
            route::delete('/delete_user', [userController::class, 'destroy']);
            //route::get('/delete_user', [userController::class, 'destroy']);
            });

            route::prefix('vadmin')->group (function(){
            route::get('/', [userController::class, 'index_admin']);
            route::get('/add_admin', [userController::class, 'create_admin']);
            route::post('/add_admin', [userController::class, 'store_admin']);
            
            route::get('/edit_admin/{User_id}', [userController::class, 'edit_admin'])->name('edit_admin');
            route::put('/update_admin', [userController::class, 'update_admin']);

            route::delete('/delete_admin', [userController::class, 'destroy_admin']);

            route::get('/active_admin/{id}', [userController::class, 'active_admin']);
            
            route::get('/edit_profile', [userController::class, 'edit_profile'])->name('edit_profile');
            route::put('/update_profile_ad', [userController::class, 'update_profile_ad'])->name('update_profile_ad');
            
            
            });
        });
    });
});

