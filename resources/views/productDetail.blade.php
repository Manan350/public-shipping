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
  <div class="container">
    <div class="row">
      <div class="col">
          <div class="card">
            <div class="card-header"><span class="card-title">Product Details </span></div>
            <div class="card-body">
              @foreach($data as $d)
                <p class="card-text"> Id  :- {{ $d->order_Id }}</p>
                <p class="card-text"> Price :- {{ $d->margin_price }} </p>
              @endforeach
              @foreach($rd as $d)
                <p class="card-text"> Category  :- {{ $d->category }}</p>
                <p class="card-text"> Name  :- {{ $d->item_name }}</p>
                <p class="card-text"> discription  :- {{ $d->discription }}</p>
               @endforeach
            </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
            <div class="card-header"><span class="card-title">Traveller Details </span></div>
            <div class="card-body">
              @foreach($td as $d)
                <p class="card-text"> Name  :- {{ $d->fname }}{{ $d->lname }}</p>
                <p class="card-text"> Email  :- {{ $d->email }}</p>
                <p class="card-text"> Mobile  :- {{ $d->mobile }}</p>
              @endforeach
            </div>
        </div>
      </div>
    </div>  
    <div class="row">
      <div class="col-12">
        <div class="card">
            <div class="card-header"><span class="card-title">Otp </span></div>
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <p class="card-title"> Generate Otp </p>
                   {!! Form::open(['action' => 'AsRequesterController@generateOTP','method' => 'POST']) !!}
                      @csrf				
                      @foreach($data as $d)
                        <input type="hidden" name="order_Id" value="{{ $d->order_Id }}">
                      @foreach($td as $d)
                      <input type="hidden" name="email" value="{{ $d->email }}"> 
                      @endforeach
                          <input type="submit" class="btn btn-primary rounded" value="generate">
                     @endforeach
                  {!! Form::close() !!}
                </div>
                <div class="col">
                  {!! Form::open(['action' => 'AsRequesterController@matchOTP','method' => 'POST']) !!}
                    @csrf				
                    @foreach($data as $d)
                      <input type="hidden" name="order_Id" value="{{ $d->order_Id }}">
                    @endforeach
                    <div class="form-group">
                      <label>Enter Otp: </label>
                      <input type="text" class="form-control" name="otp" >
                    </div>
                    <input type="submit" class="btn btn-success rounded" value="match">
                  {!! Form::close() !!}
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>  
  </div>    
</section>

			
	@include('Include.message')
	

@include('Include.footer')
</body>
 @include('Include.css')
  @include('Include.js')
</html>