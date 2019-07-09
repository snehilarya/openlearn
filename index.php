<?php
	
	ini_set ('log_errors', 'on'); //Logging errors

	session_start();
	
	require_once 'config.php';

	if(isset($_SESSION['inst_id'])) {

		$inst_id = $_SESSION['inst_id'];

		$getinfo = "SELECT `name`, `id`, `email`, `picture` from `instructor` where `id`='{$_SESSION['inst_id']}'";
		$query = mysqli_query($link, $getinfo);
		$row = mysqli_fetch_assoc($query);

		$inst_name = $row['name'];
		$inst_email = $row['email'];
		$inst_picture = $row['picture'];
	}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<?php

			include_once 'page-info.php';
			echo $page_meta; //Page modularization
		
		?>

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
		<!--<link rel="stylesheet" href="css/animate.css"> -->
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
							<li class="active"><a href="index.php">Home</a></li>
							<li><a href="courses.php">Courses</a></li>
							<li><a href="instructors.php">Instructors</a></li>
							<li><a href="about.php">About</a></li>
							<li><a href="contact.php">Contact</a></li>

							<?php
								if(isset($_SESSION['inst_id'])) {
									echo "
									<li class='btn-cta has-dropdown'><a href='#'><span><img src='profile_pictures/".basename($inst_picture)."' height='15px' width='15px'>&nbsp;&nbsp;".$inst_name."</span></a>
									<ul class='dropdown'>
										<li><a href='profile.php?inst_id=$inst_id'><i class='fa fa-user'></i>&nbsp;&nbsp;Profile</a></li>
										<li><a href='http://localhost/open-learning/admin/admin_dashboard.php'><i class='fa fa-tachometer'></i>&nbsp;&nbsp;Dashboard</a></li>
										<li><a href='#'><i class='fa fa-question-circle'></i>&nbsp;&nbsp;Help &amp; Support</a></li>									
										<li><a href='logout.php'><i class='fa fa-sign-out'></i>&nbsp;&nbsp;Logout</a></li>
									</ul>
								</li>";
								}
								else {
									echo "<li class='btn-cta' data-toggle='modal' data-target='#myModal'><a href='#'><span>Login</span></a></li>
									
									<li class='btn-cta'><a href='signup.php'><span>Become an Instructor</span></a></li>";
								}
							?>

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
		   	<li style="background-image: url(images/img_bg_1.jpeg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 text-center slider-text">
			   				<div class="slider-text-inner">
			   					<h1>Free Online Courses</h1>
								<h2>Advance Your Career.&nbsp;Improve Your Life.</h2>
								<p><a class="btn btn-primary btn-lg" href="#fh5co-course-categories">Start Learning Now!</a></p>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>

		   	<li style="background-image: url(images/teacher.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 text-center slider-text">
			   				<div class="slider-text-inner">
			   					<h1>Teach the World Online.</h1>
									<h2>Turn what you know into an opportunity and reach millions around the world. </h2>
									<p><a class="btn btn-primary btn-lg btn-learn" href="signup.php">Become Instructor</a></p>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
			   </li>
			   
			   <li style="background-image: url(images/study-boy.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 text-center slider-text">
			   				<div class="slider-text-inner">
			   					<h1>Unlocking Knowledge,<br>Empowering Minds.</h1>
								<h2>Free videos and lecture notes from instructors present all over the world at OpenLearn.<br>No registration required.</h2>
								<p><a class="btn btn-primary btn-lg" href="courses.php">See all the courses</a></p>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>

		  	</ul>
	  	</div>
	</aside>

	<div id="fh5co-course-categories">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
					<h2>Course Categories</h2>
					<p>Where do you want to get started?</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3 col-sm-6 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="icon-shop"></i>
						</span>
						<div class="desc">
							<h3><a href="list-course.php?course_category=Business">Business</a></h3>
							<p>Enhance your business skills with our special courses tailored for you.</p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="icon-heart4"></i>
						</span>
						<div class="desc">
							<h3><a href="list-course.php?course_category='Health and Psychology'">Health &amp; Psychology</a></h3>
							<p>Want to live a good life? Check out our all new exciting course!</p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="icon-banknote"></i>
						</span>
						<div class="desc">
							<h3><a href="list-course.php?course_category=Accounting">Accounting</a></h3>
							<p>Learn about accounting and brush up your skills.</p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="icon-lab2"></i>
						</span>
						<div class="desc">
							<h3><a href="list-course.php?course_category='Science and Technology'">Science &amp; Technology</a></h3>
							<p>Are you a sci-fi enthusiast? Then check out the courses exclusively for you!</p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="icon-photo"></i>
						</span>
						<div class="desc">
							<h3><a href="list-course.php?course_category='Art and Media'">Art &amp; Media</a></h3>
							<p>Learn about art and media with the help of our all new courses.</p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="icon-home-outline"></i>
						</span>
						<div class="desc">
							<h3><a href="list-course.php?course_category='Real Estate'">Real Estate</a></h3>
							<p>Check out the courses on real estate.</p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="icon-bubble3"></i>
						</span>
						<div class="desc">
							<h3><a href="list-course.php?course_category=Language">Language</a></h3>
							<p>Going for a World tour? Then we are sure you need to learn a new language! Check out the awesome courses which teach you new languages.</p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="icon-world"></i>
						</span>
						<div class="desc">
							<h3><a target="_blank" href="list-course.php?course_category='Web and Programming'">Web &amp; Programming</a></h3>
							<p>If you are a computer nerd, make sure to check out the awesome courses to brush up your programming skills.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="fh5co-counter" class="fh5co-counters" style="background-image: url(images/people-learning.png);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="row">
						<div class="col-md-3 col-sm-6 text-center animate-box">
							<span class="icon"><i class="icon-world"></i></span>
							<span class="fh5co-counter js-counter" data-from="0" data-to="3297" data-speed="5000" data-refresh-interval="50"></span>
							<span class="fh5co-counter-label">Foreign Followers</span>
						</div>
						<div class="col-md-3 col-sm-6 text-center animate-box">
							<span class="icon"><i class="icon-study"></i></span>
							<span class="fh5co-counter js-counter" data-from="0" data-to="3700" data-speed="5000" data-refresh-interval="50"></span>
							<span class="fh5co-counter-label">Students Enrolled</span>
						</div>
						<div class="col-md-3 col-sm-6 text-center animate-box">
							<span class="icon"><i class="icon-bulb"></i></span>
							<span class="fh5co-counter js-counter" data-from="0" data-to="5034" data-speed="5000" data-refresh-interval="50"></span>
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

	<div id="fh5co-course">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
					<h2>Popular Course Categories</h2>
					<p>See what is trending across OpenLearn!</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 animate-box">
					<div class="course">
						<a href="list-course.php?course_category='Web and Programming'" class="course-img" style="background-image: url(images/webdev.jpg);">
						</a>
						<div class="desc">
							<h3><a href="#">Web and Programming</a></h3>
							<p>Learn the most trending courses in IT industry and earn more! We are sure you will love all the courses our instructors have developed for you.</p>
							<span><a href="#" class="btn btn-primary btn-sm btn-course">View Courses</a></span>
						</div>
					</div>
				</div>
				<div class="col-md-6 animate-box">
					<div class="course">
						<a href="#" class="course-img" style="background-image: url(images/business.jpg);">
						</a>
						<div class="desc">
							<h3><a href="list-course.php?course_category='Business and Accounting'">Business &amp; Accounting</a></h3>
							<p>Couldn't afford to pursue an expensive marketing degree? Don't worry, we are at your rescue! Check out the all new courses.</p> 
							<span><a href="#" class="btn btn-primary btn-sm btn-course">View Courses</a></span>
						</div>
					</div>
				</div>
				<div class="col-md-6 animate-box">
					<div class="course">
						<a href="#" class="course-img" style="background-image: url(images/scitech.jpg);">
						</a>
						<div class="desc">
							<h3><a href="#">Science &amp; Technology</a></h3>
							<p>If you are one of those who get a spark everytime he/she watches a sci-fi novel or watch a movie, then we are sure you will love to watch our latest courses!</p>
							<span><a href="#" class="btn btn-primary btn-sm btn-course">View Courses</a></span>
						</div>
					</div>
				</div>
				<div class="col-md-6 animate-box">
					<div class="course">
						<a href="#" class="course-img" style="background-image: url(images/health.jpg);">
						</a>
						<div class="desc">
							<h3><a href="#">Health &amp; Psychology</a></h3>
							<p>Are you on a mission to live a healthy life? Then you would like to check out all of our new courses exclusively made for you! We are sure you will love them all!</p>
							<span><a href="#" class="btn btn-primary btn-sm btn-course">View Courses</a></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="fh5co-testimonial" style="background-image: url(images/school.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
					<h2><span>Testimonials</span></h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="row animate-box">
						<div class="owl-carousel owl-carousel-fullwidth">
							<div class="item">
								<div class="testimony-slide active text-center">
									<div class="user" style="background-image: url(images/person1.jpg);"></div>
									<span>Mary Walker<br><small>Student</small></span>
									<blockquote>
										<p>&ldquo;OpenLearn helped me to learn the most challenging parts of Web Development. Now I work as a freelancer and earn a lot. Thank you for securing my career!&rdquo;</p>
									</blockquote>
								</div>
							</div>
							<div class="item">
								<div class="testimony-slide active text-center">
									<div class="user" style="background-image: url(images/person2.jpg);"></div>
									<span>Mike Smith<br><small>Student</small></span>
									<blockquote>
										<p>&ldquo;There are tons of courses available which helped me boost my skillset. I really love CodeLearn and look forward to pursuing more courses!&rdquo;</p>
									</blockquote>
								</div>
							</div>
							<div class="item">
								<div class="testimony-slide active text-center">
									<div class="user" style="background-image: url(images/person3.jpg);"></div>
									<span>Rita Jones<br><small>Instructor</small></span>
									<blockquote>
										<p>&ldquo;Teaching couldn't have been easier, thanks to CodeLearn. I work as a full-time instructor now and I really love to choose teaching as my career.&rdquo;</p>
									</blockquote>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="fh5co-blog">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Blog &amp; Events</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>
			<div class="row row-padded-mb">
				<div class="col-md-4 animate-box">
					<div class="fh5co-event">
						<div class="date text-center"><span>15<br>Mar.</span></div>
						<h3><a href="#">USA, International Triathlon Event</a></h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
						<p><a href="#">Read More</a></p>
					</div>
				</div>
				<div class="col-md-4 animate-box">
					<div class="fh5co-event">
						<div class="date text-center"><span>15<br>Mar.</span></div>
						<h3><a href="#">USA, International Triathlon Event</a></h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
						<p><a href="#">Read More</a></p>
					</div>
				</div>
				<div class="col-md-4 animate-box">
					<div class="fh5co-event">
						<div class="date text-center"><span>15<br>Mar.</span></div>
						<h3><a href="#">New Device Develope by Microsoft</a></h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
						<p><a href="#">Read More</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>


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
						<li><a href="index.php#fh5co-testimonial">Testimonials</a></li>
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
	<script src="js/jquery.min.js"></script>
	<script src="assets/jquery.validate.min.js"></script>
	<script src="js/additional-methods.js"></script>
	<script src="js/extension.js"></script> <!--Message is validated and sent-->
	<script src="login.js"></script>

	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
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
