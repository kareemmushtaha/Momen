<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class ItemType extends Model {



protected $table    = 'item_types';
protected $fillable = [
		'id',
		'admin_id',
		      'ItemType_name',
		'created_at',
		'updated_at',
	];

}
