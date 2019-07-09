<?php
    session_start();

    require_once 'config.php';
    
    if($_GET['id'] !== $_SESSION['inst_id'] ) {

        echo "You are not authorised to access this page. We're sorry for the inconvenience caused.";

    } else {

        $inst_id = $_SESSION['inst_id'];

        //Fetching the currently entered details from the database
        $query = "SELECT `id`, `name`, `website`, `twitter`, `about` FROM `instructor` WHERE `id`='$inst_id'";
		$result_set = mysqli_query($link, $query);

		$result_select = mysqli_fetch_assoc($result_set);
		
        if (!$result_select) {
			die ("Fetching process failed!");
        }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width; initial-scale=1.0">
        <title>Edit Profile - OpenLearn</title>
        <link rel="shortcut icon" href="favicon.png" />
	    <link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css" />
    </head>

    <body>
    <div class="container">

			<div class="row">
			<div class="col-md-4"><br>
					<a href="profile.php?inst_id=<?php echo $inst_id; ?>"> <button class="btn btn-primary"> <i class="fa fa-arrow-circle-left fa-2x"></i></button> </a>
			</div>
			</div>

			<div class="row">
					<h3 class="text-center">Edit Profile</h3>
					<p class="text-center">All the fields are mandatory unless indicated as optional.</p> <br>

					<!-- Registration Form Begins -->
					<form method="POST" action="#" autocomplete="off">

								<div class="row">
									<div class="col-md-4 form-group">
										<i class="fa fa-user"></i>&nbsp;&nbsp;Name
										<input type="text" name="name" id="name" class="form-control" value="<?php echo $result_select['name']; ?>" required />
										
									</div>

                                    <div class="form-group col-md-4">
										<i class="fa fa-edge"></i>&nbsp;&nbsp;Website
										<input type="url" name="website" id="website" class="form-control" value="<?php echo $result_select['website']; ?>">
									</div>

                                    <div class="form-group col-md-4">
										<i class="fa fa-twitter"></i>&nbsp;&nbsp;Twitter&nbsp;
										<input type="url" name="twitter" id="twitter" class="form-control" value="<?php echo $result_select['twitter']; ?>">		
									</div>

											
								</div>

								<div class="row form-group">
									<div class="col-md-12">
										<i class="fa fa-user-circle"></i>&nbsp;&nbsp;About Yourself
										<textarea name="about" id="about" cols="30" rows="10" maxlength="255" class="form-control" required> <?php echo $result_select['about'];?> </textarea>
									</div>
								</div>

								<div class="form-group">
									<div class="text-center">
										<button type="submit" name="btn-submit" id="btn-submit" class="btn btn-primary">Submit</button>
									</div>
								</div>
					</form>
				</div>
			</div>

    </body>


	<?php 

		if (isset($_POST['name']) && isset($_POST['website']) && isset($_POST['twitter']) && isset($_POST['about']) && !empty($_POST['name']) && !empty($_POST['website']) && !empty($_POST['twitter']) && !empty($_POST['about'])) {

			$name = mysqli_real_escape_string($link, $_POST['name']);
			$website = mysqli_real_escape_string($link, $_POST['website']);
			$twitter = mysqli_real_escape_string($link, $_POST['twitter']);
			$about = mysqli_real_escape_string($link, $_POST['about']);

			$query_update = "UPDATE `instructor` SET `name`='$name', `website`='$website', `twitter`='$twitter', `about`='$about' WHERE `id`='$inst_id' ";

			$result_query = mysqli_query($link, $query_update);

			if($result_query) {
				?>
				<table style="margin-left: auto; margin-right:auto; background-color: green; color: white; border: 1px; width:200px; height: 20px;">
					<tr><td align="center">Updation successful!</td></tr>
				</table>

				<script type="text/javascript">
						window.setTimeout(function(){
							// Move to a new location or you can do something else
        						window.location.href = "edit-profile.php?id=<?php echo $_GET['id']; ?>";
    					}, 5000);
				</script>

				<?php
			} else {
				?>
				<table style="margin-left: auto; margin-right:auto; background-color: red; color: white; border: 1px; width:200px; height: 20px;">
				<tr><td align="center">Update failed!</td></tr>

				<script type="text/javascript">
						window.setTimeout(function(){
							// Move to a new location or you can do something else
        						window.location.href = "edit-profile.php?id=<?php echo $_GET['id']; ?>";
    					}, 5000);
				</script>
			</table>
				<?php
			}

		}

		?>





</html>










<?php
    }

?>