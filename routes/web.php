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
    return view('client.home');
})->name('home');

Route::get('product', 'HomeController@product')->name('product');
// Route::get('product-detail/{slug}','HomeController@productdetail');

Route::get('dashboard', function () {
    return view('admin.dashboard');
});
Route::get('/product-detail/{slug}','HomeController@product_detail')->name('detail.product');
Route::get('page/{slug}','HomeController@page')->name('page');





Route::get('login','Auth\LoginController@getLogin')->name('login');
Route::post('login','Auth\LoginController@postLogin');
Route::get('logout','Auth\LoginController@logout')->name('logout');
Route::get('register','Auth\RegisterController@getRegister')->name('register');
Route::post('register','Auth\RegisterController@register');
Route::get('check',function(){
	echo "string";
})->name('check');
Route::get('verify/{id}','Auth\RegisterController@verify')->name('verify');
Route::post('verify/{id}','Auth\RegisterController@postverify');
Route::get('success/{id}','Auth\RegisterController@success')->name('success');
Route::get('find-password','Auth\ResetPasswordController@findpass')->name('findpass');
Route::post('find-password','Auth\ResetPasswordController@postfindpass');
Route::get('rest-password/{id}','Auth\ResetPasswordController@rest')->name('rest.pass');
Route::post('rest-password/{id}','Auth\ResetPasswordController@postRest');
Route::get('send-user/{id}','Auth\ResetPasswordController@send')->name('send.user');
Route::get('password-success/{id}','Auth\ResetPasswordController@PassSuccess')->name('pass.success');
Route::get('check','HomeController@check')->name('check');
// Route::group(['prefix'=>'shop-men/admin'],function(){
	
// });