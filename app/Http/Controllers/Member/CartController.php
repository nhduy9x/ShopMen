<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Darryldecode\Cart\CartCondition;
class CartController extends Controller
{
    public function add(Request $req){
    	$item = \Cart::add(array(
    	  'id' => $req->id,
	      'name' => $req->name,
	      'price' => $req->price,
	      'quantity' => $req->qty,
  		));
  		return redirect()->back();
    }
    public function t(){
    	$cart=\Cart::getContent();
    	$total = \Cart::getTotal();
    	return view('testcart',compact('cart','total'));
    }
}
