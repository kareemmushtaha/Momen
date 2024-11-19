<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\ItemTypeDataTable;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\ItemType;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class ItemTypeController extends Controller
{

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(ItemTypeDataTable $itemtype)
            {
               return $itemtype->render('admin.itemtype.index',['title'=>trans('admin.itemtype')]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.itemtype.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function store()
            {
              $rules = [
             'ItemType_name'=>'required',

                   ];
              $data = $this->validate(request(),$rules,[],[
             'ItemType_name'=>trans('admin.ItemType_name'),

              ]);
		
              $data['admin_id'] = admin()->user()->id; 
              ItemType::create($data); 

              session()->flash('success',trans('admin.added'));
              return redirect(aurl('itemtype'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $itemtype =  ItemType::find($id);
                return view('admin.itemtype.show',['title'=>trans('admin.show'),'itemtype'=>$itemtype]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
                $itemtype =  ItemType::find($id);
                return view('admin.itemtype.edit',['title'=>trans('admin.edit'),'itemtype'=>$itemtype]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * update a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function update($id)
            {
                $rules = [
             'ItemType_name'=>'required',

                         ];
             $data = $this->validate(request(),$rules,[],[
             'ItemType_name'=>trans('admin.ItemType_name'),
                   ]);
              $data['admin_id'] = admin()->user()->id; 
              ItemType::where('id',$id)->update($data);

              session()->flash('success',trans('admin.updated'));
              return redirect(aurl('itemtype'));
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $itemtype = ItemType::find($id);


               @$itemtype->delete();
               session()->flash('success',trans('admin.deleted'));
               return back();
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$itemtype = ItemType::find($id);

                    	@$itemtype->delete();
                    }
                    session()->flash('success', trans('admin.deleted'));
                   return back();
                }else {
                    $itemtype = ItemType::find($data);
 

                    @$itemtype->delete();
                    session()->flash('success', trans('admin.deleted'));
                    return back();
                }
            }

            
}