<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ads extends Model 
{

    protected $table = 'ads';
    protected $fillable = ['name_ar','name_en','details_ar','details_en','price','is_approved','lat','lng','category_id','user_id','city_id'];
    protected $with=['category','images','user'];
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    public function images()
    {
        return $this->hasMany('App\Models\AdsImage','ads_id');
    }


    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

}