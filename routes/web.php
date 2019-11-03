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
    return view('admin.dashboard');
});
Route::get('dashboard', function () {
    return view('admin.dashboard');
});
Route::get('don-hang', function () {
    return view('admin.orders.list');
});
Route::get('code', function () {
    return view('admin.orders.code');
});
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
Route::get('password-success/{id}','Auth\ResetPasswordController@PassSuccess')->name('pass.success');
Route::group(['prefix'=>'admin'],function(){
	Route::group(['prefix'=>'cate'],function(){
		Route::get('list','Admin\CateProductController@list')->name('list.cate');
		Route::get('add','Admin\CateProductController@add')->name('add.cate');
		Route::get('up/{id}','Admin\CateProductController@getup')->name('up.cate');
		Route::get('delete/{class}','Admin\CateProductController@delete')->name('delete.cate');
		Route::post('add-and-up','Admin\CateProductController@save')->name('save.cate');
	});
	Route::group(['prefix'=>'catepost'],function(){
		Route::get('list','Admin\CatePostController@list')->name('list.catepost');
		Route::get('add','Admin\CatePostController@add')->name('add.catepost');
		Route::get('up/{id}','Admin\CatePostController@getup')->name('up.catepost');
		Route::get('delete/{class}','Admin\CatePostController@delete')->name('delete.catepost');
		Route::post('add-and-up','Admin\CatePostController@save')->name('save.catepost');
	});
	Route::group(['prefix'=>'post'],function(){
		Route::get('list','Admin\PostController@list')->name('list.post');
		Route::get('add','Admin\PostController@add')->name('add.post');
		Route::get('up/{id}','Admin\PostController@getup')->name('up.post');
		Route::get('delete/{class}','Admin\PostController@delete')->name('delete.post');
		Route::post('add-and-up','Admin\PostController@save')->name('save.post');
	});
	Route::group(['prefix'=>'page'],function(){
		Route::get('list','Admin\PageController@list')->name('list.page');
		Route::get('add','Admin\PageController@add')->name('add.page');
		Route::get('up/{id}','Admin\PageController@getup')->name('up.page');
		Route::get('delete/{class}','Admin\PageController@delete')->name('delete.page');
		Route::post('add-and-up','Admin\PageController@save')->name('save.page');
	});
	Route::group(['prefix'=>'product'],function(){
		Route::get('list','Admin\productController@list')->name('list.product');
		Route::get('add','Admin\productController@add')->name('add.product');
		Route::get('up/{id}','Admin\productController@getup')->name('up.product');
		Route::get('delete/{class}','Admin\productController@delete')->name('delete.product');
		Route::post('add-and-up','Admin\productController@save')->name('save.product');
	});
	Route::group(['prefix'=>'user'],function(){
		Route::get('list','Admin\UserController@list')->name('list.user');
		Route::get('add','Admin\UserController@add')->name('add.user');
		Route::get('up/{id}','Admin\UserController@getup')->name('up.user');
		Route::get('delete/{class}','Admin\UserController@delete')->name('delete.user');
		Route::post('add-and-up','Admin\UserController@save')->name('save.user');
		Route::post('user-active','Admin\UserController@active')->name('active.user');
	
	});
});