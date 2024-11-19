@if(App\User::find($Reservation_user_id)) 

<a href="{{ aurl('/users/'. \App\User::find($Reservation_user_id)->id)}}">
{{ App\User::find($Reservation_user_id)->name }}
</a>

@endif