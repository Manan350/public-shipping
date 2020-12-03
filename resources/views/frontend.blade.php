<!DOCTYPE html>
<!-- Template Name: Clip-One - Frontend | Build with Twitter Bootstrap 3 | Version: 1.0 | Author: ClipTheme -->
<!--[if IE 8]><html class="ie8" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en">
	<!--<![endif]-->
	<!-- start: HEAD -->
	<head>
		<title>JM SCHOOL</title>
		<!-- start: META -->
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="Students Managements" name="description" />
		<meta content="Yassine Setitra" name="author" />
		<!-- end: META -->
		<!-- start: MAIN CSS -->
		<link href="{{ asset('frontend/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="{{ asset('frontend/assets/plugins/font-awesome/css/font-awesome.min.css') }}">
		<link rel="stylesheet" href="{{ asset('frontend/assets/fonts/style.css') }}">
		<link rel="stylesheet" href="{{ asset('frontend/assets/plugins/animate.css/animate.min.css') }}">
		<link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
		<link rel="stylesheet" href="{{ asset('frontend/assets/css/main-responsive.css') }}">
		<link rel="stylesheet" href="{{ asset('frontend/assets/css/theme_blue.css') }}" type="text/css" id="skin_color">
		<!-- end: MAIN CSS -->
		<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
		<link rel="stylesheet" href="{{ asset('frontend/assets/plugins/revolution_slider/rs-plugin/css/settings.css') }}">
		<link rel="stylesheet" href="{{ asset('frontend/assets/plugins/flex-slider/flexslider.css') }}">
		<link rel="stylesheet" href="{{ asset('frontend/assets/plugins/colorbox/example2/colorbox.css') }}">
		<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: HTML5SHIV FOR IE8 -->
		<!--[if lt IE 9]>
		<script src="assets/plugins/html5shiv.js"></script>
		<![endif]-->
		<!-- end: HTML5SHIV FOR IE8 -->
	</head>
	<!-- end: HEAD -->
	<body>
		<!-- start: HEADER -->
					
					<!-- end: SLIDING BAR THIRD COLUMN -->
				</div>
				<!-- start: SLIDING BAR TOGGLE BUTTON -->
				<a href="#" class="sb_toggle">
				</a>
				<!-- end: SLIDING BAR TOGGLE BUTTON -->
			</div>
			
			<!-- end: TOP BAR -->
			<div role="navigation" class="navbar navbar-default navbar-fixed-top space-top">
				<!-- start: TOP NAVIGATION CONTAINER -->
				<div class="container">
					<div class="navbar-header">
						<!-- start: RESPONSIVE MENU TOGGLER -->
						<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!-- end: RESPONSIVE MENU TOGGLER -->
						<!-- start: LOGO -->
						<a class="navbar-brand" href="#">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="logo" height="35" width="50">
                            JM SCHOOL
						</a>
						<!-- end: LOGO -->
					</div>
					<div class="navbar-collapse collapse">
						<ul class="nav navbar-nav navbar-right">
							<li class="active">
								<a href="#">
									Home
								</a>
							</li>
							<li>
								<a href="/loginpage">
									Login
								</a>
							
							</li>
							 <li>
								<a href="/Admin">
									Admin
								</a>
							
							</li>
							<!--<li>
								<a href="/management">
									management
								</a>
							
							</li>
							<li>
								<a href="/faculty_login_view">
									Faculty
								</a>
							
							</li> -->
							<li class="menu-search">
								<!-- start: SEARCH BUTTON -->
								<a href="#" data-placement="bottom" data-toggle="popover">
									<i class="clip-search-3"></i>
								</a>
								<!-- end: SEARCH BUTTON -->
								<!-- start: SEARCH POPOVER -->
								<div class="popover bottom search-box">
									<div class="arrow"></div>
									<div class="popover-content">
										<!-- start: SEARCH FORM -->
										<form class="" id="searchform" action="#">
											<div class="input-group">
												<input type="text" class="form-control" placeholder="Search">
												<span class="input-group-btn">
													<button class="btn btn-main-color btn-squared" type="button">
														<i class="clip-search-3"></i>
													</button> </span>
											</div>
										</form>
										<!-- end: SEARCH FORM -->
									</div>
								</div>
								<!-- end: SEARCH POPOVER -->
							</li>
						</ul>
					</div>
				</div>
				<!-- end: TOP NAVIGATION CONTAINER -->
			</div>
		</header>
		<!-- end: HEADER -->
		<!-- start: MAIN CONTAINER -->
		<div class="main-container">
			<!-- start: REVOLUTION SLIDERS -->
			<section class="fullwidthbanner-container">
				<div class="fullwidthabnner">
					<ul>
						<!-- start: FIRST SLIDE -->
						<li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
							<img src="{{ asset('frontend/assets/images/sliders/slidebg1.png') }}"  style="background-color:rgb(246, 246, 246)" alt="slidebg1"  data-bgfit="cover" data-bgposition="left bottom" data-bgrepeat="no-repeat">
							<div class="caption sfr" data-x="720" data-y="55" data-speed="700" data-start="1000" data-easing="easeOutExpo">
								<img src="{{ asset('frontend/assets/images/free-woman.png') }}" alt="Image 1">
							</div>
						</li>
						<!-- end: FIRST SLIDE -->
						<!-- start: SECOND SLIDE -->
						<li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
							<img src="{{ asset('frontend/assets/images/sliders/slidebg2.png') }}"  style="background-color:rgb(246, 246, 246)" alt="slidebg1"  data-bgfit="cover" data-bgposition="left bottom" data-bgrepeat="no-repeat">
							<div class="caption lft" data-x="680" data-y="85" data-speed="500" data-start="1000" data-easing="easeOutBack">
								<img src="{{ asset('frontend/assets/images/sliders/responsive1.png') }}" alt="Image 1">
							</div>
							<div class="caption lfb" data-x="770" data-y="115" data-speed="500" data-start="1300" data-easing="easeOutBack">
								<img src="{{ asset('frontend/assets/images/sliders/responsive2.png') }}" alt="Image 1">
							</div>
							<div class="caption lft" data-x="820" data-y="140" data-speed="500" data-start="1600" data-easing="easeOutBack">
								<img src="{{ asset('frontend/assets/images/sliders/responsive3.png') }}" alt="Image 1">
							</div>
							<div class="caption lfb" data-x="880" data-y="160" data-speed="500" data-start="1900" data-easing="easeOutBack">
								<img src="{{ asset('frontend/assets/images/sliders/responsive4.png') }}" alt="Image 1">
							</div>
						</li>
						<!-- end: SECOND SLIDE -->
						<!-- start: THIRD SLIDE -->
						<li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
							<!-- THE MAIN IMAGE IN THE FIRST SLIDE -->
							<img src="{{ asset('frontend/assets/images/sliders/slidebg3.png') }}"  style="background-color:rgb(246, 246, 246)" alt="slidebg1"  data-bgfit="cover" data-bgposition="left bottom" data-bgrepeat="no-repeat">
							<div class="caption sfr" data-x="800" data-y="115" data-speed="500" data-start="1000" data-easing="easeOutBack">
								<img src="{{ asset('frontend/assets/images/sliders/device1.png') }}" alt="Image 1">
							</div>
							<div class="caption sfr" data-x="710" data-y="225" data-speed="500" data-start="1300" data-easing="easeOutBack">
								<img src="{{ asset('frontend/assets/images/sliders/device2.png') }}" alt="Image 1">
							</div>
		
						</li>
						<!-- end: THIRD SLIDE -->
					</ul>
				</div>
			</section>
			<!-- end: REVOLUTION SLIDERS -->
			<section>
				<!-- start: CORE BOXES CONTAINER -->
				<div class="container">
					<div class="row">
						<div class="col-sm-6">
							<div class="core-box">
								<div class="heading">
									<i class="fa fa-tag circle-icon"></i>
									<h2>School goals</h2>
								</div>
								<div class="content">
									<p style="text-align: justify;">Create an appropriate educational framework that achieves the student's creative thinking by enriching the educational environment by having an efficient teacher who is enthusiastic and encourages students to acquire the personal characteristics of the creators. Bridge the gap in educational and social fields and give equal opportunity for all. Focus on mathematics, natural sciences, technology, Arabic, English and social fields. Building an environment that pushes students to creativity and excellence in education and social areas without any relationship to religion, gender or race. Commitment to develop the educational skills and abilities of every child without having to do with his primary education level. Development of creative thinking towards economic and technological</p>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="core-box">
								<div class="heading">
									<i class="fa fa-tag circle-icon"></i>
									<h2>Creativity and excellence</h2>
								</div>
								<div class="content">
									<p style="text-align: justify;">The development of distinguished human wealth requires the effort of the institution in training teachers to practice developing thinking skills, which provides an educational environment that facilitates creativity and enriches various talents ‚The success of the education process depends on the good teacher who respects thinking and believes that it is important to solve problems, make decisions and make judgments‚ Also that The development of the soft human wealth of our educated daughters and sons also depends on the clarity of the goals of the teacher who always tries to verify his achievement of these goals and his ability to amend and deal flexibly with the changes given the presence of many alternatives and solutions that he chooses according to evidence that supports his decision ‚that this form of education will help to Guiding teachers towards creating an atmosphere that facilitates and supports the characteristics of good thinking to suit the renewed challenges that require confronting it, which requires an adjustment in the school model in order to adapt it to the requirements of change.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- end: CORE BOXES CONTAINER -->
			</section>
			<section class="wrapper wrapper-grey padding50">
				<!-- start: PORTFOLIO CONTAINER -->
				<div class="container">
					<div class="row">
						<div class="col-sm-6">
							<div class="flexslider" data-plugin-options='{"controlNav":false,"sync": "#carousel"}'>
								<ul class="slides">
									<li>
										<a class="group1" href="{{ asset('assets/images/school.png') }}" title="Caption here">
											<img src="{{ asset('assets/images/school.png') }}" height="300"/>
											<span class="image-overlay"> <i class="clip-expand circle-icon circle-main-color"></i> </span>
										</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="section-content">
								<h2>JM School</h2>
								<hr class="fade-right">
								<p style="text-align: justify;">
									She developed a distinguished program that provides students with an experience in life characterized by creativity and self-reliance, and the educational staff will focus on interactive activities in all scientific fields (mathematics, science, information technology, chess and creative thinking), and literary fields (creative writing, art, music, drama, theater ), Languages (Arabic, English, Hebrew, etc.), in addition to scientific trips, cultural and civilizational tours aimed at, and social activities that enable students to develop their personal skills and prepare them as leadership cadres in society, and employ their personal abilities to develop their scientific horizons, creative thinking and try to help them in determining Milestones of their future.
								</p>
								<hr class="fade-right">
							</div>
						</div>
					</div>
				</div>
				<!-- end: PORTFOLIO CONTAINER -->
			</section>
		</div>
		<!-- end: MAIN CONTAINER -->
		<!-- start: FOOTER -->
		
		
		<a id="scroll-top" href="#"><i class="fa fa-angle-up"></i></a>
	
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
		<!--<![endif]-->
		<script src="{{ asset('frontend/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('frontend/assets/plugins/jquery.transit/jquery.transit.js') }}"></script>
		<script src="{{ asset('frontend/assets/plugins/hover-dropdown/twitter-bootstrap-hover-dropdown.min.js') }}"></script>
		<script src="{{ asset('frontend/assets/plugins/jquery.appear/jquery.appear.js') }}"></script>
		<script src="{{ asset('frontend/assets/plugins/blockUI/jquery.blockUI.js') }}"></script>
		<script src="{{ asset('frontend/assets/plugins/jquery-cookie/jquery.cookie.js') }}"></script>
		<script src="{{ asset('frontend/assets/js/main.js') }}"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="{{ asset('frontend/assets/plugins/revolution_slider/rs-plugin/js/jquery.themepunch.plugins.min.js') }}"></script>
		<script src="{{ asset('frontend/assets/plugins/revolution_slider/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
		<script src="{{ asset('frontend/assets/plugins/flex-slider/jquery.flexslider.js') }}"></script>
		<script src="{{ asset('frontend/assets/plugins/stellar.js/jquery.stellar.min.js') }}"></script>
		<script src="{{ asset('frontend/assets/plugins/colorbox/jquery.colorbox-min.js') }}"></script>
		<script src="{{ asset('frontend/assets/js/index.js') }}"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Index.init();
				$.stellar();
			});
		</script>
	</body>
</html>
