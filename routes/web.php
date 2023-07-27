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


Route::get('/',[FontendController::class,'index'])->name('/');
Route::get('/product/detalis/{id}',[FontendController::class,'product_detalis'])->name('product.detalis');
Route::get('/about',[FontendController::class,'about'])->name('about');

Route::get('//dashboard',[BackendController::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

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


//AttributeController

Route::get('/add/attribute',[AttributeController::class,'add_attribute'])->name('add.attribute');
Route::post('/create/attribute',[AttributeController::class,'create_attribute'])->name('create.attribute');

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
