<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    @yield('title')
    <link rel="shortcut icon" href="{{ it()->url(setting()->icon) }}" type="image/x-icon">
    <meta property="og:description" content="{{ setting()->description_ar }}">
    <meta name="author" content="{{ setting()->sitename_ar }}">
    <meta property="og:image" content="{{ it()->url(setting()->logo) }}">
    <meta name="description" content="{{ setting()->description_ar }}">
    <meta name="keywords" content="{{ setting()->keywords_ar }}">
    <meta property="og:url" content="{{url('/')}}"/>
    <meta property="og:site_name" content="{{ setting()->sitename_ar }}"/>
    <meta name="author" content="{{ setting()->sitename_ar }}"/>
    <meta name="copyright" content="{{ url('/')}}"/>
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.15.2/css/pro.min.css"/>
    <link rel="stylesheet" href="{{ asset('website') }}/assets/css/animate.min.css"/>
    <link rel="stylesheet" href="{{ asset('website') }}/assets/css/swiper.min.css"/>
    <link rel="stylesheet" href="{{ asset('website') }}/assets/css/ion.rangeSlider.min.css"/>
    <link rel="stylesheet" href="{{ asset('website') }}/assets/css/lightcase.min.css"/>
    <link rel="stylesheet" href="{{ asset('website') }}/assets/css/bootstrap.rtl.min.css"/>
    
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/alertify.min.css" integrity="sha512-IXuoq1aFd2wXs4NqGskwX2Vb+I8UJ+tGJEu/Dc0zwLNKeQ7CW3Sr6v0yU3z5OQWe3eScVIkER4J9L7byrgR/fA==" crossorigin="anonymous" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/alertify.rtl.min.css" integrity="sha512-sHw94bLAdqQcXVRgkXUS60kz7qWZt5paeUnyIO+gsUn8WtC3QcefITDK4iadYARbyGLFC3uOPsOeYADvkqomSA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('website') }}/assets/css/main.css"/>
    @yield('css')
<style>
    .alertify-notifier.ajs-left .ajs-message.ajs-visible {
        color: #fff;
    }
</style>

  </head>

  <body><!-- begin:: Page -->
    <div class="main-wrapper">
      <div class="loader-page"><span></span><span></span></div>
      <div class="mobile-menu-overlay"></div><!-- begin:: top-header --> 
      <div class="top-header">
        <div class="container-fluid px-sm-5">
          <div class="row justify-content-between align-items-center">
            <div class="col-lg-auto d-none d-lg-flex">
              <ul class="top-header-info">
                 <li><a href="#"><i class="fas fa-at mr-2"></i>{{ setting()->email }}</a></li>
                <li><a href="#"><i class="fas fa-fax mr-2"></i>{{ setting()->phone }}</a></li>
              </ul>
            </div>
            <div class="col-lg-auto">
              <div class="d-flex justify-content-end align-items-center"> 

                <ul class="social-media">
                @foreach(App\Model\Social::where(["status" => "active"])->get() as $link)
                                    <li><a href="{{ $link->url }}" class="facebook"><i
                                                class="{{ $link->fa_icon }}"></i></a></li>
                                    @endforeach

                </ul>
              </div>
            </div>
          </div>
        </div>
      </div><!-- end:: top-header --> 
      <!-- begin:: Header --> 
      <header class="main-header">
        <div class="container-fluid px-sm-5">
          <div class="d-flex align-items-center">
            <div class="logo"><a href="{{ url('/') }}"><img src="{{ asset('website') }}/assets/images/شعار_فيلا_فالي_2x-removebg-preview.png" alt=""/></a></div>
            <div class="menu--mobile mx-lg-auto">
              <div class="menu-container d-lg-none ">
                <div class="btn-close-header-mobile justify-content-end"><i class="fas fa-times"></i></div>
              </div>
              <div class="menu-container w-100">
                <ul class="main-menu list-main-menu d-lg-flex justify-content-center">
                @foreach(App\Model\Link::where(["status" => "active" , 'link_place' => "header"])->get() as $link)
                    <li class="menu_item {{ request()->url() == $link->url  ? "active" : "" }}">
                        <a class="menu_link active" href="{{ $link->url }}">{{ $link->name }}</a>
                    </li>

                @endforeach
                  
                </ul>
              </div>
            </div>
            <div class="menu-container">
              <ul class="main-menu d-flex align-items-center">
              <!-- data-toggle="modal" data-target="#modalReq" -->
              @if(auth()->check())
              <li class="menu_item" style="padding: 10px"><a class="btn btn-primary btn-sm" style="padding: 5px 10px;" href="{{ url('login') }}" >{{ auth()->user()->name }}</a></li>

              <li class="menu_item"><a class="btn btn-danger btn-sm" href="{{ url('logout') }}" ><i class="fa fa-power-off"></i></a></li>

              @else
                <li class="menu_item" style="padding: 0 10px;"><a class="btn btn-primary btn-sm" href="{{ url('login') }}" >تسجيل الدخول</a></li>
              @endif
              </ul>
            </div>
            <div class="header-mobile__toolbar ml-3 d-lg-none fa-lg"><i class="fa fa-bars"></i></div>
          </div>
        </div>
      </header><!-- end:: Header -->    <!-- begin:: section -->



      <!-- begin:: section -->

    @yield('content')

    <footer class="section">
         <div class="container">
         <div class="row">
           <div class="col-lg-8 mx-auto text-center">
            <img src="{{ asset('website')}}/assets/images/footer.png" alt="">
            <div class="footerText mt-4">
            {!! setting()->text_footer !!}
            </div>
          </div>
           </div>
         </div>
       </footer>

       <div class="lastFooter py-2 d-lg-flex align-items-center justify-content-between container-fluid px-5">
         <p>جميع الحقوق محفوظة  ©2021</p>
         <ul class="top-header-info">
             
         @foreach(App\Model\Link::where(["status" => "active" , 'link_place' => "footer"])->get() as $link)
        <li>
            <a href="{{ $link->url }}">{{ $link->name }}</a>
        </li>
        @endforeach
       </ul>
       </div>


       <div class="modal fade" id="modalReq" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content sahdow-none border-0 rounded_lg bg-white">
            <div class="modal-body px-lg-4 py-3">
              <h2 class="font-bold modal-title text-center my-2 font-size-mpbile-18">تسجيـل الدخـول</h2>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close"><i class="fal fa-times"></i></button>
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
        </div>
      </div>

       <div class="modal fade" id="modalOtp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content sahdow-none border-0 rounded_lg bg-white">
            <div class="modal-body px-lg-4 py-3">
              <h2 class="font-bold modal-title text-center my-2 font-size-mpbile-18">تأكيد رقمك</h2>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close"><i class="fal fa-times"></i></button>
              <div class="text-center ">  <p>أدخل الرمز الذي أرسلناه عبر رسالة القصيرة إلى +00000000000
              </p></div>
              <form action="" class="py-2">      
              <div class="form-group" style="width: 300px;margin: auto;">              
                <div class="form-group d-flex align-items-center justify-content-center " id="otpcodeText" style="    direction: ltr;">
                  <input class="form-control otpInput 1"  type="text" maxlength="1" />
                  <input class="form-control otpInput 2" type="text" maxlength="1"/>
                  <input class="form-control otpInput 3" type="text" maxlength="1" />
                  <input class="form-control otpInput 4" type="text" maxlength="1"/>
                </div>
                
                <div class="form-group"> 
                  <button class="btn btn-dark btn-block rounded_lg" type="submit">تسجيـل الدخـول</button>
                </div>
                </div>

              </form>
              <!-- <div class="otpCounter mx-auto">
                <div class="otpBorder">
                25
              </div>
            </div> -->
            <div id="countdown">
              <div id="countdown-number"></div>
              <svg>
                <circle r="28" cx="30" cy="30"></circle>
              </svg>
            </div>
            </div>
          </div>
        </div>
      </div>


 
    </div><!-- end:: Page -->
    <script src="{{ asset('website') }}/assets/js/jquery.min.js"></script>
    <script src="{{ asset('website') }}/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('website') }}/assets/js/wow.min.js"></script>
    <script src="{{ asset('website') }}/assets/js/ion.rangeSlider.min.js"></script>
    <script src="{{ asset('website') }}/assets/js/lightcase.min.js"></script>
    <script src="{{ asset('website') }}/assets/js/swiper.min.js"></script>
    <script src="{{ asset('website') }}/assets/js/ticker.js"> </script>
    <script src="{{ asset('website') }}/assets/js/function.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js"></script>
    

    
<script>

var countdownNumberEl = document.getElementById('countdown-number');
  var countdown = 60;
  
  countdownNumberEl.textContent = countdown;
  
  setInterval(function() {
    countdown = --countdown <= 0 ? 60 : countdown;
  
    countdownNumberEl.textContent = countdown;
  }, 1000);
  var arr = [];
  $( "#otpcodeText input" ).keyup(function(e) {
    var target = e.srcElement;
    var myLength = $(this).val().length;

    if (myLength >= 1) {
        arr.push($(this).val());
        console.log(arr);

        $(this).next().focus();
    } else {
        $(this).prev().focus();
    }
   });

</script> 

@if(request()->route() != null) 

    @if(count($errors->all()) > 0)

    @foreach($errors->all() as $error)
    <script>
    alertify.set('notifier', 'position', 'top-left');
    alertify.error('{{ $error }}');
    </script>
    @endforeach

    @endif
    @if(session()->has('error'))
    <script>
    alertify.set('notifier', 'position', 'top-left');
    alertify.error('{{ session('error') }}');
    </script>

    @endif

    @if(session()->has('success'))
    <script>
    alertify.set('notifier', 'position', 'top-left');
    alertify.success('{{ session('success') }}');
    </script>
    @endif

@endif

    @yield('js')

</body>

</html>