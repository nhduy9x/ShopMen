<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\CatePost;
use App\Http\Requests\ClassPostRequest;
use Illuminate\Support\Str;
class PostController extends Controller
{
    public function list(){
       
    	$post=Post::all();
    	
    	return view('admin.post.list',compact('post'));
    }
    public function add(){
    	$post=new Post();
        $cates=CatePost::all();
    	return view('admin.post.form',compact('post','cates'));
    }
    public function getup($id){
    	$post=Post::find($id);
    	$cates=CatePost::all();
        return view('admin.post.form',compact('post','cates'));
    }
    public function delete(Post $class){
        $class->delete();
        return redirect(route('list.post'));
    }
    public function save(ClassPostRequest $request){
    	if (isset($request->id)) {
    		$model=Post::find($request->id);
    	}else{
    		$model=new Post();

    	}
        
    	if ($request->hasFile('images')>0) {

            $ext = $request->images->extension();

            // lay ten anh go
            $filename = $request->images->getClientOriginalName();
            
            // ten anh + string random + duoi
            $filename = $filename . "-" . str::random(20) . "." . $ext;
            $file=$request->file('images');
           
            $model->image =$file->move("img/uploads/users",$filename);

            // $model->image=$request->file('images')->store('img/uploads');
        }else if(isset($request->anh)){
         $model->image=$request->anh;
        }else{
           return redirect()->back()->withErrors([
            'images' => 'Vui lòng chọn'
            ]); 
        }
        
        $model->slug=str::slug($request->title.'-'.microtime());
        $model->fill($request->all());
        $model->save();
        return redirect(route('list.post'));
    }
}
