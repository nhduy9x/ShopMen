<?php
Route::group(['prefix'=>'cart'],function(){
	
	
	Route::get('add','Member\CartController@addcart')->name('add.cart');
});
Route::get('check-out','Member\CartController@checkout')->name('ckeck.out');
