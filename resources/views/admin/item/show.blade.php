@extends('admin.index')
@push("css")
<link rel="stylesheet" href="{{ asset('website')}}/assets/css/fotorama.css">
    <link rel="stylesheet" href="{{ asset('website')}}/assets/css/simple-calendar.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="{{ asset('website')}}/assets/css/jquery.comiseo.daterangepicker.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
@media (max-width: 575.98px) { 
.calendar {
  overflow: scroll;
}
.calendar td {
    padding: .8em .1em;
    font-size: 10px;
}
}
.calendar .day.today {
    background: #00214E;
    color: white;
}
.day.has-event {
    background-color: #0e8d44;
    color: #fff;
}
.calendar .day {
    border-radius: 10px;
}
.calendar .day:hover {
    border: 2px solid #00214e;
}
.calendar .event-container .event {
    background: #00214e;
}
.ctrl {
  flex: 0 0 auto;
  display: flex;
  align-items: center;
  border-bottom: 1px solid #D5DCE6;
  background-color: #fff;
  border-radius: 5px;
  font-size: 30px;
}
.calendar .day.has-event:after {
  background: #dc3545;
}
.day.has-event {
    background-color: #dc3545;
    }
.ctrl__counter {
  position: relative;
  width: auto;
  height: 45px;
  color: #333C48;
  text-align: center;
  overflow: hidden;
}
.ctrl__counter.is-input .ctrl__counter-num {
  visability: hidden;
  opacity: 0;
  transition: opacity 100ms ease-in;
}
.ctrl__counter.is-input .ctrl__counter-input {
  visability: visible;
  opacity: 1;
  transition: opacity 100ms ease-in;
}
.ctrl__counter-input {
  width: 100%;
  margin: 0;
  padding: 0;
  position: relative;
  z-index: 2;
  box-shadow: none;
  outline: none;
  border: none;
  color: #333C48;
  font-size: 30px;
  line-height: 45px;
  text-align: center;
  visability: hidden;
  opacity: 0;
  transition: opacity 100ms ease-in;
}
.ctrl__counter-num {
  position: absolute;
  z-index: 1;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  line-height: 45px;
  visability: visible;
  opacity: 1;
  transition: opacity 1000ms ease-in;
}
.ctrl__counter-num.is-increment-hide {
  opacity: 0;
  transform: translateY(-50px);
  -webkit-animation: increment-prev 100ms ease-in;
          animation: increment-prev 100ms ease-in;
}
.ctrl__counter-num.is-increment-visible {
  opacity: 1;
  transform: translateY(0);
  -webkit-animation: increment-next 100ms ease-out;
          animation: increment-next 100ms ease-out;
}
.ctrl__counter-num.is-decrement-hide {
  opacity: 0;
  transform: translateY(50px);
  -webkit-animation: decrement-prev 100ms ease-in;
          animation: decrement-prev 100ms ease-in;
}
.ctrl__counter-num.is-decrement-visible {
  opacity: 1;
  transform: translateY(0);
  -webkit-animation: decrement-next 100ms ease-out;
          animation: decrement-next 100ms ease-out;
}
.ctrl__button {
  width: 100px;
  /* line-height: 100px; */
  text-align: center;
  color: #fff;
  cursor: pointer;
  background-color: #00214e;
  transition: background-color 100ms ease-in;
}
.ctrl__button:hover {
  background-color: #90a2b0;
  transition: background-color 100ms ease-in;
}
.ctrl__button:active {
  background-color: #778996;
  transition: background-color 100ms ease-in;
}
.ctrl__button--decrement {
  border-radius: 5px 0 0 5px;
}
.ctrl__button--increment {
  border-radius: 0 5px 5px 0;
}

@-webkit-keyframes decrement-prev {
  from {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes decrement-prev {
  from {
    opacity: 1;
    transform: translateY(0);
  }
}
@-webkit-keyframes decrement-next {
  from {
    opacity: 0;
    transform: translateY(-50px);
  }
}
@keyframes decrement-next {
  from {
    opacity: 0;
    transform: translateY(-50px);
  }
}
@-webkit-keyframes increment-prev {
  from {
    opacity: 1;
    transform: translateY(0);
  }
}
@keyframes increment-prev {
  from {
    opacity: 1;
    transform: translateY(0);
  }
}
@-webkit-keyframes increment-next {
  from {
    opacity: 0;
    transform: translateY(50px);
  }
}
@keyframes increment-next {
  from {
    opacity: 0;
    transform: translateY(50px);
  }
}
</style>

@endpush
@section('content')

		 <div class="row">
        <div class="col-md-12">
            <div class="widget-extra body-req portlet light bordered">
              <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject bold uppercase font-dark">{{$title}}</span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('item/create')}}"
                           data-toggle="tooltip" title="{{trans('admin.item')}}">
                            <i class="fa fa-plus"></i>
                        </a>


                        <span data-toggle="tooltip" title="{{trans('admin.delete')}}  {{trans('admin.item')}}">

                        <a data-toggle="modal" data-target="#myModal{{$item->id}}" class="btn btn-circle btn-icon-only btn-default" href="">
                        <i class="fa fa-trash"></i>
                        </a>
                        </span>


<div class="modal fade" id="myModal{{$item->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">x</button>
                <h4 class="modal-title">{{trans('admin.delete')}}؟</h4>
            </div>
            <div class="modal-body">
                                {{trans('admin.ask_del')}} {{trans('admin.id')}} {{$item->id}} ؟

            </div>
            <div class="modal-footer">
                {!! Form::open([
               'method' => 'DELETE',
               'route' => ['item.destroy', $item->id]
               ]) !!}
                {!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger']) !!}
                <a class="btn btn-default" data-dismiss="modal">{{trans('admin.cancel')}}</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

                        <a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('/item')}}"
                           data-toggle="tooltip" title="{{trans('admin.show_all')}}   {{trans('admin.item')}}">
                            <i class="fa fa-list"></i>
                        </a>
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" style="
    height: 27px !important;
    width: 27px !important;
    line-height: 27px !important;
    background-color: #fff;
    color: #666;" href="#"
                           data-original-title="{{trans('admin.fullscreen')}}"
                           title="{{trans('admin.fullscreen')}}">
                        </a>
                    </div>
                </div>
            <div class="portlet-body form">
            <div class="col-sm-12 mb-2">
                    <div id="events"></div>
                </div>
				<div class="col-md-12">
<div class="col-md-8 col-lg-8 col-xs-8">
<b>{{trans('admin.id')}} :</b> {{$item->id}}
</div>
<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.admin_id')}} :</b>
 {{ App\Admin::find($item->admin_id)->name }}
</div>
<div class="clearfix"></div>
<hr />


<div class="col-md-6 col-lg-6 col-xs-6">
<b>{{trans('admin.Item_name')}} :</b>
 {!! $item->Item_name !!}
</div>


<div class="col-md-6 col-lg-6 col-xs-6">
<b>{{trans('admin.itemType')}} :</b>

 {!! $item->itemType ? $item->itemType->ItemType_name : "فارغ"  !!}
</div>


<div class="clearfix"></div>
<hr />
<div class="col-md-6 col-lg-6 col-xs-6">
<b>{{trans('admin.Item_price')}} :</b>
 {!! $item->Item_price !!}
</div>


<div class="col-md-6 col-lg-6 col-xs-6">
<b>{{trans('admin.Item_price_overnight')}} :</b>
 {!! $item->Item_price_overnight !!}
</div>
<div class="clearfix"></div>
<hr />

<div class="col-md-6 col-lg-6 col-xs-6">
<b>{{trans('admin.city')}} :</b>
 {!! $item->city ? $item->city->name : "فارغ" !!}
</div>



<div class="col-md-6 col-lg-6 col-xs-6">
<b>{{trans('admin.item_bank_account')}} :</b>
 {!! $item->item_bank_account !!}
</div>

<div class="clearfix"></div>
<hr />


<div class="col-md-12 col-lg-12 col-xs-12">
<b>{{trans('admin.Item_Details')}} :</b>
 {!! $item->Item_Details !!}
</div>




<div class="clearfix"></div>
<hr />



<div class="col-md-12 col-lg-12 col-xs-12">
<b>{{trans('admin.Item_terms')}} :</b>
 {!! $item->Item_terms !!}
</div>

<div class="clearfix"></div>
<hr />


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.item_photo')}} :</b><br>
<br>


    @if(!empty($item->item_photo))
    <img src="{{it()->url($item->item_photo)}}" style="width:100%;height:300px;object-fit: fill;" />
    @endif
</div>
<div class="clearfix"></div>
<hr />
<b>{{trans('admin.imageitem')}} :</b><br>
@if($images->count() > 0 )
@foreach($images as $item)

<div class="col-md-4 col-lg-4 col-xs-4">
<br>
    @if(!empty($item->imageItem_photo))
    <img src="{{it()->url($item->imageItem_photo)}}" style="width:100%;height:300px;object-fit: fill;" />
    @endif
</div>
@endforeach
@else 
<h1>لا يوجد صور</h1>

@endif


<!-- <div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.city_id')}} :</b>
 {!! $item->city_id !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.item_types_id')}} :</b>
 {!! $item->item_types_id !!}
</div> -->

			</div>
			<div class="clearfix"></div>
           </div>
         </div>
       </div>
   </div>
@stop

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.0/js/bootstrap-datepicker.min.js"></script>

    <script src="{{ asset('website')}}/assets/js/fotorama.js"></script>

    <!-- <script src="{{ asset('website')}}/assets/js/jquery.comiseo.daterangepicker.js"></script> -->

    <script src="{{ asset('website')}}/assets/js/jquery.simple-calendar.js"></script>

    <!-- Datepicker -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/ar-sa.min.js" integrity="sha512-LTrC0erJp6xm2kdz0KhzDxDDqYmAA2bmie9YASCZv2zg4oIJh2VarpXzZcl+B9zR5+5+QI0xmQ5YAIfMmOmIgA==" crossorigin="anonymous"></script> -->

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

	<script>
	    $(document).ready(function () {
            $("#events").simpleCalendar({
                // displays events
                
                displayEvent: true,
                fixedStartDay: true,
                displayYear: true,

                // event dates

                events: [
                    @foreach($reservations as $reservation)
                        @php
                        $datestart = Carbon\Carbon::parse($reservation->Reservation_start_date, 'UTC')->locale('en');
                        $dateend= Carbon\Carbon::parse($reservation->Reservation_end_date, 'UTC')->locale('en');
                        $count = $dateend->diffInDays($datestart);

                        @endphp
                        {
                            startDate: "{{ $datestart->isoFormat('ddd MMMM D YYYY') }}",
                            endDate: "{{ $count == 0 ? $dateend->toISOString('MMMM D YYYY') : $dateend->subDays(1)->toISOString('MMMM D YYYY') }}",
                            summary: " {{ $reservation->userInfo->name }} - {{ $reservation->userInfo->phone }} ",
                        },


                    @endforeach

                ],
                months: ["يناير", "فبراير", "مارس", "أبريل", "مايو", "يونيو", "يوليو", "أغسطس", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر"],

                days: [
                    "الأحد",
                    "الإثنين",
                    "الثلاثاء",
                    "الأربعاء",
                    "الخميس",
                    "الجمعة",
                    "السبت"
                ],

                // disable showing event details

                disableEventDetails: false,

                // disable showing empty date details
                disableEmptyDetails: false,
            });


          

        });

	</script>
	
    @endpush