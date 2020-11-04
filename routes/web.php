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
|productByCategory
*/

Route::get('/', function () {
    return view('welcome');
});
//client route
Route::get('/',[App\Http\Controllers\ClientController::class, 'index'])->name('index');
Route::get('/product-store',[App\Http\Controllers\ClientController::class, 'product_store'])->name('product_store');
Route::get('/product-category/{category_id}',[App\Http\Controllers\ClientController::class, 'productByCategory'])->name('product_by_category');
Route::get('/product-brand/{brand_id}',[App\Http\Controllers\ClientController::class, 'productByBrand'])->name('product_by_brand');

Route::get('/product_details/{slug}',[App\Http\Controllers\ClientController::class, 'product_Details']);

//cart route

    Route::post('/add-to-cart',[App\Http\Controllers\CartController::class, 'add_to_cart'])->name('cart.store');
    Route::get('/show_to_cart',[App\Http\Controllers\CartController::class, 'show_cart'])->name('cart.show');
    Route::post('/update_to_cart',[App\Http\Controllers\CartController::class, 'update_cart'])->name('cart.update');
    Route::get('/delete_to_cart/{rowId}',[App\Http\Controllers\CartController::class, 'delete_cart'])->name('cart.delete');


//costumer route
// Route::get('/customer-login',[App\Http\Controllers\CheckoutController::class, 'customer_login'])->name('customers.login');
// Route::get('/customer-sign-up',[App\Http\Controllers\CheckoutController::class, 'customer_sign_up'])->name('customer.sign-up');
// Route::post('/customer-sign-up-store',[App\Http\Controllers\CheckoutController::class, 'customer_sign_up_store'])->name('store.sign-up');
// Route::get('/customer-sign-up-verify',[App\Http\Controllers\CheckoutController::class, 'customer_sign_up_verify'])->name('verify.sign-up');
// Route::post('/sign-up-verify-store',[App\Http\Controllers\CheckoutController::class, 'sign_up_verify_store'])->name('verify.store');

//checkout route
Route::get('/checkout',[App\Http\Controllers\CheckoutController::class, 'checkout'])->name('customer.checkout');
Route::post('/checkoutStore',[App\Http\Controllers\CheckoutController::class, 'checkout_store'])->name('checkout.store');

//product Search
Route::post('/Product-search',[App\Http\Controllers\ClientController::class, 'productSearch'])->name('product.search');
Route::get('/Product-get',[App\Http\Controllers\ClientController::class, 'productGet'])->name('product.get');




Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//admin
Route::group(['middleware' => ['auth','admin']], function () {

    Route::get('/dashboard',[App\Http\Controllers\AdminController::class, 'index']);

    Route::group(['prefix' => 'user'], function () {
        //user crud
        Route::get('/list',[App\Http\Controllers\UserController::class, 'index'])->name('user.list');
        Route::post('/store',[App\Http\Controllers\UserController::class, 'store'])->name('user.store');
        Route::get('/edit/{id}',[App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
        Route::post('/update/{id}',[App\Http\Controllers\UserController::class, 'update'])->name('user.update');
        Route::get('/delete/{id}',[App\Http\Controllers\UserController::class, 'delete'])->name('user.delete');
    });
    Route::group(['prefix' => 'slider'], function () {
        //user crud
        Route::get('/list',[App\Http\Controllers\SliderController::class, 'index'])->name('slider.list');
        Route::post('/store',[App\Http\Controllers\SliderController::class, 'store'])->name('slider.store');
        // Route::get('/edit/{id}',[App\Http\Controllers\SliderController::class, 'edit'])->name('slider.edit');
        // Route::post('/update/{id}',[App\Http\Controllers\SliderController::class, 'update'])->name('slider.update');
        Route::get('/delete/{id}',[App\Http\Controllers\SliderController::class, 'destroy'])->name('slider.delete');
    });
    Route::group(['prefix' => 'category'], function () {
        //user crud
        Route::get('/list',[App\Http\Controllers\CategoryController::class, 'index'])->name('category.list');
        Route::post('/store',[App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
        Route::get('/edit/{id}',[App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/update/{id}',[App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
        Route::get('/delete/{id}',[App\Http\Controllers\CategoryController::class, 'destroy'])->name('category.delete');
    });


    Route::group(['prefix' => 'brand'], function () {
        //brand crud
        Route::get('/list',[App\Http\Controllers\BrandController::class, 'index'])->name('brand.list');
        Route::post('/store',[App\Http\Controllers\BrandController::class, 'store'])->name('brand.store');
        Route::get('/edit/{id}',[App\Http\Controllers\BrandController::class, 'edit'])->name('brand.edit');
        Route::post('/update/{id}',[App\Http\Controllers\BrandController::class, 'update'])->name('brand.update');
        Route::get('/delete/{id}',[App\Http\Controllers\BrandController::class, 'destroy'])->name('brand.delete');
    });


    Route::group(['prefix' => 'product'],function(){

        Route::get('/all',[App\Http\Controllers\ProductController::class, 'index'])->name('product.list');
        Route::get('/add',[App\Http\Controllers\ProductController::class, 'add'])->name('product.add');
        Route::post('/store',[App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
        Route::get('/edit/{id}',[App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');
        Route::post('/update/{id}',[App\Http\Controllers\ProductController::class, 'update'])->name('product.update');
        Route::get('/delete/{id}',[App\Http\Controllers\ProductController::class, 'destroy'])->name('product.delete');
        Route::get('/view/{id}',[App\Http\Controllers\ProductController::class, 'view'])->name('product.view');

    });

    Route::group(['prefix' => 'order'],function(){

        //order
        Route::get('/pending',[App\Http\Controllers\OrderController::class, 'pending_order'])->name('order.pending');
        Route::get('/approved',[App\Http\Controllers\OrderController::class, 'approved_order'])->name('order.approved');
        Route::get('/orderDetials/{id}',[App\Http\Controllers\OrderController::class, 'order_details'])->name('order.details');

        Route::get('/pendingActive/{id}',[App\Http\Controllers\OrderController::class, 'active_order'])->name('order.active');
        Route::get('/deleteOrder/{id}',[App\Http\Controllers\OrderController::class, 'delete_order'])->name('order.delete');

    });
});
