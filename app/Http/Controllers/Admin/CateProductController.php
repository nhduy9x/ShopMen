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
        $cates=CateProduct::paginate(10);
        // $cates=CateProduct::all();
        return view('admin.category.list',compact('cates'));
    }
    public function form_add(){
        $categoriesParent = CateProduct::where('parent_id', '=', null)->get();
        return view('admin.category.form_add',
            [
                'categoriesParent' => $categoriesParent
            ]
        );
    }
    public function form_update($id){
        $category = CateProduct::find($id);
        $categoriesParent = CateProduct::where('parent_id', '=', null)->get();
        
        return view('admin.category.form_add',
            [
                'categoriesParent' => $categoriesParent,
                'category' => $category
            ]
        );
    }

    public function post_add(Request $request){
       $category =  $request->except('_token');
       $category['slug']=Str::slug($request->name);
       CateProduct::insert($category);
       return redirect(route('list.cate.product'));
    }

    public function post_update(Request $request){
        $id = $request->id;
        $data = $request->except('_token');
        $category = CateProduct::find($id);
        $category->update($data);
        return redirect(route('list.cate.product'));
    }
}
