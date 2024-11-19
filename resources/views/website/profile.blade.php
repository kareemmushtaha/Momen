@extends('website.layouts.front')
@section('title')
<title> {{ auth()->user()->name }} |  {{ setting()->sitename_ar }} </title>
<meta property="og:title" content="{{ auth()->user()->name }} |  {{ setting()->sitename_ar }} ">
@endsection
@section('content')

<section class="section">
          <div class="userPage">
              <div class="container">
     <div class="row">
      <div class="col-lg-6">
        <div class="chaletTilte d-flex align-items-center mb-3" >
            <i class="fal fa-user-alt pr-2"></i>  <h2 class="pt-2"> بيانـاتي </h2>
          </div>
           <div class="userData px-4 py-4 rounded_lg  box_shadow">
           <form action="{{ url('profile_edit_post') }}" method="post">
           @csrf
            <div class="form-group">
              <label> الإسم</label>
              <input class="form-control" type="text" name="name" placeholder="الإسم" value="{{ auth()->user()->name }}" />
            </div>
            <div class="form-group">
              <label> رقم الجوال</label>
              <input class="form-control" type="text" name="phone" placeholder="رقم الجوال" value="{{ auth()->user()->phone }}"/>
            </div>
            <div class="form-group">
              <label>رقم الهوية الوطنية</label>
              <input class="form-control" type="text" name="national_id" placeholder="رقم الهوية الوطنية" value="{{ auth()->user()->national_id }}"/>
            </div>



            <div class="form-group">
              <button class="btn btn-primary btn-block rounded_lg" type="submit">تعديل البيانات</button>
            </div>
          </form>
      </div></div>
      <div class="col-lg-6">
        <div class="chaletTilte d-flex align-items-center mb-3" >
            <i class="fal fa-history pr-2"></i>  <h2 class="pt-2"> حجـوزاتي </h2>
          </div>
        <div class="row">
          @if($reservations->count() > 0 )
          @foreach($reservations as $item)
            <div class="col-md-6">
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

            <div class="col-12 mt-3">
                <div class="form-group">
                    <form action="{{ url('/Myreservations')}}" method="get">
                    <button class="btn btn-primary btn-block rounded_lg" type="submit">عرض المزيد</button>

                    </form>
                  </div>
            </div>
          @else
            <p>لا يوجد حجوزات</p>
          @endif
        </div>
    </div>

     </div>
              </div>
          </div>
      </section>

@endsection
