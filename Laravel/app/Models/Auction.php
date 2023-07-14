<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Auction extends Model 
{

    protected $table = 'products';
    public $timestamps = true;
    protected $fillable = ['name','model','price','details','image','user_id'];


    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function biddings()
    {
        return $this->hasMany('App\Models\Bidding');
    }
    

    // public function category()
    // {
    //     return $this->belongsTo('App\Models\Category');
    // }
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}