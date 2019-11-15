<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount_Code extends Model
{
    protected $table='discount_codes';
    protected $fillable=['code_name','stocks','time_expired','type','target','value'];
}
