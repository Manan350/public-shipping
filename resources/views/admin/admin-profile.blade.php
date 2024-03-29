@if(session()->has('username'))
<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	<title>Admin Profile</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox1.css">
	<link rel="stylesheet" href="css/style1.css">

</head>
<body>
	 @include('../Include/aheader')

	<div class="ts-main-content">
		@include('../Include/asidebar')
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

					
						<h2 class="page-title" style="margin-top:4%">Admin Profile</h2>
							<div class="row">
						
							<div class="col-md-6">
								<div class="panel panel-default">
									<div class="panel-heading">Admin profile details</div>
									<div class="panel-body">
										<!-- <form action="" method="post" class="form-horizontal"> -->
										{!! Form::open(['method' => 'POST',"class" => "form-horizontal"]) !!}
											<div class="hr-dashed"></div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Username </label>
                                                <!-- {{$user=Session::get('user')}} -->

												<div class="col-sm-10">
													<input type="text" value="{{session('username')}}"  class="form-control" disabled><span class="help-block m-b-none">
													Username can't be changed.</span> </div>
												</div>

											<!-- <div class="form-group">
												<label class="col-sm-2 control-label">Email</label>
												<div class="col-sm-10">
													<input type="email" class="form-control" name="emailid" id="emailid" value="" required="required">

												</div>
											</div> -->
									<div class="form-group">
									<label class="col-sm-2 control-label">Reg Date</label>
									<div class="col-sm-10">
									<input type="text" class="form-control" value="" disabled >
												</div>
											</div>



												<div class="col-sm-8 col-sm-offset-2">
													<button class="btn btn-default" type="submit" style="font-size:20px;">Cancel</button>
													<input class="btn btn-primary" type="submit" name="update" value="Update Profile" style="font-size:20px;">
												</div>
											</div>

										</form>

									</div>
								</div>
								<div class="col-md-6">
								<div class="panel panel-default">
									<div class="panel-heading">Change Password</div>
									<div class="panel-body">

									{!! Form::open(['action'=>'adminLoginController@update','method' => 'POST',"class" => "form-horizontal"]) !!}
									{{@csrf_field()}}



											<p style="color: red"></p>

											<div class="hr-dashed"></div>
											<div class="form-group">
												<label class="col-sm-4 control-label">old Password </label>
												<div class="col-sm-8">
									<input type="password" value="" name="oldpassword" id="oldpassword" class="form-control" onBlur="checkpass()" required="required">
									 <span id="password-availability-status" class="help-block m-b-none" style="font-size:12px;"></span> </div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 control-label">New Password</label>
												<div class="col-sm-8">
											<input type="password" class="form-control" name="newpassword" id="newpassword" value="" required="required">
												</div>
											</div>
									<div class="form-group">
									<label class="col-sm-4 control-label">Confirm Password</label>
									<div class="col-sm-8">
									<input type="password" class="form-control" value="" required="required" id="cpassword" name="cpassword" >
												</div>
											</div>



												<div class="col-sm-8 col-sm-offset-2">
													<button class="btn btn-default" type="submit" style="font-size:20px;">Cancel</button>
													<input type="submit" name="changepwd" Value="Change Password" class="btn btn-primary" style="font-size:20px;">
											</div>

										{{Form::close()}}

									</div>
								</div>
							</div>
							</div>




							</div>
						</div>

					</div>
				</div>


			</div>
		</div>
	</div>
@include('Include.js')
	<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#emailid").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
<script>
function checkpass() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'oldpassword='+$("#oldpassword").val(),
type: "POST",
success:function(data){
$("#password-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
</body>

</html>
@endif