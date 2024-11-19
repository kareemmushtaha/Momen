<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class Page extends Model
{

   protected $table    = 'pages';
   protected $fillable = [
      'id',
      'admin_id',
      'title',
      'content',
      'status',

      'created_at',
      'updated_at',
   ];

}
