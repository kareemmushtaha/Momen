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
										<a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('item/create')}}"
												data-toggle="tooltip" title="{{trans('admin.add')}}  {{trans('admin.item')}}">
												<i class="fa fa-plus"></i>
										</a>
										<span data-toggle="tooltip" title="{{trans('admin.delete')}}  {{trans('admin.item')}}">
												<a data-toggle="modal" data-target="#myModal{{$item->id}}" class="btn btn-circle btn-icon-only btn-default" href="">
														<i class="fa fa-trash"></i>
												</a>
										</span>
										<div class="modal fade" id="myModal{{$item->id}}">
												<div class="modal-dialog">
														<div class="modal-content">
																<div class="modal-header">
																		<button class="close" data-dismiss="modal">x</button>
																		<h4 class="modal-title">{{trans('admin.delete')}}؟</h4>
																</div>
																<div class="modal-body">
																		<i class="fa fa-exclamation-triangle"></i>   {{trans('admin.ask_del')}} {{trans('admin.id')}} ({{$item->id}}) ؟
																</div>
																<div class="modal-footer">
																		{!! Form::open([
																		'method' => 'DELETE',
																		'route' => ['item.destroy', $item->id]
																		]) !!}
																		{!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger']) !!}
																		<a class="btn btn-default" data-dismiss="modal">{{trans('admin.cancel')}}</a>
																		{!! Form::close() !!}
																</div>
														</div>
												</div>
										</div>
										<a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('item')}}"
												data-toggle="tooltip" title="{{trans('admin.show_all')}}   {{trans('admin.item')}}">
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

<form action="{{aurl('/item/'.$item->id)}}"  class="form-horizontal form-row-seperated" method="post" enctype="multipart/form-data" id="item">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<input type="hidden" name="_method" value="put">
<div class="form-group">
    <label for="Item_name" class="col-md-3 control-label">{{trans('admin.Item_name')}}</label>
    <div class="col-md-9">
        <input type="text" id="Item_name" name="Item_name" value="{{ $item->Item_name }}" class="form-control" placeholder="{{trans('admin.Item_name')}}" />
    </div>
</div>
<br>
<div class="form-group">
    <label for="Item_Details" class="col-md-3 control-label">{{trans('admin.Item_Details')}}</label>
    <div class="col-md-9">
        <textarea id="Item_Details" class="form-control ckeditor" placeholder="{{trans('admin.Item_Details')}}"
        name="Item_Details" >{{ $item->Item_Details }}</textarea>
    </div>
</div>
<br>
<div class="form-group">
    <label for="Item_price" class="col-md-3 control-label">{{trans('admin.Item_price')}}</label>
    <div class="col-md-9">
        <input type="text" id="Item_price" name="Item_price" value="{{ $item->Item_price }}" class="form-control" placeholder="{{trans('admin.Item_price')}}" />
    </div>
</div>
<br>
<div class="form-group">
    <label for="Item_price_overnight" class="col-md-3 control-label">{{trans('admin.Item_price_overnight')}}</label>
    <div class="col-md-9">
        <input type="text" id="Item_price_overnight" name="Item_price_overnight" value="{{ $item->Item_price_overnight }}" class="form-control" placeholder="{{trans('admin.Item_price_overnight')}}" />
    </div>
</div>
<br>
<div class="form-group">
    <label for="Item_terms" class="col-md-3 control-label">{{trans('admin.Item_terms')}}</label>
    <div class="col-md-9">
        <textarea id="Item_terms" class="form-control ckeditor" placeholder="{{trans('admin.Item_terms')}}"
        name="Item_terms" >{{ $item->Item_terms }}</textarea>
    </div>
</div>
<!-- <br>
<div class="form-group">
    <label for="item_bank_account" class="col-md-3 control-label">{{trans('admin.item_bank_account')}}</label>
    <div class="col-md-9">
        <textarea id="item_bank_account" class="form-control" placeholder="{{trans('admin.item_bank_account')}}"
        name="item_bank_account" >{{ $item->item_bank_account }}</textarea>
    </div>
</div> -->
<br>
<div class="form-group">
    <label for="item_latitude" class="col-md-3 control-label">{{trans('admin.item_latitude')}}</label>
    <div class="col-md-9">
        <input type="text" id="item_latitude" name="item_latitude" value="{{ $item->item_latitude }}" class="form-control" placeholder="{{trans('admin.item_latitude')}}" />
    </div>
</div>
<br>
<div class="form-group">
    <label for="item_longitude" class="col-md-3 control-label">{{trans('admin.item_longitude')}}</label>
    <div class="col-md-9">
        <input type="text" id="item_longitude" name="item_longitude" value="{{ $item->item_longitude }}" class="form-control" placeholder="{{trans('admin.item_longitude')}}" />
    </div>
</div>
<br>
<div class="form-group">
    <label for="item_photo" class="col-md-3 control-label">{{trans('admin.item_photo')}}</label>
    <div class="col-md-9">
        <input type="file" id="item_photo" name="item_photo" class="form-control" placeholder="{{trans('admin.item_photo')}}" />
        @if(!empty($item->item_photo))
        <img src="{{it()->url($item->item_photo)}}" style="width:150px;height:150px;" />
        @endif
    </div>
</div>
<br>
<div class="form-group">
    <label for="city_id" class="col-md-3 control-label">{{trans('admin.city_id')}}</label>
    <div class="col-md-9">
        <select id="city_id" name="city_id" class="form-control" placeholder="{{trans('admin.city_id')}}" >

    @foreach(App\City::select("name","id")->get() as $city_id)
      <option value="{{ $city_id->id }}" {{ $item->city_id == $city_id->id?"selected":"" }} >{{ $city_id->name }}</option>
    @endforeach
</select>
    </div>
</div>
<br><div class="form-group">
    <label for="item_types_id" class="col-md-3 control-label">{{trans('admin.item_types_id')}}</label>
    <div class="col-md-9">
        <select id="item_types_id" name="item_types_id" class="form-control" placeholder="{{trans('admin.item_types_id')}}" >

    @foreach(App\Model\ItemType::select("ItemType_name","id")->get() as $item_types_id)
      <option value="{{ $item_types_id->id }}" {{ $item->item_types_id == $item_types_id->id?"selected":"" }} >{{ $item_types_id->ItemType_name }}</option>
    @endforeach
</select>
    </div>
</div>
<br>
<div class="form-group">
<label for="item_types_id" class="col-md-3 control-label">{{trans('admin.imageitem')}} :</label>
<div class="col-md-9">

        <input type="file" id="imageItem_photo" name="imageItem_photo[]"  class="form-control" placeholder="{{trans('admin.imageItem_photo')}}" multiple />
    </div>
<br>
<br>
</div>

@if($item->images->count() > 0 )
@foreach($item->images as $item)

<div class="col-md-4 col-lg-4 col-xs-4">
    @if(!empty($item->imageItem_photo))
    <div>
    <!-- <form action="" method="get">
    @csrf
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="hidden" name="_method" value="put">
    <button class="btn btn-danger" type="submit">حذف</button>
    </form> -->
    <a href="{{url('admin/imageitem/destroy', $item->id)}}">حذف</a>
    <img src="{{it()->url($item->imageItem_photo)}}" style="width:100%;height:300px;object-fit: fill;" />

    </div>
    @endif
</div>
@endforeach
@else
<h1>لا يوجد صور</h1>

@endif


<div class="form-actions">
    <div class="row">

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-offset-3 col-md-9">
                <br>
<br>
<input type="submit" class="btn btn-success" value="{{ trans('admin.save') }}" />
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
