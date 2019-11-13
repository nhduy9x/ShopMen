<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';
	
    protected $fillable = ['name', 'slug', 'category_id','description','img','short_desc','source'];
    public function cate(){
    	return $this->belongsto('App\Models\CateProduct','cate_product_id');
    }
    public function images(){
    	return $this->hasMany('App\Models\Image','product_id','id');
    }
    public function product_propety(){
    	return $this->hasMany('App\Models\Product_Property','product_id','id');
    }
    public function comments()
    {
        return $this->hasMany('App\Models\Comment','product_id','id');
    }
    public function innullcomments()
    {
        return $this->hasMany('App\Models\Comment')->whereNull('parent_id');
    }
}
