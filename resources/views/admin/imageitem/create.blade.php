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
								<a  href="{{aurl('imageitem')}}"
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
								
<form action="{{aurl('/imageitem')}}" enctype="multipart/form-data" class="form-horizontal form-row-seperated" method="post" id="imageitem">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<input type="hidden" name="_method" value="post">
<div class="form-group">
		<label for="imageItem_id" class="col-md-3 control-label">{{trans('admin.imageItem_id')}}</label>
		<div class="col-md-9">
				<select id="imageItem_id" name="imageItem_id" class="form-control" placeholder="{{trans('admin.imageItem_id')}}" >
    @foreach(App\Model\Item::select('Item_name','id')->get() as $imageItem_id)
      <option value="{{ $imageItem_id->id }}" {{old('imageItem_id') == $imageItem_id->id?'selected':''}}>{{ $imageItem_id->Item_name }}</option>
    @endforeach
   </select>
		</div>
</div>
<br><div class="form-group">
    <label for="imageItem_photo" class="col-md-3 control-label">{{trans('admin.imageItem_photo')}}</label>
    <div class="col-md-9">
        <input type="file" id="imageItem_photo" name="imageItem_photo" class="form-control" placeholder="{{trans('admin.imageItem_photo')}}" />
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
	
