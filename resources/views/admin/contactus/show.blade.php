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
                           data-toggle="tooltip" title="{{trans('admin.contactus')}}">
                            <i class="fa fa-plus"></i>
                        </a>


                        <span data-toggle="tooltip" title="{{trans('admin.delete')}}  {{trans('admin.contactus')}}">

                        <a data-toggle="modal" data-target="#myModal{{$contactus->id}}" class="btn btn-circle btn-icon-only btn-default" href="">
                        <i class="fa fa-trash"></i>
                        </a>
                        </span>


<div class="modal fade" id="myModal{{$contactus->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">x</button>
                <h4 class="modal-title">{{trans('admin.delete')}}؟</h4>
            </div>
            <div class="modal-body">
                                {{trans('admin.ask_del')}} {{trans('admin.id')}} {{$contactus->id}} ؟

            </div>
            <div class="modal-footer">
                {!! Form::open([
               'method' => 'DELETE',
               'route' => ['contactus.destroy', $contactus->id]
               ]) !!}
                {!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger']) !!}
                <a class="btn btn-default" data-dismiss="modal">{{trans('admin.cancel')}}</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

                        <a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('/contactus')}}"
                           data-toggle="tooltip" title="{{trans('admin.show_all')}}   {{trans('admin.contactus')}}">
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
<div class="col-md-12 col-lg-12 col-xs-12">
<b>{{trans('admin.id')}} :</b> {{$contactus->id}}
</div>
<div class="clearfix"></div>
<hr />
@if(!empty($contactus->admin_id) && $contactus->admin_id > 0)
<div class="col-md-12 col-lg-12 col-xs-12">
<b>{{trans('admin.admin_id')}} :</b>
 {{ @App\Admin::find($contactus->admin_id)->name }}
</div>
@endif


<div class="col-md-12 col-lg-12 col-xs-12">
<b>{{trans('admin.subject')}} :</b>
 {!! $contactus->subject !!}
</div>


<div class="col-md-12 col-lg-12 col-xs-12">
<b>{{trans('admin.email')}} :</b>
 {!! $contactus->email !!}
</div>


<div class="col-md-12 col-lg-12 col-xs-12">
<b>{{trans('admin.mobile')}} :</b>
 {!! $contactus->mobile !!}
</div>


<div class="col-md-12 col-lg-12 col-xs-12">
<b>{{trans('admin.name')}} :</b>
 {!! $contactus->name !!}
</div>


<div class="col-md-12 col-lg-12 col-xs-12">
<b>{{trans('admin.message')}} :</b>
 {!! $contactus->message !!}
</div>


<div class="col-md-12 col-lg-12 col-xs-12">
<b>{{trans('admin.status_msg')}} :</b>
 {!! trans('admin.'.$contactus->status_msg) !!}
</div>


<div class="col-md-12 col-lg-12 col-xs-12">
<b>{{trans('admin.move_to')}} :</b>
 {!! trans('admin.'.$contactus->move_to) !!}
</div>
<div class="clearfix"></div>
<hr />
@foreach($replaies as $replay)
 <div class="alert alert-info">
  {{ trans('admin.replay_by') }} {{ $replay->admin->name }}
   <hr>
  {{ trans('admin.message') }}
   <br>
   {!! $replay->message !!}
 </div>
@endforeach
{!! $replaies->render() !!}
<hr />

<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
           </div>
         </div>
       </div>
   </div>
@stop
