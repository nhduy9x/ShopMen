<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Product;
use App\Models\Category;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Http\Requests\ClassUserRequest;
use Illuminate\Support\Str;
class UserController extends Controller
{
	public function list(){
    	$users=User::all();
    	// dd(User::all());
    	return view('admin.users.list',compact('users'));
    }
    public function active(Request $request){
    	// dd($request->active);
    	$model=User::find($request->id);
    	if(Auth::user()->id==1 || Auth::user()->id==2){
    		$model->is_active=$request->is_active;
    	}else if($model->is_active<1){
    		// dd($request->is_active);
    		$model->is_active=$request->is_active;
    		// $model->save();
    	
    	}else{
    		return redirect(route('list.user'))->withErrors(['errorcancel'=>'user ko quyen cancel active!']);
    	}
    	$model->save();
    	return redirect()->back();
    }
    public function add(){
    	$user=new User();
    	return view('admin.users.form',compact('user'));
    }
    public function getup($id){
    	$user=User::find($id);
    	return view('admin.users.form',compact('user'));
    }
    public function delete(user $class){
        
        if(Auth::user()->id==1 || Auth::user()->id==2){
            $class->delete();
        }else{
            return redirect(route('list.user'))->withErrors(['errorcancel'=>'user ko quyen cancel active!']);
        }
        return redirect(route('list.user'));
    }
    public function save(ClassUserRequest $request){
    	if (isset($request->id)) {
    		$model=User::find($request->id);
    	} else {
    		$model=new User();
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
            $model->avatar =$file->move("img/uploads/users",$filename);
        }else if (isset($request->anh)) {
        	$model->avatar=$request->anh;
        } else {
        	return redirect(route('add.user'))->with('image', 'Không dược để trống!');
        }
        
        $model->code=str::random(6);
        $model->birthday=date("Y-m-d",strtotime($request->date));
        $model->email_verified_at=date('Y-m-d H:i:s');
        if (isset($request->pass)) {
        	$model->password=Hash::make($request->pass);
        }
        
        $model->fill($request->all());

        $model->save();
        
        return redirect(route('list.user'));
    }
   
   
}
