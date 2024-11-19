<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\imageItemDataTable;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\imageItem;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class imageItemController extends Controller
{

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(imageItemDataTable $imageitem)
            {
               return $imageitem->render('admin.imageitem.index',['title'=>trans('admin.imageitem')]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.imageitem.create',['title'=>trans('admin.create')]);
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
             'imageItem_id'=>'required',
             'imageItem_photo'=>'required|'.it()->image().'',

                   ];
              $data = $this->validate(request(),$rules,[],[
             'imageItem_id'=>trans('admin.imageItem_id'),
             'imageItem_photo'=>trans('admin.imageItem_photo'),

              ]);
		
              $data['admin_id'] = admin()->user()->id; 
               if(request()->hasFile('imageItem_photo')){
              $data['imageItem_photo'] = it()->upload('imageItem_photo','imageitem');
              }
              imageItem::create($data); 

              session()->flash('success',trans('admin.added'));
              return redirect(aurl('imageitem'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $imageitem =  imageItem::find($id);
                return view('admin.imageitem.show',['title'=>trans('admin.show'),'imageitem'=>$imageitem]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
                $imageitem =  imageItem::find($id);
                return view('admin.imageitem.edit',['title'=>trans('admin.edit'),'imageitem'=>$imageitem]);
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
             'imageItem_id'=>'required',
             'imageItem_photo'=>'required|'.it()->image().'',

                         ];
             $data = $this->validate(request(),$rules,[],[
             'imageItem_id'=>trans('admin.imageItem_id'),
             'imageItem_photo'=>trans('admin.imageItem_photo'),
                   ]);
              $data['admin_id'] = admin()->user()->id; 
               if(request()->hasFile('imageItem_photo')){
              it()->delete(imageItem::find($id)->imageItem_photo);
              $data['imageItem_photo'] = it()->upload('imageItem_photo','imageitem');
               }
              imageItem::where('id',$id)->update($data);

              session()->flash('success',trans('admin.updated'));
              return redirect(aurl('imageitem'));
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $imageitem = imageItem::find($id);

               it()->delete($imageitem->imageItem_photo);
               it()->delete('imageitem',$id);

               @$imageitem->delete();
               session()->flash('success',trans('admin.deleted'));
               return back();
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$imageitem = imageItem::find($id);

                    	it()->delete($imageitem->imageItem_photo);
                    	it()->delete('imageitem',$id);
                    	@$imageitem->delete();
                    }
                    session()->flash('success', trans('admin.deleted'));
                   return back();
                }else {
                    $imageitem = imageItem::find($data);
 
                    	it()->delete($imageitem->imageItem_photo);
                    	it()->delete('imageitem',$data);

                    @$imageitem->delete();
                    session()->flash('success', trans('admin.deleted'));
                    return back();
                }
            }

            
}