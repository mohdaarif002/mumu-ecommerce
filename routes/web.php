<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user_controller;
use App\Http\Controllers\product_controller;

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




Route::post('/login',[user_controller::class,'login']);


Route::get('/',[product_controller::class,'index']);
Route::get('/detail/{id}',[product_controller::class,'detail']);
Route::get('/search',[product_controller::class,'search']);
Route::post('/add_to_cart',[product_controller::class,'add_to_cart']);




Route::post('/signUP',[user_controller::class,'signup']);
Route::get('/login', function () {
    return view('login');
});
Route::get('/signup', function () {
    return view('signup');
});




Route::get('/remove-product/{cartId}',[product_controller::class,'removeProduct']);
Route::get('/order-now',[product_controller::class,'orderNow']);







Route::get('/logout',[product_controller::class,'logout']);


Route::group(['middleware'=>['user_login_other_checks']],function(){   
    
Route::get('/cart-list',[product_controller::class,'cartList']);
Route::get('/my-order',[product_controller::class,'myOrder']);
Route::get('/buy-now',[product_controller::class,'buyNow']);
Route::post('/order-place',[product_controller::class,'orderPlace']);

});
