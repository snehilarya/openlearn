<!DOCTYPE HTML>
<html>
	<head>
		<link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="shortcut icon" href="favicon.png" />
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>View Course &mdash; Free Online Courses at OpenLearn!</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Free HTML5 Website Template by freehtml5.co" />
		<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
		<meta name="author" content="freehtml5.co" />

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

			//Getting instructor's first name (accessible as zeroth index)
			$get_name = explode(' ',trim($inst_name));
            $inst_first_name = $get_name[0];

		}

		//Getting course information
		$getCourseInfo = "SELECT * from `courses` where `course_id`='{$_GET['course_id']}'";
		$queryCourse = mysqli_query($link, $getCourseInfo);
		$rowCourse = mysqli_fetch_assoc($queryCourse);

	?>

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
	<nav class="fh5co-nav navbar navbar-default" style="box-shadow: 0 8px 6px -6px gray;" role="navigation">
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
						<div id="fh5co-logo"><a href="index.php"><i class="icon-study"></i><span>&nbsp;Open</span><font color="#2D6CDF">Learn&nbsp;</font></a></div>
					</div>
					<div class="col-xs-10 text-right menu-1">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li class="active"><a href="courses.php">Courses</a></li>
							<li><a href="instructors.php">Instructors</a></li>
							<li><a href="about.php">About</a></li>
							<li><a href="contact.php">Contact</a></li>
							&nbsp;&nbsp;&nbsp;

							<?php
								if(isset($_SESSION['inst_id'])) {
									echo "
								<li class='btn-cta has-dropdown'><a href='#'><span><img src='profile_pictures/".basename($inst_picture)."' height='15px' width='15px'>&nbsp;&nbsp;".$inst_name."</span></a>
								<ul class='dropdown'>
									<li><a href='profile.php?inst_id=$inst_id'><i class='fa fa-user'></i>&nbsp;&nbsp;Profile</a></li>
									<li><a href='http://localhost/open-learning/admin/admin_dashboard.php'><i class='fa fa-tachometer'></i>&nbsp;&nbsp;Dashboard</a></li>
									<li><a href='#'><i class='fa fa-question-circle'></i>&nbsp;&nbsp;Help &amp; Support</a></li>
									<li><a href='#' data-toggle='modal' data-target='#logoutModal'><i class='fa fa-sign-out'></i>&nbsp;&nbsp;Logout</a></li>
								</ul>
							</li>";
							} else {
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
					<form action="logout.php">
						<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
						<input type="submit" value="Yes" class="btn btn-primary">
					</form>
				</div>
			</div>
		</div>
	</div>
	<!--Modal ends-->

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

	<?php

		$get_course_id = $_GET['course_id'];

		$result_set_ins = mysqli_query($link, "SELECT instructor.name FROM instructor INNER JOIN courses ON instructor.id=courses.instructor_id WHERE course_id='$get_course_id'");

		$result_ins_arr = mysqli_fetch_assoc($result_set_ins);

		$course_inst_name = $result_ins_arr['name'];


	?>

	<aside id="fh5co-hero">
		<div class="flexslider">
			<ul class="slides">
		   	<li style="background-image: url(images/people-woman-coffee-meeting.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 text-center slider-text">
			   				<div class="slider-text-inner">
			   					<h1 class="heading-section"><?php echo $rowCourse["course_name"]; ?></h1>
								<h4 style="color: white;">Instructed by <?php echo $course_inst_name; ?></h4><br>
								<h2><?php echo $rowCourse["course_info"]; ?> </h2>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>
		  	</ul>
	  	</div>
	</aside>

	<br><br><br>

	
	<!--Experiment About Course Part -->
    <div class="container" style="width:900px;">
	<?php
		$getCourseContent = "SELECT * from `course_content` WHERE `course_id`='{$_GET['course_id']}'";
		$queryCourseContent = mysqli_query($link, $getCourseContent); 

		if(mysqli_num_rows($queryCourseContent) > 0) {
	?>

   		<div class="container"> 
		   <div class="table-responsive">
    		<div id="employee_table">
     			<table class="table table-hover">

					<tbody>
      					
						<?php


        					while($row_course_content = mysqli_fetch_assoc($queryCourseContent))
        					{
						
						?>

      							<tr>
       								<td><?php echo $row_course_content["video_title"]; ?></td>
       								<td><button class="btn btn-primary view-button" data-toggle="modal" data-target="#add_data_Modal" data-video-id="<?= $row_course_content["video_link"] ?>">View</button></td>
      							</tr>
      
	  					<?php
      						}
	  					?>
	  				</tbody>
     		</table>
    </div>
	<?php 
		}
		else {
			echo "<h4 align='center'>No course found.</h4>";
		}

	?>
   </div>
  </div>
  </div>
 </body>

<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Video Player</h4>
   </div>
   <div class="modal-body" id="yt-player">
	<!-- Form ends -->
	<iframe width="560" height="315" src="" id="video" frameborder="0" allowfullscreen></iframe>

   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    </form>
   </div>
  </div>
 </div>
</div>
	<!--Experiment ends -->

	<script type="text/javascript">
    $('#add_data_Modal').on('hidden.bs.modal', function () {
        callPlayer('yt-player', 'stopVideo');
    });
</script>

    <br><br><br>

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

	$(".view-button").click(function() {
		var video_url = $(this).attr("data-video-id");
		video_url = "https://youtube.com/embed/" + video_url;
		$("#video").attr("src", video_url);
	});
	</script>
	</body>
</html>