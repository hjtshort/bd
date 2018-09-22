<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class district extends Model
{
    protected $table = 'district';
    protected $fillable = ['id','district_name','city_id','created_at','updated_at'];
    public $timestamps = true;
    public function getCity()
    {
        return $this->belongsTo('App\models\city','city_id');
    }
}
