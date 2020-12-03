<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Traveller</title>
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
					{!! Form::open(['novalidate','action' => ['profileControler@update',$data->id],'method' => 'POST','class'=>'form-detail needs-validation','id'=>'myform','enctype'=>'multipart/form-data']) !!}
									<div class="form-left">
                            <h2>General Infomation</h2>
                            {{ Form::hidden('_method','PUT') }}
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
									<input type="text" name="fname" id="first_name" class="input-text form-control" value="{{ $data->fname }}" readonly>
									<div class="invalid-feedback">
										Please choose a First name.
									  </div>
								</div>
								
								<div class="form-row form-row-2">
									<input type="text" name="lname" id="last_name" class="input-text form-control" value="{{ $data->lname }}" readonly>
									<div class="invalid-feedback">
										Please choose a last name.
									  </div>
								</div>
							</div>
						
							<div class="form-row ">
								<input type="text" name="email" id="your_email" class="input-text form-control" value="{{ $data->email }}" readonly>
								<div class="invalid-feedback">
									Please provide Email.
								  </div>
							</div>
							
								<div class="form-row ">
									<input type="date" name="dob" id="mobile" class="input-text form-control" value="{{ $data->dob }}" readonly>
									<div class="invalid-feedback">
										Please provide Birth date.
									  </div>
								</div>
					
							<div class="form-group">
								<div class="form-row form-row-1">
									<input type="text" name="code" value="" class="form-control" value="{{ $data->code }}" readonly>
									
								</div>
								<div class="invalid-feedback">
									Please provide country code.
								  </div>
								<div class="form-row form-row-1">
									<input type="text" name="mobile" class="phone form-control" id="phone" value="{{ $data->mobile }}" readonly>
								</div>
								<div class="invalid-feedback">
									Please provide contact number.
								  </div>
							</div>
							
						</div>
						<div class="form-right">
							<h2>Contact Details</h2>
							<div class="form-row">
								<input type="text" name="street" class="street form-control" id="street" value="{{ $data->local_area}}" >
								<div class="invalid-feedback">
									Please provide Street address.
								  </div>
							</div>
						
						
			
							<div class="form-group">
								
								<div class="form-row form-row-1 ">
									<input type="text" name="country" class="form-control" value="{{ $data->country }}" readonly>
								</div>
								<div class="form-row form-row-1 ">
									
                                    <input type="text" name="country" class="form-control" value="{{ $data->state }}" readonly>
							
								
								</div>
		
							</div>
							
							<div class="form-group">
								<div class="form-row form-row-1">
                                    <input type="text" name="country" class="form-control" value="{{ $data->city }}" readonly>
							
									
								</div>
								
								<div class="form-row form-row-2">
									<input type="text" name="zip" class="zip" id="zip" value="{{ $data->zip }}" readonly>
							
								</div>
							
							</div>
						
							</div> 
						
							
							<div class="form-row-last">
								<input type="submit" name="submit" class="form-control" value="Register ">
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
</body>
</html>