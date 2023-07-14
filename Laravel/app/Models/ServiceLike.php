<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceLike extends Model 
{

    protected $table = 'service_like';
    
    protected $fillable = ['service','user_id'];
    public $timestamps = false;



}