<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $table='attributes';
	
    protected $fillable = ['size','product_id','price','promotion_price','stocks','color'];
}
