<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\CateProduct;
use App\Models\Product_Property;
use App\Models\Product_Size_Quan;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use DB;
class ProductController extends Controller
{
    
    public function show_all_product_admin(){
        $products = DB::table('products')->join('categories_products','categories_products.id', '=', 'products.category_id')->get(
            array(
                'products.id',
                'products.name',
                'products.img',
                'products.price',
                'products.source',
                'products.slug',
                'products.short_desc',
                'products.description',
                'categories_products.name'
            )
        );
        
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
        return redirect(route('addcolor.product',$productId));
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
        
        $dataSizeQuan    =  $product->join('products_properties','products_properties.product_id','=','products.id')->join('products_size_quans','products_size_quans.product_property_id','=','products_properties.id')->where('products_size_quans.product_id','=',$id)->get(array(
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
        $data = $request->except('_token','uploadImg','category_parent','category_child');
        if($request->category_child == null){
            $data['category_id'] = $request->category_parent;
        }else{
            $data['category_id'] = $request->category_child;
        }
        $file = $request->file('uploadImg');
        
        $destinationPath = 'uploads';
        $file->move($destinationPath,$file->getClientOriginalName());
        $data['id'] =  $idmax ;
        $data['slug']=$slug;
        Product::create($data);
        return redirect(route('addcolor.product',$idmax));
    }

    public function product_add(){
        $categoriesParents = CateProduct::where('parent_id', '=', null)->get();
        $categoriesChilds = CateProduct::where('parent_id', '!=', null)->get();
        return view('admin.product.product_add',
            [
                'categoriesParents' => $categoriesParents,
                'categoriesChilds' => $categoriesChilds
            ]
        );
    }

    public function product_detail($id){
        $product = Product::find($id);
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

    public function delete($id){
        Product::find($id)->delete();
        Product_Property::where('product_id','=',$id)->delete();
        Product_Size_Quan::where('product_id','=',$id)->delete();
        return redirect(route('show_product_admin'));
    }

    
    public function edit($id){
        $product =  Product::find($id) ;
        $category =CateProduct::find($product->category_id);
        $categoriesParents = CateProduct::where('parent_id', '=', null)->get();
        $categoriesChilds = CateProduct::where('parent_id', '!=', null)->get();
        return view('admin.product.product_add',[
            'product' =>$product,
            'category' => $category,
            'categoriesParents' => $categoriesParents,
            'categoriesChilds' => $categoriesChilds
        ]);
    }

    public function update(Request $request){
        $slug=Str::slug($request->name);
        $data = $request->except('_token','id','uploadImg','category_parent','category_child');
        
        if($request->category_child == null){
            $data['category_id'] = $request->category_parent;
        }else{
            $data['category_id'] = $request->category_child;
        }
        $file = $request->file('uploadImg');
        if($file != null){
            $destinationPath = 'uploads';
            $file->move($destinationPath,$file->getClientOriginalName());
        }
        $data['slug']=$slug;
        $product = Product::find($request->id);
        $product->update($data);
        return redirect(route('show_product_admin'));
    }
}
