<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;
use App\DataTables\AreaDataTable;
use App\Http\Controllers\Controller;

class AreaController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('permission:area_show', ['only' => 'index','show']);
    //     $this->middleware('permission:area_edit', ['only' => 'edit','update']);
    //     $this->middleware('permission:area_add', ['only' => 'store']);
    //     $this->middleware('permission:area_delete', ['only' => 'multi_delete','distroy']);
    // }
    public function index(AreaDataTable $admin)
    {
        return $admin->render('admin.area.index', ['title' => trans('admin.area')]);
    }

    public function create()
    {
        return view('admin.area.create', ['title' => trans('admin.create')]);
    }

    public function store()
    {

        $rules = [
            'name'     => 'required',
        ];
        $data = $this->validate(request(), $rules, [], [
            'name'     => trans('admin.name'),

        ]);
        Area::create($data);
        session()->flash('success', trans('admin.added'));
        return redirect(aurl('area'));
    }


    public function show($id)
    {
        $admin = Area::find($id);
        return view('admin.area.show', ['title' => trans('admin.show'), 'users' => $admin]);
    }


    public function edit($id)
    {
        $admin = Area::find($id);
        return view('admin.area.edit', ['title' => trans('admin.edit'), 'users' => $admin]);
    }


    public function update($id)
    {
        $rules = [
            'name'     => 'required',
        ];
        $data = $this->validate(request(), $rules, [], [
            'name'     => trans('admin.name'),

        ]);
        Area::where('id', $id)->update($data);

        session()->flash('success', trans('admin.updated'));
        return redirect(aurl('area'));
    }


    public function destroy($id)
    {
        $admin = Area::find($id);

        @$admin->delete();
        session()->flash('success', trans('admin.deleted'));
        return back();
    }

    public function multi_delete(Request $r)
    {
        $data = $r->input('selected_data');
        if (is_array($data)) {
            foreach ($data as $id) {
            $admin = Area::find($id);

            @$admin->delete();
            }
            session()->flash('success', trans('admin.deleted'));
            return back();
        } else {
            $admin = Area::find($data);

            @$admin->delete();
            session()->flash('success', trans('admin.deleted'));
            return back();
        }
    }
}
