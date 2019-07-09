<!DOCTYPE HTML>
<html>
	<head>
	<link rel="shortcut icon" href="favicon.png" />
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
	<title>Become an Instructor &mdash; OpenLearn</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by freehtml5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="freehtml5.co" />
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css" />
	<link rel="stylesheet" href="assets/signup-form.css" type="text/css" />


  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Pricing -->
	<link rel="stylesheet" href="css/pricing.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	<style>
			.modal {
			text-align: center;
			padding: 0!important;
			}

			.modal:before {
			content: '';
			display: inline-block;
			height: 100%;
			vertical-align: middle;
			margin-right: -4px;
			}

			.modal-dialog {
			display: inline-block;
			text-align: left;
			vertical-align: middle;
			}
		</style>

	</head>
	<body>

	<div class="fh5co-loader"></div>

	<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="top">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 text-right">
						<p class="site">www.openlearn.com</p>
						<p class="num">Call: +01 123 456 7890</p>
						<ul class="fh5co-social">
							<li><a href="#"><i class="icon-facebook2"></i></a></li>
							<li><a href="#"><i class="icon-twitter2"></i></a></li>
							<li><a href="#"><i class="icon-dribbble2"></i></a></li>
							<li><a href="#"><i class="icon-github"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="top-menu">
		<div class="container">
			<div class="row">
				<div class="col-xs-2">
					<div id="fh5co-logo"><a href="index.php"><i class="icon-study"></i><span>&nbsp;Open</span><font color="#2D6CDF">Learn</font></a></div>
				</div>
				<div class="col-xs-10 text-right menu-1">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="courses.php">Courses</a></li>
						<li><a href="instructors.php">Instructors</a></li>
						<li><a href="about.php">About</a></li>
						<li><a href="contact.php">Contact</a></li>
						<li class="btn-cta" data-toggle="modal" data-target="#myModal"><a href="#"><span>Login</span></a></li>
						<li class="btn-cta"><a href="signup.php"><span>Become an Instructor</span></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	</nav>


	<!-- Modal - For Login-->
	<div class="modal fade" id="myModal" tabindex="-1" autocomplete="off" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Login to OpenLearn&nbsp;(For Instructors Only)</h4>
			</div>

			<div class="modal-body">
				<form id="login-form" method="POST" autocomplete="off">
					<div class="form-group">
							<b>Email address</b>
							<input type="email" name="instEmail" class="form-control" id="instEmail" placeholder="Enter email">
							<span class="help-block" id="error"></span>
						</div>

						<div class="form-group">
							<b>Password</b>
							<input type="password" name="instPassword" class="form-control" id="instPassword" placeholder="Password">
							<span class="help-block" id="error"></span>
						</div>

						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" id="rememberMe"class="form-check-input">&nbsp;Remember me
							</label>
						</div>
						<div id="errorDiv"></div> 
			</div>

			<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" id="btn-login" class="btn btn-primary">Login</button>
			</form>
			</div>
		</div>
	</div>
</div>
<!--Modal for login ends-->

	<aside id="fh5co-hero">
		<div class="flexslider">
			<ul class="slides">
		   	<li style="background-image: url(images/teacher2.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 text-center slider-text">
			   				<div class="slider-text-inner">
			   					<h1 class="heading-section">Welcome aboard!</h1>
									<h2>Share your knowledge and reach millions of students across the globe.</h2>
									<p><a class="btn btn-primary btn-lg" href="signup.php#fh5co-contact">Sign up for free!</a></p>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>
		  	</ul>
	  	</div>
	</aside>


	<!-- What instructor can do  -->
	<div id="fh5co-course-categories">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
					<h1>In the market for a new LMS?</h1>
					<p>OpenLearn is your complete solution for creating and delivering your training online.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3 col-sm-6 text-center animate-box">
					<div class="services">
						<span class="icon">
						<i class="fa fa-money"></i>
						</span>
						<div class="desc">
							<h3>Earn Extra Income</h3>
							<p>Earn money every time a student accesses your course.</p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="fa fa-bullhorn"></i>
						</span>
						<div class="desc">
							<h3>Instructor-Led Training</h3>
							<p>Go live! Add a personal, interactive element to your online courses.</p>
						</div>
					</div>
				</div>

				<div class="col-md-3 col-sm-6 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="fa fa-magic"></i>
						</span>
						<div class="desc">
							<h3>Flexible Course Design</h3>
							<p>Build your way with Video,PowerPoint, Audio, Downloadable Files and more.</p>
						</div>
					</div>
				</div>

				<div class="col-md-3 col-sm-6 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="fa fa-comments-o"></i>
						</span>
						<div class="desc">
							<h3>Custom Communications</h3>
							<p>Keep everyone in the know with custom notifications, bulletins and emails.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--End of what instructor can do. -->


	<div id="fh5co-counter" class="fh5co-counters" style="background-image: url(images/people-learning.png);" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="row">
					<div class="col-md-3 col-sm-6 text-center animate-box">
						<span class="icon"><i class="icon-world"></i></span>
						<span class="fh5co-counter js-counter" data-from="0" data-to="32977" data-speed="6000" data-refresh-interval="50"></span>
						<span class="fh5co-counter-label">Followers on Social Media</span>
					</div>
					<div class="col-md-3 col-sm-6 text-center animate-box">
						<span class="icon"><i class="icon-study"></i></span>
						<span class="fh5co-counter js-counter" data-from="0" data-to="47980" data-speed="5000" data-refresh-interval="50"></span>
						<span class="fh5co-counter-label">Students Enrolled</span>
					</div>
					<div class="col-md-3 col-sm-6 text-center animate-box">
						<span class="icon"><i class="icon-bulb"></i></span>
						<span class="fh5co-counter js-counter" data-from="0" data-to="134" data-speed="5000" data-refresh-interval="50"></span>
						<span class="fh5co-counter-label">Classes Complete</span>
					</div>
					<div class="col-md-3 col-sm-6 text-center animate-box">
						<span class="icon"><i class="icon-head"></i></span>
						<span class="fh5co-counter js-counter" data-from="0" data-to="180" data-speed="5000" data-refresh-interval="50"></span>
						<span class="fh5co-counter-label">Certified Teachers</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!--Sign up Code -->

<div id="fh5co-contact">
		<div class="container">
			<div class="row">
				<div class="col-md-12 animate-box">
					<h3 class="text-center">Let's get started!</h3>
					<p class="text-center">Fill out the form to become a part of us.&nbsp;All fields are mandatory unless indicated as optional.</p> <br>
					

					<!-- Registration Form Begins -->
					<form method="post" id="register-form" autocomplete="off" enctype="multipart/form-data">

								<div class="row">
									<div class="col-md-6 form-group">
										<i class="fa fa-user"></i>&nbsp;&nbsp;Name
										<input type="text" name="name" id="name" class="form-control" placeholder="Enter your name" />
										<span class="help-block" id="error"></span>
									</div>

									<div class="col-md-6 form-group">
										<i class="fa fa-envelope"></i>&nbsp;&nbsp;Email
										<input type="email" name="email" id="email" class="form-control" placeholder="Enter your email address" />
										<span class="help-block" id="error"></span>
									</div>			
								</div>

								<div class="row">
									<div class="form-group col-md-6">
										<i class="fa fa-key"></i>&nbsp;&nbsp;Password
										<input type="password" name="password" id="password" class="form-control" placeholder="Enter your password (Must be at least 6 characters long)" />
										<span class="help-block" id="error"></span>
									</div>

									<div class="form-group col-md-6">
										<i class="fa fa-key"></i>&nbsp;&nbsp;Repeat Password
										<input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Repeat password" />
										<span class="help-block" id="error"></span>
									</div>								
								</div>

								<div class="row">
									<div class="form-group col-md-6">
										<i class="fa fa-edge"></i>&nbsp;&nbsp;Website&nbsp;(Optional)
										<input type="url" name="website" id="website" class="form-control" placeholder="Enter your website URL (https://www.domain.com)" />
										<span class="help-block" id="error"></span>
									</div>

									<div class="form-group col-md-6">
										<i class="fa fa-twitter"></i>&nbsp;&nbsp;Twitter&nbsp;(Optional)
										<input type="url" name="twitter" id="twitter" class="form-control" placeholder="https://twitter.com/yourusername">
										<span class="help-block" id="error"></span>
									</div>
								</div>

								<div class="row form-group">
									<div class="col-md-12">
									<i class="fa fa-file-image-o"></i>&nbsp;&nbsp;Profile Picture
									<input type="file" name="profile_picture" accept="image/*" id="profile_picture" />
									<span class="help-block" id="error"></span>
								</div>
								</div>

								<div class="row form-group">
									<div class="col-md-12">
										<i class="fa fa-user-circle"></i>&nbsp;&nbsp;About Yourself
										<textarea name="about" id="about" cols="30" rows="10" maxlength="255" class="form-control" placeholder="Please tell us a bit about yourself, your background, and experience. The more details you provide, the better will it be for us as well as your students to know more about you."></textarea>
										<span class="help-block" id="error"></span>
									</div>
								</div>

								<div class="row form-check form-group">
									<div class="col-md-12">
									<input class="form-check-input" name="agree" id="agree" type="checkbox" value="agree">
									&nbsp;&nbsp;I agree to the <a href="#">terms and conditions</a>.
									<span class="help-block" id="error"></span>
									</div>
								</div>

								<div class="form-group">
									<div class="text-center">
										<button type="submit" id="btn-signup" class="btn btn-primary">Register</button>
									</div>
								</div>

								<div id="errorDiv2"></div>

					</form>
				</div>
			</div>

		</div>
	</div>
<!--Sign up Code ends -->

	<div id="fh5co-register" style="background-image: url(images/studying.jpg);">
		<div class="overlay"></div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2 animate-box">
				<div class="date-counter text-center">
					<h2>Get 400 of Online Courses for Free</h2>
					<h3>By Mike Smith</h3>
					<div class="simply-countdown simply-countdown-one"></div>
					<p><strong>Limited Offer, Hurry Up!</strong></p>
					<p><a href="#" class="btn btn-primary btn-lg btn-reg">Register Now!</a></p>
				</div>
			</div>
		</div>
	</div>

	<footer id="fh5co-footer" role="contentinfo" style="background-image: url(images/mountain.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-3 fh5co-widget">
					<h3>About OpenLearn</h3>
					<p>OpenLearn is a global marketplace for learning and teaching online where students are mastering new skills and achieving their goals by learning from an extensive library of over 55,000 courses taught by expert instructors.</p>
				</div>
				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1 fh5co-widget">
					<h3>Learning</h3>
					<ul class="fh5co-footer-links">
						<li><a href="#">Course</a></li>
						<li><a href="#">Blog</a></li>
						<li><a href="#">Contact</a></li>
						<li><a href="#">Terms</a></li>
						<li><a href="#">Meetups</a></li>
					</ul>
				</div>

				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1 fh5co-widget">
					<h3>Learn &amp; Grow</h3>
					<ul class="fh5co-footer-links">
						<li><a href="#">Blog</a></li>
						<li><a href="#">Privacy</a></li>
						<li><a href="#">Testimonials</a></li>
						<li><a href="#">Handbook</a></li>
						<li><a href="#">Held Desk</a></li>
					</ul>
				</div>

				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1 fh5co-widget">
					<h3>Engage us</h3>
					<ul class="fh5co-footer-links">
						<li><a href="#">Marketing</a></li>
						<li><a href="#">Visual Assistant</a></li>
						<li><a href="#">System Analysis</a></li>
						<li><a href="#">Advertise</a></li>
					</ul>
				</div>

				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1 fh5co-widget">
					<h3>Legal</h3>
					<ul class="fh5co-footer-links">
						<li><a href="#">Find Designers</a></li>
						<li><a href="#">Find Developers</a></li>
						<li><a href="#">Teams</a></li>
						<li><a href="#">Advertise</a></li>
						<li><a href="#">API</a></li>
					</ul>
				</div>
			</div>

			<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
					<small class="block">&copy; 2017 OpenLearn, Inc.&nbsp;&nbsp;All Rights Reserved.</small>
					<small class="block">Designed by <a href="https://www.sddey.com" target="_blank">Subhadeep Dey</a>.</small>
					</p>
				</div>
			</div>

		</div>
	</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>

	<!-- jQuery -->
	<script src="assets/jquery-1.12.4-jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/jquery.validate.min.js"></script>
	<script src="js/additional-methods.js"></script>
	<script src="js/extension.js"></script>
	<script src="register.js"></script>
	<script src="login.js"></script>
	
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap 
	<script src="js/bootstrap.min.js"></script> -->
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Google Map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
	<script src="js/google_map.js"></script>
	<!-- Count Down -->
	<script src="js/simplyCountdown.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>
	<script>
    var d = new Date(new Date().getTime() + 1000 * 120 * 120 * 2000);

    // default example
    simplyCountdown('.simply-countdown-one', {
        year: d.getFullYear(),
        month: d.getMonth() + 1,
        day: d.getDate()
    });

    //jQuery example
    $('#simply-countdown-losange').simplyCountdown({
        year: d.getFullYear(),
        month: d.getMonth() + 1,
        day: d.getDate(),
        enableUtc: false
    });
	</script>
	</body>
</html>
