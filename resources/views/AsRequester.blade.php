<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>As Requester</title>
	<!-- Mobile Specific Metas -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<!-- Font-->
   
<style>
 .serif {
  font-family: "Times New Roman", Times, serif;
}
hr {
  height: 2px;
  margin-left: 15px;
  margin-bottom:-3px;
  background-color:#7676FF;
}
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
//   window.location = "{{ url('/')  }}";//here double curly bracket

  $(document).ready(function(){
			$("#download").click(function(){
				location.reload(true);
				// this.append("Downloaded");
			});
		});
</script>
@endif
</head>
@include('Include.header')
<body class="bg-shape">
<section class="hero-banner magic-ball magic-ball-banner" id="parallax-1" data-anchor-target="#parallax-1" data-300-top="background-position: 0px -80px" data-top-bottom="background-position: 0 100px">

 <!-- <div class="container">
  
</div>  -->


    <div class="container">
	@include('Include.message')
      <div class="row">
	  	<h1 class="text-lg-center serif">Peer to Peer crowd shipping platform connecting travelers and senders.</h1>
		  
		  <h5 class="text-justify serif">As a platform HeyParcel is transforming the way goods move between cities by enabling anyone to have anything delivered on-demand. Our revolutionary intercity peer to peer crowd shipping platform connects senders with Travelers who can deliver anything from there traveling city to heading city. We empower communities to local parcel senders with no waiting, faster, cheaper and empower sharing economy and environment friendly packing.</h5>
		
      </div>
    </div>
	<hr>
</section>

<div class="container" style="margin-top:70px;">
	<h1 class="text-lg-center serif">How to Shop from any country with Shippn?</h1>
      <div class="row" style="margin-top:50px;">
        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
          <div class="service-card text-center">
            <div class="service-card-body">
              <h3 class="serif">Choose Your Host</h3>
              <p class="serif">Our hosts share their spaces in multiple counrties. All you have to do is select the  choose your host to forward your package, anywhere in the world.</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
          <div class="service-card text-center">
            
            <div class="service-card-body">
              <h3 class="serif">Fill Package Details</h3>
              <p class="serif">Fill in the details of your package like name, category and content and request to our Hosts.</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
          <div class="service-card text-center">
            
            <div class="service-card-body">
              <h3 class="serif">Get Estimated price</h3>
              <p class="serif">When you will request, our host will give you estimated price for shipping your package , if you like confirm your order with host or find another.</p>
            </div>
          </div>
        </div>
		<div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
          <div class="service-card text-center">
            
            <div class="service-card-body">
              <h3 class="serif">Hand Over the package</h3>
              <p class="serif">HAnd over the package to host at the address provide by our host and give address where you want our host to parcel your package.</p>
            </div>
          </div>
        </div>
		<div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
          <div class="service-card text-center">
            
            <div class="service-card-body">
              <h3 class="serif">Get your package shipped!</h3>
              <p class="serif">As soon as your order is generated pay the price for host service. Don't worry we will secure your money with our escrow payment method.</p>
            </div>
          </div>
        </div>
		<div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
          <div class="service-card text-center">
            
            <div class="service-card-body">
              <h3 class="serif">Review the delivery</h3>
              <p class="serif">Don;t forget to give review to our host about the services provided to you. It will be helpful for us to provide you with better information.IT'S ALL SIMPLE!.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
	<hr>

		
			<div class="container" style="margin-top:40px;">
				<h1 class="text-lg-center serif" >Your Bid Requests</h1>

					<div style="overflow-x:auto;">
						<table class="table">
							<thead>
								<tr>
								<th scope="col">Avtar</th>
								<th scope="col">Traveller Name</th>
								<th scope="col">Category</th>
								<th scope="col">Item Name</th>
								<th scope="col">Price</th>
								<th scope="col"></th>
								<th scope="col"></th>
								
								</tr>
							</thead>
							@foreach($data as $val)
							<tbody>
								<tr>
								<td><img src="data:image/jpeg;base64,{{$val->avatar}}"  style="width:80px;height:80px; border-radius: 50%;"/></td>
								<td>{{$val->fname}} {{$val->lname}}</td>
								<td>{{$val->category}}</td>
								<td>{{$val->item_name}}</td>
								<td>{{$p=$val->price +$val->price*0.05}}</td>
								
								<td> {!! Form::open(['action' => 'PaymentController@index','method' => 'POST']) !!}
										@csrf				
												<input type="hidden" name="req_id" value="{{$val->id}}">
												<input type="hidden" name="price" value="{{$p}}">
												<input type="hidden" name="arrival" value="{{ $val->arrival }}">
												<input type="hidden" name="category" value="{{ $val->category }}">
												<input type="hidden" name="item" value="{{ $val->item_name }}">
												<input type="submit" class="btn btn-success rounded" value="Confirm-Request">
									{!! Form::close() !!}
								</td>
								 
								</tr>	
							</tbody>
							@endforeach
						</table>
					</div>
				</div>
			

			<hr>

	
	<div class="container" style="margin-top:40px;">
		<h1 class="text-lg-center serif" >Your Shopping History</h1>
					
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#home">Pendding</a>
						</li>
						<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#menu1">Delivered</a>
						</li>
					</ul>
		<div class="tab-content">
			<div id="home" class="container tab-pane active"><br>
				<div style="overflow-x:auto;">
				@if($data2->count()>0)
					<table class="table">
						<thead>
							<tr>
							<th scope="col">#</th>
							<th scope="col">Traveller Name</th>
							<th scope="col">From</th>
							<th scope="col">To</th>
							<th scope="col">Arrival</th>
							<th scope="col">Order ID</th>
							<th scope="col">Category</th>
							<th scope="col">Price</th>
							<th scope="col"></th>
							</tr>
						</thead>
						@foreach($data2 as $val)
						@if($val->delivery_status==0)
						<tbody>
							<tr>
							<th scope="row">1</th>
							<td>{{$val->fname}} {{$val->lname}}</td>
							<td>{{$val->from}}</td>
							<td>{{$val->to}}</td>
							<td>{{$val->arrival}}</td>
							<td>{{$val->order_Id}}</td>
							<td>{{$val->category}}</td>
							<td>{{$val->margin_price}}</td>
							<td> 
								{!! Form::open(['action' => 'hostController@productDetail','method' => 'GET']) !!}
													
											<input type="hidden" name="order_id" value="{{ $val->order_Id  }}">
											<input type="submit" class="btn btn-primary" value="view-details">
								{!! Form::close() !!}
							</td>
							<td>
								{!! Form::open(['action' => 'AsRequesterController@cancle','method' => 'POST']) !!}
													
											<input type="hidden" name="order_id" value="{{ $val->order_Id  }}">
											<input type="submit" class="btn btn-danger" value="Cancel">
								{!! Form::close() !!}

								
							</td>
							</tr>	
						</tbody>
						@endif
						@endforeach
					</table>
					@else
						<div class="container">
						<div class="alert alert-danger "  role="alert">
						<h4 class="alert-heading">OPPSS!!!</h4>
						<p>Keep travelling for Request!</p>
		 			    <hr>
		   				<p class="mb-0">Visit me later.</p>
						</div>	
				 		</div>
		  			@endif  
				</div>
			</div>

			<div id="menu1" class="container tab-pane fade"><br>
				<div style="overflow-x:auto;">
				@if($data2->count()>0)
					<table class="table">
						<thead>
							<tr>
							<th scope="col">#</th>
							<th scope="col">Traveller Name</th>
							<th scope="col">From</th>
							<th scope="col">To</th>
							<th scope="col">Arrival</th>
							<th scope="col">Order ID</th>
							<th scope="col">Category</th>
							<th scope="col">Price</th>
							<th scope="col">Receipt</th>
							</tr>
						</thead>
						@foreach($data2 as $val)
						@if($val->delivery_status==1)
						<tbody>
							<tr>
							<th scope="row"></th>
							<td>{{$val->fname}} {{$val->lname}}</td>
							<td>{{$val->from}}</td>
							<td>{{$val->to}}</td>
							<td>{{$val->arrival}}</td>
							<td>{{$val->order_Id}}</td>
							<td>{{$val->category}}</td>
							<td>{{$val->margin_price}}</td>
							@if($val->download==0)
							<td>{!! Form::open(['action' => 'AsRequesterController@downloadPDF','method' => 'POST']) !!}
								@csrf
								<input type="hidden" name="order_id" value="{{ $val->order_Id  }}">
								<input type="submit" id="download" class="btn btn-success" value="Download">
								{!! Form::close() !!}
							</td>
							@else
							<td>Downloaded</td>
							@endif
							</tr>	
						</tbody>
						@endif
					@endforeach
					</table>
					@else
						<div class="alert alert-danger "  role="alert">
						<h4 class="alert-heading">OPPSS!!!</h4>
						<p>Keep travelling for Request!</p>
		 			    <hr>
		   				<p class="mb-0">Visit me later.</p>
		 
				 		</div>
		  		@endif  
				</div>
			</div>
		</div>

	</div>


@include('Include.footer')
</body>
 @include('Include.css')
  @include('Include.js')
</html>