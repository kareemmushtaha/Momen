@extends('website.layouts.front')
@section('title')
<title> اتصل بنا |  {{ setting()->sitename_ar }} </title>
<meta property="og:title" content="اتصل بنا |  {{ setting()->sitename_ar }} ">
@endsection
@section('content')
<div class="faqContainer mt-5">

    <div class="faqheader text-center">
        <h2>تواصل معنا</h2>
         
    </div>
 <div class="bg-white pb-sm-5"> 
    <div class="container">
 
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="page-content"> 
          
                    <section class="section p-0 section-form my-0   ">
                      <div class="container"> 
                        <div class=" rounded_lg px-lg-5   pb-4  ">
                          <form class="mt-2 pt-4" action="{{ url('contectus_post')}}" method="post">
                            @csrf
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="form-group wow fadeInDown" data-wow-delay="0.2s">
                                  <input class="form-control" type="text" name="name"  value="{{ old('name') }}" placeholder="الاسم"/>
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <div class="form-group wow fadeInDown" data-wow-delay="0.3s">
                                  <input class="form-control" type="text" name="email" value="{{ old('email') }}" placeholder="البريد الالكتروني"/>
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <div class="form-group wow fadeInDown" data-wow-delay="0.4s">
                                  <input class="form-control" type="text" name="mobile" value="{{ old('mobile') }}" placeholder="رقم الهاتف"/>
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <div class="form-group wow fadeInDown" data-wow-delay="0.4s">
                                  <input class="form-control" type="text" name="subject" value="{{ old('subject') }}"  placeholder="الموضوع"/>
                                </div>
                              </div>
                              <div class="col-12">
                                <div class="form-group wow fadeInDown" data-wow-delay="0.5s">
                                  <textarea class="form-control" rows="4" name="message" value="{{ old('message') }}" placeholder="الرسالة"></textarea>
                                </div>
                              </div>
                              <div class="col-12">
                                <div class="form-group text-right mb-0 wow fadeInDown" data-wow-delay="0.6s">
                                  <button class="btn btn-primary btn-sm px-5">ارسال</button>
                                </div>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </section><!-- end:: section -->
            <!-- begin:: section -->
                    
                  </div><!-- begin:: section -->
            </div>
        </div>
    </div>
    </div>
</div>
@endsection