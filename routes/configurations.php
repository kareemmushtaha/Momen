<?php
\Config::set('filesystems.disks.public.url', url('public/storage'));
//return dd(config('filesystems.disks.public.url'));
////// direction Function /////////////////////
app()->singleton('direction', function () {
		if (app('l') == 'ar') {
			return '-rtl';
		}
	});
////// direction Function /////////////////////

//////  upload Function /////////////////////
if (!function_exists('it')) {
	function it() {
		return new \App\Http\Controllers\FileUploader;
	}
}
//////  upload Function /////////////////////

////// Admin Url Function /////////////////////
if (!function_exists('aurl')) {
	function aurl($link) {
		if (substr($link, 0, 1) == '/') {
			return url(app('admin').$link);
		} else {
			return url(app('admin').'/'.$link);
		}
	}
}
////// Admin Url Function /////////////////////
////// Get Settings Function /////////////////////
if (!function_exists('setting')) {
	function setting() {
		$setting = \App\Model\Setting::orderBy('id', 'desc')->first();
		if (empty($setting)) {
			return \App\Model\Setting::create(['sitename_ar' => '', 'sitename_en' => '']);
		} else {
			return $setting;
		}
	}
}
////// Get Settings Function /////////////////////

////// Admin Url Function /////////////////////
if (!function_exists('admin')) {
	function admin() {
		return auth()->guard('admin');
	}
}

if (!function_exists('avatar')) {
	function avatar() {
        if ( auth()->user()->photo != null ) {
            return it()->url(auth()->user()->photo);
        }  else {
            return asset('public/website/assets/images/av.png');
        }
	}
}
if (!function_exists('fphoto')) {
	function fphoto($photo = null) {
        if ( $photo != null ) {
            return it()->url($photo);
        }  else {
            return asset('public/website/assets/images/av.png');
        }
	}
}
if (!function_exists('count_project')) {
	function count_project($id = null) {
        if ( $id != null ) {
            return App\Model\Project::where(['status' => 'finished' , 'Project_user_freelancer' => $id])->get()->count();
        }  else {
            return 0;
        }
	}
}
if (!function_exists('wsam')) {
	function wsam($points = null) {
        $id = App\Model\Decoration::where('Decoration_from' , "<=" , $points)->where('Decoration_to' , ">=" ,$points)->first();
        if ( $id != null ) {
            return it()->url($id->Decoration_photo);
        }  else {
            return 0;
        }
	}
}

if (!function_exists('user_photo')) {
	function user_photo($id = null) {
        if(App\User::find($id)){
            if ( App\User::find($id)->photo != null ) {
                return it()->url(App\User::find($id)->photo);
            }  else {
                return asset('public/website/assets/images/av.png');
            }
        }
	}
}
////// Admin Url Function /////////////////////

////// Admin Url Function /////////////////////
if (!function_exists('active_link')) {
	function active_link($segment, $class = null) {
		if ($segment == null and request()->segment(2) == null) {
			return $class;
		} elseif (preg_match('/'.$segment.'/i', request()->segment(2))) {
			if ($class != null || $class != 'block') {
				if ($segment != null) {
					return $class;
				}
			} else {
				if ($class == 'block') {
					return 'display:block';
				} else {
					return 'display:none';
				}
			}
		}
	}
}
////// Admin Url Function /////////////////////
