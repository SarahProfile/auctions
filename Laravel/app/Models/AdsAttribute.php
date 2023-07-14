<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdsAttribute extends Model 
{

    protected $table = 'ad_attributes';
    
    protected $fillable = ['ads_id','attribute_id','value'];
    public $timestamps = true;



}