@extends('admin.index')
@section('content')
@push('js')
 <script type="text/javascript" src='https://maps.google.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyBwxuW2cdXbL38w9dcPOXfGLmi1J7AVVB8'></script>
 <script type="text/javascript" src='{{ url('design/js/locationpicker.jquery.js') }}'></script>
<?php
    $lat = !empty($events->lat) ? $events->lat : '29.378586';
    $lng = !empty($events->lng) ? $events->lng : '47.990341';
?>
 <script>
  $('#us1').locationpicker({
      location: {
          latitude: {{ $lat }},
          longitude:{{ $lng }}
      },
      radius: 300,
      markerIcon: '{{ url('design/img/map-marker-2-xl.png') }}',
  });
 </script>
 @endpush

<div class="row">
  <div class="col-md-12">
    <div class="widget-extra body-req portlet light bordered">
      <div class="portlet-title">
        <div class="caption">
          <span class="caption-subject bold uppercase font-dark">{{$title}}</span>
        </div>
        <div class="actions">
          <a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('events/create')}}"
            data-toggle="tooltip" title="{{trans('admin.events')}}">
            <i class="fa fa-plus"></i>
          </a>
          <span data-toggle="tooltip" title="{{trans('admin.delete')}}  {{trans('admin.events')}}">
            <a data-toggle="modal" data-target="#myModal{{$events->id}}" class="btn btn-circle btn-icon-only btn-default" href="">
              <i class="fa fa-trash"></i>
            </a>
          </span>
          <div class="modal fade" id="myModal{{$events->id}}">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal">x</button>
                  <h4 class="modal-title">{{trans('admin.delete')}}؟</h4>
                </div>
                <div class="modal-body">
                  {{trans('admin.ask_del')}} {{trans('admin.id')}} {{$events->id}} ؟
                </div>
                <div class="modal-footer">
                  {!! Form::open([
                  'method' => 'DELETE',
                  'route' => ['events.destroy', $events->id]
                  ]) !!}
                  {!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger']) !!}
                  <a class="btn btn-default" data-dismiss="modal">{{trans('admin.cancel')}}</a>
                  {!! Form::close() !!}
                </div>
              </div>
            </div>
          </div>
          <a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('/events')}}"
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
          <div class="col-md-12 col-lg-12 col-xs-12">
            <b>{{trans('admin.id')}} :</b> {{$events->id}}
          </div>
          <div class="clearfix"></div>
          <hr />
          <div class="col-md-4 col-lg-4 col-xs-4">
            <b>{{trans('admin.name')}} :</b>
            {!! $events->name !!}
          </div>
          <div class="col-md-4 col-lg-4 col-xs-4">
            <b>{{trans('admin.day')}} :</b>
            {!! $events->day !!}
          </div>
          <div class="col-md-4 col-lg-4 col-xs-4">
            <b>{{trans('admin.status')}} :</b>
            <span class="label
              {{ $events->status == 'active'?'label-info':'' }}
              {{ $events->status == 'pending'?'label-warning':'' }}
              {{ $events->status == 'refused'?'label-danger':'' }}
              {{ $events->status == 'archive'?'label-primary':'' }}">
              {{ trans('admin.'.$events->status) }}
            </span>
          </div>

          <div class="col-md-4 col-lg-4 col-xs-4">
            <b>{{trans('admin.event_time')}} :</b>
            {!! $events->event_time !!}
          </div>
          <div class="col-md-4 col-lg-4 col-xs-4">
            <b>{{trans('admin.mobile')}} :</b>
            <ol>
              @foreach(explode('|',$events->mobile) as $mobile)
              <li>{{ $mobile }}</li>
              @endforeach
            </ol>
          </div>
          <div class="clearfix"></div>
          <hr />
          <div class="col-md-12 col-lg-12 col-xs-12">
            <b>{{trans('admin.address')}} :</b>
            {!! $events->address !!}
          </div>
          <div class="clearfix"></div>
          <hr />
          <div id="us1" style="width: 100%; height: 400px;"></div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>
@stop
