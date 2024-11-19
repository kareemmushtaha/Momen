@if(!empty($admin_id))
{{ @App\Admin::find($admin_id)->name }}
@else
{{ trans('admin.none_replay') }}
@endif
