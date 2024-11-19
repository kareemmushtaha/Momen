@extends('website.layouts.front')
@section('title')
<title> تسجيل الدخـول |  {{ setting()->sitename_ar }} </title>
<meta property="og:title" content="تسجيل الدخـول |  {{ setting()->sitename_ar }} ">
@endsection
@section('content')
<div class="faqContainer mt-5">

    <div class="faqheader text-center">
        <h2 style="font-weight: bold;">تسجيل الدخول </h2>
        <br>
        <br>

    </div>
 <div class="bg-white pb-sm-5">
    <div class="container">

        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="page-content">

                    <section class="section p-0 section-form my-0   ">
                      <div class="container">
                      <div class=" rounded_lg px-lg-5   pb-4  " style="-webkit-box-shadow: 0px 0px 15px 0px rgb(115 131 142 / 15%);
    box-shadow: 0px 0px 15px 0px rgb(115 131 142 / 15%);
    max-width: 400px;
    margin: auto;
    padding: 15px;font-weight: bold;">
                              <form action="{{ url('Login_by_phone') }}" method="post" class="py-2">
                              @csrf

                            <div class="form-group">

                              <input class="form-control" name="phone" placeholder="رقـم الجوال" type="text"/>
                            </div>

                            <div class="form-group">
                              <button class="btn btn-dark btn-block rounded_lg" type="submit" >تسجيـل الدخـول</button>
                            </div>
                            <p>سنرسل إليك رسالة نصية لتأكيد رقمك</p>
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
