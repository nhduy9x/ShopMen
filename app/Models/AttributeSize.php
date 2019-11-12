<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeSize extends Model
{
    protected $table='attribute_sizes';
	
    protected $fillable = ['product_id','attribute_id','size','qty'];
}
