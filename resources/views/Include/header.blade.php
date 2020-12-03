<html>
 <head>
 
 <style>
 .form-elegant .font-small {
    font-size: 0.8rem; }
.serif {
  font-family: "Times New Roman", Times, serif;
}
.form-elegant .z-depth-1a {
    -webkit-box-shadow: 0 2px 5px 0 rgba(55, 161, 255, 0.26), 0 4px 12px 0 rgba(121, 155, 254, 0.25);
    box-shadow: 0 2px 5px 0 rgba(55, 161, 255, 0.26), 0 4px 12px 0 rgba(121, 155, 254, 0.25); }

.form-elegant .z-depth-1-half,
.form-elegant .btn:hover {
    -webkit-box-shadow: 0 5px 11px 0 rgba(85, 182, 255, 0.28), 0 4px 15px 0 rgba(36, 133, 255, 0.15);
    box-shadow: 0 5px 11px 0 rgba(85, 182, 255, 0.28), 0 4px 15px 0 rgba(36, 133, 255, 0.15); }

.form-elegant .modal-header {
    border-bottom: none; }

.modal-dialog .form-elegant .btn .fab {
    color: #2196f3!important; }

.form-elegant .modal-body, .form-elegant .modal-footer {
    font-weight: 400;} 
.text-center mb-3 {
       
    }
 
  .dropbtn {
    background-color: #6059F6;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
  }
  
  .dropdown {
    position: relative;
    display: inline-block;

  }
  
  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
  }
  
  .dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
  }
  
  .dropdown-content a:hover {background-color: #ddd;}
  
  .dropdown:hover .dropdown-content {display: block;}
  
  .dropdown:hover .dropbtn {background-color: #6059F6;}
  


  
  </style>
  
 </head>
 <!--================ Header Menu Area start =================-->


 <header class="header_area  ">
    <div class="main_menu">
      <nav class="navbar  navbar-expand-lg navbar-light">
        <div class="container box_1620">
          <a class="navbar-brand logo_h" href="/"><img src="img/publiclogo.jpg"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav justify-content-end">
              <li class="nav-item active"><a class="nav-link serif" href="/">Home</a></li>
              <li class="nav-item"><a class="nav-link serif" href="about">About</a></li>
              <li class="nav-item"><a class="nav-link serif" href="contact">Contact</a></li>
              @if(session()->has('name'))
              <li class="nav-item serif"><a class="nav-link serif" href="traveller">Host</a></li>
              <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">How it's works</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="astraveller">As Traveller</a></li>
                  <li class="nav-item"><a class="nav-link" href="asrequester">As Requester</a></li>
                </ul>
			        </li>  
                        
              @endif
               <!-- @if(session()->has('name'))
              <li class="nav-item"><a class="nav-link serif" href="request">Pending Request</a></li>
              @endif -->
            </ul>
            
            <div class="nav-right text-center text-lg-right py-4 py-lg-0">
              @if(!session()->has('name'))
                <a class="button"  data-toggle="modal" data-target="#elegantModalForm" style="color:white;">Login</a>
              @else
              <ul class="nav navbar-nav menu_nav justify-content-end">
              <li class="nav-item submenu dropdown">
                <a href="#" class="button dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{session('name')}}</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="profile">Profile</a></li>
                  <li class="nav-item"><a class="nav-link" href="Logout">Log out</a></li>
                </ul>
			        </li>
              </ul>
          
              @endif
            </div>
          </div>
        </div>
      </nav>
    </div>
  </header>

 
<!-- Modal -->
<div class="modal fade" id="elegantModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!--Content-->
    <div class="modal-content form-elegant">
      <!--Header-->
      <div class="modal-header text-center">
        <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel"><strong>Sign in</strong></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body mx-4">

        <!--Body-->
        {!! Form::open(['action' => 'loginController@Login','method' => 'POST']) !!}
        <div class="md-form mb-5">
          <input type="email" id="Form-email1" name="email" class="form-control validate">
          <label data-error="wrong" data-success="right" for="Form-email1">Your email</label>
        </div>

        <div class="md-form pb-3">
          <input type="password" id="Form-pass1" name="password" class="form-control validate">
          <label data-error="wrong" data-success="right" for="Form-pass1">Your password</label>
          <p class="font-small blue-text d-flex justify-content-end">Forgot <a href="#" class="blue-text ml-1">
              Password?</a></p>
        </div>

        <div class="text-center mb-3">
          <input type="submit" class="btn blue-gradient btn-block btn-rounded z-depth-1a" value="Sign in">
        </div>
        {!! Form::close() !!}
        <p class="font-small dark-grey-text text-right d-flex justify-content-center mb-3 pt-2"> or Sign in
          with:</p>

        <div class="row my-3 d-flex justify-content-center">
          <!--Facebook-->
          <button type="button" class="btn btn-white btn-rounded mr-md-3 z-depth-1a"><i class="fab fa-facebook-f text-center"></i></button>
          <!--Twitter-->
          <button type="button" class="btn btn-white btn-rounded mr-md-3 z-depth-1a"><i class="fab fa-twitter"></i></button>
          <!--Google +-->
          <button type="button" class="btn btn-white btn-rounded z-depth-1a"><i class="fab fa-google-plus-g"></i></button>
        </div>
      </div>
      <!--Footer-->
      <div class="modal-footer mx-5 pt-3 mb-1">
        <p class="font-small grey-text d-flex justify-content-end">Not a member? <a href="registration" class="blue-text ml-1">
            Sign Up</a></p>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>

</html>