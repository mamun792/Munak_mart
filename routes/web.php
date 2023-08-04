<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FontendController;
use App\Http\Controllers\GoogleLoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\CouponController;


Route::get('/',[FontendController::class,'index'])->name('/');
Route::get('/product/detalis/{id}',[FontendController::class,'product_detalis'])->name('product.detalis');
Route::get('/about',[FontendController::class,'about'])->name('about');
Route::get('/add/wishlist/{id}',[FontendController::class,'wishlist'])->name('add.wishlist');
Route::get('/wishlist',[FontendController::class,'wishlist_show'])->name('wishlist');
Route::get('/wishlist/delete/{id}',[FontendController::class,'wishlist_delete'])->name('wishlist.delete');
Route::post('/custom/login',[FontendController::class,'custom_login'])->name('custom_login');
Route::get('/shop/{id}',[FontendController::class,'shop'])->name('shop');
Route::get('/Checkout',[FontendController::class,'checkout'])->name('checkout');
Route::post('/Costomer/adderss/add', [FontendController::class, 'costomer_adderss_add'])->name('costomer.adderss.add');

Route::get('/product/filter',[FontendController::class,'product_fillter'])->name('product.fillter');
Route::post('/get/color/list',[FontendController::class,'get_color_list'])->name('get.color.list');
Route::post('/add/to/card',[FontendController::class,'add_to_card'])->name('add.to.card');
Route::get('/view/card',[FontendController::class,'view_card'])->name('view.card');
Route::get('/cart/delete/{id}', [FontendController::class, 'cart_delete'])->name('cart.delete');
Route::post('/card/update/{id}',[FontendController::class,'card_update'])->name('card.update');

//CupponController
Route::get('/coupons', [CouponController::class, 'index'])->name('coupons.index');
Route::get('/coupons/create', [CouponController::class, 'create'])->name('coupons.create');
Route::post('/coupons', [CouponController::class, 'store'])->name('coupons.store');
Route::get('/coupons/{coupon}', [CouponController::class, 'show'])->name('coupons.show');
Route::get('/coupons/{coupon}/edit', [CouponController::class, 'edit'])->name('coupons.edit');
Route::put('/coupons/{coupon}', [CouponController::class, 'update'])->name('coupons.update');
Route::delete('/coupons/{coupon}', [CouponController::class, 'destroy'])->name('coupons.destroy');

Route::get('/dashboard',[BackendController::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

//CategoriesController
Route::resource('categories', CategoryController::class);
Route::get('/categories/delete/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
Route::get('/categories/edit/{id}', [CategoryController::class, 'show'])->name('categories.show');


//usersController
Route::get('/users',[UsersController::class,'users'])->name('users');
Route::post('/users/add',[UsersController::class,'add_user'])->name('users.add');
Route::get('/users/list',[UsersController::class,'user_list'])->name('users.list');

//ProductController
Route::get('/all/product',[ProductController::class,'index'])->name('all.product');
Route::get('/product/show',[ProductController::class,'product_show'])->name('product.show');
Route::post('/product/add',[ProductController::class,'product_add'])->name('product.add');
Route::get('/inventory/add/{id}',[ProductController::class,'inventory_add'])->name('inventory_add');
Route::post('/insert/inventory/{id}',[ProductController::class,'insert_inventory'])->name('insert.inventory');

//AttributeController

Route::get('/add/attribute',[AttributeController::class,'add_attribute'])->name('add.attribute');
Route::post('/create/attribute',[AttributeController::class,'create_attribute'])->name('create.attribute');
Route::post('/create/color',[AttributeController::class,'create_color'])->name('create.color');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/password/change', [ProfileController::class, 'password_change'])->name('password.change');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



//googleLiginController

Route::get('login/google', [GoogleLoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('google/callback', [GoogleLoginController::class, 'Callback'])->name('google.callback');

require __DIR__.'/auth.php';
