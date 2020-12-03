<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>As Traveller</title>
	<!-- Mobile Specific Metas -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   
<style>
	table {
		border-collapse: collapse;
		border-spacing: 0;
		width: 100%;
		border: 1px solid #ddd;
	  }
	  
	  th, td {
		text-align: left;
		padding: 8px;
	  }
	  .container {
		position: relative;
		max-width: 800px; /* Maximum width */
		margin: 0 auto; /* Center it */
	  }
	  
	  .container .content {
		position: absolute; /* Position the background text */
		bottom: 0; /* At the bottom. Use top:0 to append it to the top */
		background: rgb(0, 0, 0); /* Fallback color */
		background: rgba(0, 0, 0, 0.5); /* Black background with 0.5 opacity */
		color: #f1f1f1; /* Grey text */
		width: 100%; /* Full width */
		padding: 20px; /* Some padding */
	  }
	  </style>
@if (session('name')==null)
<script type="text/javascript">
  window.location = "{{ url('/')  }}";//here double curly bracket
</script>
@endif
</head>
@include('Include.header')
<body class="bg-shape">
	<section class="hero-banner magic-ball magic-ball-banner" id="parallax-1" data-anchor-target="#parallax-1" data-300-top="background-position: 0px -80px" data-top-bottom="background-position: 0 100px">
		@include('Include.message') 
		<div class="container">
			 <div class="row">
				 <h1 class="text-lg-center text-md-center text-sm-center serif">Peer to Peer crowd shipping platform connecting travelers and senders.</h1>
			 </div>
			
			<div class="row">
				 <h5 class="text-justify serif">As a platform HeyParcel is transforming the way goods move between cities by enabling anyone to have anything delivered on-demand. Our revolutionary intercity peer to peer crowd shipping platform connects senders with Travelers who can deliver anything from there traveling city to heading city. We empower communities to local parcel senders with no waiting, faster, cheaper and empower sharing economy and environment friendly packing.</h5>
			 </div>
				
		   </div>
	</section>
	<hr class="hr">
	<div class="container" style="margin-top:70px;">
		<h1 class="text-lg-center serif">How to Ship from any country with Shippn?</h1>
		  <div class="row" style="margin-top:50px;">
			<div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
			  <div class="service-card text-center">
				<div class="service-card-body">
				  <h3 class="serif">Sign up as a host</h3>
				  <p class="serif">Start by creating your profile page and complete verifications. You’ll fill out a description, and state the additional services you serve. Your profile helps shoppers get a sense of the services you offer. You set the rules for when you are available.</p>
				</div>
			  </div>
			</div>
			<div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
			  <div class="service-card text-center">
				
				<div class="service-card-body">
				  <h3 class="serif">Requester find your listing and pay for your services</h3>
				  <p class="serif">You’ll get a message from us about requester's package and forwarding options selected by the requester. You can also see the expected package's details on your account dashboard.These are important to provide a great service.</p>
				</div>
			  </div>
			</div>
			<div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
			  <div class="service-card text-center">
				
				<div class="service-card-body">
				  <h3 class="serif">Meeting Points</h3>
				  <p class="serif">.</p>
				</div>
			  </div>
			</div>
			<div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
			  <div class="service-card text-center">
				
				<div class="service-card-body">
				  <h3 class="serif">Hand Over the package</h3>
				  <p class="serif">.</p>
				</div>
			  </div>
			</div>
			<div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
			  <div class="service-card text-center">
				
				<div class="service-card-body">
				  <h3 class="serif">
					Host packages and ship when ready</h3>
				  <p class="serif">Hosting packages with Shippn is easy. Enter package details with a few clicks and your shopper will instantly get a notification indicating their package is ready to ship.
					How shoppers pay? Shippn handles all of the payments—you never have to deal with money. Shoppers pay even before you receive their package.</p>
				</div>
			  </div>
			</div>
			
		  </div>
		</div>
	<hr class="hr">
	
	
		<div class="container" style="margin-top:70px;">
			<h1 class="text-lg-center serif">Add Your Journey</h1>
		  <div class="row">
			<div class="col-lg-7 col-md-6 mb-4 mb-md-0">
			  <div class="about-img">
				<img class="img-fluid rounded" src="img/shop.jpg" alt="">
			  </div>
			</div>
			<div class="search-wrapper">
				{!! Form::open(['action' => 'travellerController@store','method' => 'POST','enctype'=>'multipart/form-data']) !!}
				
				<div class="form-group">
					<label class="form-group serif">From</label>
					   <select id="inputState" class="form-control" name="from">
							 <option value=" ">Select country</option>
							 @foreach($country as $country)
							 <option value=" {{$country->name}}">{{$country->name}}</option>
							 @endforeach
					   </select>
					</div>
					<div class="form-group">
						<label class="form-group serif">To</label>
						<select id="inputState" class="form-control" name="to">
							 <option value="">Select country</option>
							 @foreach($Country as $Country)
							 <option value=" {{$Country->name}}">{{$Country->name}}</option>
							 @endforeach
						</select>
					</div>
					<div class="form-group">
						<label class="form-group serif">Departure</label>
						  <input type="date" class="form-control" name="departure">
						</div>
					<div class="form-group">
						<label class="form-group serif">Arrival</label>
						<input type="date" class="form-control" name="arrival">
					</div>
					<div class="form-group">
						<label class="form-group">Upload Ticket</label>
						{!! Form::file('ticket', array('class' => 'form-control')) !!}
					</div>
					<div class="form-group">
					  <button class="button border-0 mt-3" type="submit">Add journey</button>
					</div>
					{!! Form::close() !!}
			</div>
		  </div>
		</div>
	<hr class="hr">

	<div class="container" style="margin-top:70px;">
	<h1 class="text-lg-center serif">Pending Request</h1>
	<p class="text-lg-center serif text-justify">Your pending request will appear here. From here you can provide proce or cancel that request if you want to.</p>
		<div style="overflow-x:auto;">
		@if(session()->get('demo')==1)
			<div class="alert alert-danger "  role="alert">
				<h4 class="alert-heading">OPPSS!!! you are a demo user</h4>
			
				<hr>
				<p class="mb-0">Visit me later.</p>
	
			</div>
		@else
			@if($request->count()>0)
			<table class="table " id="dataTable" width="100%" cellspacing="0">

				<!--Table head-->
				<thead>
				  <tr>
					<th class="col serif">Requester-Id</th>
					<th class="col serif">Avatar</th>
					<th class="col serif">Name</th>
					<th class="col serif">Surname</th>
					<th class="col serif">Country</th>
					<th class="col serif">State</th>
					<th class="col serif">City</th>
					<th class="col serif">Item Name</th>
					<th class="col serif">Item Discription</th>
					<th class="col serif">Item category</th>
					<th class="col serif">price</th>
					<th class="col serif">cancle</th>
				  </tr>
				</thead>
				<!--Table head-->
			  
				<!--Table body-->
				<tbody>
					@foreach($request as $request)
				  <tr >
					<th scope="row serif">{{$request->r_id}}</th>
					<td class="serif"> <img src="data:image/jpeg;base64,{{$request->avatar}}" class="rounded" style="width:50px;height:50px;border:50%;"/></td>
					<td class=" serif">{{$request->fname}}</td>
					<td class=" serif">{{$request->lname}}</td>
					<td class=" serif">{{$request->country}}</td>
					<td class=" serif">{{$request->state}}</td>
					<td class=" serif">{{$request->city}}</td>
					<td class=" serif">{{$request->item_name}}</td>
					<td class=" serif">{{$request->discription}}</td>
					<td class=" serif">{{$request->category}}</td>
					<td class=" serif"> 
				
				  {!! Form::open(['action'=>'AsTravellerController@bidprice','method' => 'POST','class'=>'form-detail needs-validation','id'=>'myform']) !!}
					@csrf
										
					  <input type="hidden" value="{{$request->id}}" name="id">
					 <input type="hidden" value="{{$request->r_id}}" name="r_id">
					 <input type="hidden" value="{{$request->avatar}}" name="avatar">
					 <input type="hidden" value="{{$request->fname}}" name="fname">
					 <input type="hidden" value="{{$request->lname}}" name="lname">
					 <input type="hidden" value="{{$request->item_name}}" name="itemname">
					  <input type="hidden" value="{{$request->discription}}" name="discription">
					   <input type="hidden" value="{{$request->category}}" name="category">
			
				    <input type="submit" class="btn btn-success rounded"  value="Bid"> 
					 
					  {!!Form::close()!!}
				  
					</td>
					<td class=" serif">
					{!! Form::open(['action'=>'AsTravellerController@cancel','method' => 'POST','class'=>'form-detail needs-validation','id'=>'myform']) !!}
									  @csrf
										
					  <input type="hidden" value="{{$request->id}}" name="id">
					  <input type="submit" class="btn btn-danger rounded"  value="Cancel"></td>
					  {!!Form::close()!!}
					</td>
				</tr>
				 @endforeach
				</tbody>
				<!--Table body-->
			 
			  </table>
			@else
			<div class="alert alert-danger "  role="alert">
					<h4 class="alert-heading">OPPSS!!!</h4>
					<p>Keep travelling for Request!</p>
		   <hr>
		   <p class="mb-0">Visit me later.</p>
		 
				 </div>
		  @endif  
		@endif
		</div>
	</div> 
	<hr class="hr">
	<div class="container" style="margin-top:70px;">
	<h1 class="text-lg-center serif">Travel History</h1>
	<p class="text-lg-center serif text-justify">Your Travel hsitory will appear here.</p>
	<div style="overflow-x:auto;">
		@if($history->count()>0)
		<table class="table  table-bordered" id="dataTable" width="100%" cellspacing="0">

			<!--Table head-->
			<thead>
			  <tr>
				<td class="serif">From</td>
				<td class=" serif">To</td>
				<td class="serif">Departure Date</td>
				<td class="serif">Arrival Date</td>
			  </tr>
			</thead>
			<!--Table head-->
		  
			<!--Table body-->
		
				@foreach($history as $history)
				<tbody>
			  <tr >
				<td class="serif">{{$history->From}}</td>
				<td class=" serif">{{$history->To}}</td>
				<td class=" serif">{{$history->departure}}</td>
				<td class=" serif">{{$history->arrival}}</td>
			  </tr>
			</tbody>
			 @endforeach
			
			<!--Table body-->
		 
		  </table>
		  
		@else
		<div class="alert alert-danger "  role="alert">
				<h4 class="alert-heading">OPPSS!!!</h4>
				<p>Keep travelling </p>
	   <hr>
	   <p class="mb-0">Visit me later.</p>
	 
			 </div>
	  @endif  
	</div>
	</div>
@include('Include.footer')
</body>
@include('Include.css')
@include('Include.js')
</html>