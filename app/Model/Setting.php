<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model {
	protected $table    = 'settings';
	protected $fillable = [
		'sitename_ar',
		'email',
		'logo',
		'icon',
		'system_status',
		'text_footer',
        'system_message',
        'description_ar'   ,
        'keywords_ar',
        'Address',
        'phone',
        'terms',
	];

}
