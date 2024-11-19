@extends('website.layouts.front')
@section('title')

@endsection
@section('content')

<div class="container my-5">
   
        <div class="chaletTilte d-flex align-items-center mb-3" >
            <i class="fal fa-history pr-2"></i>  <h2 class="pt-2"> حجـوزاتي </h2>
          </div>
          <div class="row">
          @foreach($reservations as $item)
            <div class="col-md-4">
                <div class="singleHist py-2 px-2 rounded_lg  box_shadow">
                    <img src="{{ it()->url($item->item_photo)}}" class="rounded_lg mb-2" alt="">
                    <h3>{{ $item->Item_name  }}</h3>
                    <div class="cahletFeatures mt-3">
                    <ul class=' d-flex align-items-center flex-wrap  '>

<li class="mr-3 mb-3">
    <div class="single_widget">
        <p><i class="fal fa-money-bill-wave  pr-2"></i>السعر  - {{ $item->Reservation_price  }} ريال</p>
    </div>
</li>
<li class="mr-3 mb-3">
    <div class="single_widget">
        <p><i class="fal fa-calendar-alt pr-2"></i> تاريخ الدخول - {{ $item->Reservation_start_date  }}</p>
    </div>
</li>
<li class="mr-3 mb-3">
    <div class="single_widget">
        <p><i class="fal fa-clock  pr-2"></i> ساعة الدخول  - {{ $item->Reservation_start_time }}</p>
    </div>
</li>
<li class="mr-3 mb-3">
    <div class="single_widget">
        <p><i class="fal fa-calendar-alt pr-2"></i> تاريخ الخروج - {{ $item->Reservation_end_date  }}</p>
    </div>
</li>
<li class="mr-3 mb-3">
    <div class="single_widget">
        <p><i class="fal fa-clock  pr-2"></i> ساعة الخروج - {{ $item->Reservation_end_time  }}</p>
    </div>
</li>
<li class="mr-3 mb-3">
    <div class="single_widget">
        <p><i class="fal fa-hourglass pr-2"></i> حالة الحجز -
          <span class="label
          {{ $item->Reservation_status == 'pending'?'label-warning':'' }}
          {{ $item->Reservation_status == 'canceled'?'label-danger':'' }}
          {{ $item->Reservation_status == 'done'?'label-primary':'' }}">
          {{ trans('admin.'.$item->Reservation_status) }}
          </span>
        </p>
    </div>
</li>


</ul>

                    </div>
                </div>
            </div>
            @endforeach

           
        </div>  
  
    </div>
@endsection
