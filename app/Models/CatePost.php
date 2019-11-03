<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatePost extends Model
{
    protected $table='categories_posts';
    protected $fillable = ['name','slug','parent_id','url'];
    public function products(){
    	return $this->hasMany('App\Models\Post','cate_post_id','id');
    }
    public function cates()
    {
        return $this->hasMany('App\Models\CatePost','parent_id','id');
    }
    public function parent()
    {
        return $this->belongsto('App\Models\CatePost','parent_id','id');
    }
}
