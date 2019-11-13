<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SlideShow extends Model
{
    protected $table='slide_shows';
    protected $fillable=['title','image','url'];
}
