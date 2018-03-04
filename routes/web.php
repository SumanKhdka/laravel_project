<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    Route::resource('/categories','AdminCategoryController');
    Route::resource('/products','AdminProductController');
    Route::resource('/customers','AdminCustomerController');
    Route::resource('/customer/groups','AdminCustomerGroupController');
    Route::resource('/banners','AdminBannerController');
    Route::resource('/contacts','AdminContactController');
    Route::resource('/pages','AdminPageController');
    Route::resource('/brands','AdminBrandController');
    Route::resource('/coupons','AdminCouponController');
    Route::post('/coupons/send','AdminCouponController@send');
    Route::resource('/users','AdminUserController');

    Route::get('login/(provider)', 'Auth\RegisterController@redirectToProvider');
    Route::get('login/(provider)/callback', 'Auth\RegisterController@handleProviderCallback');

});
  /*  Route::group(['prefix'=>'coupons'],function(){
        Route::resource('/','AdminCouponController');
        Route::post('/send','AdminCouponController@send');
    
});
*/


