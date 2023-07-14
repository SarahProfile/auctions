<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attempt extends Model 
{

    protected $table = 'attempts';
    public $timestamps = true;
    protected $fillable = ['mobile','code','status'];

   // use SoftDeletes;

   // protected $dates = ['deleted_at'];

}