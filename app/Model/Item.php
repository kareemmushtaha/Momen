<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class Item extends Model {


protected $table    = 'items';
protected $fillable = [
		'id',
		'admin_id',
		              'itemType',
        'city',
'Item_name',
'Item_Details',
'Item_price',
'Item_price_overnight',
'Item_terms',
'item_bank_account',
'item_latitude',
'item_longitude',
'item_photo',
'city_id',

'item_types_id',

		'created_at',
		'updated_at',
	];

   public function itemType(){
      return $this->hasOne(\App\Model\ItemType::class,'id','item_types_id');
   }

   public function city(){
      return $this->hasOne(\App\City::class,'id','city_id');
   }
   public function images(){

		return $this->hasMany(\App\Model\imageItem::class,'imageItem_id','id');
	 
 	}
    public function bank(){

		return $this->hasMany(\App\Model\Bank::class,'Bank_item_id','id');
	 
 	}
    

}
