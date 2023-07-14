<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model 
{

    protected $table = 'messages';
    protected $fillable = ['receiver_id','user_id','message','attachment'];
    public $timestamps = true;

  //  use SoftDeletes;

 //   protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function receiver()
    {
        return $this->belongsTo('App\Models\User');
    }

}