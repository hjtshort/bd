<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = 'product';
    protected $fillable = ['id','product_title','product_address',
        'product_alias','product_price','product_acreage','product_info','product_img',
        'product_fast','product_status','type_id','property_id','district_id',
        'direction_id','user_id','created_at','updated_at'
    ];
    public $timestamps = true;
    public function getDistrict()
    {
        return $this->belongsTo('App\models\district','district_id');
    }
}
