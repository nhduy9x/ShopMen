<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\AttributeSize;
use App\Models\CateProduct;
use App\Models\Image;
use App\Models\Page;
use App\Models\Product_Property;
use App\Models\Product_Size_Quan;
class HomeController extends Controller
{
	public function product_detail($slug){
        $product = Product::where('slug',$slug)->first();
        $id=$product->id;
        $productProperties = $product->product_propety()->get();
        
         $dataSizeQuan    =  $product->join('products_properties','products_properties.product_id','=','products.id')->join('products_size_quans','products_size_quans.product_property_id','=','products_properties.id')->where('products_size_quans.product_id','=',$id)->get(array(
            'color',
            'size',
            'quantity'
        ))->groupBy('color');
        
        return view('client.product_detail',
            [
                'product' => $product,
                'productProperties' => $productProperties,
                'dataSizeQuan' =>$dataSizeQuan
            ]
        );
    }

    public function product(){
    	$products=Product::paginate(9);
    	return view('client.product',compact('products'));
    }
    public function check(){
    	return view('check');
    }
    public function page($slug){
        $page=Page::where('slug',$slug)->first();
        return view('client.page',compact('page'));
    }
}
