<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.0 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.0 | https://it.phpanonymous.com]
class testes extends Model {



protected $table    = 'testes';
protected $fillable = [
		'id',
		'admin_id',
		      'testes',

		'created_at',
		'updated_at',
		'deleted_at',
	];

}
