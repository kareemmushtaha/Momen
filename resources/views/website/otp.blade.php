@extends('website.layouts.front')
@section('title')
<title> تأكيد رقمك |  {{ setting()->sitename_ar }} </title>
<meta property="og:title" content="تأكيد رقمك |  {{ setting()->sitename_ar }} ">
@endsection
@section('content')
<div class="faqContainer mt-5">

    <div class="faqheader text-center">
        <h2 style="font-weight: bold;">تأكيد رقمك</h2>
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
    padding: 50px;font-weight: bold;">
                        <div class="text-center ">  <p>أدخل الرمز الذي أرسلناه عبر رسالة القصيرة إلى {{ session()->get( 'phone' ) }}
                        </p></div>
                        <form  class="py-2" action="{{ url('otp_post') }}"  method="post">
                        @csrf
                        <div class="form-group" style="max-width: 300px;margin: auto;">
                          <div class="form-group d-flex align-items-center justify-content-center " id="otpcodeText" style="    direction: ltr;">
                            <input type="hidden" name="phone" value="{{  session()->get( 'phone' ) }}">
                            <input class="form-control otpInput 1"  type="number" maxlength="1" name="code1"/>
                            <input class="form-control otpInput 2" type="number" maxlength="1" name="code2"/>
                            <input class="form-control otpInput 3" type="number" maxlength="1" name="code3"/>
                            <input class="form-control otpInput 4" type="number" maxlength="1" name="code4"/>
                          </div>

                          <div class="form-group">
                            <button class="btn btn-dark btn-block rounded_lg" type="submit">تسجيـل الدخـول</button>
                          </div>

                        </form>
                        <!-- <div id="countdown">
                          <div id="countdown-number"></div>
                            <svg>
                              <circle r="28" cx="30" cy="30"></circle>
                            </svg>
                          </div>
                        </div> -->
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
