<span class="label
{{ $status == 'active'?'label-info':'' }}
{{ $status == 'pending'?'label-warning':'' }}
{{ $status == 'refused'?'label-danger':'' }}
{{ $status == 'archive'?'label-primary':'' }}">
{{ trans('admin.'.$status) }}
</span>
