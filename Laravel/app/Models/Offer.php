<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model 
{

    protected $table = 'offers';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}