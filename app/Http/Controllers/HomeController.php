<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\AttributeSize;
use App\Models\CateProduct;
class HomeController extends Controller
{
    // public function productdetail($slug){
    // 	$product=Product::where('slug',$slug)->first();
    // 	return view('home.product-detail',compact('product'));
    // }
    public function productdetail($slug){
        $product = Product::where('slug',$slug)->first();
        $id=$product->id;
        $productProperties = $product->attributes();
        // dd($productProperties);
        $dataSizeQuan    =  $product->join('attributes','attributes.product_id','=','products.id')->join('attribute_sizes','attribute_sizes.attribute_id','=','attributes.id')->where('attribute_sizes.product_id','=',$id)->get(array(
            'color',
            'size',
            'qty'
        ))->groupBy('color');
        // $dataSizeQuanbutesizes();
        return view('home.product-detail',
            [
                'product' => $product,
                'productProperties' => $productProperties,
                'dataSizeQuan' =>$dataSizeQuan
            ]
        );
    }
}
