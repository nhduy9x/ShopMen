<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\AttributeSize;
use App\Models\CateProduct;
use App\Models\Image;
use App\Models\Product_Property;
use App\Models\Product_Size_Quan;
class HomeController extends Controller
{
	public function product_detail($id){
        $product = Product::find($id);
        $productProperties = $product->product_propety()->get();
        
         $dataSizeQuan    =  $product->join('product_properties','product_properties.product_id','=','products.id')->join('product_size_quans','product_size_quans.product_property_id','=','product_properties.id')->where('product_size_quans.product_id','=',$id)->get(array(
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

    // public function productdetail($slug){
    // 	$product=Product::where('slug',$slug)->first();
    // 	return view('home.product-detail',compact('product'));
    // }
    // public function productdetail($slug){
    //     $product = Product::where('slug',$slug)->first();
    //     $id=$product->id;
    //     $productProperties = $product->attributes()->get();
    //     // dd($productProperties);
    //     $dataSizeQuan    =  $product->join('attributes','attributes.product_id','=','products.id')->join('attribute_sizes','attribute_sizes.attribute_id','=','attributes.id')->where('attribute_sizes.product_id','=',$id)->get(array(
    //         'color',
    //         'size',
    //         'qty'
    //     ))->groupBy('color');
    //     // $dataSizeQuanbutesizes();
    //     // dd($dataSizeQuan);
    //     return view('home.product-detail',
    //         [
    //             'product' => $product,
    //             'productProperties' => $productProperties,
    //             'dataSizeQuan' =>$dataSizeQuan
    //         ]
    //     );
    // }
    public function product(){
    	$products=Product::paginate(15);
    	return view('home.product',compact('products'));
    }
}
