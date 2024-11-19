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
					<a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('links/create')}}"
						data-toggle="tooltip" title="{{trans('admin.add')}}  {{trans('admin.links')}}">
						<i class="fa fa-plus"></i>
					</a>
					<span data-toggle="tooltip" title="{{trans('admin.delete')}}  {{trans('admin.links')}}">
						<a data-toggle="modal" data-target="#myModal{{$links->id}}" class="btn btn-circle btn-icon-only btn-default" href="">
							<i class="fa fa-trash"></i>
						</a>
					</span>
					<div class="modal fade" id="myModal{{$links->id}}">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button class="close" data-dismiss="modal">x</button>
									<h4 class="modal-title">{{trans('admin.delete')}}؟</h4>
								</div>
								<div class="modal-body">
									<i class="fa fa-exclamation-triangle"></i>   {{trans('admin.ask_del')}} {{trans('admin.id')}} ({{$links->id}}) ؟
								</div>
								<div class="modal-footer">
									{!! Form::open([
									'method' => 'DELETE',
									'route' => ['links.destroy', $links->id]
									]) !!}
									{!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger']) !!}
									<a class="btn btn-default" data-dismiss="modal">{{trans('admin.cancel')}}</a>
									{!! Form::close() !!}
								</div>
							</div>
						</div>
					</div>
					<a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('links')}}"
						data-toggle="tooltip" title="{{trans('admin.show_all')}}   {{trans('admin.links')}}">
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
					{!! Form::open(['url'=>aurl('/links/'.$links->id),'method'=>'put','id'=>'links','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
					<div class="form-group">
						{!! Form::label('name',trans('admin.name_ar'),['class'=>'col-md-3 control-label']) !!}
						<div class="col-md-9">
							{!! Form::text('name', $links->name ,['class'=>'form-control','placeholder'=>trans('admin.name_ar')]) !!}
						</div>
					</div>
					<br>
					<div class="form-group">
						{!! Form::label('name_en',trans('admin.name_en'),['class'=>'col-md-3 control-label']) !!}
						<div class="col-md-9">
							{!! Form::text('name_en', $links->name_en ,['class'=>'form-control','placeholder'=>trans('admin.name_en')]) !!}
						</div>
					</div>
					<br>
					<div class="form-group">
						{!! Form::label('url',trans('admin.url'),['class'=>'col-md-3 control-label']) !!}
						<div class="col-md-9">
							{!! Form::text('url', $links->url ,['class'=>'form-control','placeholder'=>trans('admin.url')]) !!}
						</div>
					</div>
					<br>
					<div class="form-group">
						{!! Form::label('link_place',trans('admin.link_place'),['class'=>'col-md-3 control-label']) !!}
						<div class="col-md-9">
							{!! Form::select('link_place',['header'=>trans('admin.header'),'footer'=>trans('admin.footer'),'footer2'=>trans('admin.footer2')],$links->link_place,['class'=>'form-control','placeholder'=>trans('admin.link_place')]) !!}
						</div>
					</div>
					<br>
					<div class="form-group">
						{!! Form::label('icon',trans('admin.icon'),['class'=>'col-md-3 control-label']) !!}
						<div class="col-md-9">
							{!! Form::text('icon', $links->icon ,['class'=>'form-control']) !!}
							<a href="https://fontawesome.com/icons" target="_blank">https://fontawesome.com/icons</a>
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
