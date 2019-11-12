<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\AttributeSize;
use App\Models\CateProduct;
class HomeController extends Controller
{
    public function productdetail($slug){
    	$product=Product::where('slug',$slug)->first();
    	return view('home.product-detail',compact('product'));
    }
}
