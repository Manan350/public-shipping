@component('mail::message')
Welcome to Public shipping!!.
Dear,{{$content['fname']}} {{$content['lname']}}.
<p>Dear traveller we have recieved order generated with your travel</p>
Your generated order id is {{$content['orderid']}}
Thanks,<br>
websquare Publicshipping!!
@endcomponent
