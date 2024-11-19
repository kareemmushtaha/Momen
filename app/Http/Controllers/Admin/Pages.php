<?php
namespace App\Http\Controllers\Admin;

use App\DataTables\PagesDataTable;
use App\Http\Controllers\Controller;
use App\Model\Page;
use Form;
use Illuminate\Http\Request;
use Up;


class Pages extends Controller
{

//    public function __construct()
//    {
//       $this->middleware('permission:page_show', ['only' => 'index','show']);
//       $this->middleware('permission:page_edit', ['only' => 'edit','update']);
//       $this->middleware('permission:page_add', ['only' => 'store' ,'create']);
//       $this->middleware('permission:page_delete', ['only' => 'multi_delete','distroy']);
//    }

   public function index(PagesDataTable $pages)
   {
      return $pages->render('admin.pages.index', ['title' => trans('admin.pages')]);
   }

   public function create()
   {
      return view('admin.pages.create', ['title' => trans('admin.create')]);
   }

   public function do_active($id)
   {
      if (Page::where('id', $id)->update(['status' => request('status')])) {
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
         'title'   => 'required',
         'content' => 'required',

      ];
      $data = $this->validate(request(), $rules, [], [
         'title'   => trans('admin.title'),
         'content' => trans('admin.content'),

      ]);

      Page::create($data);

      session()->flash('success', trans('admin.added'));
      return redirect(aurl('pages'));
   }

   /**
    * Display the specified resource.
    * Baboon Script By [It V 1.0 | https://ecovne.com]
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
      $pages = Page::find($id);
      return view('admin.pages.show', ['title' => trans('admin.show'), 'pages' => $pages]);
   }

   /**
    * Baboon Script By [It V 1.0 | https://ecovne.com]
    * edit the form for creating a new resource.
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
      $pages = Page::find($id);
      return view('admin.pages.edit', ['title' => trans('admin.edit'), 'pages' => $pages]);
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
         'title'   => 'required',
         'content' => 'required',

      ];
      $data = $this->validate(request(), $rules, [], [
         'title'   => trans('admin.title'),
         'content' => trans('admin.content'),
      ]);
      Page::where('id', $id)->update($data);

      session()->flash('success', trans('admin.updated'));
      return redirect(aurl('pages'));
   }

   /**
    * Baboon Script By [It V 1.0 | https://ecovne.com]
    * destroy a newly created resource in storage.
    * @param  \Illuminate\Http\Request  $r
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
      $pages = Page::find($id);

      @$pages->delete();
      session()->flash('success', trans('admin.deleted'));
      return back();
   }

   public function multi_delete(Request $r)
   {
      $data = $r->input('selected_data');
      if (is_array($data)) {
         foreach ($data as $id) {
            $pages = Page::find($id);

            @$pages->delete();
         }
         session()->flash('success', trans('admin.deleted'));
         return back();
      } else {
         $pages = Page::find($data);

         @$pages->delete();
         session()->flash('success', trans('admin.deleted'));
         return back();
      }
   }
}
