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

				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title" style="margin-top:4%">Query</h2>
							<div class="row">
							@include('../Include/message')
                            </div>
                            <div class="row">
                                <table class="table table-striped" >
                                    <thead>
                                        <tr>
										<th scope="col">Name</th>
                                          <th scope="col">Email</th>
                                          <th scope="col">Subject</th>
                                          <th scope="col">Message</th>
										  <th scope="col">Created_at</th>
										  <th scope="col"> Email </th>
                                        
                                        </tr>
                                      </thead>
                                      <tbody>
                                          @foreach($query as $query)
                                          <tr>
                                              <td>{{$query->name}}</td>
                                              <td>{{$query->email}}</td>
                                              <td>{{\Illuminate\Support\Str::limit($query->subject),20,'...'}}</td>
                                              <td>{{\Illuminate\Support\Str::limit($query->message),50,'...'}}</td>
											  <td>{{$query->created_at}}</td>
											  <td> {!! Form::open(['action' => 'admindashboardController@sendquerymail','method' => 'POST']) !!}
												@csrf				
														<input type="hidden" name="name" value="{{$query->name}}">
														<input type="hidden" name="email" value="{{$query->email}}">
														
														<input type="submit" class="btn btn-success rounded" value="Email">
											{!! Form::close() !!}
										</td> 
                                             
                                          </tr>
                                          @endforeach
											
                                      </tbody>
                                </table>
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