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
								<a  href="{{aurl('bank')}}"
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
								
<form action="{{aurl('/bank')}}" enctype="multipart/form-data" class="form-horizontal form-row-seperated" method="post" id="bank">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<input type="hidden" name="_method" value="post">
<div class="form-group">
		<label for="Bank_item_id" class="col-md-3 control-label">{{trans('admin.Bank_item_id')}}</label>
		<div class="col-md-9">
				<select id="Bank_item_id" name="Bank_item_id" class="form-control" placeholder="{{trans('admin.Bank_item_id')}}" >
    @foreach(App\Model\Item::select('Item_name','id')->get() as $Bank_item_id)
      <option value="{{ $Bank_item_id->id }}" {{old('Bank_item_id') == $Bank_item_id->id?'selected':''}}>{{ $Bank_item_id->Item_name }}</option>
    @endforeach
   </select>
		</div>
</div>
<br><div class="form-group">
    <label for="Bank_name" class="col-md-3 control-label">{{trans('admin.Bank_name')}}</label>
    <div class="col-md-9">
        <input type="text" id="Bank_name" name="Bank_name" value="{{old('Bank_name')}}" class="form-control" placeholder="{{trans('admin.Bank_name')}}" />
    </div>
</div>
<br>
<div class="form-group">
    <label for="bank_photo" class="col-md-3 control-label">{{trans('admin.bank_photo')}}</label>
    <div class="col-md-9">
        <input type="file" id="bank_photo" name="bank_photo" class="form-control" placeholder="{{trans('admin.bank_photo')}}" />
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
	
