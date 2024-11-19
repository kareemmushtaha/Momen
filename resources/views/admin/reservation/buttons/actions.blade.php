
		<div class="actions">
				<div class="btn-group">
						<a class="btn btn-default btn-outlines btn-circle" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false">
								<i class="fa fa-wrench"></i>
						{{ trans('admin.actions') }}
								<i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu pull-right">
								<li>
										<a href="{{ aurl('/reservation/'.$id.'/edit')}}"><i class="fa fa-pencil-square-o"></i> {{trans('admin.edit')}}</a>
								</li>
								<li class="divider"> </li>
								@if($Reservation_status == 'pending')
								<li>
									<a href="{{ aurl('/reservation/'.$id.'/active?status=active')}}"><i class="fa fa-check"></i> {{trans('admin.do_active')}}</a>
								</li>
								@else 
								<li>
									<a href="{{ aurl('/reservation/'.$id.'/active?status=pending')}}"><i class="fa fa-check"></i> {{trans('admin.pending')}}</a>
								</li>
								@endif
								<li>
									<a href="{{ aurl('/reservation/'.$id.'/active?status=canceled')}}"><i class="fa fa-trash"></i> {{ trans('admin.canceledd') }} </a>
								</li>
								<!-- <li>
										<a href="{{ aurl('/reservation/'.$id)}}"><i class="fa fa-eye"></i> {{trans('admin.show')}}</a>
								</li> -->
								<li>
										<a data-toggle="modal" data-target="#delete_record{{$id}}" href="#">
						<i class="fa fa-trash"></i> {{trans('admin.delete')}}</a>
								</li>
						</ul>
				</div>
		</div>
		<div class="modal fade" id="delete_record{{$id}}">
				<div class="modal-dialog">
						<div class="modal-content">
								<div class="modal-header">
										<button class="close" data-dismiss="modal">x</button>
										<h4 class="modal-title">{{trans('admin.delete')}}؟</h4>
								</div>
								<div class="modal-body">
										<i class="fa fa-exclamation-triangle"></i> {{trans('admin.ask_del')}} {{trans('admin.id')}} ({{$id}}) ؟
								</div>
								<div class="modal-footer">
										{!! Form::open([
										'method' => 'DELETE',
										'route' => ['reservation.destroy', $id]
										]) !!}
										{!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger']) !!}
										<a class="btn btn-default" data-dismiss="modal">{{trans('admin.cancel')}}</a>
										{!! Form::close() !!}
								</div>
						</div>
				</div>
		</div>
		