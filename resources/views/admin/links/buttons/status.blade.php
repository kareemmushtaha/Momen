<span class="label
{{ $status == 'active'?'label-info':'' }}
{{ $status == 'pending'?'label-warning':'' }}">
{{ trans('admin.'.$status) }}
</span>
