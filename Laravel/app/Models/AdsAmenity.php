<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdsAmenity extends Model 
{

    protected $table = 'ad_amenities';
    
    protected $fillable = ['ads_id','amenity_id'];
    public $timestamps = true;



}