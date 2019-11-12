<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $table='attributes';
	
    protected $fillable = ['product_id','price','promotion_price','stocks','color','img','sale_percent'];
    public function attributesizes(){
    	return $this->hasMany('App\Models\AttributeSize','attribute_id','id');
    }
}
