<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_Size_Quan extends Model
{
    protected $table = 'product_size_quans';
    protected $fillable = ['id','product_id','product_property_id','quantity'];
    public function product_property(){
    	return $this->belongsto('App\Models\Product_ProperTy','id');
    }
}
