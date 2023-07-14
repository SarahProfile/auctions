<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdsImage extends Model 
{

    protected $table = 'ads_images';
    
    protected $fillable = ['ads_id','image'];
    public $timestamps = true;



}