<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{

   protected $table    = 'contact_us';
   protected $fillable = [
      'id',
      'admin_id',
      'subject',
      'email',
      'mobile',
      'name',
      'message',
      'status_msg',
      'move_to',
      'created_at',
      'updated_at',
   ];

   public function replay()
   {
      return $this->hasMany('App\Model\ContactUsReplay', 'msg_id', 'id');
   }

}
