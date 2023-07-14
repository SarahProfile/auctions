<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Consultation extends Model 
{

    protected $table = 'consultations';
    
    protected $fillable = ['service_id','user_id','message'];
    protected $with=['user'];
    public $timestamps = true;
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
     public function service()
    {
        return $this->belongsTo('App\Models\Service');
    }



}