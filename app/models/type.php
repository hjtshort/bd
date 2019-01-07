<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class type extends Model
{
    protected $table = 'type';
    protected $fillable = ['id','type_name','created_at','updated_at'];
    public $timestamps = true;

}
