<?php

use App\Http\Controllers\Admin\AccountUserController;
use App\Http\Controllers\Admin\HomeAdminController;
use App\Http\Controllers\Admin\ImportOrderController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Clients\AccountController;
use App\Http\Controllers\Clients\CartController;
use App\Http\Controllers\Clients\CheckOutController;
use App\Http\Controllers\Clients\OrderTrackingController;
use App\Http\Controllers\Clients\ProductClientsController;
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
// CLient routes
Route::get('/',[ProductClientsController::class,'index'])->name('home');
Route::prefix('/clients')->group(function(){
    Route::get('/detail-product/{MaSP}',[ProductClientsController::class,'detailProduct'])->name('clients.detail-product');
    Route::get('/product-category/{MaDM}',[ProductClientsController::class,'getProductByCategory'])->name('clients.product-category');
    Route::post('/product-category/{MaDM}',[ProductClientsController::class,'getProductByPrice']);
    Route::get('/search-product',[ProductClientsController::class,'searchProduct'])->name('clients.search-product');
    Route::get('/product-national/{MaDM}-{MaXX}-{minPrice}-{maxPrice}',[ProductClientsController::class,'getProductByNational']);
    //login
    Route::get('/login',[AccountController::class,'Login'])->name('clients.login');
    Route::post('/login',[AccountController::class,'postLogin']);
    Route::get('/register',[AccountController::class,'Register'])->name('clients.register');
    Route::post('/register',[AccountController::class,'postRegister']);
    Route::get('/my-account',[AccountController::class,'MyAccount'])->name('clients.my-account');
    Route::get('/my-account/logout',[AccountController::class,'LogOut'])->name('clients.my-account.log-out');
    //cart
    Route::get('/cart',[CartController::class,'index'])->name('clients.cart');
    Route::get('/cart/{MaSP}',[CartController::class,'addToCart'])->name('clients.add-cart');
    Route::get('/cart/update/{MaSP}/{type}',[CartController::class,'UpdateQuantity'])->name('clients.update-cart');
    Route::get('/cart/delete-item/{MaSP}',[CartController::class,'deleteItemCart'])->name('clients.delete-item-cart');
    //checkout
    Route::get('/checkout',[CheckOutController::class,'index'])->name('clients.checkout');
    Route::post('/checkout',[CheckOutController::class,'addOrder']);
    //order-tracking
    Route::get('/order-tracking',[OrderTrackingController::class,'index'])->name('clients.order-tracking');
    Route::get('/order-tracking/delete/{SoDH}-{Email}',[OrderTrackingController::class,'DismissOrder'])->name('clients.order-tracking.delete');
});

// Admin routes

Route::prefix('admin-area')->group(function() {
     Route::get('/',[HomeAdminController::class,'index'])->name('admin.home');
    //  san pham
     Route::resource('product',ProductController::class);
     Route::get('/product-modal/{id}',[ProductController::class,'getDetail'])->name('product-detail.modal');
     Route::get('/product/edit/{id}',[ProductController::class,'getDetailEdit'])->name('product.edit');
     Route::post('/product/edit/{id}',[ProductController::class,'postEditProduct']);
     Route::get('/product/delete/{id}',[ProductController::class,'deleteProduct'])->name('product.delete');

    //  hoa don nhap
     Route::get('/import-order',[ImportOrderController::class,'addImportOrder'])->name('admin.import-order.add');
     Route::post('/import-order',[ImportOrderController::class,'postAddImportOrder']);
     Route::get('/import-order/detail/{SoPN}',[ImportOrderController::class,'getDetailImportOrder']);
     Route::get('/import-order/{SoPN}',[ImportOrderController::class,'getImportOrder']);
     Route::get('/import-order/one-detail/{SoPN}-{MaSP}',[ImportOrderController::class,'getOneDetailOrder']);
     Route::get('/import-order/delete/{SoPN}',[ImportOrderController::class,'deleteImportOrder']);
     Route::get('/import-order/delete/one-detail/{SoPN}-{MaSP}',[ImportOrderController::class,'deleteOneDO']);
   
     //  don hang
     Route::get('/order',[OrderController::class,'index'])->name('admin.order');
     Route::get('/order/detail/{SoDH}-{Email}',[OrderController::class,'getDetailOrder']);
     Route::get('/order/update/{SoDH}-{Email}-{TTDH}',[OrderController::class,'updateStatus']);
     Route::get('/order/pdf/{SoDH}-{Email}',[OrderController::class,'generatePDF'])->name('admin.order.pdf');
     Route::get('/thongke',[OrderController::class,'ThongKe']);

    //  taikhoan
    Route::get('/account',[AccountUserController::class,'index'])->name('admin.account');
});
