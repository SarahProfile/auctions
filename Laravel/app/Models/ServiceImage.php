<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceImage extends Model 
{

    protected $table = 'service_images';
    
    protected $fillable = ['service_id','image'];
    public $timestamps = true;



}