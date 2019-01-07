<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
class product extends Model
{
    use SoftDeletes;
    use Sluggable;
    use SluggableScopeHelpers;
    protected $table = 'product';
    protected $guarded = [];
    public $timestamps = true;
    public function getDistrict()
    {
        return $this->belongsTo('App\models\district','district_id');
    }
    public function sluggable()
    {
        return [
            'product_slug' => [
                'source' => 'product_title'
            ]
        ];
    }
    
}
