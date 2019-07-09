<!DOCTYPE html>
<html>
    <title>Login to OpenLearn</title>

    <head>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" type="text/css" href="css/login.css">

        <?php

            ini_set ('log_errors', 'on'); //Logging errors

            session_start();

            if(isset($_SESSION['inst_id'])) {
                echo "
                    <script type='text/javascript'>
				        window.location.href = 'admin/admin_dashboard.php';
			        </script>                
                ";
            }

        ?>
    </head>


    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">
                    
                    <h1 class="text-center login-title">Log in to continue to OpenLearn</h1>
                    
                    <div class="account-wall">
                        <img class="profile-img" src="images/incognito.jpg" alt="No image">
                        
                        <form id="login-form" autocomplete="off" method="POST" class="form-signin">
                                <div class="form-group">
                                    <input type="email" name="instEmail" id="instEmail" class="form-control" placeholder="Email" autofocus>
                                    <span class="help-block" id="error"></span>
                                </div>
                                
                                <div class="form-group">
                                    <input type="password" name="instPassword" id="instPassword" class="form-control" placeholder="Password">
                                    <span class="help-block" id="error"></span>
                                </div>

                                <button class="btn btn-lg btn-primary btn-block" id="btn-login" type="submit">Login</button>
                                <label class="checkbox pull-left">
                                    <input type="checkbox" id="rememberMe" value="remember-me">Remember me
                                </label>
                                <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
                                <div id="errorDiv"></div> <!--Error or confirmation is shown here -->
                        </form>
                    </div>
                    
                    <a href="signup.php" class="text-center new-account">Create an account </a>
                    <br><br><a href="index.php" class="text-center new-account">Home </a>
                </div>
            </div>
        </div>

    </body>


    <script src="assets/jquery-1.12.4-jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/jquery.validate.min.js"></script>
	<script src="js/additional-methods.js"></script>
	<script src="js/extension.js"></script> <!--Message is validated and sent-->
	<script src="login.js"></script>

    </html>