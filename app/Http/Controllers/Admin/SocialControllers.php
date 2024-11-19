<?php
namespace App\Http\Controllers\Admin;

use App\DataTables\SocialsDataTable;
use App\Http\Controllers\Controller;
use App\Model\Social;
use Form;
use Illuminate\Http\Request;
use Up;

// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.0 | https://ecovne.com]
// Copyright Reserved  [It V 1.0 | https://ecovne.com]
class SocialControllers extends Controller
{

//    public function __construct()
//    {
//       $this->middleware('permission:socail_show', ['only' => 'index','show']);
//       $this->middleware('permission:socail_edit', ['only' => 'edit','update']);
//       $this->middleware('permission:socail_add', ['only' => 'store','create']);
//       $this->middleware('permission:socail_delete', ['only' => 'multi_delete','distroy']);
//    }
   public function index(SocialsDataTable $socials)
   {
      return $socials->render('admin.socials.index', ['title' => trans('admin.socials')]);
   }

   /**
    * Baboon Script By [It V 1.0 | https://ecovne.com]
    * Show the form for creating a new resource.
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('admin.socials.create', ['title' => trans('admin.create')]);
   }

   public function do_active($id)
   {
      if (Social::where('id', $id)->update(['status' => request('status')])) {
         session()->flash('success', trans('admin.active_done'));
      }
      return back();
   }

   /**
    * Baboon Script By [It V 1.0 | https://ecovne.com]
    * Store a newly created resource in storage.
    * @param  \Illuminate\Http\Request  $r
    * @return \Illuminate\Http\Response
    */
   public function store()
   {
      $rules = [
         'url_name' => 'required',
         'fa_icon'  => 'required',
         'url'      => 'required|url',

      ];
      $data = $this->validate(request(), $rules, [], [
         'url_name' => trans('admin.url_name'),
         'fa_icon'  => trans('admin.fa_icon'),
         'url'      => trans('admin.url'),

      ]);

      Social::create($data);

      session()->flash('success', trans('admin.added'));
      return redirect(aurl('socials'));
   }

   /**
    * Display the specified resource.
    * Baboon Script By [It V 1.0 | https://ecovne.com]
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
      $socials = Social::find($id);
      return view('admin.socials.show', ['title' => trans('admin.show'), 'socials' => $socials]);
   }

   /**
    * Baboon Script By [It V 1.0 | https://ecovne.com]
    * edit the form for creating a new resource.
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
      $socials = Social::find($id);
      return view('admin.socials.edit', ['title' => trans('admin.edit'), 'socials' => $socials]);
   }

   /**
    * Baboon Script By [It V 1.0 | https://ecovne.com]
    * update a newly created resource in storage.
    * @param  \Illuminate\Http\Request  $r
    * @return \Illuminate\Http\Response
    */
   public function update($id)
   {
      $rules = [
         'url_name' => 'required',
         'fa_icon'  => 'required',
         'url'      => 'required|url',

      ];
      $data = $this->validate(request(), $rules, [], [
         'url_name' => trans('admin.url_name'),
         'fa_icon'  => trans('admin.fa_icon'),
         'url'      => trans('admin.url'),
      ]);
      Social::where('id', $id)->update($data);

      session()->flash('success', trans('admin.updated'));
      return redirect(aurl('socials'));
   }

   /**
    * Baboon Script By [It V 1.0 | https://ecovne.com]
    * destroy a newly created resource in storage.
    * @param  \Illuminate\Http\Request  $r
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
      $socials = Social::find($id);

      @$socials->delete();
      session()->flash('success', trans('admin.deleted'));
      return back();
   }

   public function multi_delete(Request $r)
   {
      $data = $r->input('selected_data');
      if (is_array($data)) {
         foreach ($data as $id) {
            $socials = Social::find($id);

            @$socials->delete();
         }
         session()->flash('success', trans('admin.deleted'));
         return back();
      } else {
         $socials = Social::find($data);

         @$socials->delete();
         session()->flash('success', trans('admin.deleted'));
         return back();
      }
   }
}
