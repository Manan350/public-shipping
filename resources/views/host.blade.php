<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Host</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<!-- Font-->
    @include('Include.css')
<style>
.serif {
    font-family: "Times New Roman", Times, serif;
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
<div>
  <section class="hero-banner magic-ball magic-ball-banner" id="parallax-1" data-anchor-target="#parallax-1" data-300-top="background-position: 0px -80px" data-top-bottom="background-position: 0 100px">
    <div class="container">
		@include('Include.message')
      <div class="hero-banner-content">  
	  <div class="row"> 
    <div class="form-v10-content col-sm-12" >
					{!! Form::open(['action'=>'AsRequesterController@requeststore','method' => 'POST','class'=>'form-detail needs-validation','id'=>'myform']) !!}
					@csrf
				<div class="form-left">
					
				@foreach($data as $value)
			
					<h2>Host Infromation</h2>
										<div class="row" style="margin-left:80px;">
											<div class="col-md-4">
												<div class="profile-img" class="rounded">
													<img src="data:image/jpeg;base64,{{$value->avatar}}"  style="width:150px;height:150px;"/>
												</div>
											</div>
										</div>
										<input type="hidden" name="j_id" value="{{ $value->id }}">
										<input type="hidden" name="t_id" value="{{ $value->user_id }}">
										<input type="hidden" name="arrival" value="{{ $value->arrival }}">
										<br>
										<div class="row" style="font-size:15px;margin-left:80px;">
                                            <div class="col-md-4">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-4">
                                                <p>{{$value->fname}}  {{$value->lname}}</p>
                                            </div>
                                        </div>
										
                                        <div class="row" style="font-size:15px;margin-left:80px;">
                                            <div class="col-md-4">
                                                <label>From</label>
                                            </div>
                                            <div class="col-md-4">
                                                <p>{{$value->From}}</p>
                                            </div>
                                        </div>
										<div class="row" style="font-size:15px;margin-left:80px;">
                                            <div class="col-md-4">
                                                <label>To</label>
                                            </div>
                                            <div class="col-md-4">
                                                <p>{{$value->To}}</p>
                                            </div>
                                        </div>
										<div class="row" style="font-size:15px;margin-left:80px;">
                                            <div class="col-md-4">
                                                <label>Arrival</label>
                                            </div>
                                            <div class="col-md-4">
                                                <p>{{$value->arrival}}</p>
                                            </div>
                                        </div>
										<div class="row" style="font-size:15px;margin-left:80px;">
                                            <div class="col-md-4">
                                                <label>Departure</label>
                                            </div>
                                            <div class="col-md-4">
                                                <p>{{$value->departure}}</p>
                                            </div>
										</div>
										<div class="row" >
											<div class="col-md-4">
												<label style="font-size:15px;">Traveller's Ticket</label>
												<div class="profile-img">
													<img src="data:image/jpeg;base64,{{$value->ticket}}" style="width:550px;height:250px;"/>
												</div>
											</div>
										</div>
				@endforeach
				
				
			
					
					
				</div>
				
				<div class="form-right">
					<h2>Item Details</h2>
					
					<div class="form-group">
						<div class="form-row form-row-1 ">
							<select  name="category">
								<option value="">Category</option>
								<option value="Electric">Electric</option>
								<option value="Clothing">Clothing</option>
								<option value="Accessary">Accessary</option>
								
							</select>
						</div>
						
						<div class="form-row form-row-1 ">
							<input type="text" placeholder="Item Name" name="item_name">
						</div>
						
						
					</div>
					<div class="form-group">
						<div class="form-row form-row-1 ">
							<input type="text" placeholder="Discription" name="discription">
						</div>
					</div>
								
					<input type="hidden" name="from" value="{{$value->From}}">
					<input type="hidden" name="to" value="{{$value->To}}">
					<input type="hidden" name="arrival" value="{{$value->arrival}}">
					
						@if(session()->get('demo')==1)
						<div class="form-row-last">
							<h4>you are demo user</h4>
						</div>
						@else
							<div class="form-row-last">
								<input type="submit" name="submit" class="register" value="Confirm Request">
							</div>
						@endif	
					
				</div>
			
				
				{!! Form::close() !!}
		</div>
</div>
</div>
</div>
</section>
</div>
@include('Include.footer')
 @include('Include.js')
 
</body>
</html>