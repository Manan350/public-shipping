<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>User profile</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   
	<!-- Font-->
    @include('Include.css')

@if (session('name')==null)
<script type="text/javascript">
  window.location = "{{ url('/')  }}";//here double curly bracket
</script>
@endif
@include('Include.header')
</head>

<body class="bg-shape">
    <section class="hero-banner magic-ball-banner" id="parallax-1" data-anchor-target="#parallax-1" data-300-top="background-position: 0px -80px" data-top-bottom="background-position: 0 100px">
        <div class="hero-banner-content" style="margin-top:-100px;">  
            <div class="wrapper" style="margin-bottom:-80px; z-index:-1">
                <div class="sidebar-wrapper">
                    <div class="profile-container" style="background-color:#6059F6">
                        <img src="data:image/jpeg;base64,{{$data->avatar}}"  style="width:150px;height:150px; border-radius: 50%;"/>
                       <!-- <h1 class="name">Alan Doe</h1> -->
                        <h3 class="tagline">{{$data->fname}} {{$data->lname}}</h3>

                        <li class="website">{!! Form::open(['action'=>'profileControler@edits','method'=>'POST']) !!}
                            <input type="hidden" name="id" value="{{ $data->id }}">
                             <h3> <i class="fas fa-link tagline"></i><input type="submit" class="btn btn-link tagline"   value="Edit Profile"></h3>
                        {!! Form::close() !!}</li>
                    </div><!--//profile-container-->
                   
        
                </div><!--//sidebar-wrapper-->
                
                <div class="main-wrapper">
                    
                    <section class="section summary-section">
                        <h2 class="section-title serif"><span class="icon-holder"><i class="fas fa-user"></i></span> Personal information</h2>
                        <div class="summary">
                            <div class="row">
                            <h4 class="serif">Name</h4><span class="icon-holder"  style="margin-left:15px;"><i class="far fa-hand-point-right"></i></span>
                             <h5 class="serif" style="margin-left:15px;">{{$data->fname}} {{$data->lname}}</h5>
                            </div>

                            <div class="row">
                                <h4 class="serif">Email  </h4><span class="icon-holder"  style="margin-left:15px;"><i class="far fa-hand-point-right"></i></span>
                                 <h5 class="serif" style="margin-left:15px;">{{$data->email}}</h5>
                            </div>
                            <div class="row">
                                <h4 class="serif">Phone </h4><span class="icon-holder"  style="margin-left:15px;"><i class="far fa-hand-point-right"></i></span>
                                 <h5 class="serif" style="margin-left:15px;">{{$data->mobile}}</h4>
                            </div>
                            <div class="row">
                                <h4 class="serif">Date-Of-Birth</h4><span class="icon-holder"  style="margin-left:15px;"><i class="far fa-hand-point-right"></i></span> 
                                <h5 class="serif" style="margin-left:15px;">{{$data->dob}}</h5>
                            </div>
                        </div><!--//summary-->
                    </section><!--//section-->
                    
                    <section class="section experiences-section">
                        <h2 class="section-title serif"><span class="icon-holder"><i class="fas fa-home"></i></span>Residency Details</h2>
                        <div class="summary">
                            <div class="row">
                                <h4 class="serif">City</h4><span class="icon-holder"  style="margin-left:15px;"><i class="far fa-hand-point-right"></i></span>
                                 <h5 class="serif" style="margin-left:15px;">{{$data->city}}</h5>
                            </div>
                            <div class="row">
                                <h4 class="serif">Street</h4><span class="icon-holder"  style="margin-left:15px;"><i class="far fa-hand-point-right"></i></span>
                                 <h5 class="serif" style="margin-left:15px;">{{$data->local_area}}</h5>
                            </div>
                            <div class="row">
                                <h4 class="serif">Pincode </h4><span class="icon-holder"  style="margin-left:15px;"><i class="far fa-hand-point-right"></i></span>
                                 <h5 class="serif" style="margin-left:15px;">{{$data->zip}}</h4>
                            </div>
                            <div class="row">
                                <h4 class="serif">State</h4><span class="icon-holder"  style="margin-left:15px;"><i class="far fa-hand-point-right"></i></span> 
                                <h5 class="serif" style="margin-left:15px;">{{$data->state}}</h5>
                            </div>
                            
                            <div class="row">
                                <h4 class="serif">Country</h4><span class="icon-holder"  style="margin-left:15px;"><i class="far fa-hand-point-right"></i></span> 
                                <h5 class="serif" style="margin-left:15px;">{{$data->country}}</h5>
                            </div>
                        </div><!--//summary-->
                    </section><!--//section-->
                  
                    
                </div><!--//main-body-->
            </div>
        </div>
    </section>
    
 
@include('Include.footer')
@include('Include.js')
</body>
</html>