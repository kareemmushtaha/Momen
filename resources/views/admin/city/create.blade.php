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
					<a  href="{{aurl('city')}}"
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
					{!! Form::open(['url'=>aurl('/city'),'id'=>'city','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
					<div class="form-group">
						{!! Form::label('name',trans('admin.name'),['class'=>'col-md-3 control-label']) !!}
						<div class="col-md-9">
							{!! Form::text('name',old('name'),['class'=>'form-control','placeholder'=>trans('admin.name')]) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('area_id',trans('admin.area'),['class'=>'col-md-3 control-label']) !!}
						<div class="col-md-9">
							<select class="form-control" name="area_id" id="">
								<option>احتار المنطقة</option>
								@foreach ($areas as $area )
								<option value="{{ $area->id }}">{{ $area->name }}</option>

								@endforeach

							</select>

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
