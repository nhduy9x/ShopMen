<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_Property extends Model
{
    protected $table = 'product_properties';
    protected $fillable = ['id','product_id', 'color','img','price','sale_percent','sale_price'];
    public function product(){
    	return $this->belongsto('App\Models\Product','id');
    }
    public function product_size_quan(){
    	return $this->hasMany('App\Models\Product_Size_Quan','product_property_id');
    }
}
