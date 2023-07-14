<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AuctionImage extends Model 
{

    protected $table = 'auction_images';
    
    protected $fillable = ['auction_id','image'];
    public $timestamps = true;



}