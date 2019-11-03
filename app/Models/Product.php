<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';
	
    protected $fillable = ['name', 'slug', 'category_id','price','sale_percent','stocks','is_active','description','promotion_price','short_desc','source'];
    public function cate(){
    	return $this->belongsto('App\Models\CateProduct','cate_product_id');
    }
    public function images(){
    	return $this->hasMany('App\Models\Image','product_id','id');
    }
    public function attributes(){
    	return $this->hasMany('App\Models\Attribute','product_id','id');
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
