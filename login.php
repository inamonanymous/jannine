<?php
if(isset($_POST['login_submit'])){
	include('include/connection.php');
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	/* query into database */
	$query = "SELECT `username`, `password` FROM `user_credentials` WHERE 1";
	$result = mysqli_query($con, $query);

	if ($result) {
		$login_status = 'failed';
		
		while ($row = mysqli_fetch_array($result)) {
			if ($row['username'] == $username && $row['password'] == $password) {
				$login_status = 'success';
				session_start();
				$_SESSION['username'] = $username;
			}
		}
		
		if ($login_status == 'success') {
			header("Location: index.php?page=home");
			exit();
		} else {
			$error = 'Login failed!';
			// Redirect to login page with error
		}mysqli_free_result($result);
	} else {
		die('Query execution failed: ' . mysqli_error($con));
}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Library Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Samriddhi">

    <!-- css files -->
    <link rel="stylesheet" href="css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="css/customized.css">

    <!-- js files -->
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <style>
	    body{
	    	background-image: url(img/loginpage/library_1.jpg);	
			width: 100%;
  			height: auto;
	    }
    </style>
   </head>
   <body>
   		<!-- header -->
   			<div class="navbar navbar-default margin-opacity">
			  <div class="navbar-header">
			    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
			      <span class="icon-bar"></span>
			      <span class="icon-bar"></span>
			      <span class="icon-bar"></span>
			    </button>
			    <a class="navbar-brand" href="#">Library Management System</a>
			  </div>
			</div>
   		<!-- header ends -->
   		<!-- login box -->
   		<div class="wrap-login">
   			<div class="green-bar"></div>
	   		<div class="jumbotron">
	   				<?php 
					if(isset($error)){
						?>
					<div class="alert alert-dismissable alert-danger">
					  <button type="button" class="close" data-dismiss="alert">×</button>
					  <strong>Login failed!</strong> <a href="#" class="alert-link">Plese provide real username and password</a> and try login again.
					</div>
					<?php
						unset($error);
						}
					?>
		   		<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
				  <fieldset>
				  <legend>Login</legend>
				    <div class="form-group">
				      <label for="inputUsername"  class="col-lg-2 control-label">Username</label>
				      <div class="col-lg-10">
				        <input type="text" class="form-control" name="username" id="inputUsername" placeholder="Username" required>
				      </div>
				    </div>
				    <div class="form-group">
				      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
				      <div class="col-lg-10">
				        <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password" required>
				      </div>
				    </div>
				    <div class="form-group">
				      <div class="col-lg-10 col-lg-offset-2">
				        <button type="submit" name="login_submit" class="btn btn-primary">Submit</button>
				      </div>
				    </div>
				  </fieldset>
				</form>
			</div>
		</div>
   		<!-- login box ends -->
   </body>
</html>


  	