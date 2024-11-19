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
					<a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('socials/create')}}"
						data-toggle="tooltip" title="{{trans('admin.add')}}  {{trans('admin.socials')}}">
						<i class="fa fa-plus"></i>
					</a>
					<span data-toggle="tooltip" title="{{trans('admin.delete')}}  {{trans('admin.socials')}}">
						<a data-toggle="modal" data-target="#myModal{{$socials->id}}" class="btn btn-circle btn-icon-only btn-default" href="">
							<i class="fa fa-trash"></i>
						</a>
					</span>
					<div class="modal fade" id="myModal{{$socials->id}}">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button class="close" data-dismiss="modal">x</button>
									<h4 class="modal-title">{{trans('admin.delete')}}؟</h4>
								</div>
								<div class="modal-body">
									<i class="fa fa-exclamation-triangle"></i>   {{trans('admin.ask_del')}} {{trans('admin.id')}} ({{$socials->id}}) ؟
								</div>
								<div class="modal-footer">
									{!! Form::open([
									'method' => 'DELETE',
									'route' => ['socials.destroy', $socials->id]
									]) !!}
									{!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger']) !!}
									<a class="btn btn-default" data-dismiss="modal">{{trans('admin.cancel')}}</a>
									{!! Form::close() !!}
								</div>
							</div>
						</div>
					</div>
					<a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('socials')}}"
						data-toggle="tooltip" title="{{trans('admin.show_all')}}   {{trans('admin.socials')}}">
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

					{!! Form::open(['url'=>aurl('/socials/'.$socials->id),'method'=>'put','id'=>'socials','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
					<div class="form-group">
						{!! Form::label('url_name',trans('admin.url_name'),['class'=>'col-md-3 control-label']) !!}
						<div class="col-md-9">
							{!! Form::text('url_name', $socials->url_name ,['class'=>'form-control','placeholder'=>trans('admin.url_name')]) !!}
						</div>
					</div>
					<br>
					<div class="form-group">
						{!! Form::label('fa_icon',trans('admin.fa_icon'),['class'=>'col-md-3 control-label']) !!}
						<div class="col-md-9">
							{!! Form::text('fa_icon', $socials->fa_icon ,['class'=>'form-control','placeholder'=>trans('admin.fa_icon')]) !!}
							<a href="https://fontawesome.com/icons" target="_blank">https://fontawesome.com/icons</a>
						</div>
					</div>
					<br>
					<div class="form-group">
						{!! Form::label('url',trans('admin.url'),['class'=>'col-md-3 control-label']) !!}
						<div class="col-md-9">
							{!! Form::url('url', $socials->url ,['class'=>'form-control','placeholder'=>trans('admin.url')]) !!}
						</div>
					</div>
					<br>
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
