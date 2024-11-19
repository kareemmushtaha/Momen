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
								<a  href="{{aurl('contactus')}}"
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

{!! Form::open(['url'=>aurl('/contactus'),'id'=>'contactus','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="form-group">
    {!! Form::label('subject',trans('admin.subject'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('subject',old('subject'),['class'=>'form-control','placeholder'=>trans('admin.subject')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('email',trans('admin.email'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::email('email',old('email'),['class'=>'form-control','placeholder'=>trans('admin.email')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('mobile',trans('admin.mobile'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('mobile',old('mobile'),['class'=>'form-control','placeholder'=>trans('admin.mobile')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('name',trans('admin.name'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('name',old('name'),['class'=>'form-control','placeholder'=>trans('admin.name')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('message',trans('admin.message'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::textarea('message',old('message'),['class'=>'form-control','placeholder'=>trans('admin.message')]) !!}
    </div>
</div>
<br>
<div class="form-group">
		{!! Form::label('status_msg',trans('admin.status_msg'),['class'=>'col-md-3 control-label']) !!}
		<div class="col-md-9">
{!! Form::select('status_msg',['seen'=>trans('admin.seen'),'unseen'=>trans('admin.unseen'),],old('status_msg'),['class'=>'form-control','placeholder'=>trans('admin.status_msg')]) !!}
		</div>
</div>
<br>
<div class="form-group">
		{!! Form::label('move_to',trans('admin.move_to'),['class'=>'col-md-3 control-label']) !!}
		<div class="col-md-9">
{!! Form::select('move_to',['inbox'=>trans('admin.inbox'),'archive'=>trans('admin.archive'),'spam'=>trans('admin.spam'),],old('move_to'),['class'=>'form-control','placeholder'=>trans('admin.move_to')]) !!}
		</div>
</div>
<br>

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

