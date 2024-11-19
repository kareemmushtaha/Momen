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
								<a  href="{{aurl('testes')}}"
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
								
<form action="{{aurl('/testes')}}" enctype="multipart/form-data" class="form-horizontal form-row-seperated" method="post" id="testes">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<input type="hidden" name="_method" value="post">
<div class="form-group">
		<label for="testes" class="col-md-3 control-label">{{trans('admin.testes')}}</label>
		<div class="col-md-9">
				<select id="testes" name="testes" class="form-control" placeholder="{{trans('admin.testes')}}" >
    @foreach(App\Admin::pluck('name' , 'id') as $testes)
      <option value="{{ $testes-> id }}" {{old('testes') == $testes-> id?'selected':''}}>{{ $testes->name  }}</option>
    @endforeach
   </select>
		</div>
</div>
<br>
<div class="form-actions">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-offset-3 col-md-9">
<input type="submit" class="btn btn-success" value="{{ trans('admin.add') }}" />
         </div>
            </div>
        </div>
    </div>
</div>
</form>
										</div>
										<div class="clearfix"></div>
						</div>
				</div>
		</div>
	</div>
	@stop
	
