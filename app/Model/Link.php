<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class Link extends Model
{

   protected $table    = 'links';
   protected $fillable = [
      'id',
      'admin_id',
      'name',
      'url',
      'link_place',
      'status',
      'created_at',
      'updated_at',
   ];

}
