<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdLike extends Model 
{

    protected $table = 'ad_likes';
    
    protected $fillable = ['ad_id','user_id'];
    public $timestamps = false;



}