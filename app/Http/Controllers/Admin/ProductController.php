<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\AttributeSize;
use App\Models\CateProduct;
use App\Models\Image;
use App\Models\Product_Property;
use App\Models\Product_Size_Quan;
use App\Http\Requests\ClassProductRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use DB;
class ProductController extends Controller
{
    
    public function show_all_product(){
        $products = Product::all() ;
        return view('admin.product.products',
            [
                'products' => $products
            ]
        );
    }

    public function upsizequan(Request $request, $id){
        $file = $request->file('uploadImg');
        if($file != null){
            $destinationPath = 'uploads';
            $file->move($destinationPath,$file->getClientOriginalName());
        }
        $productId = Product_Property::find($id)->product_id;
        $dataUpdate =  $request->except('_token','size','quantity','uploadImg') ;
        $dataSM = $request->except('_token','color','price','img','sale_percent','uploadImg');
        $dataSizeQuan = [];
        $size = $request->size;
        foreach($size as $i){
            array_push($dataSizeQuan,["product_id"=>$productId,"product_property_id"=>$id]);
        }
        foreach($dataSM as $key => $item){
            for($i=0; $i< count($item); $i++){
                $dataSizeQuan[$i][$key] = $item[$i];
            }
        }
        Product_Property::find($id)->update($dataUpdate);
        Product_Size_Quan::where('product_property_id','=',$id)->delete();
        Product_Size_Quan::insert($dataSizeQuan);
        return redirect('/add-property/' .$productId);
    }

    public function update_property($id){
        $property = Product_Property::find($id);
        $sizequan = $property->product_size_quan()->get();
        return view('admin.product.update_property',[
            'property' => $property,
            'sizequan' => $sizequan
        ]);
    }

    public function delete_property($id){
        Product_Size_Quan::where('product_property_id','=',$id)->delete();
        Product_Property::find($id)->delete();
        return back()->withInput();
    }

    public function post_add_property(Request $request){
        $idmax = Product_Property::all()->max('id') +1;
        $data = $request->except('_token','size','quantity','uploadImg');
        $data['id'] = $idmax ;
        
        $dataSM = $request->except('_token','uploadImg','color','price','img','sale_percent','product_id');
        $dataSizeQuan = [];
        $size = $request->size;
        foreach($size as $i){
            array_push($dataSizeQuan,["product_id"=>$request->product_id,"product_property_id"=>$idmax]);
        }
        foreach($dataSM as $key => $item){
            for($i=0; $i< count($item); $i++){
                $dataSizeQuan[$i][$key] = $item[$i];
            }
        }
        $file = $request->file('uploadImg');
        $destinationPath = 'uploads';
        $file->move($destinationPath,$file->getClientOriginalName());
        $urlImg = $file->getClientOriginalName();
        Product_Property::create($data);
        Product_Size_Quan::insert($dataSizeQuan);
        return back()->withInput();
    }

    public function add_property($id){
        $product = Product::find($id);
        $dataSizeQuan    =  $product->join('product_properties','product_properties.product_id','=','products.id')->join('product_size_quans','product_size_quans.product_property_id','=','product_properties.id')->where('product_size_quans.product_id','=',$id)->get(array(
            'color',
            'size',
            'quantity'
        ))->groupBy('color');
        $data = $product->product_propety()->get();
        return view ('admin.product.add_property',
        [
            'id' => $id,
            'data' =>$data,
            'sizequan' => $dataSizeQuan
        ]);
    }

    public function post_product_add(Request $request){
        $idmax = Product::all()->max('id') +1;
        $slug=Str::slug($request->name);
        $data = $request->except('_token','uploadImg');
        $file = $request->file('uploadImg');
        $destinationPath = 'uploads';
        $file->move($destinationPath,$file->getClientOriginalName());
        $data['id'] =  $idmax ;
        // dd($data);
        $data['slug']=$slug;
        Product::create($data);
        return redirect(route('addcolor.product',$idmax));
    }

    public function product_add(){
        // $categoriesParent = Category::where('parent_id', '=', null)->get();
        // $categoriesChild = Category::where('parent_id', '!=', null)->get(array(
        //     'id',
        //     'name',
        //     'parent_id'
        // ))->groupBy('parent_id');
        // dd($categoriesChild);
        return view('admin.product.product_add');
    }

    public function product_detail($id){
        $product = Product::find($id);
        $productProperties = $product->product_propety()->get();
        
        $dataSizeQuan    =  $product->join('products_properties','products_properties.product_id','=','products.id')->join('products_size_quan','products_size_quan.product_property_id','=','products_properties.id')->where('products_size_quan.product_id','=',$id)->get(array(
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

}
