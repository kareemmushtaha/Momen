@component('mail::message')

<style type="text/css">
.alert-info {
    background-color: #e0ebf9;
    border-color: #e0ebf9;
    color: #327ad5;
}

.alert {
    padding: 15px;
    border: 1px solid transparent;
    border-radius: 4px;
}
</style>
<div dir="rtl">


#الرسالة الاصلية : {{ $data['data']['orginal_msg']->subject }}
<br>
<p>{{ $data['data']['orginal_msg']->message }}</p>
<hr />

<div class="alert alert-info">
	#الرد - بتاريخ : {{ date('Y-m-d h:i:s')}} <br>
{!! $data['data']['message'] !!}

</div>

<hr />
@foreach($data['old_replay'] as $old)

<div class="alert alert-info">
#الرد - بتاريخ : {{ $old->created_at }} <br>
{!! $old->message !!}

</div>

<hr />
@endforeach

<br />
</div>

 <a href="{{ url('') }}">{{ setting()->sitename_ar }}</a>
@endcomponent