<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Host</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    @include('Include.css')
<style>
.serif {
    font-family: "Times New Roman", Times, serif;
} 
h2{
    text-align:center;
    text-decoration: underline overline;
    text-decoration-color:#6059F6;
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

<div class="page-content" style=" background: #f8f8ff;">
   <div class="container"  style="margin-top:10px;">
   <div class="form-v10-content " style="margin-top:150px;margin-left:1%;" >
			{!! Form::open(['action'=>'AsTravellerController@store','method' => 'POST','class'=>'form-detail needs-validation','id'=>'myform']) !!}
            
				<div class="form-left">
				
					<h2>Host Infromation</h2>
										<div class="row" style="margin-left:80px;">
											<div class="col-md-4">
												<div class="profile-img">
													<img src="data:image/jpeg;base64,{{$data->avatar}}" style="width:150;height:150;"/>
												</div>
											</div>
										</div>
										<br>
										<div class="row" style="font-size:15px;margin-left:80px;">
                                            <div class="col-md-4">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-4">
                                                <p>{{$data->fname}}  {{$data->lname}}</p>
                                            </div>
                                        </div>
										
                                        <div class="row" style="font-size:15px;margin-left:80px;">
                                            <div class="col-md-4">
                                                <label>Requester Id</label>
                                            </div>
                                            <div class="col-md-4">
                                                <p>{{$data->r_id}}</p>
                                            </div>
                                        </div>
										<div class="row" style="font-size:15px;margin-left:80px;">
                                            <div class="col-md-4">
                                                <label>Item name</label>
                                            </div>
                                            <div class="col-md-4">
                                                <p>{{$data->itemname}}</p>
                                            </div>
                                        </div>
										<div class="row" style="font-size:15px;margin-left:80px;">
                                            <div class="col-md-4">
                                                <label>Item category</label>
                                            </div>
                                            <div class="col-md-4">
                                                <p>{{$data->category}}</p>
                                            </div>
                                        </div>
										<div class="row" style="font-size:15px;margin-left:80px;">
                                            <div class="col-md-4">
                                                <label>Item Discription</label>
                                            </div>
                                            <div class="col-md-4">
                                                <p>{{$data->discription}}</p>
                                            </div>
                                        </div>
				</div>
				<div class="form-right">
					<h2>Provide Item price</h2>
					<div class="form-group">
						<div class="form-row form-row-1 ">
                        <input type="hidden" value="{{$data->id}}" name="id">
							<input type="text" placeholder="Item Price" name="price" required>
						</div>
                    </div>
					<div class="form-row-last">
					<input type="submit" name="submit" class="register">
					</div>		
				</div>
				{!! Form::close() !!}
		</div>
   </div>
</div>

@include('Include.footer')
 @include('Include.js')
</body>
</html>
