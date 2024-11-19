<?php
namespace App\Http\Controllers\Admin;

use App\DataTables\LinksDataTable;
use App\Http\Controllers\Controller;
use App\Model\Link;
use Form;
use Illuminate\Http\Request;
use Up;

// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.0 | https://ecovne.com]
// Copyright Reserved  [It V 1.0 | https://ecovne.com]
class Links extends Controller
{

//    public function __construct()
//    {
//       $this->middleware('permission:links_show', ['only' => 'index','show']);
//       $this->middleware('permission:links_edit', ['only' => 'edit','update']);
//       $this->middleware('permission:links_add', ['only' => 'store' ,'create']);
//       $this->middleware('permission:links_delete', ['only' => 'multi_delete','distroy']);
//    }

   public function index(LinksDataTable $links)
   {
      return $links->render('admin.links.index', ['title' => trans('admin.links')]);
   }

   /**
    * Baboon Script By [It V 1.0 | https://ecovne.com]
    * Show the form for creating a new resource.
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('admin.links.create', ['title' => trans('admin.create')]);
   }

   public function do_active($id)
   {
      if (Link::where('id', $id)->update(['status' => request('status')])) {
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
         'name'       => 'required',
         'url'        => 'required|url',
         'link_place' => '',

      ];
      $data = $this->validate(request(), $rules, [], [
         'name' => trans('admin.name'),
         'url'  => trans('admin.url'),
         'icon' => trans('admin.icon'),

      ]);

      Link::create($data);

      session()->flash('success', trans('admin.added'));
      return redirect(aurl('links'));
   }

   /**
    * Display the specified resource.
    * Baboon Script By [It V 1.0 | https://ecovne.com]
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
      $links = Link::find($id);
      return view('admin.links.show', ['title' => trans('admin.show'), 'links' => $links]);
   }

   /**
    * Baboon Script By [It V 1.0 | https://ecovne.com]
    * edit the form for creating a new resource.
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
      $links = Link::find($id);
      return view('admin.links.edit', ['title' => trans('admin.edit'), 'links' => $links]);
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
         'name'       => 'required',
         'url'        => 'required|url',
         'link_place' => '',

      ];
      $data = $this->validate(request(), $rules, [], [
         'name' => trans('admin.name'),
         'url'  => trans('admin.url'),
      ]);
      Link::where('id', $id)->update($data);

      session()->flash('success', trans('admin.updated'));
      return redirect(aurl('links'));
   }

   /**
    * Baboon Script By [It V 1.0 | https://ecovne.com]
    * destroy a newly created resource in storage.
    * @param  \Illuminate\Http\Request  $r
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
      $links = Link::find($id);

      @$links->delete();
      session()->flash('success', trans('admin.deleted'));
      return back();
   }

   public function multi_delete(Request $r)
   {
      $data = $r->input('selected_data');
      if (is_array($data)) {
         foreach ($data as $id) {
            $links = Link::find($id);

            @$links->delete();
         }
         session()->flash('success', trans('admin.deleted'));
         return back();
      } else {
         $links = Link::find($data);

         @$links->delete();
         session()->flash('success', trans('admin.deleted'));
         return back();
      }
   }
}
