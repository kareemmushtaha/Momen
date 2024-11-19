<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','phone' , 'national_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */


    public function area(){
        return $this->belongsTo(Area::class); // links this->course_id to courses.id
    }

    public function city(){
        return $this->belongsTo(City::class); // links this->course_id to courses.id
    }
 
    public function verifyUser(){
    return $this->hasOne('App\VerifyUser');
    }
}
