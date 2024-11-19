<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    
    // protected $table    = 'cities';
    protected $fillable = [
       'name','area_id'
    ];
    public function area(){
        return $this->hasOne(\App\Area::class,'id','area_id');
     }
}
