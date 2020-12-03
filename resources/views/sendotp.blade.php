@component('mail::message')
Welcome to Public shipping!!.
Dear user,.
<p> Your otp for product confirmation is <span style="color:blue;"> {{ $content['otp'] }} </span> for product id <span style="color:blue;">{{ $content['order_Id'] }}</span>.<br>
Thanks,<br>
websquare Publicshipping!!

@endcomponent