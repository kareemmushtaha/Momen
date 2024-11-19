@extends('website.layouts.front')
@section('title')
<title> الصفحة الرئسية |  {{ setting()->sitename_ar }} </title>
<meta property="og:title" content="الصفحة الرئسية |  {{ setting()->sitename_ar }} ">
@endsection
@section('content')
<div class="section p-0 section-hero">
    <div class="swiper-container slider-hero">
        <div class="swiper-wrapper">
        @if($items->count() > 0 && ! empty($items))
            @foreach($items as $item)
            <div class="swiper-slide slide-item">
                <div
                    class="slide-inner slide-bg-image main-sider-inner"
                    data-background="{{ it()->url($item->item_photo) }}"
                    style="background-image: url({{ it()->url($item->item_photo) }});">
                    <div class="container-fluid px-sm-5 mb-sm-5 mb-4">
                        <div class="row no-gutters">
                            <div class="col-lg-6">
                                <div class="hero-content">
                                    <h2 class="hero-title font-bold">{{ $item->Item_name}} </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach

          @else
          <p>لا يوجد شاليهات</p>

          @endif
        </div>
        <!-- end swiper-wrapper-->
        <!-- swipper controls-->
        <div class="swiper-button-next"><i class="far fa-chevron-left"></i></div>
        <div class="swiper-button-prev"><i class="far fa-chevron-right"></i></div>
    </div>
</div>
<!-- end:: section -->
<!-- begin:: section -->



  <section class="latestChalet section  wow fadeInDown" data-wow-delay="0.3s">
    <div class="container">
      <div class="chaletTilte d-flex align-items-center " >
        <img src="{{ asset('website')}}/assets/images/chalet.svg" alt="" class="pr-2">  <h2 class="pt-2"> احدث الشاليهات </h2>
      </div>

      <div class="row mt-5">
      @if($items->count() > 0 && ! empty($items))
            @foreach($items as $item)
            <div class="col-lg-4 col-md-6">
              <a href="{{ url('singleChalet' ,$item->id ) }}">
              <div class="singleChalet">
                <div class="chaletImg">
                <img src="{{ it()->url($item->item_photo) }}" alt=""></div>
                <div class="chaletText d-flex align-items-center justify-content-between">
                  <h5>{{ $item->Item_name}}</h5>
                  <h5>{{ $item->Item_price}} ريال</h5>
                </div>
              </div>
            </a>
            </div>

            @endforeach
            <div class="col-12 text-center mt-3">
              <a class="btn btn-primary btn-sm" href="{{ url('/chalets') }}"  >عرض المزيد</a>
            </div>
@else
<p>لا يوجد شاليهات</p>

@endif



      </div>

    </div>
  </section>
@endsection
