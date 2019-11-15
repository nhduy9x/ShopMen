<?php
Route::group(['prefix'=>'cart'],function(){
	
	
	Route::get('add','Member\CartController@addcart')->name('add.cart');
});
Route::get('check-out','Member\CartController@checkout')->name('ckeck.out');
Route::post('check-code','Member\CartController@checkCode')->name('check.code');
Route::post('pay','Member\CartController@pay')->name('pay');
Route::get('pay-success',function(){
	echo 'mua thành công';
})->name('pay.success');
