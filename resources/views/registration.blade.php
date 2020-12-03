<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registration</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	@include('Include.css')
	<!-- Font-->
	@include('Include.js')
	<script>
		
	   </script>
<style>

.page-content{
    margin-bottom:150px;
}
.magic-ball{
    margin-bottom:50px;
}
.serif {
    font-family: "Times New Roman", Times, serif;
} 
</style>
</head>
@include('Include.header')
<body class="bg-shape">

  <section class="hero-banner magic-ball magic-ball-banner" id="parallax-1" data-anchor-target="#parallax-1" data-300-top="background-position: 0px -80px" data-top-bottom="background-position: 0 100px">
    <div class="container">
      <div class="hero-banner-content">   
	  <div class="row">          
				<div class="form-v10-content  col-sm-12">
					@include('Include.message')
					{!! Form::open(['novalidate','action' => 'registrationController@store','method' => 'POST','class'=>'form-detail needs-validation','id'=>'myform','enctype'=>'multipart/form-data']) !!}
									<div class="form-left">
							<h2>General Infomation</h2>
							<div class="form-group  mx-sm-6 mb-2">
								<div class="custom-file mx-sm-5 mb-2">
									<!-- <label class="custom-file-label" for="avatar">Choose Avatar</label> -->
									{!! Form::file('avatar', array('class' => 'form-control')) !!}
								  <div class="invalid-feedback">
									Please choose your avatar
								  </div>
								</div>
							</div> 
							<div class="form-group">
								<div class="form-row form-row-1">
									<input type="text" name="fname" id="first_name" class="input-text form-control" placeholder="First Name" required>
									<div class="invalid-feedback">
										Please choose a First name.
									  </div>
								</div>
								
								<div class="form-row form-row-2">
									<input type="text" name="lname" id="last_name" class="input-text form-control" placeholder="Last Name" required>
									<div class="invalid-feedback">
										Please choose a last name.
									  </div>
								</div>
							</div>
						
							<div class="form-row ">
								<input type="text" name="email" id="your_email" class="input-text form-control" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="Your Email">
								<div class="invalid-feedback">
									Please provide Email.
								  </div>
							</div>
							<div class="form-row">
								<input type="password" name="password" class="input-text form-control" id="paswword" placeholder="paswword" required>
								<div class="invalid-feedback">
									Please provide password.
								  </div>
							</div>
							<div class="form-row">
								<input type="password" name="password_confirmation" class="input-text form-control" id="c_paswword" placeholder="Confirm your paswword" required>
								<div class="invalid-feedback">
									Please provide password.
								  </div>
							</div>
			
								<div class="form-row ">
									<input type="date" name="dob" id="mobile" class="input-text form-control" placeholder="date-of-Birth" required>
									<div class="invalid-feedback">
										Please provide Birth date.
									  </div>
								</div>
					
							<div class="form-group">
								<div class="form-row form-row-1">
									<select  name="code"   id="code">
										<option value="">Code+</option>
										@foreach ($code as $code)
										<option value="{{ $code->phonecode }}">{{ $code->sortname }} {{ $code->phonecode }}</option>
										@endforeach
									</select> 
									
								</div>
								<div class="invalid-feedback">
									Please provide country code.
								  </div>
								<div class="form-row form-row-1">
									<input type="text" name="mobile" class="phone form-control" id="phone" placeholder="Phone Number" required>
								</div>
								<div class="invalid-feedback">
									Please provide contact number.
								  </div>
							</div>
							
						</div>
						<div class="form-right">
							<h2>Contact Details</h2>
							<div class="form-row">
								<input type="text" name="street" class="street form-control" id="street" placeholder="Street + Nr" required>
								<div class="invalid-feedback">
									Please provide Street address.
								  </div>
							</div>
						
						
			
							<div class="form-group">
								
								<div class="form-row form-row-1 ">
									<select  name="country" >
										<option value="">Country</option>
										@foreach ($data as $data)
										<option value="{{ $data->id }}">{{ $data->name }}</option>
										@endforeach
									</select> 
								</div>
								<div class="form-row form-row-1 ">
									<select name="state" id="state">
										<option value="">State</option>
	
									</select>
								</div>
		
							</div>
							
							<div class="form-group">
								<div class="form-row form-row-1">
									<select name="city" id="city">
										<option value="">City</option>
									</select>
									
								</div>
								
								<div class="form-row form-row-2">
									<input type="text" name="zip" class="zip" id="zip" placeholder="Zip Code" required>
							
								</div>
							
							</div>
							<div class="form-group  mx-sm-6 mb-2">
								<div class="custom-file mx-sm-5 mb-2">
								{!! Form::file('gov', array('class' => 'form-control')) !!}
								  <div class="invalid-feedback">
									Please provide id proof.
								  </div>
								</div>
							</div> 
						
									<div class="form-checkbox form-check">
								<label class="container"  ><p>I do accept the  <span data-toggle="modal" data-target="#terms"><u>Terms and Conditions </u></span>of your site.</p>
									  <input type="checkbox" class="form-check-input "  value="" name="checkbox" required>
									  <span class="checkmark"></span>
								</label>
								<div class="invalid-feedback">
									You must agree before submitting.
								  </div>
							</div>
							<div class="form-row-last">
								<input type="submit" name="submit" class="register" value="Register ">
							</div>
						</div>
						{!! Form::close() !!}
				<!-- Terms and Conditions  starts here-->
				<div class="modal fade bd-example-modal-lg" id="terms" tabindex="-1" role="dialog" aria-labelledby="termsTitle" aria-hidden="true" >
					<div class="modal-dialog modal-lg" role="document">
					  <div class="modal-content" >
						<div class="modal-header">
						  <h5 class="modal-title" id="termsTitle">Terms and conditions</h5>
						  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						  </button>
						</div>
						<div class="modal-body">
							@include('Include.terms')
						</div>
						<div class="modal-footer">
						
							<div class="form-row-last">
								<input type="button"  class="register" data-dismiss="modal" value="close">
							</div>
						</div>
					  </div>
					</div>
				  </div>
					  <!-- Terms and Conditions  ends here-->
					<script>
						// Example starter JavaScript for disabling form submissions if there are invalid fields
						(function() {
						  'use strict';
						  window.addEventListener('load', function() {
							// Fetch all the forms we want to apply custom Bootstrap validation styles to
							var forms = document.getElementsByClassName('needs-validation');
							// Loop over them and prevent submission
							var validation = Array.prototype.filter.call(forms, function(form) {
							  form.addEventListener('submit', function(event) {
								if (form.checkValidity() === false) {
								  event.preventDefault();
								  event.stopPropagation();
								}
								form.classList.add('was-validated');
							  }, false);
							});
						  }, false);
						})();
						</script>
				</div>
</div>
</div>
    </div>
  </section>
@include('Include.footer')
<script type="text/javascript">
$(document).ready(function(){
	$('select[name="country"]').on('change',function(){
		var id=$(this).val();
		
		if(id){
			$.ajax({
				url:'/registration/getstate/'+id,
				type:'GET',
				datatype:'json',
				success:function(data){
					//var len=Object.keys(data).length;
					let dropdown = $('#state');
					dropdown.empty();
					dropdown.append('<option>State</option>');
					dropdown.prop('selectedIndex', 0);
					$.each(JSON.parse(data), function (key, entry) {
						dropdown.append($('<option></option>').attr('value', entry.id).text(entry.name));
					});
				}
				
			});
		}
	});


	$('select[name="state"]').on('change',function(){
		var id=$(this).val();
		
		if(id){
			$.ajax({
				url:'/registration/getcity/'+id,
				type:'GET',
				datatype:'json',
				success:function(data){
					//var len=Object.keys(data).length;
					let dropdown = $('#city');
					dropdown.empty();
					dropdown.append('<option>City</option>');
					dropdown.prop('selectedIndex', 0);
					$.each(JSON.parse(data), function (key, entry) {
						dropdown.append($('<option></option>').attr('value', entry.id).text(entry.name));
					});
				}
				
			});
		}
	});
});
</script>
</body>
</html>