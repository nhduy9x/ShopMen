<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CateProduct;
use App\Http\Requests\ClassCateProductRequest;
use Illuminate\Support\Str;
class CateProductController extends Controller
{
    public function list(){
       
        $cates=CateProduct::all();
     
        return view('admin.categories.list',compact('cates'));
    }
    public function add(){
        $cate=new CateProduct();
        $cates=CateProduct::all();
        return view('admin.categories.form',compact('cate','cates'));
    }
    public function getup($id){
        $cate=CateProduct::find($id);
        $cates=CateProduct::all();
        return view('admin.categories.form',compact('cate','cates'));
    }
    public function delete(CateProduct $class){
        $class->delete();
        return redirect(route('list.cate'));
    }
    public function save(ClassCateProductRequest $request){
        if (isset($request->id)) {
            $model=CateProduct::find($request->id);
        }else{
            $model=new CateProduct();

        }
        $model->slug=str::slug($request->name.'-'.microtime());
        $model->fill($request->all());
        $model->save();
        return redirect(route('list.cate'));
    }
}
