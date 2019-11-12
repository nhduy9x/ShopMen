<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\AttributeSize;
use App\Models\CateProduct;
use App\Models\Image;
use App\Http\Requests\ClassProductRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use DB;
class ProductController extends Controller
{
    
    public function list(){
      
        $cates=CateProduct::all();
        
    	$products=Product::all();
    	
    	return view('admin.products.list',compact('products','cates'));
    }
    public function add(){
    	$product=new Product();
    	$cates=CateProduct::all();
    	return view('admin.products.form',compact('product','cates'));
    }
    public function getup($id){
    	$product=Product::find($id);
    	$cates=CateProduct::all();
    	return view('admin.products.form',compact('product','cates'));
    }
    public function delete(Product $class){
        $class->delete();
        return redirect(route('list.product'));
    }
    public function save(ClassProductRequest $request){
    	if (isset($request->id)) {
    		$model=Product::find($request->id);
    	}else{
    		$model=new Product();

    	}
        $model->slug=str::slug($request->name.'-'.microtime());
        
        
    	if ($request->hasFile('image')>0) {
            // lay ra duoi anhs
            $ext = $request->image->extension();

            // lay ten anh go
            $filename = $request->image->getClientOriginalName();

            // sinh ra ten anh moi theo dang slug
            $filename = str::slug(str_replace("." . $ext, "", $filename));
            
            // ten anh + string random + duoi
            $filename = $filename . "-" . str::random(20) . "." . $ext;
            $file=$request->file('image');
            $model->img =$file->move("img/uploads/products",$filename);
        }else if (isset($request->anh)) {
            $model->img=$request->anh;
        } else {
            return redirect()->back()->with('image', 'Không dược để trống!');
            
        }
        $model->fill($request->all());
        $model->save();
        return redirect(route('addcolor.product',$model->id));
    }
    public function addcolor(Request $req,$id){
        $product=Product::find($id);
        // $dataSizeQuan    =  $product->join('attributes','attributes.product_id','=','products.id')->join('attribute_sizes','attribute_sizes.attribute_id','=','attributes.id')->where('attribute_sizes.product_id','=',$id)->get(array(
        //     'color',
        //     'size',
        //     'qty'
        // ))->groupBy('color');
        $attribute=Attribute::all();
        $data = $product->attributes()->get();
        // dd($dataSizeQuan);
        return view('admin.products.formcolor',
        [
            'id' => $id,
            'data' =>$data,
            
        ]);
    }
   public function post_add_addcolor(Request $request){
        $idmax = Attribute::all()->max('id')+1;
        $data = $request->except('_token','size','qty','image');
        
        $data['id'] = $idmax ;
        // dd($idmax);
        $dataSM = $request->except('_token','color','uploadImg','price','image','sale_percent','product_id');
        // dd($dataSM);
        $dataSizeQuan = [];
        $size = $request->size;
        foreach($size as $i){
            array_push($dataSizeQuan,["product_id"=>$request->product_id,"attribute_id"=>$idmax]);
        }
        // dd($dataSM);
        foreach($dataSM as $key => $item){
            // dd($key,$item);
            for($i=0; $i< count($item); $i++){
                // dd($item[$i]);
                $dataSizeQuan[$i][$key] = $item[$i];
            }
        }
        if ($request->hasFile('image')>0) {
            // lay ra duoi anhs
            $ext = $request->image->extension();

            // lay ten anh go
            $filename = $request->image->getClientOriginalName();

            // sinh ra ten anh moi theo dang slug
            $filename = str::slug(str_replace("." . $ext, "", $filename));
            
            // ten anh + string random + duoi
            $filename = $filename . "-" . str::random(20) . "." . $ext;
            $file=$request->file('image');
            $img =$file->move("img/uploads/products",$filename);
        }
        $data['img']=$img;
        // dd($data);
        // $file = $request->file('uploadImg');
        // $destinationPath = 'uploads';
        // $file->move("img/uploads/productss",$file->getClientOriginalName());
        // $urlImg = $file->getClientOriginalName();
        // dd($data);
        $att=Attribute::create($data);
        // dd($dataSizeQuan);
       // $size= DB::table('attribute_sizes')->insert($dataSizeQuan);
        $size=AttributeSize::create($dataSizeQuan);
        // dd($size);
        return back()->withInput();
    }
   

}
