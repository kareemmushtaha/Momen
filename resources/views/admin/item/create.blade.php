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
								<a  href="{{aurl('item')}}"
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

<form action="{{aurl('/item')}}" enctype="multipart/form-data" class="form-horizontal form-row-seperated" method="post" id="item">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<input type="hidden" name="_method" value="post">
<div class="form-group">
    <label for="Item_name" class="col-md-3 control-label">{{trans('admin.Item_name')}}</label>
    <div class="col-md-9">
        <input type="text" id="Item_name" name="Item_name" value="{{old('Item_name')}}" class="form-control" placeholder="{{trans('admin.Item_name')}}" />
    </div>
</div>
<br>
<div class="form-group">
    <label for="Item_Details" class="col-md-3 control-label">{{trans('admin.Item_Details')}}</label>
    <div class="col-md-9">
        <textarea id="Item_Details" class="form-control ckeditor" placeholder="{{trans('admin.Item_Details')}}"
        name="Item_Details" >{{old('Item_Details')}}</textarea>
    </div>
</div>
<br>
<div class="form-group">
    <label for="Item_price" class="col-md-3 control-label">{{trans('admin.Item_price')}}</label>
    <div class="col-md-9">
        <input type="text" id="Item_price" name="Item_price" value="{{old('Item_price')}}" class="form-control" placeholder="{{trans('admin.Item_price')}}" />
    </div>
</div>
<br>
<div class="form-group">
    <label for="Item_price_overnight" class="col-md-3 control-label">{{trans('admin.Item_price_overnight')}}</label>
    <div class="col-md-9">
        <input type="text" id="Item_price_overnight" name="Item_price_overnight" value="{{old('Item_price_overnight')}}" class="form-control" placeholder="{{trans('admin.Item_price_overnight')}}" />
    </div>
</div>
<br>
<div class="form-group">
    <label for="Item_terms" class="col-md-3 control-label">{{trans('admin.Item_terms')}}</label>
    <div class="col-md-9">
        <textarea id="Item_terms" class="form-control ckeditor" placeholder="{{trans('admin.Item_terms')}}"
        name="Item_terms" >{{old('Item_terms')}}</textarea>
    </div>
</div>
<!-- <br>
<div class="form-group">
    <label for="item_bank_account" class="col-md-3 control-label">{{trans('admin.item_bank_account')}}</label>
    <div class="col-md-9">
        <textarea id="item_bank_account" class="form-control" placeholder="{{trans('admin.item_bank_account')}}"
        name="item_bank_account" >{{old('item_bank_account')}}</textarea>
    </div>
</div> -->
<br>
<div class="form-group">
    <label for="item_latitude" class="col-md-3 control-label">{{trans('admin.item_latitude')}}</label>
    <div class="col-md-9">
        <input type="text" id="item_latitude" name="item_latitude" value="{{old('item_latitude')}}" class="form-control" placeholder="{{trans('admin.item_latitude')}}" />
    </div>
</div>
<br>
<div class="form-group">
    <label for="item_longitude" class="col-md-3 control-label">{{trans('admin.item_longitude')}}</label>
    <div class="col-md-9">
        <input type="text" id="item_longitude" name="item_longitude" value="{{old('item_longitude')}}" class="form-control" placeholder="{{trans('admin.item_longitude')}}" />
    </div>
</div>
<br>
<div class="form-group">
    <label for="item_photo" class="col-md-3 control-label">{{trans('admin.item_photo')}}</label>
    <div class="col-md-9">
        <input type="file" id="item_photo" name="item_photo" class="form-control" placeholder="{{trans('admin.item_photo')}}" />
    </div>
</div>
<br>
<div class="form-group">
		<label for="city_id" class="col-md-3 control-label">{{trans('admin.city_id')}}</label>
		<div class="col-md-9">
				<select id="city_id" name="city_id" class="form-control" placeholder="{{trans('admin.city_id')}}" >
    @foreach(App\City::select("name","id")->get() as $city_id)
      <option value="{{ $city_id->id }}" {{old('city_id') == $city_id->id?'selected':''}}>{{ $city_id->name }}</option>
    @endforeach
   </select>
		</div>
</div>
<br><div class="form-group">
		<label for="item_types_id" class="col-md-3 control-label">{{trans('admin.item_types_id')}}</label>
		<div class="col-md-9">
				<select id="item_types_id" name="item_types_id" class="form-control" placeholder="{{trans('admin.item_types_id')}}" >
    @foreach(App\Model\ItemType::select("ItemType_name","id")->get() as $item_types_id)
      <option value="{{ $item_types_id->id }}" {{old('item_types_id') == $item_types_id->id?'selected':''}}>{{ $item_types_id->ItemType_name }}</option>
    @endforeach
   </select>
		</div>
</div>
<br>
<div class="form-group">
    <label for="imageItem_photo" class="col-md-3 control-label">{{trans('admin.imageItem_photo')}}</label>
    <div class="col-md-9">
        <input type="file" id="imageItem_photo" name="imageItem_photo[]"  class="form-control" placeholder="{{trans('admin.imageItem_photo')}}" multiple />
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
