@extends('website.layouts.front')
@section('title')

<title> احدث الشاليهات |  {{ setting()->sitename_ar }} </title>
<meta property="og:title" content="احدث الشاليهات |  {{ setting()->sitename_ar }} ">
@endsection
@section('content')

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

@else 
<p>لا يوجد شاليهات</p>

@endif
      
          </div>
        
        </div>
     </section>
@endsection
