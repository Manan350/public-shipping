@component('mail::message')
Welcome to Public shipping!!.

Dear,{{$content['fname']}} {{$content['lname']}}.
You have successfully Registred yourself on our crowd shipping platform.
You will recieve mail for activation of your account on our platform as soon as your Id get verified.
<div class="alert alert-danger">
<u>Note:</u>
<p>1) All details provided by you must be valid.</p>
<p>2) Uploaded government Id proof must match with your uploaded details</p> 
</div>
If you did not request a signup , no further action is required.

Thanks,<br>
Regards WebsqaureTeam<br>
@endcomponent
