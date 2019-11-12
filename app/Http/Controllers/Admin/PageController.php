<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Catepage;
use App\Http\Requests\PageRequest;
use Illuminate\Support\Str;
class PageController extends Controller
{
    public function list(){
       
    	$pages=Page::all();
    	
    	return view('admin.pages.list',compact('pages'));
    }
    public function add(){
    	$page=new Page();
       
    	return view('admin.pages.form',compact('page'));
    }
    public function getup($id){
    	$page=Page::find($id);
    	
        return view('admin.page.form',compact('page'));
    }
    public function delete(page $class){
        $class->delete();
        return redirect(route('list.page'));
    }
    public function save(PageRequest $request){
        // dd($request->all());
    	if (isset($request->id)) {
    		$model=Page::find($request->id);
    	}else{
    		$model=new Page();

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
        }else {
         $model->image=$request->anh;
        }
        
        $model->slug=str::slug($request->title.'-'.microtime());
        $model->fill($request->all());
        $model->save();
        return redirect(route('list.page'));
    }
}
