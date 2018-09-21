<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    protected $table = 'city';
    protected $fillable = ['id','city_name','city_alias','created_at','updated_at'];
    public $timestamps = true;

}
