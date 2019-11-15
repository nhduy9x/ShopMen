<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Http\Requests\SettingRequest;
use App\Http\Requests\PageRequest;
use Str;
class SettingController extends Controller
{
   public function list(){
       
    	$setting=Setting::orderBy('id','desc')->first();
    	
    	return view('admin.setting.list',compact('setting'));
    }
    public function add(){
    	$setting=new Setting();
       
    	return view('admin.setting.form',compact('setting'));
    }
    public function getup($id){
    	$setting=Setting::find($id);
    	// dd($Setting);
        return view('admin.setting.form',compact('setting'));
    }
    public function delete(Setting $class){
        $class->delete();
        return redirect(route('list.setting'));
    }
    public function save(SettingRequest $request){
        // dd($request->all());
    	if (isset($request->id)) {
    		$model=Setting::find($request->id);
    	}else{
    		$model=new Setting();

    	}
        
    	if ($request->hasFile('image')>0) {

            $ext = $request->image->extension();

            // lay ten anh go
            $filename = $request->image->getClientOriginalName();
            
            // ten anh + string random + duoi
            $filename = $filename . "-" . str::random(20) . "." . $ext;
            $file=$request->file('image');
           
            $model->logo_img =$file->move("img/uploads/users",$filename);

            // $model->image=$request->file('images')->store('img/uploads');
        }else {
         $model->logo_img=$request->anh;
        }
        // dd($request->all());
        $model->fill($request->all());
        $model->save();
        return redirect(route('list.setting'));
    }
}
