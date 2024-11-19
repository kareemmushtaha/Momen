<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\ReservationDataTable;
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
class ReservationController extends Controller
{

    /**
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index(ReservationDataTable $reservation)
    {
        return $reservation->render('admin.reservation.index', ['title' => trans('admin.reservation')]);
    }

    public function do_active($id)
    {
        $reservation = Reservation::find($id);
        $message = 'تم تأكيد حجزكم (' . $reservation->item->Item_name . ')
وقت الدخول ' . $reservation->Reservation_start_date . '
 الساعة ' . $reservation->Reservation_start_time . '
وقت الخروج ' . $reservation->Reservation_end_date . '
 الساعة' . $reservation->Reservation_end_time . ' ';
        if (request('status') == "active") {
            $phone = (int)$reservation->userInfo->phone;
            if ($this->startsWith($phone, '5')) {
                $this->sendSMS("966" . $phone, $message);
            }

            if (Reservation::where('id', $id)->update(['Reservation_status' => "done"])) {
                session()->flash('success', trans('admin.active_done'));
            }
        } else if (request('status') == "pending") {
            if (Reservation::where('id', $id)->update(['Reservation_status' => "pending"])) {
                session()->flash('success', trans('admin.active_done'));
            }
        } else if (request('status') == "canceled") {
            if (Reservation::where('id', $id)->update(['Reservation_status' => "canceled"])) {
                session()->flash('success', trans('admin.active_done'));
            }
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
        // $reservation =  Reservation::where($id);

        return view('admin.reservation.create', ['title' => trans('admin.create')]);
    }

    /**
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $r
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'Reservation_item_id' => 'required',
            'Reservation_start_date' => 'required',
            'Reservation_end_date' => '',
            'Reservation_start_time' => 'required',
            'Reservation_end_time' => 'required',
            'Reservation_price' => '',
            'Reservation_user_id' => 'required',
            'Reservation_overnight' => '',
            'count' => '',
            'Reservation_status' => 'required',

        ];
        $data = $this->validate(request(), $rules, [], [
            'Reservation_item_id' => trans('admin.Reservation_item_id'),
            'Reservation_start_date' => trans('admin.Reservation_start_date'),
            'Reservation_end_date' => trans('admin.Reservation_end_date'),
            'Reservation_start_time' => trans('admin.Reservation_start_time'),
            'Reservation_end_time' => trans('admin.Reservation_end_time'),
            'Reservation_price' => trans('admin.Reservation_price'),
            'Reservation_user_id' => trans('admin.Reservation_user_id'),
            'Reservation_overnight' => trans('admin.Reservation_overnight'),
            'Reservation_status' => trans('admin.Reservation_status'),

        ]);

        $start_date = date('d-m-Y', strtotime($request->Reservation_start_date));
        request()->Reservation_overnight == "on" ? $data['Reservation_overnight'] = "1" : $data['Reservation_overnight'] = "0";
        $enddate = date('d-m-Y', strtotime(strstr(request()->Reservation_end_date, ' ')));
        $data['Reservation_end_date'] = $enddate;
        $data['count'] = request()->count;
        $existsReservation_overnight = Reservation::where('Reservation_start_date', $start_date)->first();
        if ($request->count == 1 && $request->overnight == "on" && $existsReservation_overnight == null) {
            // dd($request->All());
            $reservation = new Reservation();
            $reservation->Reservation_item_id = $request->Reservation_item_id;
            $reservation->Reservation_start_date = $start_date;
            $reservation->Reservation_end_date = $enddate;
            $reservation->Reservation_start_time = $request->Reservation_start_time;
            $reservation->Reservation_end_time = $request->Reservation_end_time;
            $reservation->Reservation_price = $request->Reservation_price;
            $reservation->count = $request->count;
            $reservation->Reservation_user_id = $request->Reservation_user_id;
            $reservation->Reservation_overnight = $request->Reservation_overnight ? "0" : "1";
            $reservation->Reservation_status = $request->Reservation_status;
            $reservation->save();
            session()->flash('success', 'تم الحجز بنجاح');
            return redirect(aurl('reservation'));

        } else {
            $existsReservation = Reservation::where('Reservation_item_id', $request->id)
                ->byBusy($start_date, $enddate)
                ->first();

            // dd($request->overnight);
            if ($existsReservation) {
                session()->flash('error', 'لا يمكن اتمام الحجز، حيث أنه يوجد حجز في نفس الفترة');
                return back();
            } else {
                $reservation = new Reservation();
                $reservation->Reservation_item_id = $request->Reservation_item_id;
                $reservation->Reservation_start_date = $start_date;
                $reservation->Reservation_end_date = $enddate;
                $reservation->count = $request->count;
                $reservation->Reservation_start_time = $request->Reservation_start_time;
                $reservation->Reservation_end_time = $request->Reservation_end_time;
                $reservation->Reservation_price = $request->Reservation_price;
                $reservation->Reservation_user_id = $request->Reservation_user_id;
                $reservation->Reservation_overnight = $request->Reservation_overnight ? "0" : "1";
                $reservation->Reservation_status = $request->Reservation_status;
                $reservation->save();
                session()->flash('success', 'تم الحجز بنجاح');
                return redirect(aurl('reservation'));

            }
        }


        // Reservation::create($data);
        //
        // session()->flash('success',trans('admin.added'));
        // return redirect(aurl('reservation'));
    }

    /**
     * Display the specified resource.
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservation = Reservation::find($id);
        $reservations = Reservation::where("Reservation_item_id", $id)->get();
        // dd($reservations);
        return view('admin.reservation.show', ['title' => trans('admin.show'), 'reservation' => $reservation, 'reservations' => $reservations]);
    }


    /**
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * edit the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reservation = Reservation::find($id);
        return view('admin.reservation.edit', ['title' => trans('admin.edit'), 'reservation' => $reservation]);
    }


    /**
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * update a newly created resource in storage.
     * @param \Illuminate\Http\Request $r
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'Reservation_item_id' => 'required',
            'Reservation_start_date' => '',
            'Reservation_end_date' => '',
            'Reservation_start_time' => 'required',
            'Reservation_end_time' => 'required',
            'Reservation_price' => '',
            'Reservation_user_id' => 'required',
            'Reservation_overnight' => '',
            'count' => '',
            'Reservation_status' => 'required',

        ];
        $data = $this->validate(request(), $rules, [], [
            'Reservation_item_id' => trans('admin.Reservation_item_id'),
            'Reservation_start_date' => trans('admin.Reservation_start_date'),
            'Reservation_end_date' => trans('admin.Reservation_end_date'),
            'Reservation_start_time' => trans('admin.Reservation_start_time'),
            'Reservation_end_time' => trans('admin.Reservation_end_time'),
            'Reservation_price' => trans('admin.Reservation_price'),
            'Reservation_user_id' => trans('admin.Reservation_user_id'),
            'Reservation_overnight' => trans('admin.Reservation_overnight'),
            'Reservation_status' => trans('admin.Reservation_status'),

        ]);
        $start_date = date('d-m-Y', strtotime($request->Reservation_start_date));
        request()->Reservation_overnight == "on" ? $data['Reservation_overnight'] = "1" : $data['Reservation_overnight'] = "0";
        $enddate = date('d-m-Y', strtotime(strstr(request()->Reservation_end_date, ' ')));
        $data['Reservation_start_date'] = $start_date;
        $data['Reservation_end_date'] = $request->Reservation_end_date != null ? $enddate : Reservation::where('id', $id)->first()->Reservation_end_date;
        $data['count'] = request()->count;
        // $existsReservation_overnight = Reservation::where('Reservation_start_date', $start_date)->first();
        if ($request->count == 1 && $request->overnight == "on") {
            // dd($data ,$request->Reservation_end_date);

            Reservation::where('id', $id)->update($data);

            session()->flash('success', trans('admin.updated'));
            return redirect(aurl('reservation'));

        } else {
            $existsReservation = Reservation::where('Reservation_item_id', $request->id)
                ->byBusy($start_date, $enddate)
                ->first();

            if ($existsReservation) {
                session()->flash('error', 'لا يمكن اتمام الحجز، حيث أنه يوجد حجز في نفس الفترة');
                return back();
            } else {
                Reservation::where('id', $id)->update($data);

                session()->flash('success', trans('admin.updated'));
                return redirect(aurl('reservation'));

            }
        }


        //
        //
        //
        //
        //
        //
        //        request()->Reservation_overnight == "on" ? $data['Reservation_overnight'] = "1" :  $data['Reservation_overnight'] = "0";
        //        $enddate = date('d-m-Y', strtotime(strstr(request()->Reservation_end_date, ' ')));
        //        $data['Reservation_end_date']  = $enddate;
        //        $data['count']  = request()->count;
        //
        // Reservation::where('id',$id)->update($data);
        //
        // session()->flash('success',trans('admin.updated'));
        // return redirect(aurl('reservation'));
    }

    /**
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * destroy a newly created resource in storage.
     * @param \Illuminate\Http\Request $r
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservation = Reservation::find($id);


        @$reservation->delete();
        session()->flash('success', trans('admin.deleted'));
        return back();
    }


    public function multi_delete(Request $r)
    {
        $data = $r->input('selected_data');
        if (is_array($data)) {
            foreach ($data as $id) {
                $reservation = Reservation::find($id);

                @$reservation->delete();
            }
            session()->flash('success', trans('admin.deleted'));
            return back();
        } else {
            $reservation = Reservation::find($data);


            @$reservation->delete();
            session()->flash('success', trans('admin.deleted'));
            return back();
        }
    }

    function sendSMS($mobileNumber, $messageContent)
    {

        $user = "";
        $password = "";
        $sendername = "";

        $text = urlencode($messageContent);
        $to = $mobileNumber;
        // auth call
        $url = "http://www.oursms.net/api/sendsms.php?username=$user&password=$password&numbers=$to&message=$text&sender=$sendername&unicode=E&return=json";


        $ret = file_get_contents($url);
        echo nl2br($ret);
    }

    public function startsWith($string, $startString)
    {
        $len = strlen($startString);
        return (substr($string, 0, $len) === $startString);
    }


}
