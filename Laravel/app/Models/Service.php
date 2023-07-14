<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model 
{

    protected $table = 'services';
    protected $fillable = ['name_ar','name_en','details_ar','details_en','is_approved','lat','lng','category_id','user_id','city_id'];
    public $timestamps = true;
    protected $with=['images','category','user','consultations'];

    // use SoftDeletes;

    // protected $dates = ['deleted_at']; Consultation
    
     public function consultations()
    {
        return $this->hasMany('App\Models\Consultation');
    }

    public function designs()
    {
        return $this->hasMany('App\Models\Design');
    }
    
     public function images()
    {
        return $this->hasMany('App\Models\ServiceImage');
    }

    public function requirements()
    {
        return $this->hasMany('App\Models\Requirment');
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