<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['id','parent_id', 'name'];
    public function product(){
    	return $this->hasMany('App\Models\Product','category_id');
    }
}
