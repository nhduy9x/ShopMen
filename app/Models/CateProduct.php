<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CateProduct extends Model
{
    protected $table='categories_products';
    protected $fillable = ['name','slug','parent_id'];
    public function products(){
        return $this->hasMany('App\Models\Product','category_id','id');
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
