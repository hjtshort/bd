<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class direction extends Model
{
    protected $table = 'direction';
    protected $fillable = ['id','direction_name','created_at','updated_at'];
    public $timestamps = true;
}
