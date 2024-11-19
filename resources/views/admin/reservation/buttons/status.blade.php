<span class="label
{{ $Reservation_status == 'pending'?'label-warning':'' }}
{{ $Reservation_status == 'canceled'?'label-danger':'' }}
{{ $Reservation_status == 'done'?'label-primary':'' }}">
{{ trans('admin.'.$Reservation_status) }}
</span>
