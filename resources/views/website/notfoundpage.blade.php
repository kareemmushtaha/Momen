@extends('website.layouts.front')
@section('title')
<title> خطأ 404  |  {{ setting()->sitename_ar }} </title>
<meta property="og:title" content="خطأ 404  |  {{ setting()->sitename_ar }} ">
@endsection
@section('content')
<div class="page-content">
        <section class="section bg_light_2 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.1s">
          <div class="container py-5">
            <div class="row"> 
              <div class="col-lg-6 mx-auto">
                <div class="text-center">
                  <h1 class="color-general font-extraBold mb-n7">خطأ 404</h1>
                  <div class="image text-center mb-4"><img src="{{ asset('website')}}/assets/images/404.svg" alt=""/></div>
                  <h2 class="font-bold mb-2">لم نتمكن من العثور على الصفحة</h2>
                  <p class="mb-4"> عذرا لم نتمكن من العثور على الصفحة المطلوبة يرجى استخدام البحث  حتى تتمكن من  الوصول الى الصفحة التي تود</p>
           
                </div>
              </div>
            </div>
          </div>
        </section>
      </div><!-- begin:: footer -->
@endsection
