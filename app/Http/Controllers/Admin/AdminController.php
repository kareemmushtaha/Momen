<?php
namespace App\Http\Controllers\Admin;

use App\Admin;
use App\DataTables\AdminDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class AdminController extends Controller
{

//    public function __construct()
//    {
//       $this->middleware('permission:admin_show', ['only' => 'index','show']);
//       $this->middleware('permission:admin_edit', ['only' => 'edit','update']);
//       $this->middleware('permission:admin_add', ['only' => 'store']);
//       $this->middleware('permission:admin_delete', ['only' => 'multi_delete','distroy']);
//    }
   public function index(AdminDataTable $admin)
   {
      return $admin->render('admin.admin.index', ['title' => trans('admin.admin')]);
   }

   public function create()
   {
      return view('admin.admin.create', ['title' => trans('admin.create')]);
   }

   public function store()
   {
      $rules = [
         'name'     => 'required',
         'email'    => 'required|unique:admins',
         'password' => 'required',

      ];
      $data = $this->validate(request(), $rules, [], [
         'name'     => trans('admin.name'),
         'email'    => trans('admin.email'),
         'password' => trans('admin.password'),

      ]);
      $data['password'] = bcrypt(request('password'));
      //$data['level']    = 'admin';
      Admin::create($data);

      session()->flash('success', trans('admin.added'));
      return redirect(aurl('admin'));
   }


   public function show($id)
   {
      $admin = Admin::find($id);
      return view('admin.admin.show', ['title' => trans('admin.show'), 'admin' => $admin]);
   }


   public function edit($id)
   {
      $admin = Admin::find($id);
      return view('admin.admin.edit', ['title' => trans('admin.edit'), 'admin' => $admin]);
   }


   public function update($id)
   {
      $rules = [
         'name'     => 'required',
         'email'    => 'required',
         'password' => '',

      ];
      $data = $this->validate(request(), $rules, [], [
         'name'     => trans('admin.name'),
         'email'    => trans('admin.email'),
         'password' => trans('admin.password'),
         'group_id' => trans('admin.group_id'),
      ]);
      if (request()->has('password')) {
         $data['password'] = bcrypt(request('password'));
      }
      // $data['level'] = 'admin';

      Admin::where('id', $id)->update($data);

      session()->flash('success', trans('admin.updated'));
      return redirect(aurl('admin'));
   }


   public function destroy($id)
   {
      $admin = Admin::find($id);

      @$admin->delete();
      session()->flash('success', trans('admin.deleted'));
      return back();
   }

   public function multi_delete(Request $r)
   {
      $data = $r->input('selected_data');
      if (is_array($data)) {
         foreach ($data as $id) {
            $admin = Admin::find($id);

            @$admin->delete();
         }
         session()->flash('success', trans('admin.deleted'));
         return back();
      } else {
         $admin = Admin::find($data);

         @$admin->delete();
         session()->flash('success', trans('admin.deleted'));
         return back();
      }
   }
}
