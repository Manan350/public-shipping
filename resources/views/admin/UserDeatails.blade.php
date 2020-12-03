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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox1.css">
	<link rel="stylesheet" href="css/style1.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
</head>
<body>
	 @include('../Include/aheader')

	<div class="ts-main-content">
		@include('../Include/asidebar')
		<div class="content-wrapper">
			<div class="container-fluid">
                <div class="row">
					<div class="col-md-12">
						<h2 class="page-title" style="margin-top:4%">Users Details</h2>
							<div class="row">
							@include('../Include/message')
                            </div>
                            
                           
                            <div class="panel panel-default">
                                <div class="panel-heading">  <h4 >User Details</h4></div>
                                    <div class="panel-body">
                                        <div class="col-md-2 col-sm-4 col-lg-4">
                                        @foreach($data as $data)
                                            <img alt="User Pic" src="data:image/jpg;base64, {{$data->avatar}}" style="hieght:150px;width:150px" id="profile-image1" > 
                                        </div>
                                        <div class="col-md-2 col-sm-4 col-lg-6">
                                            <div class="container" >
                                                <h2>{{$data->fname}} {{$data->lname}}</h2>
                                                <p>{{$data->country}} ,{{$data->state}}</p> 
                                            </div>
                                            
                                            <ul class="container details" >
                                        
                                                <span class="fa-stack fa-lg">
                                                <i class="fa fa-circle fa-stack-2x"></i>
                                                <i class="fa fa-phone fa-stack-1x fa-inverse"></i>
                                                </span>
                                                {{$data->mobile}}<br>
                                                <span class="fa-stack fa-lg">
                                                <i class="fa fa-circle fa-stack-2x"></i>
                                                <i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
                                                </span>
                                                {{$data->email}}<br>
                                                <span class="fa-stack fa-lg">
                                                <i class="fa fa-circle fa-stack-2x"></i>
                                                <i class="fa fa-home fa-stack-1x fa-inverse"></i>
                                                </span>
                                                {{$data->local_area}}<br>
                                            </ul>
                                            
                                            <hr>
                                            <div class="col-sm-5 col-xs-6 tital " >Date Of Joining: {{$data->created_at}}</div>
                                        
                                        
                                    </div>
                                    <div class="col-md-2 col-sm-4 col-lg-2">
                                    @if($data->status == 1)
                                   
                                        {!! Form::open(['action'=>'admindashboardController@blockunblockuser',"method" => "POST"]) !!} 
                                            <input type="hidden" name="id" value="{{$data->id}}">
                                            <input type="hidden" name="value" value="2">
                                            <input type="submit" value="Block User" style="font-size:15px;" class="btn btn-danger">
                                        {!!Form::close()!!}
                                    @else
                                    {!! Form::open(['action'=>'admindashboardController@blockunblockuser',"method" => "POST"]) !!}
                                        <input type="hidden" name="value" value="1">
                                        <input type="hidden" name="id" value="{{ $data->id }}">
                                            <input type="submit" value="Unblock User" style="font-size:15px;" class="btn btn-primary">
                                        {!!Form::close()!!}
                                    @endif
                                    </div>
                                    @endforeach
                            </div>
					</div>
				</div>

            </div>
        </div>
        
    </div>

    <div class="ts-main-content">
        <div class="content-wrapper">
			<div class="container-fluid">
                <div class="row">
					<div class="col-md-12">

                            <div class="panel panel-default">
                                <div class="panel-heading"><h4>User History</h4></div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <table class="table table-striped" >
                                                <thead>
                                                    <tr>
                                                    <th scope="col">From</th>
                                                    <th scope="col">To</th>
                                                    <th scope="col">Order Id</th>
                                                    <th scope="col">Category</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Delivery Status</th>
                                                    </tr>
                                                </thead>
                                                @foreach($data2 as $data2)
                                                    <tr>
                                                        <td>{{$data2->from}}</td>
                                                        <td>{{$data2->to}}</td>
                                                        <td>{{$data2->order_Id}}</td>
                                                        <td>{{$data2->category}}</td>
                                                        <td>{{$data2->price}}</td>
                                                        <td>{{$data2->delivery_status}}</td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>    
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</html>

@endif