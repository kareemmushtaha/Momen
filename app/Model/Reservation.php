<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class Reservation extends Model {

protected $table    = 'reservations';
protected $fillable = [
		'id',
		'admin_id',
		              'item',
        'userInfo',
'Reservation_item_id',

'Reservation_start_date',
'Reservation_end_date',
'Reservation_start_time',
'Reservation_end_time',
'Reservation_price',
'Reservation_user_id',

'Reservation_overnight',
'count',

'Reservation_status',

		'created_at',
		'updated_at',
	];

   public function item(){
      return $this->hasOne(\App\Model\Item::class,'id','Reservation_item_id');
   }

   public function userInfo(){
      return $this->hasOne(\App\User::class,'id','Reservation_user_id');
   }
	 public function scopeByBusy($query,$start_date,$end_date)
	 {
		 return $query->whereBetween('Reservation_start_date', [$start_date, $end_date]);
			 // ->orWhereBetween('Reservation_end_date', [$start_date, $end_date])
			 // ->orWhereRaw('? BETWEEN Reservation_start_date and Reservation_end_date', [$start_date])
			 // ->orWhereRaw('? BETWEEN Reservation_start_date and Reservation_end_date', [$end_date]);
	 }

}
