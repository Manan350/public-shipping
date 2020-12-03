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
	<title>Users</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox1.css">
	<link rel="stylesheet" href="css/style1.css">
<style>
div.panel-body{
    text-aling : center;
}
</style>
</head>
<body>
	 @include('../Include/aheader')

	<div class="ts-main-content">
		@include('../Include/asidebar')
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title" style="margin-top:4%">Users</h2>
							<div class="row">
							@include('../Include/message')
                            </div>
                            
                                <div class="col-md-8">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">User Details</div>
                                            <div class="panel-body" >
                                                    @foreach($data as $data)
                                                        <center>
                                                        
                                                        <img src="data:image/jpeg;base64,{{$data->avatar}}"  style="width:150px;height:150px; border-radius: 50%;"/><span class="help-block m-b-none">User Photo</span> <img src="data:image/jpeg;base64,{{$data->GOV_id}}"  style="width:250px;height:150px; border-radius: 10%;"/><span class="help-block m-b-none">GOV ID</span>
                                                        <tr><h3 class="tagline">Name : {{$data->fname}} {{$data->lname}}</h3></tr>
                                                        <tr><h3 class="tagline">Mobile : {{$data->mobile}}</h3></tr>
                                                        <h3 class="tagline">Country : {{$data->country}}</h3>
                                                        <h3 class="tagline">Address : {{$data->local_area}}</h3>
                                                        <h3 class="tagline">Pin code : {{$data->zip}}</h3>
                                                        <h3 class="tagline">Email : {{$data->email}}</h3>
                                                        
                                                        </center>
                                                    @endforeach
                                                {!! Form::open(['action'=>'admindashboardController@Accept','method' => 'POST',"class" => "form-horizontal"]) !!}
                                                {{@csrf_field()}}
                                                    <div class="hr-dashed"></div>
                                                    
                                                    <div class="col-sm-8 col-sm-offset-2">
                                                        <center>
                                                        <input type="hidden" name="id" value="{{$data->id}}">
                                                        <input type="hidden" name="email" value="{{$data->email}}">
                                                        <input type="hidden" name="fname" value="{{$data->fname}}">
                                                        <input type="hidden" name="lname" value="{{$data->lname}}">
                                                        <!-- <input class="btn btn-default" type="submit" name="cancel" value="Cancel" style="font-size:20px;"> -->
                                                        <input class="btn btn-primary" type="submit" name="Accept" value="Accept" style="font-size:20px;">
                                                        </center>
                                                    </div>
                                                {{Form::close()}}
                                                <br>
                                                {!! Form::open(['action'=>'admindashboardController@cancelrequest','method' => 'POST',"class" => "form-horizontal"]) !!}
                                                {{@csrf_field()}}
                                                    <div class="hr-dashed"></div>
                                                    
                                                    <div class="col-sm-8 col-sm-offset-2">
                                                        <center>
                                                        <input type="hidden" name="id" value="{{$data->id}}">
                                                        <input type="hidden" name="fname" value="{{ $data->fname }}">
                                                        <input type="hidden" name="lname" value="{{ $data->lname }}">
                                                        <input type="hidden" name="email" value="{{ $data->email }}">
                                                        <input class="btn btn-default" type="submit" name="cancel" value="Cancel" style="font-size:20px;">
                                                        <!-- <input class="btn btn-primary" type="submit" name="Accept" value="Accept" style="font-size:20px;"> -->
                                                        </center>
                                                    </div>
                                                {{Form::close()}}
                                            <div>

                                                

                                        </div>
                                    </div>

                                </div>

                            </div>

							
						</div>

					</div>
				</div>
@include('Include.js')
</body>

</html>
@endif