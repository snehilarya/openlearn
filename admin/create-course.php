<!DOCTYPE HTML>
<html>
	<head>
		<link rel="stylesheet" href="../css/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="shortcut icon" href="../favicon.png" />
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin Dashboard &mdash; Free Online Courses at OpenLearn!</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by freehtml5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="freehtml5.co" />

	<?php
	
		ini_set ('log_errors', 'on'); //Logging errors

		require_once '../config.php';

		session_start();

		if(isset($_SESSION['inst_id'])) {

			$inst_id = $_SESSION['inst_id'];

			$getinfo = "SELECT `name`, `id`, `email`, `picture` from `instructor` where `id`='{$_SESSION['inst_id']}'";
			$query = mysqli_query($link, $getinfo);
			$row = mysqli_fetch_assoc($query);

			$inst_name = $row['name'];
			$inst_email = $row['email'];
			$inst_picture = $row['picture'];

			//Getting instructor's first name (accessible as zeroth index)
			$get_name = explode(' ',trim($inst_name));
			$inst_first_name = $get_name[0];
		}
		else
		{
			//Redirect the instructor to login page if he/she is not logged in.
			echo "
				<script type='text/javascript'>
					window.location.href = '../login.php';
				</script>
			";
		}
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
	<link rel="stylesheet" href="../css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="../css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="../css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="../css/magnific-popup.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="../css/owl.carousel.min.css">
	<link rel="stylesheet" href="../css/owl.theme.default.min.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="../css/flexslider.css">

	<!-- Pricing -->
	<link rel="stylesheet" href="../css/pricing.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="../css/style.css">

	<!-- Modernizr JS -->
	<script src="../js/modernizr-2.6.2.min.js"></script>
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
						<div id="fh5co-logo"><a href="../index.php"><i class="icon-study"></i><span>&nbsp;Open</span><font color="#2D6CDF">Learn&nbsp;</font><font color="red">/Admin</font></a></div>
					</div>
					<div class="col-xs-10 text-right menu-1">
						<ul>
							<li><a href="../index.php">Home</a></li>
							<li><a href="../courses.php">Courses</a></li>
							<li><a href="../instructors.php">Instructors</a></li>
							<li><a href="../about.php">About</a></li>
							<li><a href="../contact.php">Contact</a></li> 
							&nbsp;&nbsp;&nbsp;
							
							<?php
								if(isset($_SESSION['inst_id'])) {
									echo "
								<li class='btn-cta has-dropdown'><a href='#'><span><img src='../profile_pictures/".basename($inst_picture)."' height='15px' width='15px'>&nbsp;&nbsp;".$inst_name."</span></a>
								<ul class='dropdown'>
									<li><a href='../profile.php?inst_id=$inst_id'><i class='fa fa-user'></i>&nbsp;&nbsp;Profile</a></li>
									<li><a href='http://localhost/open-learning/admin/admin_dashboard.php'><i class='fa fa-tachometer'></i>&nbsp;&nbsp;Dashboard</a></li>
									<li><a href='#'><i class='fa fa-question-circle'></i>&nbsp;&nbsp;Help &amp; Support</a></li>									
									<li><a href='#' data-toggle='modal' data-target='#logoutModal'><i class='fa fa-sign-out'></i>&nbsp;&nbsp;Logout</a></li>
								</ul>
							</li>";
							}
						?>

						</ul>
					</div>
				</div>

			</div>
		</div>
	</nav>


	<!-- Modal - For Logout-->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Logout</h4>
				</div>

				<div class="modal-body">
					<br>
					<p> Do you really want to log out? </p>
				</div>

				<div class="modal-footer">
					<form action="../logout.php">
						<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
						<input type="submit" value="Yes" class="btn btn-primary">
					</form>
				</div>
			</div>
		</div>
	</div>
	<!--Modal ends-->


	<!-- Something to add style -->
	<aside id="fh5co-hero">
		<div class="flexslider">
			<ul class="slides">
		   	<li style="background-image: url(../images/book.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 text-center slider-text">
			   				<div class="slider-text-inner">
			   					<h1 class="heading-section">Create Course</h1>
								   <h2>Turn what you know into an opportunity and reach millions around the world.</h2>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>
		  	</ul>
	  	</div>
	</aside>
	<!-- Finished adding styles -->


	<!--Course Creation Form Code -->
	<div id="fh5co-contact">
			<div class="container">
				<div class="row">
					<div class="col-md-12 animate-box">
						<h3 class="text-center">Let's get started!</h3>
						<p class="text-center">Fill out the form to add details about the new course.&nbsp;After you are done, you will be directed to the course management page where you can add lectures, handouts, and much more!
						<br>Kindly note that all the fields are mandatory unless stated otherwise.</p> <br>
						
						
						<form action="register-course.php" method="POST">
							<div class="row form-group">
								<div class="col-md-12">
									<i class="fa fa-graduation-cap"></i>&nbsp;&nbsp;Course Name
									<input type="text" id="courseName" name="courseName" class="form-control" placeholder="Enter the course name" required>
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<i class="fa fa-book"></i>&nbsp;&nbsp;Course Category
									<select class="form-control" name="courseCategory" id="courseCategory" required>
										<option>-- Choose course category --</option>
      									<option value="Business">Business</option>
      									<option value="Health and Psychology">Health &amp; Psychology</option>
      									<option value="Accounting">Accounting</option>
      									<option value="Science and Technology">Science &amp; Technology</option>
	      								<option value="Artand Media">Art &amp; Media</option>
										<option value="Real Estate">Real Estate</option>
										<option value="Language">Language</option>
										<option value="Web and Programming">Web &amp; Programming</option>
    								</select>
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<i class="fa fa-pencil"></i>&nbsp;&nbsp;Course Information
									<textarea name="courseInfo" id="courseInfo" cols="30" rows="15" class="form-control" placeholder="Enter a detailed information about the course." maxlength="300" required></textarea>
								</div>
							</div>

							<div class="row form-check form-group">
								<div class="col-md-12">
	    						<input class="form-check-input" type="checkbox" required>
	    						&nbsp;&nbsp;I agree to the <a href="#">terms and conditions</a>.
								</div>
							</div>

							<div class="form-group">
								<div class="text-center">
									<input type="submit" value="Submit" class="btn btn-primary">
								</div>
							</div>

						</form>
					</div>
				</div>

			</div>
		</div>
	<!--Course Creation Code ends -->


	<footer id="fh5co-footer" role="contentinfo" style="background-image: url(../images/mountain.jpg);">
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
	<script src="../js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="../js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="../js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="../js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="../js/jquery.stellar.min.js"></script>
	<!-- Carousel -->
	<script src="../js/owl.carousel.min.js"></script>
	<!-- Flexslider -->
	<script src="../js/jquery.flexslider-min.js"></script>
	<!-- countTo -->
	<script src="../js/jquery.countTo.js"></script>
	<!-- Magnific Popup -->
	<script src="../js/jquery.magnific-popup.min.js"></script>
	<script src="../js/magnific-popup-options.js"></script>
	<!-- Count Down -->
	<script src="../js/simplyCountdown.js"></script>
	<!-- Main -->
	<script src="../js/main.js"></script>
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
