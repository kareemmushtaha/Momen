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
										<a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('bank/create')}}"
												data-toggle="tooltip" title="{{trans('admin.add')}}  {{trans('admin.bank')}}">
												<i class="fa fa-plus"></i>
										</a>
										<span data-toggle="tooltip" title="{{trans('admin.delete')}}  {{trans('admin.bank')}}">
												<a data-toggle="modal" data-target="#myModal{{$bank->id}}" class="btn btn-circle btn-icon-only btn-default" href="">
														<i class="fa fa-trash"></i>
												</a>
										</span>
										<div class="modal fade" id="myModal{{$bank->id}}">
												<div class="modal-dialog">
														<div class="modal-content">
																<div class="modal-header">
																		<button class="close" data-dismiss="modal">x</button>
																		<h4 class="modal-title">{{trans('admin.delete')}}؟</h4>
																</div>
																<div class="modal-body">
																		<i class="fa fa-exclamation-triangle"></i>   {{trans('admin.ask_del')}} {{trans('admin.id')}} ({{$bank->id}}) ؟
																</div>
																<div class="modal-footer">
																		{!! Form::open([
																		'method' => 'DELETE',
																		'route' => ['bank.destroy', $bank->id]
																		]) !!}
																		{!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger']) !!}
																		<a class="btn btn-default" data-dismiss="modal">{{trans('admin.cancel')}}</a>
																		{!! Form::close() !!}
																</div>
														</div>
												</div>
										</div>
										<a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('bank')}}"
												data-toggle="tooltip" title="{{trans('admin.show_all')}}   {{trans('admin.bank')}}">
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
										
<form action="{{aurl('/bank/'.$bank->id)}}"  class="form-horizontal form-row-seperated" method="post" enctype="multipart/form-data" id="bank">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<input type="hidden" name="_method" value="put">
<div class="form-group">
    <label for="Bank_item_id" class="col-md-3 control-label">{{trans('admin.Bank_item_id')}}</label>
    <div class="col-md-9">
        <select id="Bank_item_id" name="Bank_item_id" class="form-control" placeholder="{{trans('admin.Bank_item_id')}}" >

    @foreach(App\Model\Item::select('Item_name','id')->get()  as $Bank_item_id)
      <option value="{{ $Bank_item_id->id }}" {{ $bank->Bank_item_id == $Bank_item_id->id?"selected":"" }} >{{ $Bank_item_id->Item_name }}</option>
    @endforeach
</select>
    </div>
</div>
<br><div class="form-group">
    <label for="Bank_name" class="col-md-3 control-label">{{trans('admin.Bank_name')}}</label>
    <div class="col-md-9">
        <input type="text" id="Bank_name" name="Bank_name" value="{{ $bank->Bank_name }}" class="form-control" placeholder="{{trans('admin.Bank_name')}}" />
    </div>
</div>
<br>
<div class="form-group">
    <label for="bank_photo" class="col-md-3 control-label">{{trans('admin.bank_photo')}}</label>
    <div class="col-md-9">
        <input type="file" id="bank_photo" name="bank_photo" class="form-control" placeholder="{{trans('admin.bank_photo')}}" />
        @if(!empty($bank->bank_photo->bank_photo))
        <img src="{{it()->url($bank->bank_photo)}}" style="width:150px;height:150px;" />
        @endif
    </div>
</div>
<br>

<div class="form-actions">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-offset-3 col-md-9">
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
		
