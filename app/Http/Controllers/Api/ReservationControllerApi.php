<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\Reservation;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class ReservationControllerApi extends Controller
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
               "data"=>Reservation::orderBy('id','desc')->paginate(15)
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
                         'Reservation_item_id'=>'required',
             'Reservation_start_date'=>'required',
             'Reservation_end_date'=>'',
             'Reservation_start_time'=>'required',
             'Reservation_end_time'=>'required',
             'Reservation_price'=>'',
             'Reservation_user_id'=>'required',
             'Reservation_overnight'=>'required',
             'Reservation_status'=>'required',
        ];
        $data = Validator::make(request()->all(),$rules,[],[
                         'Reservation_item_id'=>trans('admin.Reservation_item_id'),
             'Reservation_start_date'=>trans('admin.Reservation_start_date'),
             'Reservation_end_date'=>trans('admin.Reservation_end_date'),
             'Reservation_start_time'=>trans('admin.Reservation_start_time'),
             'Reservation_end_time'=>trans('admin.Reservation_end_time'),
             'Reservation_price'=>trans('admin.Reservation_price'),
             'Reservation_user_id'=>trans('admin.Reservation_user_id'),
             'Reservation_overnight'=>trans('admin.Reservation_overnight'),
             'Reservation_status'=>trans('admin.Reservation_status'),
        ]);
		
        if($data->fails()){
            return response()->json([
               "status"=>false,"
               messages"=>$data->messages()
            ]); 
             }
        $data = request()->except(["_token"]);
        $create = Reservation::create($data); 

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
                $show =  Reservation::find($id);
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
             'Reservation_item_id'=>'required',
             'Reservation_start_date'=>'required',
             'Reservation_end_date'=>'',
             'Reservation_start_time'=>'required',
             'Reservation_end_time'=>'required',
             'Reservation_price'=>'',
             'Reservation_user_id'=>'required',
             'Reservation_overnight'=>'required',
             'Reservation_status'=>'required',

                         ];
             $data = Validator::make(request()->all(),$rules,[],[
             'Reservation_item_id'=>trans('admin.Reservation_item_id'),
             'Reservation_start_date'=>trans('admin.Reservation_start_date'),
             'Reservation_end_date'=>trans('admin.Reservation_end_date'),
             'Reservation_start_time'=>trans('admin.Reservation_start_time'),
             'Reservation_end_time'=>trans('admin.Reservation_end_time'),
             'Reservation_price'=>trans('admin.Reservation_price'),
             'Reservation_user_id'=>trans('admin.Reservation_user_id'),
             'Reservation_overnight'=>trans('admin.Reservation_overnight'),
             'Reservation_status'=>trans('admin.Reservation_status'),
                   ]);
             if($data->fails()){
             return response()->json([
               "status"=>false,"
               messages"=>$data->messages()
               ]); 
             }
             $data = request()->except(["_token"]);
              Reservation::where('id',$id)->update($data);

              $Reservation = Reservation::find($id);

              return response()->json([
               "status"=>true,
               "message"=>trans('admin.updated'),
               "data"=> $Reservation
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
               $reservation = Reservation::find($id);


               @$reservation->delete();
               return response(["status"=>true,"message"=>trans('admin.deleted')]);
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$reservation = Reservation::find($id);

                    	@$reservation->delete();
                    }
                    return response(["status"=>true,"message"=>trans('admin.deleted')]);
                }else {
                    $reservation = Reservation::find($data);
 

                    @$reservation->delete();
                    return response(["status"=>true,"message"=>trans('admin.deleted')]);
                }
            }

            
}