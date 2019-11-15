<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Darryldecode\Cart\CartCondition;
use Auth;
use App\Models\Discount_Code;
use App\Models\Address;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Http\Requests\AddressRequest;
use App\Models\Product_Size_Quan;
use App\Models\Product_Property;
use Str;
class CartController extends Controller
{
    
    public function addcart(Request $req){
         $item = \Cart::session(Auth::user()->id)->add(array(
          'id' => $req->id,
          'name' => $req->name,
          'price' => $req->price,
          'quantity' => $req->qty,
          'attributes' => array('image'=>$req->image,'color'=>$req->color,'size'=>$req->size)
        ));
        return redirect()->back();
    }
    public function checkout(Request $req){
        $date= date('Y-m-d');
        if (isset($req->code)) {
            $code=Discount_Code::where('code_name',$req->code)->first();
            if (isset($code)) {
                # code...
                if ($code->time_expired>=$date && $code->stocks>=1) {
                    # code...
                   $condition = new \Darryldecode\Cart\CartCondition(array(
                        'name' => $code->code_name,
                        'type' => $code->type,
                        'target' => $code->target, // this condition will be applied to cart's subtotal when getSubTotal() is called.
                        'value' => $code->value,
                    ));
                   \Cart::session(Auth::user()->id)->condition($condition);
                  
                } else {  
                $condition = new Discount_Code();  
                 \Cart::session(Auth::user()->id)->clearCartConditions();    
                   return redirect()->back()->with('error','mã giảm giá hết lượt hoặc hết hạn');
                }
                
            } else {
                $condition = new Discount_Code();
                \Cart::session(Auth::user()->id)->clearCartConditions();
                return redirect()->back()->with('error','mã giảm giá không tồn tại');
            }
        }else{
             \Cart::session(Auth::user()->id)->clearCartConditions();
            $condition = new Discount_Code();
        }

        
        $carts =\Cart::session(Auth::user()->id)->getContent();
        $SubTotal = \Cart::session(Auth::user()->id)->getSubTotal();
        $cartTotal = \Cart::session(Auth::user()->id)->getTotal();
       // dd($carts);
        return view('client.checkout',compact('carts','cartTotal','SubTotal','condition'));
    }
    public function pay(AddressRequest $req){
        $carts =\Cart::session(Auth::user()->id)->getContent();
        $Address=new Address();
        $Address->user_id=Auth::user()->id;
        // dd($Address);
        $Address->fill($req->all());
        $Address->save();
        $order=new Order();
        $order->user_id=Auth::user()->id;
        $order->name='#'.Str::random(13);
        $order->address_id=$Address->id;
        $order->total=\Cart::session(Auth::user()->id)->getTotal();
        $order->save();
        $order_detail=new OrderDetail();
        foreach ($carts as $cart) {
            $order_detail->product_id=$cart->id;
            $order_detail->order_id=$order->id;
            $order_detail->color=$cart->attributes['color'];
            $order_detail->size=isset($cart->attributes['size'])?$cart->attributes['size']:'null size';
            $order_detail->qty=$cart->quantity;
            $order_detail->total=$cart->quantity*$cart->price;
            $order_detail->save();
            $color=Product_Property::where('product_id',$cart->id)->orwhere('color',$cart->attributes['color'])->first()->id;
            $size=Product_Size_Quan::where('size',$cart->attributes['size'])->where('product_id',$cart->id)->orwhere('product_property_id',$color)->first();
            // dd($size);
            $qty=$size->quantity-$cart->quantity;
            $size->quantity=$qty;
            $size->save();
            \Cart::session(Auth::user()->id)->remove($cart->id);

        }
        \Cart::session(Auth::user()->id)->clearCartConditions();
        return redirect(route('pay.success'));


    }
   
}
