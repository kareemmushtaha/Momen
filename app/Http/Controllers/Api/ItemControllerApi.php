<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\Item;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class ItemControllerApi extends Controller
{

            /**
             * Baboon Script By [It V 1.2 | https://it.phpanonymous.com]
             * Display a listing of the resource. Api
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
               return response()->json([
               "status"=>true,
               "data"=>Item::orderBy('id','desc')->paginate(15)
               ]);
            }


            /**
             * Baboon Script By [It V 1.2 | https://it.phpanonymous.com]
             * Store a newly created resource in storage. Api
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
        $data = Validator::make(request()->all(),$rules,[],[
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
		
        if($data->fails()){
            return response()->json([
               "status"=>false,"
               messages"=>$data->messages()
            ]); 
             }
        $data = request()->except(["_token"]);
              $data['user_id'] = auth()->user()->id; 
               if(request()->hasFile('item_photo')){
              $data['item_photo'] = it()->upload('item_photo','item');
              }
        $create = Item::create($data); 

        return response()->json([
            "status"=>true,
            "message"=>trans('admin.added'),
            "data"=>$create
        ]);
    }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.2 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $show =  Item::find($id);
                 return response()->json([
              "status"=>true,
              "data"=> $show
              ]);  ;
            }


            /**
             * Baboon Script By [It V 1.2 | https://it.phpanonymous.com]
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
             'item_photo'=>'required|'.it()->image().'',
             'city_id'=>'required',
             'item_types_id'=>'required',

                         ];
             $data = Validator::make(request()->all(),$rules,[],[
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
             if($data->fails()){
             return response()->json([
               "status"=>false,"
               messages"=>$data->messages()
               ]); 
             }
             $data = request()->except(["_token"]);
              $data['user_id'] = auth()->user()->id; 
               if(request()->hasFile('item_photo')){
              it()->delete(Item::find($id)->item_photo);
              $data['item_photo'] = it()->upload('item_photo','item');
               }
              Item::where('id',$id)->update($data);

              $Item = Item::find($id);

              return response()->json([
               "status"=>true,
               "message"=>trans('admin.updated'),
               "data"=> $Item
               ]);
            }

            /**
             * Baboon Script By [It V 1.2 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $item = Item::find($id);

               it()->delete($item->item_photo);
               it()->delete('item',$id);

               @$item->delete();
               return response(["status"=>true,"message"=>trans('admin.deleted')]);
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
                    return response(["status"=>true,"message"=>trans('admin.deleted')]);
                }else {
                    $item = Item::find($data);
 
                    	it()->delete($item->item_photo);
                    	it()->delete('item',$data);

                    @$item->delete();
                    return response(["status"=>true,"message"=>trans('admin.deleted')]);
                }
            }

            
}