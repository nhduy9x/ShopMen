<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class setting extends Model
{
    protected $table='settings';
    protected $fillable=['logo_img','logo_text','choose_logo','hotline','address','email'];
}
