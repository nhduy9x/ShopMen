<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use View;
use App\User;
use App\Models\CateProduct;
use Darryldecode\Cart\CartCondition;
use Auth;
use App\Models\Page;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.client.header', function ($view) {
            $cates=CateProduct::all();
            $pages=Page::all();
            // $carts=\Cart::getContent();
           
            if (!empty(Auth::user())) {
                        $carts =\Cart::session(Auth::user()->id)->getContent();
                   } else {
                        $carts =new \Cart();
                   }
                          
           
               
            $cartTotal = \Cart::getTotal();
            $view->with(['cates'=>$cates,'pages'=>$pages,'carts'=>$carts,'total'=>$cartTotal]);
        });
      
    }
}
