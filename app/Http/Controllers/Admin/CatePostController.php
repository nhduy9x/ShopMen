<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CatePost;
use App\Http\Requests\ClassCateProductRequest;
use Illuminate\Support\Str;
class CatePostController extends Controller
{
    public function list(){
       
        $cates=CatePost::all();
       
        return view('admin.cate_post.list',compact('cates'));
    }
    public function add(){
        $cate=new CatePost();
        $cates=CatePost::all();
        return view('admin.cate_post.form',compact('cate','cates'));
    }
    public function getup($id){
        $cate=CatePost::find($id);
        $cates=CatePost::all();
        return view('admin.cate_post.form',compact('cate','cates'));
    }
    public function delete(CatePost $class){
        $class->delete();
        return redirect(route('list.catepost'));
    }
    public function save(ClassCateProductRequest $request){
        if (isset($request->id)) {
            $model=CatePost::find($request->id);
        }else{
            $model=new CatePost();

        }
        $model->slug=str::slug($request->name.'-'.microtime());
        $model->fill($request->all());
        $model->save();
        return redirect(route('list.catepost'));
    }
}
