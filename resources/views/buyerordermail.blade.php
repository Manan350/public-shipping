@component('mail::message')
Welcome to Public shipping!!.
Dear,{{$content['fname']}} {{$content['lname']}}.
<p>You have registered your Order and your order id is {{$content['orderid']}}</p>

<p>your traveller's name is {{$content['travellerfname']}} {{$content['travellerlname']}}</p>
Thanks,<br>
websquare Publicshipping!!
@endcomponent
