<!DOCTYPE HTML>
<html>
	<head>
		<link rel="stylesheet" href="../css/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="shortcut icon" href="../favicon.png" />
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Manage Course &mdash; Free Online Courses at OpenLearn!</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by freehtml5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="freehtml5.co" />

	<?php
	
		ini_set ('log_errors', 'on'); //Logging errors

		session_start();

		require_once '../config.php';

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
            
            //Getting course information
            $getCourseInfo = "SELECT * from `courses` where `course_id`='{$_GET['course_id']}'";
			$queryCourse = mysqli_query($link, $getCourseInfo);
            $rowCourse = mysqli_fetch_assoc($queryCourse);
            

            //Checking if the designated course is managed by the logged-in instructor.
            if($_SESSION['inst_id'] !== $rowCourse['instructor_id']) {
                exit("You are not authorised to manage this course.");
            }

		} else {
			//Redirect the instructor to login page if he/she is not logged in.
			echo "
				<script type='text/javascript'>
					window.location.href = '../login.php';
				</script>
			";
        }
        
	?>

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

<br><br><br>

	<!--Experiment About Course Part -->
    <div class="container" style="width:700px;">  
   <h3 align="center">Manage Course: "<?php echo $rowCourse['course_name'];?>"</h3>  
   <br />  
   <div class="table-responsive">
    <div align="center">
     <button type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-success">Add Title</button>
    </div>
    <br />
    <div id="employee_table">
     <table class="table table-bordered">
      <tr>
       <th width="70%">Title</th>  
       <th width="30%">YouTube Video Unique Code</th>
      </tr>
      <?php

        $getCourseContent = "SELECT * from `course_content` where `course_id`='{$_GET['course_id']}'";
        $queryCourseContent = mysqli_query($link, $getCourseContent);

        while($row_course_content = mysqli_fetch_assoc($queryCourseContent))
        {
    ?>
    
      <tr>
       <td><?php echo $row_course_content["video_title"]; ?></td>
       <td><?php echo $row_course_content["video_link"]; ?></td>
      </tr>
      <?php
      }
      ?>
     </table>
    </div>
   </div>  
  </div>
 </body>  
</html>  

<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Add Video</h4>
   </div>
   <div class="modal-body">

      <!-- F o r m  -->
     <form method="POST" id="register-form">
        
        <div class="form-group">
            <b>Enter Video Title</b>
            <input type="text" name="video_title" id="video_title" class="form-control" placeholder="Video Title"/>
            <span class="help-block" id="error"></span>
            <br />
        </div>
     
        <div class="form-group">
            <b>Enter YouTube Video Unique Code</b>
            <input type="text" name="video_link" id="video_link" class="form-control" placeholder="For example, type 'xzjoXwCpBU4' for the video link 'https://www.youtube.com/watch?v=xzjoXwCpBU4'"></textarea>
            <span class="help-block" id="error"></span>
        </div>

        <input type="hidden" name="course_id" id="course_id" value='<?php echo $_GET[course_id]; ?>' />
    <!-- Form ends -->
    <div id="errorDiv2"></div> 
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <input type="submit" name="btn-insert" id="btn-insert" value="Insert" class="btn btn-success" />
    </form>
   </div>
  </div>
 </div>
</div>
    <!--Experiment ends -->

    <br><br><br>

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
    <script src="../assets/jquery.validate.min.js"></script>
	<script src="../js/additional-methods.js"></script>
	<script src="../js/extension.js"></script>
    
    <script>
    // JavaScript Validation For Insertion

        $('document').ready(function()
        {
        		 $("#register-form").validate({
        		  rules:
        		  {
        				video_title: {
        					required: true,
        					minlength: 4
        				},
                    
        				video_link: {
        				    required : true,
        				    minlength: 3
        				}				
                   },

        		   messages:
        		   {
                        video_title: {
        					required: "Required",
        					minlength: "Should not bee too short"
        				},
                    
        				video_link: {
        				    required : "Required",
        				    minlength: "Should not be too short"
        				}
        		   },
        		   errorPlacement : function(error, element) {
        			  $(element).closest('.form-group').find('.help-block').html(error.html());
        		   },
        		   highlight : function(element) {
        			  $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        		   },
        		   unhighlight: function(element, errorClass, validClass) {
        			  $(element).closest('.form-group').removeClass('has-error');
        			  $(element).closest('.form-group').find('.help-block').html('');
        		   },
        				submitHandler: submitForm
        		   });
               
               
        		   function submitForm(){
        				$.ajax({
        			   		url: 'insert.php',
        			   		type: 'POST',
                               data: $('#register-form').serialize(),
        			   		dataType: 'json'
        			   })
        			   .done(function(data){
                    
        			   		$('#btn-insert').html('<img src="../ajax-loader.gif" />&nbsp; Inserting...').prop('disabled', true);
        			   		$('input[type=text],input[type=email],input[type=password],input[type=url],input[type=file]').prop('disabled', true);
                    
        			   		setTimeout(function(){
                            
        						if (data.status==='success') {
                                
        							$('#errorDiv2').slideDown('fast', function(){
        								$('#errorDiv2').html('<div class="alert alert-info">'+data.message+'</div>');
        								$("#register-form").trigger('reset');
        								$('input[type=text],input[type=email],input[type=password],input[type=url],input[type=file]').prop      ('disabled', false);
        								$('#btn-insert').html('Insert').prop('disabled', false);
        							}).delay(3000).slideUp('fast');
                                
                                
        					    } else {
                                
        						    $('#errorDiv2').slideDown('fast', function(){
        						      	$('#errorDiv2').html('<div class="alert alert-danger">'+data.message+'</div>');
        							  	$("#register-form").trigger('reset');
        							  	$('input[type=text],input[type=email],input[type=password],input[type=url],input[type=file]').prop      ('disabled', false);
        							  	$('#btn-insert').html('Insert').prop('disabled', false);
        							}).delay(3000).slideUp('fast');
        						}
                            
        					},3000);
                        
        			   })
        			   .fail(function(){
        			   		$("#register-form").trigger('reset');
        			   		alert('An unknown error occoured. Please try again later.');
        			   });
                   
        }
        });
</script>
	
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
