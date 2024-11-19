<?php
namespace App\Http\Controllers\Admin;

use App\DataTables\ContactUsDataTable;
use App\Http\Controllers\Controller;
use App\Mail\ReplayContactus;
use App\Model\ContactUs;
use App\Model\ContactUsReplay;
use Illuminate\Http\Request;
use Mail;

// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.0 | https://ecovne.com]
// Copyright Reserved  [It V 1.0 | https://ecovne.com]

class ContactUsController extends Controller
{

//    public function __construct()
//    {
//       $this->middleware('permission:contect_show', ['only' => 'index','show']);
//       $this->middleware('permission:contect_edit', ['only' => 'edit','update']);
//       $this->middleware('permission:contect_add', ['only' => 'store','create']);
//       $this->middleware('permission:contect_delete', ['only' => 'multi_delete','distroy']);
//    }
   public function index(ContactUsDataTable $contactus)
   {
      return $contactus->render('admin.contactus.index', ['title' => request()->has('folder') ? trans('admin.contactus') . ' - ' . trans('admin.' . request('folder')) : trans('admin.contactus')]);
   }

   /**
    * Baboon Script By [It V 1.0 | https://ecovne.com]
    * Show the form for creating a new resource.
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return back();
      return view('admin.contactus.create', ['title' => trans('admin.create')]);
   }

   /**
    * Baboon Script By [It V 1.0 | https://ecovne.com]
    * Store a newly created resource in storage.
    * @param  \Illuminate\Http\Request  $r
    * @return \Illuminate\Http\Response
    */
   public function store()
   {
      return back();
      $rules = [
         'subject'    => 'nullable|sometimes',
         'email'      => 'nullable|sometimes',
         'mobile'     => 'numeric|nullable',
         'name'       => 'nullable|sometimes|string',
         'message'    => 'nullable|sometimes',
         'status_msg' => '',
         'move_to'    => '',

      ];
      $data = $this->validate(request(), $rules, [], [
         'subject'    => trans('admin.subject'),
         'email'      => trans('admin.email'),
         'mobile'     => trans('admin.mobile'),
         'name'       => trans('admin.name'),
         'message'    => trans('admin.message'),
         'status_msg' => trans('admin.status_msg'),
         'move_to'    => trans('admin.move_to'),

      ]);

      $data['admin_id'] = admin()->user()->id;
      ContactUs::create($data);

      session()->flash('success', trans('admin.added'));
      return redirect(aurl('contactus'));
   }

   /**
    * Display the specified resource.
    * Baboon Script By [It V 1.0 | https://ecovne.com]
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function replay($id)
   {
      $rules = [
         'message' => 'required',
      ];
      $data = $this->validate(request(), $rules, [], [
         'message' => trans('admin.message'),

      ]);

      $data2                = [];
      $data2['message']     = $data['message'];
      $data2['orginal_msg'] = ContactUs::find($id);

      $sendmail = Mail::to($data2['orginal_msg']->email)->send(new ReplayContactus([
         'data'       => $data2,
         'old_replay' => ContactUsReplay::where('msg_id', $id)->orderBy('id', 'desc')->get(),
      ]));

      $data['msg_id']   = $id;
      $data['admin_id'] = admin()->user()->id;
      ContactUsReplay::create($data);
      ContactUs::where('id', $id)->update(['admin_id' => admin()->user()->id]);
      session()->flash('success', trans('admin.replay_sent'));

      return back();
   }

   public function show($id)
   {
      $contactus             = ContactUs::find($id);
      $contactus->status_msg = 'seen';
      $contactus->save();
      return view('admin.contactus.show', ['title' => trans('admin.show'), 'contactus' => $contactus, 'replaies' => $contactus->replay()->orderBy('id', 'desc')->paginate(10)]);
   }

   public function move_to($id, $move_to)
   {
      $contactus = ContactUs::find($id);
      if (!empty($contactus) and in_array($move_to, ['spam', 'inbox', 'archive'])) {
         $contactus->move_to = $move_to;
         $contactus->save();
         session()->flash('success', trans('admin.updated'));
      }
      return back();
   }

   /**
    * Baboon Script By [It V 1.0 | https://ecovne.com]
    * edit the form for creating a new resource.
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
      return back();
      $contactus = ContactUs::find($id);
      return view('admin.contactus.edit', ['title' => trans('admin.edit'), 'contactus' => $contactus]);
   }

   /**
    * Baboon Script By [It V 1.0 | https://ecovne.com]
    * update a newly created resource in storage.
    * @param  \Illuminate\Http\Request  $r
    * @return \Illuminate\Http\Response
    */
   public function update($id)
   {
      return back();
      $rules = [
         'subject'    => 'nullable|sometimes',
         'email'      => 'nullable|sometimes',
         'mobile'     => 'numeric|nullable',
         'name'       => 'nullable|sometimes|string',
         'message'    => 'nullable|sometimes',
         'status_msg' => '',
         'move_to'    => '',

      ];
      $data = $this->validate(request(), $rules, [], [
         'subject'    => trans('admin.subject'),
         'email'      => trans('admin.email'),
         'mobile'     => trans('admin.mobile'),
         'name'       => trans('admin.name'),
         'message'    => trans('admin.message'),
         'status_msg' => trans('admin.status_msg'),
         'move_to'    => trans('admin.move_to'),
      ]);
      $data['admin_id'] = admin()->user()->id;
      ContactUs::where('id', $id)->update($data);

      session()->flash('success', trans('admin.updated'));
      return redirect(aurl('contactus'));
   }

   /**
    * Baboon Script By [It V 1.0 | https://ecovne.com]
    * destroy a newly created resource in storage.
    * @param  \Illuminate\Http\Request  $r
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
      $contactus = ContactUs::find($id);

      @$contactus->delete();
      session()->flash('success', trans('admin.deleted'));
      return back();
   }

   public function multi_delete(Request $r)
   {
      $data = $r->input('selected_data');
      if (is_array($data)) {
         foreach ($data as $id) {
            $contactus = ContactUs::find($id);

            @$contactus->delete();
         }
         session()->flash('success', trans('admin.deleted'));
         return back();
      } else {
         $contactus = ContactUs::find($data);

         @$contactus->delete();
         session()->flash('success', trans('admin.deleted'));
         return back();
      }
   }
}
