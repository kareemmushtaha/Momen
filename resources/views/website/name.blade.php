@extends('website.layouts.front')
@section('title')
<title> تسجيل جديد |  {{ setting()->sitename_ar }} </title>
<meta property="og:title" content="تسجيل جديد |  {{ setting()->sitename_ar }} ">
@endsection
@section('content')
<div class="faqContainer mt-5">

    <div class="faqheader text-center">
        <h2 style="font-weight: bold;">استكمال التسجيل</h2>
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
                              <form action="{{ url('register_post') }}" method="post" class="py-2">
                              @csrf
                              <input type="hidden" name="phone" value="{{  session()->get( 'phone' ) }}">
                              
                            <div class="form-group"> 
                              
                              <input class="form-control" name="name" placeholder="اسم المستخدم" type="text" value="{{ old('name') }}"/>
                            </div>
                              
                            
                            <div class="form-group"> 
                              <button class="btn btn-dark btn-block rounded_lg" type="submit" >تسجيـل البيانات</button>
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