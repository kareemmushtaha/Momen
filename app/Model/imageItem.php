<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class imageItem extends Model {



protected $table    = 'image_items';
protected $fillable = [
		'id',
		'admin_id',
		              'items',
'imageItem_id',

'imageItem_photo',
		'updated_at',
	];



}
