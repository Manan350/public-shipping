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
                            <div class="row">
                                <table class="table table-striped" >
                                    <thead>
                                        <tr>
										<th scope="col">Avatar</th>
                                          <th scope="col">Name</th>
                                          <th scope="col">Mobile</th>
                                          <th scope="col">Email</th>
                                          <th scope="col">Country</th>
                                          <th scope="col">Request Date</th>
                                        
                                        </tr>
                                      </thead>
                                      <tbody id="registrationdata">
											
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
<script type="text/javascript"type="text/javascript">
   
			$.ajax({
				url:'/admindashboard/getdata',
				type:'GET',
				datatype:'json',
				success:function(data){
					
					$.each(JSON.parse(data), function (key, entry) {
                    
						var html = '<tr>';
						html += '<td>'+'<img src="data:image/jpg;base64,' + entry.avatar + ' "  style="hieght:50px;width:50px" />'+'</td>';
                         html += '<td>'+entry.fname+'  '+entry.lname+'</td>';
                         html += '<td>'+entry.mobile+'</td>';
                         html += '<td>'+entry.email+'</td>';
						 html += '<td>'+entry.country+'</td>';
                        html += '<td>'+entry.created_at+'</td>';
						
						html += '<td>  {!! Form::open(["action"=>"admindashboardController@finddata","method" => "POST"]) !!} <input type="submit" value="Check" class="btn btn-primary"> <input type="hidden" name="id" value='+entry.id+'>{{Form::close()}}  </td>';

						
                         $('#registrationdata').prepend(html);
					});
				},
                async:false
				
			});


</script>
</html>
@endif