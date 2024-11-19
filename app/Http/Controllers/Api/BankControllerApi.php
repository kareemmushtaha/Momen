<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\Bank;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class BankControllerApi extends Controller
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
               "data"=>Bank::orderBy('id','desc')->paginate(15)
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
                         'Bank_item_id'=>'required',
             'Bank_name'=>'required',
             'bank_photo'=>'',
        ];
        $data = Validator::make(request()->all(),$rules,[],[
                         'Bank_item_id'=>trans('admin.Bank_item_id'),
             'Bank_name'=>trans('admin.Bank_name'),
             'bank_photo'=>trans('admin.bank_photo'),
        ]);
		
        if($data->fails()){
            return response()->json([
               "status"=>false,"
               messages"=>$data->messages()
            ]); 
             }
        $data = request()->except(["_token"]);
               if(request()->hasFile('bank_photo')){
              $data['bank_photo'] = it()->upload('bank_photo','bank');
              }
        $create = Bank::create($data); 

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
                $show =  Bank::find($id);
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
             'Bank_item_id'=>'required',
             'Bank_name'=>'required',
             'bank_photo'=>'',

                         ];
             $data = Validator::make(request()->all(),$rules,[],[
             'Bank_item_id'=>trans('admin.Bank_item_id'),
             'Bank_name'=>trans('admin.Bank_name'),
             'bank_photo'=>trans('admin.bank_photo'),
                   ]);
             if($data->fails()){
             return response()->json([
               "status"=>false,"
               messages"=>$data->messages()
               ]); 
             }
             $data = request()->except(["_token"]);
               if(request()->hasFile('bank_photo')){
              it()->delete(Bank::find($id)->bank_photo);
              $data['bank_photo'] = it()->upload('bank_photo','bank');
               }
              Bank::where('id',$id)->update($data);

              $Bank = Bank::find($id);

              return response()->json([
               "status"=>true,
               "message"=>trans('admin.updated'),
               "data"=> $Bank
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
               $bank = Bank::find($id);

               it()->delete($bank->bank_photo);
               it()->delete('bank',$id);

               @$bank->delete();
               return response(["status"=>true,"message"=>trans('admin.deleted')]);
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$bank = Bank::find($id);

                    	it()->delete($bank->bank_photo);
                    	it()->delete('bank',$id);
                    	@$bank->delete();
                    }
                    return response(["status"=>true,"message"=>trans('admin.deleted')]);
                }else {
                    $bank = Bank::find($data);
 
                    	it()->delete($bank->bank_photo);
                    	it()->delete('bank',$data);

                    @$bank->delete();
                    return response(["status"=>true,"message"=>trans('admin.deleted')]);
                }
            }

            
}