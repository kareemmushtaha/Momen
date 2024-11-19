<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ContactUsReplay extends Model
{
   protected $table = 'contact_us_replays';

   protected $fillable = [
      'admin_id',
      'msg_id',
      'message',
   ];

   public function admin()
   {
      return $this->hasOne('App\Admin', 'id', 'admin_id');
   }
}
