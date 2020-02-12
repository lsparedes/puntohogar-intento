<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class imagenes extends Model
{
  protected $table = 'imagenes';


  protected $fillable = ['codigo','img'];
}
