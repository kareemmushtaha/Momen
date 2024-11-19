<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.0 | https://ecovne.com]
// Copyright Reserved  [It V 1.0 | https://ecovne.com]
class Social extends Model
{


   protected $table    = 'socials';
   protected $fillable = [
      'id',
      'admin_id',
      'url_name',
      'fa_icon',
      'url',
      'status',

      'created_at',
      'updated_at',
      'deleted_at',
   ];

}
