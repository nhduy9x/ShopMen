<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';
    
    protected $fillable = ['id','name','price', 'slug', 'category_id','description','img','short_desc','source'];
    
    public function product_propety(){
        return $this->hasMany('App\Models\Product_Property','product_id','id');
    }
    public function category(){
        return $this->belongsto('App\Models\CateProduct','id');
    }
}
