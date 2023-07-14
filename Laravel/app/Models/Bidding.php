<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bidding extends Model 
{

    protected $table = 'biddings';
    public $timestamps = true;
     protected $fillable = ['product_id','price','user_id'];
    protected $with=['user'];

    // use SoftDeletes;

    // protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}