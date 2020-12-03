@if(session()->has('username'))
<!doctype html>
<html lang="en" >
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	<title>Query</title>
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

				
                
                <br><br><br>
                   <center>  <h1 style="color:blue"> Give response to query</h1> </center>
                    {!! Form::open(['action' => 'admindashboardController@sendemail','method' => 'POST']) !!}
                     
                    @csrf				
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="{{ $data->name }}">
                        
                      </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email address</label>
                          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{ $data->email }}">
                          
                        </div>
                      
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Enter Message</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="message" rows="3"></textarea>
                          </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        {!! Form::close() !!}
                     
                    
						</div>

					</div>
				</div>
@include('Include.js')
</body>

</html>
@endif