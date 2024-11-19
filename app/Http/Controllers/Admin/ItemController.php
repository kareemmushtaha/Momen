<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\ItemDataTable;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\Item;
use App\Model\Reservation;

use App\Model\imageItem;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class ItemController extends Controller
{

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(ItemDataTable $item)
            {
               return $item->render('admin.item.index',['title'=>trans('admin.item')]);
            }
            public function do_active($id)
            {
               if (Item::where('id', $id)->update(['status' => request('status')])) {
                  session()->flash('success', trans('admin.active_done'));
               }
               return back();
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.item.create',['title'=>trans('admin.create')]);
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
             'Item_name'=>'required',
             'Item_Details'=>'required',
             'Item_price'=>'required|numeric',
             'Item_price_overnight'=>'required|numeric',
             'Item_terms'=>'required',
             'item_bank_account'=>'nullable',
             'item_latitude'=>'required',
             'item_longitude'=>'required',
             'item_photo'=>'required|'.it()->image().'',
             'city_id'=>'required',
             'item_types_id'=>'required',

                   ];
              $data = $this->validate(request(),$rules,[],[
             'Item_name'=>trans('admin.Item_name'),
             'Item_Details'=>trans('admin.Item_Details'),
             'Item_price'=>trans('admin.Item_price'),
             'Item_price_overnight'=>trans('admin.Item_price_overnight'),
             'Item_terms'=>trans('admin.Item_terms'),
             'item_bank_account'=>trans('admin.item_bank_account'),
             'item_latitude'=>trans('admin.item_latitude'),
             'item_longitude'=>trans('admin.item_longitude'),
             'item_photo'=>trans('admin.item_photo'),
             'city_id'=>trans('admin.city_id'),
             'item_types_id'=>trans('admin.item_types_id'),


              ]);
              $data['admin_id'] = admin()->user()->id; 
               if(request()->hasFile('item_photo')){
              $data['item_photo'] = it()->upload('item_photo','item');
              }

              $item = Item::create($data); 
              $data['admin_id'] = admin()->user()->id; 
              $data['imageItem_id'] = $item->id;
              foreach(request()->imageItem_photo as $item) {
                $data['imageItem_photo'] = it()->upload($item,'imageitem');
                imageItem::create($data); 
            }

              session()->flash('success',trans('admin.added'));
              return redirect(aurl('item'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $item =  Item::find($id);
                $images =  imageItem::where("imageItem_id", $id)->get();
                $reservations = Reservation::where("Reservation_item_id" , $id)->get();
                // dd($reservations);
                return view('admin.item.show',['title'=>trans('admin.show'),'item'=>$item , 'images' => $images ,'reservations' => $reservations]);
            }

            public function getItem()
            {
                $item =  Item::select('Item_price as price' , 'Item_price_overnight as overnight')->where("id" , request()->id)->first();
                return response()->json(['item' => $item]);
            }

            


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
                $item =  Item::find($id);
                return view('admin.item.edit',['title'=>trans('admin.edit'),'item'=>$item]);
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
             'Item_name'=>'required',
             'Item_Details'=>'required',
             'Item_price'=>'required|numeric',
             'Item_price_overnight'=>'required|numeric',
             'Item_terms'=>'required',
             'item_bank_account'=>'nullable',
             'item_latitude'=>'required',
             'item_longitude'=>'required',
             'item_photo'=>''.it()->image().'',
             'city_id'=>'required',
             'item_types_id'=>'required',

                         ];
             $data = $this->validate(request(),$rules,[],[
             'Item_name'=>trans('admin.Item_name'),
             'Item_Details'=>trans('admin.Item_Details'),
             'Item_price'=>trans('admin.Item_price'),
             'Item_price_overnight'=>trans('admin.Item_price_overnight'),
             'Item_terms'=>trans('admin.Item_terms'),
             'item_bank_account'=>trans('admin.item_bank_account'),
             'item_latitude'=>trans('admin.item_latitude'),
             'item_longitude'=>trans('admin.item_longitude'),
             'item_photo'=>trans('admin.item_photo'),
             'city_id'=>trans('admin.city_id'),
             'item_types_id'=>trans('admin.item_types_id'),
                   ]);
              $data['admin_id'] = admin()->user()->id; 
               if(request()->hasFile('item_photo')){
              it()->delete(Item::find($id)->item_photo);
              $data['item_photo'] = it()->upload('item_photo','item');
               }


              Item::where('id',$id)->update($data);

              
              $data['admin_id'] = admin()->user()->id; 
              $data['imageItem_id'] = $id;
            //   imageItem::where("imageItem_id", $id)->delete();
               if(request()->imageItem_photo != null) {
                foreach(request()->imageItem_photo as $item) {
                  $data['imageItem_photo'] = it()->upload($item,'imageitem');                
                  imageItem::create($data); 
                }
               }


              session()->flash('success',trans('admin.updated'));
              return redirect(aurl('item'));
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $item = Item::find($id);
               $data = imageItem::where("imageItem_id", $id)->get(); 

               foreach($data as $item)
               {
                   $imageitem = imageItem::find($item->id);
                   it()->delete($imageitem->imageItem_photo);
                   it()->delete('imageitem',$item->id);
                   @$imageitem->delete();
               }
               it()->delete($item->item_photo);
               it()->delete('item',$id);

               @$item->delete();
               
               session()->flash('success',trans('admin.deleted'));
               return back();
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$item = Item::find($id);

                    	it()->delete($item->item_photo);
                    	it()->delete('item',$id);
                    	@$item->delete();
                    }
                    session()->flash('success', trans('admin.deleted'));
                   return back();
                }else {
                    $item = Item::find($data);
 
                    	it()->delete($item->item_photo);
                    	it()->delete('item',$data);

                    @$item->delete();
                    session()->flash('success', trans('admin.deleted'));
                    return back();
                }
            }

            
}