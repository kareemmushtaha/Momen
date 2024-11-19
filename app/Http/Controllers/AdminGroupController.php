<?php

namespace App\Http\Controllers;

use App\AdminGroup;
use Illuminate\Http\Request;
use App\DataTables\AdminGroupDataTable;


// AdminGroup

class AdminGroupController extends Controller
{
    //   public function __construct()
    //   {
    //      $this->middleware('permission:admingroup_show', ['only' => 'index','show']);
    //      $this->middleware('permission:admingroup_edit', ['only' => 'edit','update']);
    //      $this->middleware('permission:admingroup_add', ['only' => 'store','create']);
    //      $this->middleware('permission:admingroup_delete', ['only' => 'multi_delete','distroy']);
    //   }
       public function index(AdminGroupDataTable $admin)
       {
          return $admin->render('admin.AdminGroup.index', ['title' => trans('admin.admin')]);
       }


       public function create()
       {
          return view('admin.AdminGroup.create', ['title' => trans('admin.create')]);
       }

       public function validation_value()
       {
         $rules = [
            'name' => 'required',
            'admingroup_add' => 'sometimes|nullable|in:enable,disable',
            'admingroup_show' => 'sometimes|nullable|in:enable,disable',
            'admingroup_delete' => 'sometimes|nullable|in:enable,disable',
            'admingroup_edit' => 'sometimes|nullable|in:enable,disable',
            'page_add' => 'sometimes|nullable|in:enable,disable',
            'page_show' => 'sometimes|nullable|in:enable,disable',
            'page_delete' => 'sometimes|nullable|in:enable,disable',
            'page_edit' => 'sometimes|nullable|in:enable,disable',
            'admin_add' => 'sometimes|nullable|in:enable,disable',
            'admin_show' => 'sometimes|nullable|in:enable,disable',
            'admin_delete' => 'sometimes|nullable|in:enable,disable',
            'admin_edit' => 'sometimes|nullable|in:enable,disable',
            'contect_add' => 'sometimes|nullable|in:enable,disable',
            'contect_show' => 'sometimes|nullable|in:enable,disable',
            'contect_delete' => 'sometimes|nullable|in:enable,disable',
            'contect_edit' => 'sometimes|nullable|in:enable,disable',
            'socail_add' => 'sometimes|nullable|in:enable,disable' ,
            'socail_show' => 'sometimes|nullable|in:enable,disable',
            'socail_delete' => 'sometimes|nullable|in:enable,disable',
            'socail_edit' => 'sometimes|nullable|in:enable,disable',
            'links_add' => 'sometimes|nullable|in:enable,disable' ,
            'links_edit' => 'sometimes|nullable|in:enable,disable',
            'links_show' => 'sometimes|nullable|in:enable,disable',
            'links_delete' => 'sometimes|nullable|in:enable,disable',
            'area_show' => 'sometimes|nullable|in:enable,disable',
            'area_edit' => 'sometimes|nullable|in:enable,disable',
            'area_add' => 'sometimes|nullable|in:enable,disable',
            'area_delete' => 'sometimes|nullable|in:enable,disable',
            'city_show' => 'sometimes|nullable|in:enable,disable',
            'city_edit' => 'sometimes|nullable|in:enable,disable',
            'city_add' => 'sometimes|nullable|in:enable,disable',
            'city_delete' => 'sometimes|nullable|in:enable,disable',
            'slider_show' => 'sometimes|nullable|in:enable,disable',
            'slider_edit' => 'sometimes|nullable|in:enable,disable',
            'slider_add' => 'sometimes|nullable|in:enable,disable',
            'slider_delete' => 'sometimes|nullable|in:enable,disable',
            'packages_show' => 'sometimes|nullable|in:enable,disable',
            'packages_edit' => 'sometimes|nullable|in:enable,disable',
            'packages_add' => 'sometimes|nullable|in:enable,disable',
            'packages_delete' => 'sometimes|nullable|in:enable,disable',
            'reservation_show' => 'sometimes|nullable|in:enable,disable',
            'reservation_edit' => 'sometimes|nullable|in:enable,disable',
            'reservation_add' => 'sometimes|nullable|in:enable,disable',
            'reservation_delete' => 'sometimes|nullable|in:enable,disable',
            'order_show' => 'sometimes|nullable|in:enable,disable',
            'order_edit' => 'sometimes|nullable|in:enable,disable',
            'order_add' => 'sometimes|nullable|in:enable,disable',
            'order_delete' => 'sometimes|nullable|in:enable,disable',
            'nanny_show' => 'sometimes|nullable|in:enable,disable',
            'nanny_edit' => 'sometimes|nullable|in:enable,disable',
            'nanny_add' => 'sometimes|nullable|in:enable,disable',
            'nanny_delete' => 'sometimes|nullable|in:enable,disable',
            'guardian_show' => 'sometimes|nullable|in:enable,disable',
            'guardian_edit' => 'sometimes|nullable|in:enable,disable',
            'guardian_add' => 'sometimes|nullable|in:enable,disable',
            'guardian_delete' => 'sometimes|nullable|in:enable,disable',
            'bookpackages_show' => 'sometimes|nullable|in:enable,disable',
            'bookpackages_edit' => 'sometimes|nullable|in:enable,disable',
            'bookpackages_add' => 'sometimes|nullable|in:enable,disable',
            'bookpackages_delete' => 'sometimes|nullable|in:enable,disable',
            'setting' => 'sometimes|nullable|in:enable,disable',
            'about' => 'sometimes|nullable|in:enable,disable'

          ];
          $data = $this->validate(request(), $rules, [], [
             'name'     => trans('admin.name'),

            ]);
            $newdata = [];
            foreach ($rules as $key => $value) {
               if (empty(request($key))) {
                  $newdata[$key] = 'disable';
               } else {
                  $newdata[$key] = request($key);
               }

            }
          return $newdata;
       }
       public function store()
       {

          AdminGroup::create($this->validation_value());
          session()->flash('success', trans('admin.added'));
          return redirect(aurl('permission'));
       }


       public function show($id)
       {
          $admin = AdminGroup::find($id);
          return view('admin.AdminGroup.show', ['title' => trans('admin.show'), 'permission' => $admin]);
       }


       public function edit($id)
       {
          $admin = AdminGroup::find($id);
          return view('admin.AdminGroup.edit', ['title' => trans('admin.edit'), 'permission' => $admin]);
       }


       public function update($id , Request $r)
       {
         //  dd($r->all());

         $data = $this->validation_value();
          AdminGroup::where('id', $id)->update($data);

          session()->flash('success', trans('admin.updated'));
          return redirect(aurl('permission'));
       }


       public function destroy($id)
       {
          $admin = AdminGroup::find($id);

          @$admin->delete();
          session()->flash('success', trans('admin.deleted'));
          return back();
       }

       public function multi_delete(Request $r)
       {
          $data = $r->input('selected_data');
          if (is_array($data)) {
             foreach ($data as $id) {
                $admin = AdminGroup::find($id);

                @$admin->delete();
             }
             session()->flash('success', trans('admin.deleted'));
             return back();
          } else {
             $admin = AdminGroup::find($data);

             @$admin->delete();
             session()->flash('success', trans('admin.deleted'));
             return back();
          }
       }
    }
