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



Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::group(['middleware' => 'ipcheck'], function () {     
    
 //Guest
Route::get('/', 'App\Http\Controllers\PagesController@home')->name('home');
Route::get('/search', 'App\Http\Controllers\PagesController@search')->name('search');
Route::post('/search', 'App\Http\Controllers\PagesController@searchquery');
Route::get('/offers', 'App\Http\Controllers\PagesController@offers')->name('offers');
Route::get('/top-sellers', 'App\Http\Controllers\PagesController@topsellers')->name('topsellers');
Route::get('/feedback', 'App\Http\Controllers\PagesController@feedback')->name('feedback');
Route::get('/checkout/details', 'App\Http\Controllers\PagesController@proceed');
Route::get('/buy/{id}/checkout', 'App\Http\Controllers\PagesController@checkout');
Route::any('/buy/{id}/addtocart', 'App\Http\Controllers\PagesController@addtocart')->name('addtocart');
Route::get('/mycart', 'App\Http\Controllers\PagesController@mycart')->name('mycart');
Route::any('/mycart/remove/{id}', 'App\Http\Controllers\PagesController@removefromcart')->name('removefromcart');
Route::post('/order', 'App\Http\Controllers\PagesController@placeorder')->name('placeorder');
Route::get('/order/{token}', 'App\Http\Controllers\PagesController@vieworder')->name('vieworder');
Route::get('/about', 'App\Http\Controllers\PagesController@about');
Route::get('/contact', 'App\Http\Controllers\PagesController@contact');   
    
});

Auth::routes();

//User
    Route::get('/myaccount', 'App\Http\Controllers\DashboardController@index')->name('myaccount');
    Route::get('/myorders', 'App\Http\Controllers\DashboardController@myorders')->name('myorders');
//Admin
Route::get('/home', 'App\Http\Controllers\DashboardController@index');
Route::put('/msg', 'App\Http\Controllers\AdminController@msg');
Route::get('/users', 'App\Http\Controllers\AdminController@users')->name('users');
Route::get('/dashboard', 'App\Http\Controllers\AdminController@index')->name('dashboard');
Route::get('/all-products', 'App\Http\Controllers\AdminController@products')->name('allproducts');
Route::get('/orders', 'App\Http\Controllers\AdminController@uniqueorders')->name('singleorders');
Route::get('/order-list', 'App\Http\Controllers\AdminController@uniqueorders')->name('orders');
Route::get('/orders/delivered-list', 'App\Http\Controllers\AdminController@deliveredlist');
Route::get('/orders/cancelled-list', 'App\Http\Controllers\AdminController@cancelledlist');
Route::any('/orders/delete/{id}', 'App\Http\Controllers\AdminController@orderdelete')->name('deleteorder');
Route::get('/orders/{filter}', 'App\Http\Controllers\AdminController@filterorders');
//Route::get('/discount', 'App\Http\Controllers\AdminController@discount')->name('viewoffers');
Route::post('/discount/{id}', 'App\Http\Controllers\AdminController@offer')->name('discount');
Route::resource('admin', 'App\Http\Controllers\AdminController');
Route::get('/products/download-list', 'App\Http\Controllers\AdminController@productlist');
Route::get('/products/download-cat/{id}', 'App\Http\Controllers\AdminController@categorylist');
//Status

Route::post('/delivered/{id}', 'App\Http\Controllers\AdminController@delivered');
Route::post('/cancel/{id}', 'App\Http\Controllers\AdminController@cancel');

Route::resource('category', 'App\Http\Controllers\CategoryController');
Route::get('/category/{id}/view', 'App\Http\Controllers\CategoryController@view');

Route::resource('products', 'App\Http\Controllers\ProductsController');


Route::get('category/{id}/{slug}', ['as' => 'category.single', 'uses' => 'App\Http\Controllers\PagesController@singleCategory'])->where('slug', '[\w\d\-\_]+');

