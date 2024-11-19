@extends('admin.index')
@push("css")
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="{{ asset('website')}}/assets/css/jquery.comiseo.daterangepicker.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
@media (max-width: 575.98px) {
.calendar {
  overflow: scroll;
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
</style>

@endpush
	@section('content')
	<div class="row">
    <div class="col-md-12">
        <div class="widget-extra body-req portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject bold uppercase font-dark">{{$title}}</span>
                </div>
                <div class="actions">
                    <a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('reservation/create')}}" data-toggle="tooltip" title="{{trans('admin.add')}}  {{trans('admin.reservation')}}">
                        <i class="fa fa-plus"></i>
                    </a>
                    <span data-toggle="tooltip" title="{{trans('admin.delete')}}  {{trans('admin.reservation')}}">
                        <a data-toggle="modal" data-target="#myModal{{$reservation->id}}" class="btn btn-circle btn-icon-only btn-default" href="">
                            <i class="fa fa-trash"></i>
                        </a>
                    </span>
                    <div class="modal fade" id="myModal{{$reservation->id}}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button class="close" data-dismiss="modal">x</button>
                                    <h4 class="modal-title">{{trans('admin.delete')}}؟</h4>
                                </div>
                                <div class="modal-body"><i class="fa fa-exclamation-triangle"></i> {{trans('admin.ask_del')}} {{trans('admin.id')}} ({{$reservation->id}}) ؟</div>
                                <div class="modal-footer">
                                    {!! Form::open([ 'method' => 'DELETE', 'route' => ['reservation.destroy', $reservation->id] ]) !!} {!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger']) !!}
                                    <a class="btn btn-default" data-dismiss="modal">{{trans('admin.cancel')}}</a>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('reservation')}}" data-toggle="tooltip" title="{{trans('admin.show_all')}}   {{trans('admin.reservation')}}">
                        <i class="fa fa-list"></i>
                    </a>
                    <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#" data-original-title="{{trans('admin.fullscreen')}}" title="{{trans('admin.fullscreen')}}"> </a>
                </div>
            </div>


			<div class="portlet-body form">
								<div class="col-md-12">

<form action="{{aurl('/reservation/'.$reservation->id)}}"  class="form-horizontal form-row-seperated" method="post" enctype="multipart/form-data" id="reservation">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<input type="hidden" name="_method" value="put">
<input type="hidden" name="overnight" id="overnight"  value=" {{$reservation->Reservation_overnight}}">
<input type="hidden" name="price" id="price" value="{{$reservation->Reservation_price}}">
<input type="hidden" id="Reservation_end_date" name="Reservation_end_date" class="form-control" placeholder="{{trans('admin.Reservation_end_date')}}" />

<br>

<div class="form-group">
    <div class="col-md-6">

        <label for="Reservation_item_id" class="col-md-3 control-label">{{trans('admin.Reservation_item_id')}}</label>
        <div class="col-md-9">
        <div class='ctrl' id="ctrl">
                                <div class='ctrl__button ctrl__button--increment'>+</div>
                                    <div class='ctrl__counter'>
                                        <input class='ctrl__counter-input' maxlength='10' type='text' value='{{$reservation->count}}' name="count">
                                        <div class='ctrl__counter-num'>{{$reservation->count}}</div>
                                    </div>
                                    <div class='ctrl__button ctrl__button--decrement'>&ndash;</div>

                                </div>
        </div>
    </div>

    <div class="col-md-6">
        <label for="Reservation_item_id" class="col-md-3 control-label">{{trans('admin.Reservation_item_id')}}</label>
        <div class="col-md-9">
                <select id="Reservation_item_id" name="Reservation_item_id" class="form-control" placeholder="{{trans('admin.Reservation_item_id')}}" >
                    <option value="0" selected>احتار الشالية</option>
                    @foreach(App\Model\Item::select('Item_name','id')->get() as $Reservation_item_id)
                    <option value="{{ $Reservation_item_id->id }}" {{$reservation->Reservation_item_id == $Reservation_item_id->id?'selected':''}}>{{ $Reservation_item_id->Item_name }}</option>
                    @endforeach
                </select>
        </div>
    </div>


</div>


<div class="form-group">
    <div class="col-md-6">

        <label for="Reservation_start_date" class="col-md-3 control-label">{{trans('admin.Reservation_start_date')}}</label>
        <div class="col-md-9">
            <input type="text" id="Reservation_start_date"  autocomplete="off"  name="Reservation_start_date" value="{{$reservation->Reservation_start_date }} " class="form-control" placeholder="{{trans('admin.Reservation_start_date')}}" />
        </div>
    </div>
    <div class="col-md-6">
        <label for="Reservation_user_id" class="col-md-3 control-label">{{trans('admin.Reservation_user_id')}}</label>
        <div class="col-md-9">
                <select id="Reservation_user_id" name="Reservation_user_id" class="form-control" placeholder="{{trans('admin.Reservation_user_id')}}" >
                    @foreach(App\User::select('name','id')->get() as $Reservation_user_id)
                    <option value="{{ $Reservation_user_id->id }}" {{$reservation->Reservation_user_id == $Reservation_user_id->id?'selected':''}}>{{ $Reservation_user_id->name }}</option>
                    @endforeach
                </select>
        </div>
    </div>


    </div>
<br>

<div class="form-group">
    <div class="col-md-6">
        <label for="Reservation_start_time"  class="col-md-3 control-label">{{trans('admin.Reservation_start_time')}}</label>
        <div class="col-md-9">
            <input type="text" id="Reservation_start_time" readonly name="Reservation_start_time" value="{{$reservation->Reservation_start_time }}" class="form-control" placeholder="{{trans('admin.Reservation_start_time')}}" />
        </div>
    </div>
    <div class="col-md-6">
        <label for="Reservation_end_time"  class="col-md-3 control-label">{{trans('admin.Reservation_end_time')}}</label>
        <div class="col-md-9">
            <input type="text" id="Reservation_end_time" readonly name="Reservation_end_time" value="{{$reservation->Reservation_end_time}}" class="form-control" placeholder="{{trans('admin.Reservation_end_time')}}" />
        </div>
    </div>
</div>

<br>
<div class="form-group">
    <div class="col-md-6">

        <label for="Reservation_price" class="col-md-3 control-label">{{trans('admin.Reservation_price')}}</label>
        <div class="col-md-9">
            <input type="text" id="Reservation_price" name="Reservation_price" value="{{$reservation->Reservation_price}}" class="form-control" placeholder="{{trans('admin.Reservation_price')}}" />
        </div>
    </div>
    <div class="col-md-6">
        <label for="Reservation_status" class="col-md-3 control-label">{{trans('admin.Reservation_status')}}</label>
		<div class="col-md-9">
            <select id="Reservation_status" name="Reservation_status" class="form-control" placeholder="{{trans('admin.Reservation_status')}}" >
                <option value="pending" {{ $reservation->Reservation_status == 'pending'?'selected':''}} >{{trans('admin.pending')}}</option>
                <option value="done" {{$reservation->Reservation_status == 'done'?'selected':''}} >{{trans('admin.done')}}</option>
                <option value="canceled" {{$reservation->Reservation_status == 'canceled'?'selected':''}} >{{trans('admin.canceled')}}</option>
            </select>
		</div>
    </div>
</div>

<br>
<div class="form-group" id="Reservation_overnight_hidden" >
    <div class="col-md-6">
        <div class="col-md-4">
            <input type="checkbox" id="Reservation_overnight" {{ $reservation->Reservation_overnight == 1 ? "checked" : "" }} name="Reservation_overnight" class="form-control" style="height: 30px;width: 30px;margin-right: auto;" {{old('Reservation_overnight') == '1'?'checked':''}}>
         </div>
            <label for="Reservation_overnight" class="col-md-6 control-label text-right" style="text-align: right;">{{trans('admin.Reservation_overnight')}} </label>
    </div>

</div>

<br>
<div class="form-actions">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-offset-3 col-md-9">
<input type="submit" class="btn btn-success" value="{{ trans('admin.add') }}" />
         </div>
            </div>
        </div>
    </div>
</div>
</form>
										</div>
										<div class="clearfix"></div>
						</div>



        </div>
    </div>
</div>


		</div>
	</div>
	@stop
    @push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.0/js/bootstrap-datepicker.min.js"></script>

    <script src="{{ asset('website')}}/assets/js/fotorama.js"></script>

    <!-- <script src="{{ asset('website')}}/assets/js/jquery.comiseo.daterangepicker.js"></script> -->

    <script src="{{ asset('website')}}/assets/js/jquery.simple-calendar.js"></script>

    <!-- Datepicker -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/ar-sa.min.js" integrity="sha512-LTrC0erJp6xm2kdz0KhzDxDDqYmAA2bmie9YASCZv2zg4oIJh2VarpXzZcl+B9zR5+5+QI0xmQ5YAIfMmOmIgA==" crossorigin="anonymous"></script> -->

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

	<script>
	    $(document).ready(function () {
            var currentDate = new Date();
            $(function() {

                $('#Reservation_start_date').datepicker({
                    "startDate": currentDate,
                })
                .on('changeDate', function(e){
                    var count = $(".ctrl__counter-input").val();
                        console.log(count);
                        $.ajax({
                            url : "{{route('convent') }}",
                            data : "data="+e.format('dd-mm-yyyy') +"&count="+count
                        }).done(function(result){
                            var price_overnight = $("#overnight").val();
                            var price = $("#price").val();
                            if(count == 1) {
                                $('#day-count').text("ليلة واحدة");
                                $('#Reservation_start_time').val("03:00 مساءا");
                                $('#Reservation_end_time').val("12:00 ليلاٌ");
                                $('#start_data').val(result.start);
                                $('#Reservation_end_date').val(result.end);
                                if ($('#checkbox').prop('checked')) {
                                    $("#txtAge").show();
                                    $("#Reservation_price").val(parseInt(price) + parseInt(price_overnight) + " ريال");
                                } else {
                                    $("#Reservation_price").val(price + " ريال");
                                    $("#price_input").val(parseInt(price));
                                }
                            } else {
                                $('#day-count').text(count + 1  + " ليالي");
                                $('#Reservation_start_time').val("03:00 مساءا");
                                $('#Reservation_end_time').val("12:00 ظهراٌ");
                                $('#start_data').val(result.start);
                                $('#Reservation_end_date').val(result.end);
                                var total = parseInt(price) + parseInt(price_overnight) ;
                                console.log(count * total);
                                $("#Reservation_price").val(count * total + " ريال");
                                $("#price_input").val(count * total);
                            }
                    });



                });




            });

            $("#Reservation_overnight").click(function() {
                var dateInput = $("#Reservation_start_date").val();
                var count = $(".ctrl__counter-input").val();

                if($(this).is(":checked")) // "this" refers to the element that fired the event
                {
                    if (dateInput != "" && count == 1) {
                    $.ajax({
                        url : "{{route('convent') }}",
                        data : "data="+dateInput +"&count="+count+"&overnight=true"
                    }).done(function(result){
                        var price_overnight = $("#overnight").val();
                        var price = $("#price").val();
                            $('#day-count').val("ليلة واحدة");
                            $('#start_time').val("03:00 مساءا");
                            $('#Reservation_end_time').text("12:00 ظهراٌ");
                            $('#start_data').text(result.start);
                            $('#Reservation_end_date').text(result.end);
                            // $("#txtAge").show();
                            $("#Reservation_price").val(parseInt(price) + parseInt(price_overnight) + " ريال");

                    });
                }
                } else {
                    if (dateInput != "" && count == 1) {
                    $.ajax({
                        url : "{{route('convent') }}",
                        data : "data="+dateInput +"&count="+count
                    }).done(function(result){
                        var price_overnight = $("#overnight").val();
                        var price = $("#price").val();
                        console.log(price , price_overnight);


                            $('#day-count').text("ليلة واحدة");
                            $('#Reservation_start_time').val("03:00 مساءا");
                            $('#Reservation_end_time').val("12:00 ليلاٌ");
                            $('#start_data').text(result.start);
                            $('#Reservation_end_date').text(result.end);
                            // $("#txtAge").show();
                            $("#Reservation_price").val(parseInt(price)  + " ريال");
                    });
                }
                }
            });


            $("#reservation #Reservation_item_id").on("change" , function () {
                // Disable #x

                // Enable #x
                $.ajax({
                        url : "{{ route('getItem') }}",
                        data : "id="+$("#reservation #Reservation_item_id").val()
                    }).done(function(result){
                        if(result.item != null) {
                            $( "#Reservation_start_date" ).prop( "disabled", false );

                            $("#reservation #price").val(result.item.price);
                            $("#reservation #overnight").val(result.item.overnight);
                        } else {
                            $( "#Reservation_start_date" ).prop( "disabled", true );

                        }

                    });


            });




        });
        (function() {

            function changeCountDay(count) {
                var dateInput = $("#date").val();
                if (dateInput != "") {
                    $.ajax({
                        url : "{{route('convent') }}",
                        data : "data="+dateInput +"&count="+count
                    }).done(function(result){
                        var price_overnight = $("#overnight").val();
                        var price = $("#price").val();
                        if(count == 1) {

                        $("#Reservation_overnight_hidden").show();
                            // $('#day-count').text("ليلة واحدة");
                            $('#Reservation_start_time').val("03:00 مساءا");
                            $('#Reservation_end_time').val("12:00 ليلاٌ");
                            $('#start_data').text(result.start);
                            $('#Reservation_end_date').text(result.end);
                            if ($('#checkbox').prop('checked')) {
                            $("#overnight").val("yes");

                                $("#txtAge").show();
                                $("#Reservation_price").val(parseInt(price) + parseInt(price_overnight) + " ريال");
                                $("#price").val(parseInt(price) + parseInt(price_overnight));

                            } else {

                            $("#price_input").val(parseInt(price));

                                $("#Reservation_price").val(price + " ريال");
                            }

                        } else {
                        $("#Reservation_overnight_hidden").hide();


                            // $('#day-count').text(count + 1  + " ليالي");
                            $('#Reservation_start_time').val("03:00 مساءا");
                            $('#Reservation_end_time').val("12:00 ظهراٌ");
                            $('#start_data').text(result.start);
                            $('#Reservation_end_date').text(result.end);
                            var total = parseInt(price) + parseInt(price_overnight);
                            $("#Reservation_price").val(count * total + " ريال");
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

	</script>

    @endpush
