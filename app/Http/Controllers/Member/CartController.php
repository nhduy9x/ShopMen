<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Darryldecode\Cart\CartCondition;
use Auth;
class CartController extends Controller
{
    
    public function addcart(Request $req){
         $item = \Cart::session(Auth::user()->id)->add(array(
          'id' => $req->id,
          'name' => $req->name,
          'price' => $req->price,
          'quantity' => $req->qty,
          'attributes' => array('image'=>$req->image,'color'=>$req->color)
        ));
        return redirect()->back();
    }
    public function checkout(){
        $carts =\Cart::session(Auth::user()->id)->getContent();
        $cartTotal = \Cart::session(Auth::user()->id)->getTotal();
        return view('client.checkout',compact('carts','cartTotal'));
    }
    // public function test(){
    //     $carts=\Cart::getContent();
    //     return view('testcart',compact('carts'));
    // }
    // public function addcart(Request $req){
    //     echo "string";
    //     dd($req->all());
    //     die();
    // }
    // public function t(Request $req){
    //     // dd($req->price);
    //     echo "string";
    //     die();
    //     // $data=$req->except('_token');
    //     dd($req->id);
       
    //     die();
    // 	// 
    // 	$total = \Cart::getTotal();
    // 	return view('testcart',compact('cart','total'));
    // }
    // public function show(){
    //     $carts=\Cart::getContent();
    //     foreach ($carts as $key) {
    //         # code...
    //       echo $key->id;
    //     }
    //     die();
    // }
}
