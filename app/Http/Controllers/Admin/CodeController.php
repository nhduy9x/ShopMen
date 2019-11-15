<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Discount_Code;
use App\Http\Requests\CodeRequest;
use Illuminate\Support\Str;
class CodeController extends Controller
{
    public function list(Request $req){
    	$codes=Discount_Code::all();
    	if (isset($req->id)) {
    		$code=Discount_Code::find($req->id);
    	} else {
    		$code= new Discount_Code();
    		# code...
    	}

    	return view('admin.orders.code',compact('codes','code'));
    }
    public function save(CodeRequest $req){
    	if (isset($req->id)) {
    		$model=Discount_Code::find($req->id);
    	} else {
    		$model=new Discount_Code();
    	}
    	$model->time_expired=date("Y-m-d",strtotime($req->date));
    	if (empty($req->id)) {
    		$model->code_name=Str::random(10);
    	}
    	
    	$model->fill($req->all());
    	$model->save();
    	if (isset($req->id)) {
    		return redirect(route('code'));
    	} else {
    		return redirect()->back();
    	}
    	
    }
}
