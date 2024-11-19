<?php

namespace App\Http\Controllers;

use App\City;
use App\Area;
use Illuminate\Http\Request;
use App\DataTables\CityDataTable;
use App\Http\Controllers\Controller;

class CityController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('permission:city_show', ['only' => 'index','show']);
    //     $this->middleware('permission:city_edit', ['only' => 'edit','update']);
    //     $this->middleware('permission:city_add', ['only' => 'store']);
    //     $this->middleware('permission:city_delete', ['only' => 'multi_delete','distroy']);
    // }
    public function index(CityDataTable $admin)
    {
        // dd(City::get());
        return $admin->render('admin.city.index', ['title' => trans('admin.city')]);
    }

    public function create()
    {
        $areas = Area::get();


        return view('admin.city.create', ['title' => trans('admin.create') , 'areas' => $areas]);
    }

    public function store()
    {

        $rules = [
            'name'     => 'required',
            'area_id'  => 'required'

        ];
        $data = $this->validate(request(), $rules, [], [
            'name'     => trans('admin.name'),
            'area_id'  => trans('admin.area')

        ]);
        City::create($data);
        session()->flash('success', trans('admin.added'));
        return redirect(aurl('city'));
    }


    public function show($id)
    {
        $admin = City::find($id);
        return view('admin.city.show', ['title' => trans('admin.show'), 'users' => $admin]);
    }


    public function edit($id)
    {
        $admin = City::find($id);
        $areas = Area::get();

        return view('admin.city.edit', ['title' => trans('admin.edit'), 'users' => $admin , 'areas' => $areas]);
    }


    public function update($id)
    {

        $rules = [
            'name'     => 'required',
            'area_id'  => 'required'

        ];
        $data = $this->validate(request(), $rules, [], [
            'name'     => trans('admin.name'),
            'area_id'  => trans('admin.area')

        ]);
        City::where('id', $id)->update($data);

        session()->flash('success', trans('admin.updated'));
        return redirect(aurl('city'));
    }


    public function destroy($id)
    {
        $admin = City::find($id);

        @$admin->delete();
        session()->flash('success', trans('admin.deleted'));
        return back();
    }

    public function multi_delete(Request $r)
    {
        $data = $r->input('selected_data');
        if (is_array($data)) {
            foreach ($data as $id) {
            $admin = City::find($id);

            @$admin->delete();
            }
            session()->flash('success', trans('admin.deleted'));
            return back();
        } else {
            $admin = City::find($data);

            @$admin->delete();
            session()->flash('success', trans('admin.deleted'));
            return back();
        }
    }
}
