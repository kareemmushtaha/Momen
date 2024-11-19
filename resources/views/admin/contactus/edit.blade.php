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
										<a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('contactus/create')}}"
												data-toggle="tooltip" title="{{trans('{lang}.add')}}  {{trans('{lang}.contactus')}}">
												<i class="fa fa-plus"></i>
										</a>
										<span data-toggle="tooltip" title="{{trans('{lang}.delete')}}  {{trans('{lang}.contactus')}}">
												<a data-toggle="modal" data-target="#myModal{{$contactus->id}}" class="btn btn-circle btn-icon-only btn-default" href="">
														<i class="fa fa-trash"></i>
												</a>
										</span>
										<div class="modal fade" id="myModal{{$contactus->id}}">
												<div class="modal-dialog">
														<div class="modal-content">
																<div class="modal-header">
																		<button class="close" data-dismiss="modal">x</button>
																		<h4 class="modal-title">{{trans('{lang}.delete')}}؟</h4>
																</div>
																<div class="modal-body">
																		<i class="fa fa-exclamation-triangle"></i>   {{trans('{lang}.ask_del')}} {{trans('{lang}.id')}} ({{$contactus->id}}) ؟
																</div>
																<div class="modal-footer">
																		{!! Form::open([
																		'method' => 'DELETE',
																		'route' => ['contactus.destroy', $contactus->id]
																		]) !!}
																		{!! Form::submit(trans('{lang}.approval'), ['class' => 'btn btn-danger']) !!}
																		<a class="btn btn-default" data-dismiss="modal">{{trans('{lang}.cancel')}}</a>
																		{!! Form::close() !!}
																</div>
														</div>
												</div>
										</div>
										<a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('contactus')}}"
												data-toggle="tooltip" title="{{trans('{lang}.show_all')}}   {{trans('{lang}.contactus')}}">
												<i class="fa fa-list"></i>
										</a>
										<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"
												data-original-title="{{trans('{lang}.fullscreen')}}"
												title="{{trans('{lang}.fullscreen')}}">
										</a>
								</div>
						</div>
						<div class="portlet-body form">
								<div class="col-md-12">

{!! Form::open(['url'=>aurl('/contactus/'.$contactus->id),'method'=>'put','id'=>'contactus','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="form-group">
    {!! Form::label('subject',trans('admin.subject'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('subject', $contactus->subject ,['class'=>'form-control','placeholder'=>trans('admin.subject')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('email',trans('admin.email'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::email('email', $contactus->email ,['class'=>'form-control','placeholder'=>trans('admin.email')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('mobile',trans('admin.mobile'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('mobile', $contactus->mobile ,['class'=>'form-control','placeholder'=>trans('admin.mobile')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('name',trans('admin.name'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('name', $contactus->name ,['class'=>'form-control','placeholder'=>trans('admin.name')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('message',trans('admin.message'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::textarea('message', $contactus->message ,['class'=>'form-control','placeholder'=>trans('admin.message')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('status_msg',trans('admin.status_msg'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
{!! Form::select('status_msg',['seen'=>trans('admin.seen'),'unseen'=>trans('admin.unseen'),], $contactus->status_msg ,['class'=>'form-control','placeholder'=>trans('admin.status_msg')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('move_to',trans('admin.move_to'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
{!! Form::select('move_to',['inbox'=>trans('admin.inbox'),'archive'=>trans('admin.archive'),'spam'=>trans('admin.spam'),], $contactus->move_to ,['class'=>'form-control','placeholder'=>trans('admin.move_to')]) !!}
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

