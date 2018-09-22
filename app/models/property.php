<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class property extends Model
{
    protected $table = 'property';
    protected $fillable = ['id','property_name','created_at','updated_at'];
    public $timestamps = true;
}
