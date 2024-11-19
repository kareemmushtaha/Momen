<?php
namespace App\Http\Controllers;

use App\User;
use App\DataTables\UserDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\VerifyUser;
use App\Mail\VerifyMail;

class UserController extends Controller
{

//    public function __construct()
//    {
//       $this->middleware('permission:users_show', ['only' => 'index','show']);
//       $this->middleware('permission:users_edit', ['only' => 'edit','update']);
//       $this->middleware('permission:users_add', ['only' => 'store']);
//       $this->middleware('permission:users_delete', ['only' => 'multi_delete','distroy']);
//    }
   public function index(UserDataTable $admin)
   {
      return $admin->render('admin.users.index', ['title' => trans('admin.users')]);
   }

   public function create()
   {
      return view('admin.users.create', ['title' => trans('admin.create')]);
   }

   public function store()
   {

      $rules = [
         'phone' =>'required|regex:/[0-9]{10}/|digits:10|unique:users',
         'national_id' =>'required|regex:/[0-9]{10}/|digits:10',
         'name' => 'required',

      ];
      $data = $this->validate(request(), $rules, [], [
         'name'     => trans('admin.name'),
         'phone'    => trans('admin.phone'),
         'national_id' => trans('admin.NationalID'),
      ]);

      $user = User::create($data);
      if(request()->type == "resivetion") {
         session()->flash('success', trans('admin.added'));
         return back();
      }
      session()->flash('success', trans('admin.added'));
      return redirect(aurl('users'));
   }


   public function show($id)
   {
      $admin = User::find($id);
      return view('admin.users.show', ['title' => trans('admin.show'), 'users' => $admin]);
   }


   public function edit($id)
   {
      $admin = User::find($id);
      return view('admin.users.edit', ['title' => trans('admin.edit'), 'users' => $admin]);
   }


   public function update($id)
   {
      $rules = [
         'phone' =>'required|regex:/[0-9]{10}/|digits:10',

         'national_id' =>'required|regex:/[0-9]{10}/|digits:10',
         'name' => 'required',

      ];
      $data = $this->validate(request(), $rules, [], [
         'name'     => trans('admin.name'),
         'phone'    => trans('admin.phone'),
         'national_id' => trans('admin.NationalID'),
      ]);


      User::where('id', $id)->update($data);

      session()->flash('success', trans('admin.updated'));
      return redirect(aurl('users'));
   }


   public function destroy($id)
   {
      $admin = User::find($id);

      @$admin->delete();
      session()->flash('success', trans('admin.deleted'));
      return back();
   }

   public function multi_delete(Request $r)
   {
      $data = $r->input('selected_data');
      if (is_array($data)) {
         foreach ($data as $id) {
            $admin = User::find($id);

            @$admin->delete();
         }
         session()->flash('success', trans('admin.deleted'));
         return back();
      } else {
         $admin = User::find($data);

         @$admin->delete();
         session()->flash('success', trans('admin.deleted'));
         return back();
      }
   }
}
