<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model 
{

    protected $table = 'categories';
    public $timestamps = true;
    
    public function attribute()
    {
        return $this->hasMany('App\Models\AdsAttribute','category_id');
    }
    
     public function amenities()
    {
        return $this->hasMany('App\Models\AdsAmenitys','category_id');
    }

}