<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    protected $table='addresses';
    protected $fillable=['name','user_id','phone','address'];
}
