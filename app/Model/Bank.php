<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class Bank extends Model {

protected $table    = 'banks';
protected $fillable = [
		'id',
		'admin_id',
		      'Bank_item_id',

'Bank_name',
'bank_photo',
		'created_at',
		'updated_at',
	];
	
	public function item(){
		return $this->hasOne(\App\Model\Item::class,'id','Bank_item_id');
	 }

}
