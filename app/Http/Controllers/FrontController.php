<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;
use App\Model\Page;
use App\Model\ContactUs;
use Carbon\Carbon;
use Mail;
use App\VerifyUser;
use Image;
use App\Model\Item;
use App\Model\imageItem;
use App\Model\Reservation;

class FrontController extends Controller
{


   // reservation

   public function reservation(Request $request)
   {
     // dd( $request->all());
      $enddate = date('d-m-Y', strtotime(strstr($request->enddate_input, ' ')));
      $start_date = date('d-m-Y', strtotime($request->start_date));
      $existsReservation_overnight = Reservation::where('Reservation_start_date', $start_date)->first();
      if($request->count == 1 && $request->overnight == "on" && $existsReservation_overnight == null) {
        // dd($request->All());
        $reservation = new Reservation();
        $reservation->Reservation_item_id = $request->id;
        $reservation->Reservation_start_date = $start_date;
        $reservation->Reservation_end_date   = $enddate;
        $reservation->Reservation_start_time = $request->start_time_input;
        $reservation->Reservation_end_time   = $request->end_time_input;
        $reservation->Reservation_price = $request->price_input;
        $reservation->Reservation_user_id = auth()->user()->id;
        $reservation->count = $request->count;
        $reservation->Reservation_overnight = $request->overnight  ? "0" : "1";
        $reservation->Reservation_status = "pending";
        $reservation->save();
        session()->flash('success', 'تم الحجز بنجاح');
        return redirect('/myprofile');

      } else {
        $existsReservation = Reservation::where('Reservation_item_id', $request->id)
        ->byBusy($start_date, $enddate)
        ->first();
        if(auth()->user()->national_id == null) {
          session()->flash('error', 'عليك بتاكيد رقم الهوية الخاص بك');
          return redirect('/myprofile');
        }
        // dd($request->overnight);
        if ($existsReservation ) {
          session()->flash('error', 'لا يمكن اتمام الحجز، حيث أنه يوجد حجز في نفس الفترة');
          return back();
         } else {
          $reservation = new Reservation();
          $reservation->Reservation_item_id = $request->id;
          $reservation->Reservation_start_date = $start_date;
          $reservation->Reservation_end_date   = $enddate;
          $reservation->Reservation_start_time = $request->start_time_input;
          $reservation->Reservation_end_time   = $request->end_time_input;
          $reservation->Reservation_price = $request->price_input;
          $reservation->Reservation_user_id = auth()->user()->id;
          $reservation->count = $request->count;
          $reservation->Reservation_overnight = $request->overnight  ? "0" : "1";
          $reservation->Reservation_status = "pending";
          $reservation->save();
          session()->flash('success', 'تم الحجز بنجاح');
          return redirect('/myprofile');

        }
      }

   }



    // Deafult route
    public function defaultIndex(){
      $items = Item::get();
      return view('website.home' , compact('items' ));
    }

    public function convent(Request $request)
    {
       $sdate = Carbon::make(date('Y-m-d', strtotime($request->data)));

       if($request->count == 1 && $request->overnight == null) {
         $d = Carbon::make(date('Y-m-d', strtotime($request->data)));
       } else {
         $d = Carbon::make(date('Y-m-d', strtotime($request->data. " + $request->count day")));
       }

       return response()->json([
          'start' => trans('admin.days.'.$sdate->format('D')).' '. $sdate->format('d-m-Y') ,
          'end' => trans('admin.days.'.$d->format('D')).' '. $d->format('d-m-Y'),
          'addDay' => "",
          'MOW' => Carbon::now()
       ]);
    }


    public function profile_edit_post(Request $request)
    {
      $user_id = auth()->user()->id;

      // dd($request->all());
      $data = $this->validate(request(), [
         // 'phone' =>'required|regex:/[0-9]{10}/|digits:10|unique:users,phone,'.$user_id,
         // 'national_id' =>'required|regex:/[0-9]{10}/|digits:10|unique:users,national_id,'.$user_id,
         'phone' =>'required|regex:/[0-9]{10}/|digits:10',
         'national_id' =>'required|regex:/[0-9]{10}/|digits:10',
         'name' => 'required',
      ], [], [
         'phone' => trans('admin.phone'),
         'name' => trans('admin.name'),
         'national_id' => trans('admin.NationalID'),
      ]);
      $user = User::find($user_id);
      $user->name = request('name');
      $user->phone      = request('phone');
      $user->national_id    = request('national_id');
      $user->save();
      session()->flash('success', 'تم تحديث البيانات بنحاح');
      return redirect('/');
    }

    public function Myreservations()
    {
      $title = 'حجـوزاتي';

      $reservations = Reservation::where('Reservation_user_id', auth()->user()->id)
      ->join('items', 'items.id', '=', 'reservations.Reservation_item_id')
      ->select("items.Item_name", "Reservation_end_time" , "Reservation_start_time" , "Reservation_end_date","items.item_photo" , "reservations.Reservation_price" ,"reservations.Reservation_start_date", "reservations.Reservation_status")
      ->get();
      return view('website.Myreservations' , compact('title','reservations'));
   }
   public function chalets()
   {
     $title = 'احدث الشاليهات';
     $items = Item::get();
     return view('website.chalets' , compact('title', 'items' ));
  }
  public function singleChalet($id)
  {
    $title = 'احدث الشاليهات';
    $item = Item::find($id);
    $slider = imageItem::where('imageItem_id',$id)->get();
    $reservations = Reservation::where('Reservation_item_id', $id)->get();
    // dd($reservations);
    if ($item == null) {
       return redirect('/404');
    }

    return view('website.singleChalet' , compact('title' , 'item' , 'slider' ,'reservations'));
 }



    public function myprofile() {
        $title = 'الصفحة الرئسية';
        $reservations = Reservation::where('Reservation_user_id', auth()->user()->id)
        ->join('items', 'items.id', '=', 'reservations.Reservation_item_id')
        ->select("items.Item_name", "Reservation_end_time" , "Reservation_start_time" , "Reservation_end_date","items.item_photo" , "reservations.Reservation_price" ,"reservations.Reservation_start_date", "reservations.Reservation_status")
        ->get();


        return view('website.profile' , compact('title','reservations' ));



    }

    public function otp(){
      $title = 'تسجيل دخول';
      return view('website.otp' , compact('title'));

    }

    public function register(){
      $title = 'تسجيل جديد';
      return view('website.register' , compact('title'));
    }


    public function contectus(){

       $title= "اتصل بتا";

       return view('website.contectus',compact('title'));
    }

    public function maintenance(){
        return view('website.maintenance', ['title' => trans('admin.maintenance')]);
    }



   public function page($id){
      $page = Page::where(
          [
              'status' => 'active',
              'id' => $id
      ])->first();
      if ($page === null ) {

         return redirect('/');
      }
      return view('website.page', ['page' => $page, 'title' => $page->title]);
   }

   public function contactus_post(){

      $data = $this->validate(request(), [
         'subject' => 'required|string|max:255',
         'email'   => 'required|email|max:255',
         'mobile'  => 'required',
         'name'    => 'required',
         'message' => 'required',

      ], [], [
         'name'    => trans('admin.name'),
         'email'   => trans('admin.email'),
         'subject' => trans('admin.subject'),
         'message' => trans('admin.message'),
         'mobile'  => trans('admin.mobile'),
      ]);
      $data['status_msg'] = 'unseen';
      $data['move_to']    = 'inbox';
      $contact            = ContactUs::create($data);

      session()->flash('success', trans('admin.msg_sent'));
      return back();
   }


   public function PageNotFound(){
      return view('website.404');
   }

   public function logout(){
      Auth::logout();
      return redirect('/');
   }

}
