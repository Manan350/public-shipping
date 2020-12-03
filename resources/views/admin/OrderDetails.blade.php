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
	<title>Orders</title>
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
						<h2 class="page-title" style="margin-top:4%">Order Details</h2>
							<div class="row">
							@include('../Include/message')
                            </div>
                             
                           
                            <div class="panel panel-default">
                                <div class="panel-heading">  <h4 >User Details</h4></div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                    <th>Requester Name</th>
                                                    <th>Traveller Name</th>
                                                    <th>Category</th>
                                                    <th>Item Name</th>
                                                    <th>Price</th>
                                                    <th>From</th>
                                                    <th>To</th>
                                                    <th></th>
                                                    </tr>
                                                </thead>
                                                
                                                    @foreach($req as $req)
                                                        @foreach($traveller as $traveller)
                                                            <tr>
                                                                <td>{{$req->fname}}    <a href="user_deatails?id={{$req->id}}" class="btn btn-info btn-sm" style="font-size:20px;margin-left:15px;">Info</a></td>
                                                                <td>{{$traveller->fname}} <a href="user_deatails?id={{$traveller->id}}" class="btn btn-info btn-sm" style="font-size:20px;margin-left:15px;">Info</a></td>
                                                                <td>{{$data->category}}</td>  
                                                                <td>{{$data->item_name}}</td>
                                                                <td>{{$data->price}}</td>
                                                                <td>{{$data->from}}</td>
                                                                <td>{{$data->to}}</td>
                                                                <td><form><input type="submit" value="Cancel Oreder" class="btn btn-danger" style="font-size:15px;"></form></td>
                                                            </tr>
                                                        @endforeach
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