<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CateProduct;
use App\Http\Requests\ClassCateProductRequest;
use Illuminate\Support\Str;
class CateProductController extends Controller
{
    public function show_all_product(){
        $categories = CateProduct::all();
        return view('admin.category.categories',
            [
                'categories' => $categories
            ]
        );
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
       if(isset($request->parent_id)){
            $categoriesParentName = CateProduct::find($request->parent_id)->name ;
            $category['parent_name'] = $categoriesParentName;
       }
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

    public function delete($id){
        $category = CateProduct::find($id);
        $categoryParent  = $category->parent_id;
        if(!isset($categoryParent)){
            $category->delete();
            CateProduct::where('parent_id', '=' , $id)->delete();
        }
        $category->delete();
        return redirect(route('list.cate.product'));
    }
}
