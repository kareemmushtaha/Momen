<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\BankDataTable;
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
class BankController extends Controller
{

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(BankDataTable $bank)
            {
               return $bank->render('admin.bank.index',['title'=>trans('admin.bank')]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.bank.create',['title'=>trans('admin.create')]);
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
             'Bank_item_id'=>'required',
             'Bank_name'=>'required',
             'bank_photo'=>'',

                   ];
              $data = $this->validate(request(),$rules,[],[
             'Bank_item_id'=>trans('admin.Bank_item_id'),
             'Bank_name'=>trans('admin.Bank_name'),
             'bank_photo'=>trans('admin.bank_photo'),

              ]);
		
               if(request()->hasFile('bank_photo')){
              $data['bank_photo'] = it()->upload('bank_photo','bank');
              }
              Bank::create($data); 

              session()->flash('success',trans('admin.added'));
              return redirect(aurl('bank'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $bank =  Bank::find($id);
                return view('admin.bank.show',['title'=>trans('admin.show'),'bank'=>$bank]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
                $bank =  Bank::find($id);
                return view('admin.bank.edit',['title'=>trans('admin.edit'),'bank'=>$bank]);
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
             'Bank_item_id'=>'required',
             'Bank_name'=>'required',
             'bank_photo'=>'',

                         ];
             $data = $this->validate(request(),$rules,[],[
             'Bank_item_id'=>trans('admin.Bank_item_id'),
             'Bank_name'=>trans('admin.Bank_name'),
             'bank_photo'=>trans('admin.bank_photo'),
                   ]);
               if(request()->hasFile('bank_photo')){
              it()->delete(Bank::find($id)->bank_photo);
              $data['bank_photo'] = it()->upload('bank_photo','bank');
               }
              Bank::where('id',$id)->update($data);

              session()->flash('success',trans('admin.updated'));
              return redirect(aurl('bank'));
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
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
               session()->flash('success',trans('admin.deleted'));
               return back();
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
                    session()->flash('success', trans('admin.deleted'));
                   return back();
                }else {
                    $bank = Bank::find($data);
 
                    	it()->delete($bank->bank_photo);
                    	it()->delete('bank',$data);

                    @$bank->delete();
                    session()->flash('success', trans('admin.deleted'));
                    return back();
                }
            }

            
}