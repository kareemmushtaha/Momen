@extends('admin.index')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="widget-extra body-req portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject bold uppercase font-dark">{{$title}}</span>
                </div>
                <div class="actions">
                    <a  href="{{aurl('permission')}}"
                        class="btn btn-circle btn-icon-only btn-default"
                        tooltip="{{trans('admin.show_all')}}"
                        title="{{trans('admin.show_all')}}">
                        <i class="fa fa-list"></i>
                    </a>
                    <a class="btn btn-circle btn-icon-only btn-default fullscreen"
                        href="#"
                        data-original-title="{{trans('admin.fullscreen')}}"
                        title="{{trans('admin.fullscreen')}}">
                    </a>
                </div>
            </div>
            <div class="portlet-body form">
                <div class="col-md-12">
                    {!! Form::open(['url'=>aurl('/permission'),'id'=>'events','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
                    <div class="form-group">
                        {!! Form::label('name',trans('admin.name'),['class'=>'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::text('name',old('name'),['class'=>'form-control','placeholder'=>trans('admin.name')]) !!}
                        </div>
                    </div>
                    <br>

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>اسم</th>
                                            <th>اضافة</th>
                                            <th>تعديل</th>
                                            <th>عرض</th>
                                            <th>حذف</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>الاعدادات</td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <input type="checkbox" name="setting" value="enable"></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>عن الموقع</td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <input type="checkbox" name="about" value="enable"></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>الصلاحيات</td>
                                            <td><input type="checkbox" name="admingroup_add" value="enable"></td>
                                            <td><input type="checkbox" name="admingroup_edit" value="enable"></td>
                                            <td><input type="checkbox" name="admingroup_show" value="enable"></td>
                                            <td><input type="checkbox" name="admingroup_delete" value="enable"></td>
                                        </tr>
                                        <tr>
                                            <td>الصفحات الخاصه</td>
                                            <td><input type="checkbox" name="page_add" value="enable"></td>
                                            <td><input type="checkbox" name="page_edit" value="enable"></td>
                                            <td><input type="checkbox" name="page_show" value="enable"></td>
                                            <td><input type="checkbox" name="page_delete" value="enable"></td>
                                        </tr>
                                        <tr>
                                            <td>روابط المواقع</td>
                                            <td><input type="checkbox" name="links_add" value="enable"></td>
                                            <td><input type="checkbox" name="links_edit" value="enable"></td>
                                            <td><input type="checkbox" name="links_show" value="enable"></td>
                                            <td><input type="checkbox" name="links_delete" value="enable"></td>
                                        </tr>
                                        <tr>
                                            <td>التحكم بالمشرفين</td>
                                            <td><input type="checkbox" name="admin_add" value="enable"></td>
                                            <td><input type="checkbox" name="admin_edit" value="enable"></td>
                                            <td><input type="checkbox" name="admin_show" value="enable"></td>
                                            <td><input type="checkbox" name="admin_delete" value="enable"></td>
                                        </tr>
                                        <tr>
                                            <td>اتصل بنا</td>
                                            <td><input type="checkbox" name="contect_add" value="enable"></td>
                                            <td><input type="checkbox" name="contect_edit" value="enable"></td>
                                            <td><input type="checkbox" name="contect_show" value="enable"></td>
                                            <td><input type="checkbox" name="contect_delete" value="enable"></td>
                                        </tr>
                                        <tr>
                                            <td> روابط التواصل الاجتماعى </td>
                                            <td><input type="checkbox" name="socail_add" value="enable"></td>
                                            <td><input type="checkbox" name="socail_edit" value="enable"></td>
                                            <td><input type="checkbox" name="socail_show" value="enable"></td>
                                            <td><input type="checkbox" name="socail_delete" value="enable"></td>
                                        </tr>

                                        <tr>
                                            <td>المناطق</td>
                                            <td><input type="checkbox" name="area_add" value="enable"></td>
                                            <td><input type="checkbox" name="area_edit" value="enable"></td>
                                            <td><input type="checkbox" name="area_show" value="enable"></td>
                                            <td><input type="checkbox" name="area_delete" value="enable"></td>
                                        </tr>

                                        <tr>
                                            <td>المدن</td>
                                            <td><input type="checkbox" name="city_add" value="enable"></td>
                                            <td><input type="checkbox" name="city_edit" value="enable"></td>
                                            <td><input type="checkbox" name="city_show" value="enable"></td>
                                            <td><input type="checkbox" name="city_delete" value="enable"></td>
                                        </tr>

                                        <tr>
                                            <td>السليدر</td>
                                            <td><input type="checkbox" name="slider_add" value="enable"></td>
                                            <td><input type="checkbox" name="slider_edit" value="enable"></td>
                                            <td><input type="checkbox" name="slider_show" value="enable"></td>
                                            <td><input type="checkbox" name="slider_delete" value="enable"></td>
                                        </tr>

                                        <tr>
                                            <td>الباقات</td>
                                            <td><input type="checkbox" name="packages_add" value="enable"></td>
                                            <td><input type="checkbox" name="packages_edit" value="enable"></td>
                                            <td><input type="checkbox" name="packages_show" value="enable"></td>
                                            <td><input type="checkbox" name="packages_delete" value="enable"></td>
                                        </tr>

                                        <tr>
                                            <td>الطلبات قيد العمل</td>
                                            <td><input type="checkbox" name="reservation_add" value="enable"></td>
                                            <td><input type="checkbox" name="reservation_edit" value="enable"></td>
                                            <td><input type="checkbox" name="reservation_show" value="enable"></td>
                                            <td><input type="checkbox" name="reservation_delete" value="enable"></td>
                                        </tr>

                                        <tr>
                                            <td>الطلبات</td>
                                            <td><input type="checkbox" name="order_add" value="enable"></td>
                                            <td><input type="checkbox" name="order_edit" value="enable"></td>
                                            <td><input type="checkbox" name="order_show" value="enable"></td>
                                            <td><input type="checkbox" name="order_delete" value="enable"></td>
                                        </tr>


                                        <tr>
                                            <td>جليسات الاطفال</td>
                                            <td><input type="checkbox" name="nanny_add" value="enable"></td>
                                            <td><input type="checkbox" name="nanny_edit" value="enable"></td>
                                            <td><input type="checkbox" name="nanny_show" value="enable"></td>
                                            <td><input type="checkbox" name="nanny_delete" value="enable"></td>
                                        </tr>

                                        <tr>
                                            <td>ولى الامر</td>
                                            <td><input type="checkbox" name="guardian_add" value="enable"></td>
                                            <td><input type="checkbox" name="guardian_edit" value="enable"></td>
                                            <td><input type="checkbox" name="guardian_show" value="enable"></td>
                                            <td><input type="checkbox" name="guardian_delete" value="enable"></td>
                                        </tr>

                                        <tr>
                                            <td>حجز الباقات</td>
                                            <td><input type="checkbox" name="bookpackages_add" value="enable"></td>
                                            <td><input type="checkbox" name="bookpackages_edit" value="enable"></td>
                                            <td><input type="checkbox" name="bookpackages_show" value="enable"></td>
                                            <td><input type="checkbox" name="bookpackages_delete" value="enable"></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        {!! Form::submit(trans('admin.add'),['class'=>'btn btn-success']) !!}
                                    </div>
                                </div>
                            </div>
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
