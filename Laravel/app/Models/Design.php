<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Design extends Model 
{

    protected $table = 'designs';
    protected $fillable = ['service_id','file'];
     public $timestamps = true;

    // use SoftDeletes;

    // protected $dates = ['deleted_at'];

}