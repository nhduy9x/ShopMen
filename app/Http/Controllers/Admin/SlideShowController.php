<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SlideShow;
use App\Http\Requests\PageRequest;
use Str;
class SlideShowController extends Controller
{
    public function list(){
       
    	$pages=SlideShow::all();
    	
    	return view('admin.slide.list',compact('pages'));
    }
    public function add(){
    	$page=new SlideShow();
       
    	return view('admin.slide.form',compact('page'));
    }
    public function getup($id){
    	$page=SlideShow::find($id);
    	
        return view('admin.slide.form',compact('page'));
    }
    public function delete(SlideShow $class){
        $class->delete();
        return redirect(route('list.page'));
    }
    public function save(Request $request){
        // dd($request->all());
    	if (isset($request->id)) {
    		$model=SlideShow::find($request->id);
    	}else{
    		$model=new SlideShow();

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
        // dd($request->all());
        $model->fill($request->all());
        // dd( $request->all());
        
        $model->save();
        return redirect(route('list.slide'));
    }
}
