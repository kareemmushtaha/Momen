<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerifyUser extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    protected $fillable = ['user_id','token' ];
}
