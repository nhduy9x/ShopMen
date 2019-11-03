<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CateProduct extends Model
{
    protected $table='caregories_products';
    protected $fillable = ['name','slug','parent_id'];
    public function products(){
    	return $this->hasMany('App\Models\Product','cate_product_id','id');
    }
    public function cates()
    {
        return $this->hasMany('App\Models\CateProduct','parent_id','id');
    }
    public function parent()
    {
        return $this->belongsto('App\Models\CateProduct','parent_id','id');
    }
}
