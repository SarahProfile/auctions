<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AuctionLike extends Model 
{

    protected $table = 'auction_like';
    
    protected $fillable = ['auction_id','user_id'];
    public $timestamps = false;



}