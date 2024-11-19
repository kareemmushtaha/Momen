<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Setting;
use App\About;

use Illuminate\Http\Request;

class Settings extends Controller {

//    public function __construct()
//    {
//       $this->middleware('permission:setting', ['only' => 'store']);
//       $this->middleware('permission:about', ['only' => 'about_post']);
//    }
	public function index() {
		return view('admin.settings', ['title' => trans('admin.settings')]);
	}

	public function about() {
		return view('admin.about', ['title' => 'عن الموقع']);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */


	public function store(Request $request) {
        // dd(request()->all());
		$rules = [
			'sitename_ar'    => 'required',
			'description_ar'    => 'required',
			'keywords_ar'    => 'required',
			'Address'    => 'required',
			'email'          => 'required',
			'phone'          => 'required',
			'terms'          => 'required',
			'text_footer'          => '',
			'logo'           => 'sometimes|nullable|'.it()->image(),
			'icon'           => 'sometimes|nullable|'.it()->image(),
			'system_status'  => 'required',
			'system_message' => '',
		];
		$data = $this->validate(request(), $rules, [], [
				'sitename_ar'    => trans('admin.sitename_ar'),
				'email'          => trans('admin.email'),
				'logo'           => trans('admin.logo'),
				'icon'           => trans('admin.icon'),
				'system_status'  => trans('admin.system_status'),
				'system_message' => trans('admin.system_message'),
			]);
		if (request()->hasFile('logo')) {
			$data['logo'] = it()->upload('logo', 'setting');
		}
		if (request()->hasFile('map')) {
			$data['map'] = it()->upload('map', 'setting');
		}
		if (request()->hasFile('icon')) {
			$data['icon'] = it()->upload('icon', 'setting');
		}
		Setting::orderBy('id', 'desc')->update($data);
		session()->flash('success', trans('admin.updated'));
		return redirect(aurl('settings'));

	}

	public function about_post(Request $request) {
		$rules = [
			'name_ar_home'    		=> 'required',
			'name_en_home'    		=> 'required',
			'doc_ar_home'    		=> 'required',
			'doc_en_home'    		=> 'required',
			// 'video_home'    		=> 'required',
			'name_ar_about'    		=> 'required',
			'name_en_about'    		=> 'required',
			'doc_ar_about'    		=> 'required',
			'doc_en_about'          => 'required',
			// 'video_about'          	=> 'required',
			'vision_ar_about'       => 'required',
			'vision_en_about'       => 'required',
			'target_ar_about'       => 'required',
			'target_en_about'       => 'required',
			'message_ar_about' 		=> 'required',
			'message_en_about' 		=> 'required',

		];
		$data = $this->validate(request(), $rules, [], [
				'sitename_ar'    => trans('admin.sitename_ar'),
				'email'          => trans('admin.email'),
				'logo'           => trans('admin.logo'),
				'icon'           => trans('admin.icon'),
				'system_status'  => trans('admin.system_status'),
				'system_message' => trans('admin.system_message'),
			]);
		if (request()->hasFile('video_home')) {
			$data['video_home'] = it()->upload('video_home', 'about');
		}
		if (request()->hasFile('video_about')) {
			$data['video_about'] = it()->upload('video_about', 'about');
		}

		About::orderBy('id', 'desc')->update($data);
		session()->flash('success', trans('admin.updated'));
		return redirect(aurl('about'));

	}

}
