@extends('admin.index')
@section('content')
<!-- <h1 class="page-title">اعدادات الموقع</h1> -->

<div class="row">
    <div class="col-md-12">
        <div class=" portlet light ">
            <div class="portlet-body form">
                <!-- <form role="form">
                  <div class="form-body">
                      <div class="row">

                      </div>
                    </div>
                </div> -->
                <div class="col-md-12">
                    {!! Form::open(['url'=>aurl('/settings'),'id'=>'settings','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label > {{ trans('admin.sitename_ar') }}</label>
                            {!! Form::text('sitename_ar',setting()->sitename_ar,['class'=>'form-control','placeholder'=>trans('admin.sitename_ar')]) !!}
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                        <div class="form-group">
                            <label > {{ trans('admin.system_status') }}</label>
                            {!! Form::select('system_status',['open'=>trans('admin.open'),'close'=>trans('admin.close')],setting()->system_status,['class'=>'form-control','placeholder'=>trans('admin.system_status')]) !!}
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr >
                    <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
                        <div class="form-group">
                          <div class="imgthumb">
                               @if(!empty(setting()->logo))
                             <img src="{{ it()->url(setting()->logo) }}" style="width:50px;height:50px" />
                            @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group">
                          <label> شعار الموقع </label>
                          <input type="file" id="exampleInputFile1" name="logo">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                        <div class="form-group">
                          <div class="imgthumb">

                            </div>
                            @if(!empty(setting()->icon))
                             <img src="{{ it()->url(setting()->icon) }}" style="width:50px;height:50px" />
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="form-group">
                          <label>رمز الموقع </label>
                          <input type="file" id="exampleInputFile1"  name="icon">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr >
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label>وصف الموقع </label>
                          <textarea class="form-control" rows="10" name="description_ar">{{ setting()->description_ar }}</textarea>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label>الكلمات الدليلية</label>
                          <textarea class="form-control" rows="10" name="keywords_ar">{{ setting()->keywords_ar }}</textarea>
                        </div>
                      </div>

                    <div class="clearfix"></div>
                    <hr >


                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="form-group">
                          <label> البريد الالكترونى </label>
                          <input type="text" class="form-control" name="email" placeholder=" البريد الالكترونى " value="{{ setting()->email }}">
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="form-group">
                          <label>الجوال</label>
                          <input type="text" class="form-control" name="phone" placeholder="الجوال" value="{{ setting()->phone }}">
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                          <label>العنوان</label>
                          <input type="text" class="form-control" name="Address" placeholder="العنوان" value="{{ setting()->Address }}">
                        </div>
                      </div>

                    <div class="clearfix"></div>
                    <hr >


                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label>{{trans('admin.system_message')}}</label>
                          {!! Form::textarea('system_message',setting()->system_message,['class'=>'form-control summernote_1','placeholder'=>trans('admin.system_message')]) !!}
                        </div>
                      </div>

                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label>شروط التسجيل فى الموقع</label>
                          {!! Form::textarea('terms',setting()->terms,['class'=>'form-control summernote_1','placeholder'=>trans('admin.system_message')]) !!}
                        </div>
                      </div>

                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label>وصف الفوتر  </label>
                          <textarea class="form-control" rows="10" name="text_footer">{{ setting()->text_footer }}</textarea>
                        </div>
                      </div>


                    <div class="clearfix"></div>
                    <hr >

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                          {!! Form::submit(trans('admin.save'),['class'=>'btn btn-success']) !!}
                        </div>
                      </div>

                    {!! Form::close() !!}
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
@stop
