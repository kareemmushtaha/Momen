@extends('website.layouts.front')
@section('title')
    <title> الصفحة الرئسية |  {{ setting()->sitename_ar }} </title>
    <meta property="og:title" content="الصفحة الرئسية |  {{ setting()->sitename_ar }} ">
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('website')}}/assets/css/fotorama.css">
    <link rel="stylesheet" href="{{ asset('website')}}/assets/css/simple-calendar.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('website')}}/assets/css/jquery.comiseo.daterangepicker.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        @media (max-width: 575.98px) {
            .calendar {
                overflow: scroll;
            }
            .calendar td {
                padding: .8em .1em;
                font-size: 10px;
            }
        }
        .calendar .day.today {
            background: #00214E;
            color: white;
        }
        .day.has-event {
            background-color: #0e8d44;
            color: #fff;
        }
        .calendar .day {
            border-radius: 10px;
        }
        .calendar .day:hover {
            border: 2px solid #00214e;
        }
        .calendar .event-container .event {
            background: #00214e;
        }
        .ctrl {
            flex: 0 0 auto;
            display: flex;
            align-items: center;
            border-bottom: 1px solid #D5DCE6;
            background-color: #fff;
            border-radius: 5px;
            font-size: 30px;
        }
        .ctrl__counter {
            position: relative;
            width: auto;
            height: 45px;
            color: #333C48;
            text-align: center;
            overflow: hidden;
        }
        .ctrl__counter.is-input .ctrl__counter-num {
            visability: hidden;
            opacity: 0;
            transition: opacity 100ms ease-in;
        }
        .ctrl__counter.is-input .ctrl__counter-input {
            visability: visible;
            opacity: 1;
            transition: opacity 100ms ease-in;
        }
        .calendar .day.has-event:after {
            background: #dc3545;
        }
        .day.has-event {
            background-color: #dc3545;
        }
        .ctrl__counter-input {
            width: 100%;
            margin: 0;
            padding: 0;
            position: relative;
            z-index: 2;
            box-shadow: none;
            outline: none;
            border: none;
            color: #333C48;
            font-size: 30px;
            line-height: 45px;
            text-align: center;
            visability: hidden;
            opacity: 0;
            transition: opacity 100ms ease-in;
        }
        .ctrl__counter-num {
            position: absolute;
            z-index: 1;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            line-height: 45px;
            visability: visible;
            opacity: 1;
            transition: opacity 1000ms ease-in;
        }
        .ctrl__counter-num.is-increment-hide {
            opacity: 0;
            transform: translateY(-50px);
            -webkit-animation: increment-prev 100ms ease-in;
            animation: increment-prev 100ms ease-in;
        }
        .ctrl__counter-num.is-increment-visible {
            opacity: 1;
            transform: translateY(0);
            -webkit-animation: increment-next 100ms ease-out;
            animation: increment-next 100ms ease-out;
        }
        .ctrl__counter-num.is-decrement-hide {
            opacity: 0;
            transform: translateY(50px);
            -webkit-animation: decrement-prev 100ms ease-in;
            animation: decrement-prev 100ms ease-in;
        }
        .ctrl__counter-num.is-decrement-visible {
            opacity: 1;
            transform: translateY(0);
            -webkit-animation: decrement-next 100ms ease-out;
            animation: decrement-next 100ms ease-out;
        }
        .ctrl__button {
            width: 100px;
            /* line-height: 100px; */
            text-align: center;
            color: #fff;
            cursor: pointer;
            background-color: #00214e;
            transition: background-color 100ms ease-in;
        }
        .ctrl__button:hover {
            background-color: #90a2b0;
            transition: background-color 100ms ease-in;
        }
        .ctrl__button:active {
            background-color: #778996;
            transition: background-color 100ms ease-in;
        }
        .ctrl__button--decrement {
            border-radius: 5px 0 0 5px;
        }
        .ctrl__button--increment {
            border-radius: 0 5px 5px 0;
        }

        @-webkit-keyframes decrement-prev {
            from {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes decrement-prev {
            from {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @-webkit-keyframes decrement-next {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
        }
        @keyframes decrement-next {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
        }
        @-webkit-keyframes increment-prev {
            from {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes increment-prev {
            from {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @-webkit-keyframes increment-next {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
        }
        @keyframes increment-next {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
        }


        .calendar .event-container {
            display: none !important;
        }
        .filler {
            display: none !important;
        }
    </style>
@endsection
@section('js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.0/js/bootstrap-datepicker.min.js"></script>

    <script src="{{ asset('website')}}/assets/js/fotorama.js"></script>

    <!-- <script src="{{ asset('website')}}/assets/js/jquery.comiseo.daterangepicker.js"></script> -->

    <script src="{{ asset('website')}}/assets/js/jquery.simple-calendar.js"></script>

    <!-- Datepicker -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/ar-sa.min.js" integrity="sha512-LTrC0erJp6xm2kdz0KhzDxDDqYmAA2bmie9YASCZv2zg4oIJh2VarpXzZcl+B9zR5+5+QI0xmQ5YAIfMmOmIgA==" crossorigin="anonymous"></script> -->

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAeF3IGlZHTzY9BJJ64EwB3QAZMwWzGLZM&callback=initMap"async></script>
    <script>
        let map;

        function initMap() {
            const myLatLng = { lat: {{$item->item_latitude}}, lng: {{$item->item_longitude}} };

            map = new google.maps.Map(document.getElementById("map"), {
                center: myLatLng,
                zoom: 8,
            });
            new google.maps.Marker({
                position: myLatLng,
                map,
            });

        }
        $(document).ready(function () {
            // Abdelwahab
            var currentDate = new Date();
            $(function() {
                $('#date').datepicker({
                    "startDate": currentDate,
                })
                    .on('changeDate', function(e){
                        var count = $(".ctrl__counter-input").val();
                        console.log(count);
                        $.ajax({
                            url : "{{route('convent') }}",
                            data : "data="+e.format('dd-mm-yyyy') +"&count="+count
                        }).done(function(result){
                            var price_overnight = "{{$item->Item_price_overnight}}";
                            var price = "{{$item->Item_price}}";

                            if(count == 1) {

                                $("#enddate_input").val(result.end);
                                $("#start_time_input").val("03:00 مساءا");
                                $("#end_time_input").val("12:00 ليلاٌ");
                                $("#countday").val(count);

                                $('#day-count').text("ليلة واحدة");
                                $('#start_time').text("03:00 مساءا");
                                $('#end_time').text("12:00 ليلاٌ");
                                $('#start_data').text(result.start);
                                $('#end_data').text(result.end);
                                if ($('#checkbox').prop('checked')) {
                                    $("#txtAge").show();
                                    $("#totalprice").text(parseInt(price) + parseInt(price_overnight) + " ريال");
                                } else {
                                    $("#totalprice").text(price + " ريال");
                                    $("#price_input").val(parseInt(price));

                                }
                            } else {
                                $("#enddate_input").val(result.end);
                                $("#start_time_input").val("03:00 مساءا");
                                $("#end_time_input").val("12:00 ظهراٌ");
                                $("#countday_input").val(count);

                                $('#day-count').text(count + 1  + " ليالي");
                                $('#start_time').text("03:00 مساءا");
                                $('#end_time').text("12:00 ظهراٌ");
                                $('#start_data').text(result.start);
                                $('#end_data').text(result.end);
                                var total = parseInt(price) + parseInt(price_overnight) ;
                                console.log(count * total);
                                $("#totalprice").text(count * total + " ريال");
                                $("#price_input").val(count * total);

                            }
                        });

                    });
                // $('#date').daterangepicker({
                //     dayNames: ['الأحد', 'الاثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة', 'السبت'],
                //     dayNamesShort: ['الأحد', 'الاثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة', 'السبت'],
                //     dayNamesMin: ['الأحد', 'الاثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة', 'السبت'],
                //     // opens: 'right',
                //     isRTL: true,

                //     // dateFormat: "YYYY-MM-DD",
                //     locale: {
                //         // format: "YYYY-MM-DD",
                //         separator: " الى ",
                //         applyLabel: "تاكيد",
                //         cancelLabel: "الغاء",
                //         // fromLabel: "From",
                //         // toLabel: "To",
                //         // customRangeLabel: "Custom",
                //         weekLabel: "s",
                //         daysOfWeek: [
                //             "الأحد",
                //             "الإثنين",
                //             "الثلاثاء",
                //             "الأربعاء",
                //             "الخميس",
                //             "الجمعة",
                //             "السبت"

                //         ],

                //         monthNames:["يناير", "فبراير", "مارس", "أبريل", "مايو", "يونيو", "يوليو", "أغسطس", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر"],
                //         firstDay: 1
                //     },
                //     },
                //     function(start, end, label) {
                //         console.log(start.format('DD-MM-YYYY') , end.format('DD-MM-YYYY'));
                //         $.ajax({
                //             url : "{{route('convent') }}",
                //             data : "stardate="+start.format('DD-MM-YYYY') +"&enddate="+end.format('DD-MM-YYYY')
                //         }).done(function(result){
                //             countdays = end.diff(start, 'days');
                //             var price_overnight = "{{$item->Item_price_overnight}}";
                //             var price = "{{$item->Item_price}}";

                //             if(countdays == 0) {
                //                 $('#day-count').text("ليلة واحدة");
                //                 $('#start_time').text("03:00 مساءا");
                //                 $('#end_time').text("12:00 ليلاٌ");
                //                 $('#start_data').text(result.start);
                //                 $('#end_data').text(result.end);
                //                 if ($('#checkbox').prop('checked')) {
                //                     $("#txtAge").show();
                //                     $("#totalprice").text(parseInt(price) + parseInt(price_overnight) + " ريال");
                //                 } else {
                //                     $("#totalprice").text(price + " ريال");
                //                 }
                //             } else {
                //                 $('#day-count').text(countdays + 1  + " ليالي");
                //                 $('#start_time').text("03:00 مساءا");
                //                 $('#end_time').text("12:00 ظهراٌ");
                //                 $('#start_data').text(result.start);
                //                 $('#end_data').text(result.end);
                //                 var c = countdays + 1;
                //                 var total = parseInt(price) + parseInt(price_overnight) ;
                //                 $("#totalprice").text(c * total + " ريال");
                //             }
                //     });
                // });



            });
        });
        console.log(new Date(new Date().setHours(new Date().getHours() + 24)).toDateString());
        console.log(new Date(new Date().setHours(new Date().getHours() + 25)).toISOString());
        console.log(new Date(new Date().setHours(new Date().getHours() - new Date().getHours() - 12, 0)).toISOString());



        $(function () {
            $("#events").simpleCalendar({
                // displays events

                displayEvent: true,
                fixedStartDay: true,
                displayYear: true,

                // event dates

                events: [

                    // generate new event after tomorrow for one hour
                        @foreach($reservations as $reservation)
                        @php
                            $datestart = Carbon\Carbon::parse($reservation->Reservation_start_date, 'UTC')->locale('en');
                            $dateend= Carbon\Carbon::parse($reservation->Reservation_end_date, 'UTC')->locale('en');
                            $count = $dateend->diffInDays($datestart);

                        @endphp
                    {
                        startDate: "{{ $datestart->isoFormat('ddd MMMM D YYYY') }}",
                        endDate: "{{ $count == 0 ? $dateend->toISOString('MMMM D YYYY') : $dateend->subDays(1)->toISOString('MMMM D YYYY') }}",
                        summary: " {{ $reservation->userInfo->name }} - {{ $reservation->userInfo->phone }} ",
                    },


                    @endforeach


                ],
                months: ["يناير", "فبراير", "مارس", "أبريل", "مايو", "يونيو", "يوليو", "أغسطس", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر"],

                days: [
                    "الأحد",
                    "الإثنين",
                    "الثلاثاء",
                    "الأربعاء",
                    "الخميس",
                    "الجمعة",
                    "السبت"
                ],

                // disable showing event details

                disableEventDetails: false,

                // disable showing empty date details
                disableEmptyDetails: false,
            });
        });

    </script>


    <script>
        (function() {
            'use strict';


            $("#checkbox").click(function() {
                var dateInput = $("#date").val();
                var count = $(".ctrl__counter-input").val();

                if($(this).is(":checked")) // "this" refers to the element that fired the event
                {
                    console.log(dateInput , count);
                    if (dateInput != "" && count == 1) {
                        $.ajax({
                            url : "{{route('convent') }}",
                            data : "data="+dateInput +"&count="+count+"&overnight=true"
                        }).done(function(result){
                            var price_overnight = "{{$item->Item_price_overnight}}";
                            var price = "{{$item->Item_price}}";
                            $("#enddate_input").val(result.end);
                            $("#start_time_input").val("03:00 مساءا");
                            $("#end_time_input").val("12:00 ظهراٌ");
                            $("#countday").val(count);

                            $('#day-count').text("ليلة واحدة");
                            $('#start_time').text("03:00 مساءا");
                            $('#end_time').text("12:00 ظهراٌ");
                            $('#start_data').text(result.start);
                            $('#end_data').text(result.end);
                            // $("#txtAge").show();
                            $("#totalprice").text(parseInt(price) + parseInt(price_overnight) + " ريال");
                            $("#price_input").val(parseInt(price) + parseInt(price_overnight));

                        });
                    }

                } else {
                    if (dateInput != "" && count == 1) {
                        $.ajax({
                            url : "{{route('convent') }}",
                            data : "data="+dateInput +"&count="+count
                        }).done(function(result){
                            var price_overnight = "{{$item->Item_price_overnight}}";
                            var price = "{{$item->Item_price}}";
                            $("#enddate_input").val(result.end);
                            $("#start_time_input").val("03:00 مساءا");
                            $("#end_time_input").val("12:00 ليلاٌ");
                            $("#countday").val(count);

                            $('#day-count').text("ليلة واحدة");
                            $('#start_time').text("03:00 مساءا");
                            $('#end_time').text("12:00 ليلاٌ");
                            $('#start_data').text(result.start);
                            $('#end_data').text(result.end);
                            // $("#txtAge").show();
                            $("#totalprice").text(parseInt(price)  + " ريال");
                            $("#price_input").val(parseInt(price));
                        });
                    }
                }
            });


            function changeCountDay(count) {
                var dateInput = $("#date").val();
                if (dateInput != "") {
                    $.ajax({
                        url : "{{route('convent') }}",
                        data : "data="+dateInput +"&count="+count
                    }).done(function(result){
                        var price_overnight = "{{$item->Item_price_overnight}}";
                        var price = "{{$item->Item_price}}";


                        if(count == 1) {
                            $("#enddate_input").val(result.end);
                            $("#start_time_input").val("03:00 مساءا");
                            $("#end_time_input").val("12:00 ليلاٌ");
                            $("#countday").val(count);

                            $("#div_checkbox").show();
                            // $('#day-count').text("ليلة واحدة");
                            $('#start_time').text("03:00 مساءا");
                            $('#end_time').text("12:00 ليلاٌ");
                            $('#start_data').text(result.start);
                            $('#end_data').text(result.end);
                            if ($('#checkbox').prop('checked')) {
                                $("#overnight").val("yes");

                                $("#txtAge").show();
                                $("#totalprice").text(parseInt(price) + parseInt(price_overnight) + " ريال");
                                $("#price").val(parseInt(price) + parseInt(price_overnight));

                            } else {

                                $("#price_input").val(parseInt(price));

                                $("#totalprice").text(price + " ريال");
                            }

                        } else {
                            $("#div_checkbox").hide();

                            $("#enddate_input").val(result.end);
                            $("#start_time_input").val("03:00 مساءا");
                            $("#end_time_input").val("12:00 ظهراٌ");
                            $("#countday_input").val(count);

                            // $('#day-count').text(count + 1  + " ليالي");
                            $('#start_time').text("03:00 مساءا");
                            $('#end_time').text("12:00 ظهراٌ");
                            $('#start_data').text(result.start);
                            $('#end_data').text(result.end);
                            var total = parseInt(price) + parseInt(price_overnight);
                            $("#totalprice").text(count * total + " ريال");
                            $("#price_input").val(count * total);

                        }
                    });
                }

            }
            function ctrls() {
                var _this = this;

                this.counter = 1;
                this.els = {
                    decrement: document.querySelector('.ctrl__button--decrement'),
                    counter: {
                        container: document.querySelector('.ctrl__counter'),
                        num: document.querySelector('.ctrl__counter-num'),
                        input: document.querySelector('.ctrl__counter-input')
                    },
                    increment: document.querySelector('.ctrl__button--increment')
                };

                this.decrement = function() {
                    var counter = _this.getCounter();
                    var nextCounter = (_this.counter > 1) ? --counter : counter;
                    _this.setCounter(nextCounter);
                };

                this.increment = function() {
                    var counter = _this.getCounter();
                    var nextCounter = (counter < 9999999999) ? ++counter : counter;
                    _this.setCounter(nextCounter);
                };

                this.getCounter = function() {
                    return _this.counter;
                };

                this.setCounter = function(nextCounter) {
                    _this.counter = nextCounter;
                };

                this.debounce = function(callback) {
                    setTimeout(callback, 100);
                };

                this.render = function(hideClassName, visibleClassName) {
                    _this.els.counter.num.classList.add(hideClassName);

                    setTimeout(function() {
                        _this.els.counter.num.innerText = _this.getCounter();
                        _this.els.counter.input.value = _this.getCounter();
                        _this.els.counter.num.classList.add(visibleClassName);
                    }, 100);

                    setTimeout(function() {
                        _this.els.counter.num.classList.remove(hideClassName);
                        _this.els.counter.num.classList.remove(visibleClassName);
                    }, 1100);
                };

                this.ready = function() {
                    _this.els.decrement.addEventListener('click', function() {
                        _this.debounce(function() {
                            _this.decrement();
                            _this.render('is-decrement-hide', 'is-decrement-visible');
                            var counter = _this.getCounter();

                            changeCountDay(counter);
                        });
                    });

                    _this.els.increment.addEventListener('click', function() {
                        _this.debounce(function() {
                            _this.increment();
                            _this.render('is-increment-hide', 'is-increment-visible');
                            var counter = _this.getCounter();

                            changeCountDay(counter);


                        });
                    });

                    _this.els.counter.input.addEventListener('input', function(e) {
                        var parseValue = parseInt(e.target.value);
                        if (!isNaN(parseValue) && parseValue >= 1) {
                            _this.setCounter(parseValue);
                            _this.render();
                        }
                    });

                    _this.els.counter.input.addEventListener('focus', function(e) {
                        _this.els.counter.container.classList.add('is-input');
                    });

                    _this.els.counter.input.addEventListener('blur', function(e) {
                        _this.els.counter.container.classList.remove('is-input');
                        _this.render();
                    });
                };
            };

            // init
            var controls = new ctrls();
            document.addEventListener('DOMContentLoaded', controls.ready);
        })();


        ////////////////modification/////////////////
        window.onload=function (){
            document.getElementById('start_data').innerHTML="xx-xx-xxxx";
            document.getElementById('end_data').innerHTML="xx-xx-xxxx";
        }
        window.addEventListener('load', (event) => {
            for (var i = 0; i < elements.length; i++) {
                elements[i].addEventListener('click', myFunction, false);
            }
        });
        $(document).on('change','#date',function (){
            var date = $('#date').val();
            if (date == ''){
                $('#start_data').text("xx-xx-xxxx");
                $('#end_data').text("xx-xx-xxxx");
                $("#totalprice").text(0);
            }
        });
        $(document).on('click','.day',function (){
            var price = "{{$item->Item_price}}";
            var attribute = this.getAttribute("data-date");
            var date = new Date(attribute);
            var new_date = (((date.getMonth() > 8) ? (date.getMonth() + 1) : ('0' + (date.getMonth() + 1))) + '/'
                + ((date.getDate() > 9) ? date.getDate() : ('0' + date.getDate())) + '/' + date.getFullYear());
            $('#date').val(new_date);
            var total = parseInt(price) ;
            var count = $(".ctrl__counter-input").val();
            $('#start_data').text(new_date);
            $('#end_data').text(new_date);
            $("#totalprice").text(count * total + " ريال");
        });
    </script>


@endsection

@section('content')
    <div class="abed" id="abed">
        <h1>this is Abed div</h1>
    </div>
    <!-- begin:: section -->
    <section>
        <div class="gallery mt-sm-0 mt-4">
            <div class="fotorama mx-auto" data-nav="thumbs" data-width="100%" data-thumbwidth="200" data-thumbheight="100">
                @foreach($slider as $dd)
                    <img class="fotorama__img" src="{{ it()->url( $dd->imageItem_photo) }}" />
                @endforeach
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="row pb-5 border-bottom">
                <div class="col-lg-7">
                    <div class="chaletHrader d-flex align-items-center justify-content-between flex-wrap pb-4 border-bottom">
                        <h2>{!! $item->Item_name !!}</h2>
                        <a class="btn btn-primary btn-sm" href="" data-toggle="modal" data-target="#Date"> <i class="fal fa-calendar-alt pr-2"></i> احجز الان</a>
                    </div>
                    <div class="chaletDescription mt-3">
                        {!! $item->Item_Details !!}
                    </div>
                    <div class="cahletFeatures mt-3">
                        <ul class="d-flex align-items-center flex-wrap pb-4 border-bottom">
                            <li class="mr-3 mb-3">
                                <div class="single_widget">
                                    <p><i class="far fa-map-marker-alt pr-2"></i> المكان - {{$item->city->area->name}} / {{$item->city->name}}</p>
                                </div>
                            </li>
                            <li class="mr-3 mb-3">
                                <div class="single_widget">
                                    <p><i class="fal fa-money-bill-wave pr-2"></i>السعر - {{$item->Item_price}} ريال</p>
                                </div>
                            </li>


                            @if($item->Item_price_overnight !==0)
                                <li class="mr-3 mb-3">
                                    <div class="single_widget">
                                        <p><i class="fal fa-sack-dollar pr-2"></i> سعر المبيت - {{$item->Item_price_overnight}} ريال</p>
                                    </div>
                                </li>
                            @endif
                            <li class="mr-3 mb-3">
                                <div class="single_widget">
                                    <p><i class="fal fa-warehouse-alt pr-2"></i>نوع الشاليه - {{ $item->itemType->ItemType_name}}</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="chaletPrevacy py-3">
                        <div class="single_widget">
                            <p><i class="fal fa-route-interstate pr-2"></i>الشروط والاحكام</p>
                            {!! $item->Item_terms !!}
                        </div>
                    </div>
                </div>
                <style>
                    #map
                    {
                        width: 100%!important;
                        height: 300px;

                    }
                </style>
                <div class="col-lg-5">
                    <div id="map" ></div>
                    <!-- <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d927764.3550487261!2d47.38299600868243!3d24.724150391445495!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sar!2seg!4v1620991552555!5m2!1sar!2seg"
                        width="400"
                        height="300"
                        style="border: 0;"
                        allowfullscreen=""
                        loading="lazy"
                    ></iframe> -->
                    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d927756.5901447316!2d46.8225288!3d24.7251918!3m2!1i1024!2i768!4f13.1!4m3!3e6!4m0!4m0!5e0!3m2!1sar!2seg!4v1620990632569!5m2!1sar!2seg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>  -->
                    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d435859.44134837907!2d34.66888199915626!3d31.409941126735724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14fd844104b258a9%3A0xfddcb14b194be8e7!2z2YLYt9in2Lkg2LrYstmR2Kk!5e0!3m2!1sar!2s!4v1620597361350!5m2!1sar!2s" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe> -->
                </div>
            </div>
        </div>
    </section>

    <section class="mb-5">
        <div class="container">
            <div class="single_widget">
                <p><i class="fal fa-university pr-2"></i>الحسابات البنكية</p>
            </div>

            <div class="row mt-4">
                @foreach($item->bank as $bak)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="singleBank d-grid align-items-center justify-content-center text-center">
                            <img src="{{ it()->url($bak->bank_photo) }}" alt="" />
                            <h3>{{ $bak->Bank_name }}</h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <div class="modal fade" id="Date" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document" style="    padding-bottom: 70px;">
            <div class="modal-content sahdow-none border-0 rounded_lg bg-white">
                <div class="modal-body px-lg-4 py-3">
                    <h2 class="font-bold modal-title text-center my-2 font-size-mpbile-18">اتمام الحجز</h2>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><i class="fal fa-times"></i></button>
                    <form class="" action="{{ url('/reservation') }}" method="post">
                        @csrf
                        <input type="hidden" id="enddate_input" name="enddate_input"   />
                        <input type="hidden" id="start_time_input" name="start_time_input"/>
                        <input type="hidden" id="end_time_input" name="end_time_input"/>
                        <input type="hidden" id="price_input" name="price_input"/>
                        <input type="hidden" id="countday_input" name="countday_input" value="1"/>
                        <input type="hidden" id="id" name="id" value="{{ request()->route('id') }}"/>

                        <div class="form-group">
                            <div class="row mb-3">
                                <div class="col-sm-12 mb-2">
                                    <div id="events"></div>
                                </div>
                                <div class="col-sm-6 mb-2">
                                    <labal class="font-bold modal-title text-center my-2 font-size-mpbile-18">
                                        <i class="fas fa-calendar-alt pr-2 " style="font-size: 18px;color: #E1A500"></i>
                                        تاريخ الحجز
                                    </labal>
                                    <br>
                                    <br>
                                    <input type="text" id="date" name="start_date" placeholder="تاريخ الحجز" class="form-control" autocomplete="off" />
                                </div>

                                <div class="col-sm-6 mb-2">
                                    <labal class="font-bold modal-title text-center my-2 font-size-mpbile-18" style="    font-size: 15px;">
                                        <i class="fas fa-moon pr-2 " style="font-size: 18px;color: #E1A500"></i>

                                        عدد الايام

                                    </labal>
                                    <br>
                                    <br>
                                    <div class='ctrl'>
                                        <div class='ctrl__button ctrl__button--increment'>+</div>
                                        <div class='ctrl__counter'>
                                            <input class='ctrl__counter-input' maxlength='10' type='text' value='1' name="count">
                                            <div class='ctrl__counter-num'>1</div>
                                        </div>
                                        <div class='ctrl__button ctrl__button--decrement'>&ndash;</div>

                                    </div>
                                </div>
                                <!-- <div class="col-sm-3 mb-2" style="justify-content: center;  display: flex; align-items: center;">
                                    <div class="single_widget">
                                        <i class="fas fa-moon pr-2 " style="font-size: 22px;color: #E1A500"></i>
                                        <p id="day-count" style="display: inline-block;"> عدد اليالي</p>
                                        <p id="day-count"></p>
                                    </div>
                                </div> -->

                            </div>
                            <div class="row mb-3">



                                @if($item->Item_price_overnight !==0)
                                    <div class="col-sm-12 mb-2">
                                        <div class="single_widget" id="div_checkbox" style="    display: flex;
    justify-content: end;
    align-items: center;">
                                            <input type="checkbox"  name="overnight" id="checkbox" class="form-control" style="height: 20px; width: 20px ; margin-left: 10px;" />
                                            <labal for="checkbox" class="font-bold modal-title text-center my-2 font-size-mpbile-18" >هل تحتاج الى مبيت ؟ </labal>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-sm-6 mb-2">
                                    <div class="single_widget">
                                        <div class="col-sm-3 mb-2">
                                            <i class="fas fa-sign-in-alt pr-2" style="height: 100px ; float: right;     font-size: 30px;     color: #E1A500;     line-height: 75px;     margin-left: 15px;"></i>
                                        </div>
                                        <div class="col-sm-9 mb-2">
                                            <p>وقت الدخول</p>
                                            <p id="start_data">2021-05-24</p>
                                            <p id="start_time">03:00 مساءا</p>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-6 mb-2">
                                    <div class="single_widget">
                                        <div class="col-sm-3 mb-2">

                                            <i class="fas fa-sign-out-alt pr-2" style="height: 100px ; float: right;     font-size: 30px;     color: #E1A500;     line-height: 75px;     margin-left: 15px;"></i>
                                        </div>

                                        <div class="col-sm-12 mb-2">

                                            <p> وقت المغادرة</p>
                                            <p id="end_data">2021-05-24</p>
                                            <p id="end_time">12:00 صباحا</p>
                                        </div>
                                    </div>

                                </div>


                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-6 mb-2">
                                    <div class="single_widget">
                                        <i class="fal fa-money-bill-wave pr-2" style="float: right;     font-size: 30px;     color: #E1A500;     line-height: 46px;     margin-left: 15px;"></i>
                                        <div class="col-sm-12 mb-2">
                                            <p>سعر الشالية </p>
                                            <p id="end_time">{{ $item->Item_price }} ريال</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-2">
                                    <div class="single_widget">
                                        <i class="fal fa-sack-dollar pr-2" style="float: right;     font-size: 30px;     color: #E1A500;     line-height: 46px;     margin-left: 15px;"></i>
                                        <div class="col-sm-12 mb-2">
                                            <p>اجمالي سعر الشالية </p>
                                            <p id="totalprice"> 0 ريال</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-dark btn-block rounded_lg" type="submit">تأكيد</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
