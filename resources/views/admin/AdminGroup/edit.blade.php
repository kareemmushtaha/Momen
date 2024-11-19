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
					<a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('permission/create')}}"
						data-toggle="tooltip" title="{{trans('admin.add')}}  {{trans('admin.permission')}}">
						<i class="fa fa-plus"></i>
					</a>
					<span data-toggle="tooltip" title="{{trans('admin.delete')}}  {{trans('admin.permission')}}">
						<a data-toggle="modal" data-target="#myModal{{$permission->id}}" class="btn btn-circle btn-icon-only btn-default" href="">
							<i class="fa fa-trash"></i>
						</a>
					</span>
					<div class="modal fade" id="myModal{{$permission->id}}">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button class="close" data-dismiss="modal">x</button>
									<h4 class="modal-title">{{trans('admin.delete')}}؟</h4>
								</div>
								<div class="modal-body">
									<i class="fa fa-exclamation-triangle"></i>   {{trans('admin.ask_del')}} {{trans('admin.id')}} ({{$permission->id}}) ؟
								</div>
								<div class="modal-footer">
									{!! Form::open([
									'method' => 'DELETE',
									'route' => ['permission.destroy', $permission->id]
									]) !!}
									{!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger']) !!}
									<a class="btn btn-default" data-dismiss="modal">{{trans('admin.cancel')}}</a>
									{!! Form::close() !!}
								</div>
							</div>
						</div>
					</div>
					<a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('permission')}}"
						data-toggle="tooltip" title="{{trans('admin.show_all')}}   {{trans('admin.events')}}">
						<i class="fa fa-list"></i>
					</a>
					<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"
						data-original-title="{{trans('admin.fullscreen')}}"
						title="{{trans('admin.fullscreen')}}">
					</a>
				</div>
			</div>
			<div class="portlet-body form">
				<div class="col-md-12">
					{!! Form::open(['url'=>aurl('/permission/'.$permission->id),'method'=>'put','id'=>'permission','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
					<div class="form-group">
						{!! Form::label('name',trans('admin.name'),['class'=>'col-md-3 control-label']) !!}
						<div class="col-md-9">
							{!! Form::text('name', $permission->name ,['class'=>'form-control','placeholder'=>trans('admin.name')]) !!}
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
                                            <td><input type="checkbox" name="setting" value="enable" {{ $permission->setting == "enable" ? "checked" : "" }} ></td>
                                            <td></td>
                                        </tr>

										<tr>
                                            <td>عن الموقع</td>
                                            <td></td>
                                            <td></td>
                                            <td><input type="checkbox" name="about" value="enable" {{ $permission->about == "enable" ? "checked" : "" }} ></td>
                                            <td></td>
                                        </tr>

                                        <tr>
                                            <td>الصلاحيات</td>
                                            <td><input type="checkbox" name="admingroup_add" value="enable" {{ $permission->admingroup_add == "enable" ? "checked" : "" }}></td>
                                            <td><input type="checkbox" name="admingroup_edit" value="enable" {{ $permission->admingroup_edit == "enable" ? "checked" : "" }}></td>
                                            <td><input type="checkbox" name="admingroup_show" value="enable" {{ $permission->admingroup_show == "enable" ? "checked" : "" }}></td>
                                            <td><input type="checkbox" name="admingroup_delete" value="enable" {{ $permission->admingroup_delete == "enable" ? "checked" : "" }}></td>
                                        </tr>
                                        <tr>
                                            <td>الصفحات الخاصه</td>
                                            <td><input type="checkbox" name="page_add" value="enable" {{ $permission->page_add == "enable" ? "checked" : "" }}></td>
                                            <td><input type="checkbox" name="page_edit" value="enable" {{ $permission->page_edit == "enable" ? "checked" : "" }}></td>
                                            <td><input type="checkbox" name="page_show" value="enable" {{ $permission->page_show == "enable" ? "checked" : "" }}></td>
                                            <td><input type="checkbox" name="page_delete" value="enable" {{ $permission->page_delete == "enable" ? "checked" : "" }}></td>
                                        </tr>
                                        <tr>
                                            <td>روابط المواقع</td>
                                            <td><input type="checkbox" name="links_add" value="enable" {{ $permission->links_add == "enable" ? "checked" : "" }}></td>
                                            <td><input type="checkbox" name="links_edit" value="enable" {{ $permission->links_edit == "enable" ? "checked" : "" }}></td>
                                            <td><input type="checkbox" name="links_show" value="enable" {{ $permission->links_show == "enable" ? "checked" : "" }}></td>
                                            <td><input type="checkbox" name="links_delete" value="enable" {{ $permission->links_delete == "enable" ? "checked" : "" }}></td>
                                        </tr>
                                        <tr>
                                            <td>التحكم بالمشرفين</td>
                                            <td><input type="checkbox" name="admin_add" value="enable" {{ $permission->admin_add == "enable" ? "checked" : "" }}></td>
                                            <td><input type="checkbox" name="admin_edit" value="enable" {{ $permission->admin_edit == "enable" ? "checked" : "" }}></td>
                                            <td><input type="checkbox" name="admin_show" value="enable" {{ $permission->admin_show == "enable" ? "checked" : "" }}></td>
                                            <td><input type="checkbox" name="admin_delete" value="enable" {{ $permission->admin_delete == "enable" ? "checked" : "" }}></td>
                                        </tr>
                                        <tr>
                                            <td>اتصل بنا</td>
                                            <td><input type="checkbox" name="contect_add" value="enable" {{ $permission->contect_add == "enable" ? "checked" : "" }}></td>
                                            <td><input type="checkbox" name="contect_edit" value="enable" {{ $permission->contect_edit == "enable" ? "checked" : "" }}></td>
                                            <td><input type="checkbox" name="contect_show" value="enable" {{ $permission->contect_show == "enable" ? "checked" : "" }}></td>
                                            <td><input type="checkbox" name="contect_delete" value="enable" {{ $permission->contect_delete == "enable" ? "checked" : "" }}></td>
                                        </tr>
                                        <tr>
                                            <td> روابط التواصل الاجتماعى </td>
                                            <td><input type="checkbox" name="socail_add" value="enable" {{ $permission->socail_add == "enable" ? "checked" : "" }}></td>
                                            <td><input type="checkbox" name="socail_edit" value="enable" {{ $permission->socail_edit == "enable" ? "checked" : "" }}></td>
                                            <td><input type="checkbox" name="socail_show" value="enable" {{ $permission->socail_show == "enable" ? "checked" : "" }}></td>
                                            <td><input type="checkbox" name="socail_delete" value="enable" {{ $permission->socail_delete == "enable" ? "checked" : "" }}></td>
                                        </tr>

										<tr>
                                            <td>المناطق</td>
                                            <td><input type="checkbox" name="area_add" value="enable" {{ $permission->area_add == "enable" ? "checked" : "" }}></td>
                                            <td><input type="checkbox" name="area_edit" value="enable" {{ $permission->area_edit == "enable" ? "checked" : "" }}></td>
                                            <td><input type="checkbox" name="area_show" value="enable" {{ $permission->area_show == "enable" ? "checked" : "" }}></td>
                                            <td><input type="checkbox" name="area_delete" value="enable" {{ $permission->area_delete == "enable" ? "checked" : "" }}></td>
                                        </tr>

                                        <tr>
                                            <td>المدن</td>
                                            <td><input type="checkbox" name="city_add" value="enable" {{ $permission->city_add == "enable" ? "checked" : "" }}></td>
                                            <td><input type="checkbox" name="city_edit" value="enable" {{ $permission->city_edit == "enable" ? "checked" : "" }}></td>
                                            <td><input type="checkbox" name="city_show" value="enable" {{ $permission->city_show == "enable" ? "checked" : "" }}></td>
                                            <td><input type="checkbox" name="city_delete" value="enable" {{ $permission->city_delete == "enable" ? "checked" : "" }}></td>
                                        </tr>

                                        <tr>
                                            <td>السليدر</td>
                                            <td><input type="checkbox" name="slider_add" value="enable"{{ $permission->slider_add == "enable" ? "checked" : "" }}></td>
                                            <td><input type="checkbox" name="slider_edit" value="enable"{{ $permission->slider_edit == "enable" ? "checked" : "" }}></td>
                                            <td><input type="checkbox" name="slider_show" value="enable"{{ $permission->slider_show == "enable" ? "checked" : "" }}></td>
                                            <td><input type="checkbox" name="slider_delete" value="enable"{{ $permission->slider_delete == "enable" ? "checked" : "" }}></td>
                                        </tr>

                                        <tr>
                                            <td>الباقات</td>
                                            <td><input type="checkbox" name="packages_add" value="enable" {{ $permission->packages_add == "enable" ? "checked" : "" }}></td>
                                            <td><input type="checkbox" name="packages_edit" value="enable" {{ $permission->packages_edit == "enable" ? "checked" : "" }}></td>
                                            <td><input type="checkbox" name="packages_show" value="enable" {{ $permission->packages_show == "enable" ? "checked" : "" }}></td>
                                            <td><input type="checkbox" name="packages_delete" value="enable" {{ $permission->packages_delete == "enable" ? "checked" : "" }}></td>
                                        </tr>

                                        <tr>
                                            <td>الطلبات قيد العمل</td>
                                            <td><input type="checkbox" name="reservation_add" value="enable" {{ $permission->reservation_add == "enable" ? "checked" : "" }}></td>
                                            <td><input type="checkbox" name="reservation_edit" value="enable" {{ $permission->reservation_edit == "enable" ? "checked" : "" }}></td>
                                            <td><input type="checkbox" name="reservation_show" value="enable" {{ $permission->reservation_show == "enable" ? "checked" : "" }}></td>
                                            <td><input type="checkbox" name="reservation_delete" value="enable" {{ $permission->reservation_delete == "enable" ? "checked" : "" }}></td>
                                        </tr>

                                        <tr>
                                            <td>الطلبات</td>
                                            <td><input type="checkbox" name="order_add" value="enable" {{ $permission->order_add == "enable" ? "checked" : "" }}></td>
                                            <td><input type="checkbox" name="order_edit" value="enable" {{ $permission->order_edit == "enable" ? "checked" : "" }}></td>
                                            <td><input type="checkbox" name="order_show" value="enable" {{ $permission->order_show == "enable" ? "checked" : "" }}></td>
                                            <td><input type="checkbox" name="order_delete" value="enable" {{ $permission->order_delete == "enable" ? "checked" : "" }}></td>
                                        </tr>


                                        <tr>
                                            <td>جليسات الاطفال</td>
                                            <td><input type="checkbox" name="nanny_add" value="enable" {{ $permission->nanny_add == "enable" ? "checked" : "" }}></td>
                                            <td><input type="checkbox" name="nanny_edit" value="enable" {{ $permission->nanny_edit == "enable" ? "checked" : "" }}></td>
                                            <td><input type="checkbox" name="nanny_show" value="enable" {{ $permission->nanny_show == "enable" ? "checked" : "" }}></td>
                                            <td><input type="checkbox" name="nanny_delete" value="enable" {{ $permission->nanny_delete == "enable" ? "checked" : "" }}></td>
                                        </tr>

                                        <tr>
                                            <td>ولى الامر</td>
                                            <td><input type="checkbox" name="guardian_add" value="enable" {{ $permission->guardian_add == "enable" ? "checked" : "" }}></td>
                                            <td><input type="checkbox" name="guardian_edit" value="enable" {{ $permission->guardian_edit == "enable" ? "checked" : "" }}></td>
                                            <td><input type="checkbox" name="guardian_show" value="enable" {{ $permission->guardian_show == "enable" ? "checked" : "" }}></td>
                                            <td><input type="checkbox" name="guardian_delete" value="enable" {{ $permission->guardian_delete == "enable" ? "checked" : "" }}></td>
                                        </tr>

                                        <tr>
                                            <td>حجز الباقات</td>
                                            <td><input type="checkbox" name="bookpackages_add" value="enable" {{ $permission->bookpackages_add == "enable" ? "checked" : "" }}></td>
                                            <td><input type="checkbox" name="bookpackages_edit" value="enable" {{ $permission->bookpackages_edit == "enable" ? "checked" : "" }}></td>
                                            <td><input type="checkbox" name="bookpackages_show" value="enable" {{ $permission->bookpackages_show == "enable" ? "checked" : "" }}></td>
                                            <td><input type="checkbox" name="bookpackages_delete" value="enable" {{ $permission->bookpackages_delete == "enable" ? "checked" : "" }}></td>
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
										{!! Form::submit(trans('admin.save'),['class'=>'btn btn-success']) !!}
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
