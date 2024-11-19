@if(App\Model\Item::find($Reservation_item_id)) 

<a href="{{ aurl('/item/'. App\Model\Item::find($Reservation_item_id)->id)}}">
{{ App\Model\Item::find($Reservation_item_id)->Item_name }}
</a>
@endif