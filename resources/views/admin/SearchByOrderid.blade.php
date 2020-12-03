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
</head>
<body>
	 @include('../Include/aheader')

	<div class="ts-main-content">
		@include('../Include/asidebar')
		<div class="content-wrapper">
			<div class="container-fluid">
                <div class="row">
					<div class="col-md-12">
						<h2 class="page-title" style="margin-top:4%">Search Order</h2>
							<div class="row">
							@include('../Include/message')
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">Search Customer Order</div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <input type="text" name="search" id="search" class="form-control" placeholder="Search Customer Data" />
                                        </div>
                                            <div class="table-responsive">
                                                <h3 align="center">Total Data : <span id="total_records"></span></h3>
                                                <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                    <th>order ID</th>
                                                    <th>Request ID</th>
                                                    <th>Date and Time</th>
                                                    <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
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
<script>
                                $(document).ready(function(){

                                fetch_customer_data();

                                function fetch_customer_data(query = '')
                                {
                                $.ajax({
                                url:"{{ route('SearchByOrderid.action') }}",
                                method:'GET',
                                data:{query:query},
                                dataType:'json',
                                success:function(data)
                                {
                                    $('tbody').html(data.table_data);
                                    $('#total_records').text(data.total_data);
                                }
                                })
                                }

                                $(document).on('keyup', '#search', function(){
                                var query = $(this).val();
                                fetch_customer_data(query);
                                });
                                });
</script>
@endif