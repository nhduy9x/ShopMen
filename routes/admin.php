<?php 
use Illuminate\Http\Request;
Route::get('/',function () {
    return view('admin.index');
	})->name('dashboard');

Route::group(['prefix'=>'category-product'],function(){
	Route::get('/','Admin\CateProductController@show_all_product')->name('list.cate.product');

    Route::get('/add','Admin\CateProductController@form_add')->name('get.cate.product');
    Route::post('/add','Admin\CateProductController@post_add');
    
    Route::get('/edit/{id}','Admin\CateProductController@form_update')->name('up.cate.product');
    Route::post('/update','Admin\CateProductController@post_update');

	Route::get('/delete/{id}','Admin\CateProductController@delete')->name('delete.cate.product');

});
Route::group(['prefix'=>'slide'],function(){
		Route::get('list','Admin\SlideShowController@list')->name('list.slide');
		Route::get('add','Admin\SlideShowController@add')->name('add.slide');
		Route::get('up/{id}','Admin\SlideShowController@getup')->name('up.slide');
		Route::get('delete/{class}','Admin\SlideShowController@delete')->name('delete.slide');
		Route::post('add-and-up','Admin\SlideShowController@save')->name('save.slide');
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
     Route::get('/','Admin\productController@show_all_product_admin')->name('show_product_admin');
    Route::get('/add','Admin\productController@product_add')->name('add_product');
    Route::post('/add','Admin\productController@post_product_add')->name('post_product');;

    Route::get('/add-property/{id}','Admin\productController@add_property')->name('addcolor.product');
    Route::post('/add-property','Admin\productController@post_add_property')->name('add_property_product');

    Route::get('/delete-property/{id}','Admin\productController@delete_property');
    Route::get('/update-property/{id}','Admin\productController@update_property');
    Route::post('/update-property/{id}','Admin\productController@upsizequan')->name('update_property_product');
	
	Route::get('/delete/{id}','Admin\productController@delete')->name('delete.product');
	Route::get('/edit/{id}','Admin\productController@edit')->name('edit.product');
	Route::post('/edit','Admin\productController@update')->name('update.product');
    
});	
Route::group(['prefix'=>'user'],function(){
		Route::get('list','Admin\UserController@list')->name('list.user');
		Route::get('add','Admin\UserController@add')->name('add.user');
		Route::get('up/{id}','Admin\UserController@getup')->name('up.user');
		Route::get('delete/{class}','Admin\UserController@delete')->name('delete.user');
		Route::post('add-and-up','Admin\UserController@save')->name('save.user');
	});
Route::group(['prefix'=>'setting'],function(){
		Route::get('list','Admin\SettingController@list')->name('list.setting');
		Route::get('add','Admin\SettingController@add')->name('add.setting');
		Route::get('up/{id}','Admin\SettingController@getup')->name('up.setting');
		Route::get('delete/{class}','Admin\SettingController@delete')->name('delete.setting');
		Route::post('add-and-up','Admin\SettingController@save')->name('save.setting');	
});
Route::group(['prefix'=>'discount-code'],function(){
	Route::get('list', 'Admin\CodeController@list')->name('code');
	Route::post('save','Admin\CodeController@save')->name('save');
});

Route::get('don-hang','Admin\OrderController@list')->name('donhang');














 ?>