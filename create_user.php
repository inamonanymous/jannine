<?php 
	if(isset($_POST['create_user'])){
		include('include/connection.php');
		$usertype  = $_POST['usertype'];
		$firstname = $_POST['firstname'];
		$lastname  = $_POST['lastname'];
		$email 	   = $_POST['email'];
		$userid    = $_POST['userid'];
		$gender    = $_POST['genderRadios'];
		/* check if the user already exists with the userid */
		$query     = 'SELECT `userid` FROM `users` WHERE `userid`="'.$userid.'"';
		$result    = mysqli_query($con,$query);
		if(mysqli_num_rows($result) > 0){
			$user_status = 'exists';
		}else{
			/* insert into user table */
			$query     = 'INSERT INTO `users`(`userid`, `firstname`, `lastname`, `email`, `gender`, `usertype`) 
							VALUES ("'.$userid.'","'.$firstname.'","'.$lastname.'","'.$email.'",'.$gender.','.$usertype.')';
			if(mysqli_query($con,$query)){
				$create_status = true;
			}else{
				$create_status = false;
			}
		}
	}
?>
<div class="container container-fluid">
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Create User</h3>
	  </div>
	  <div class="panel-body">
	  		<!-- user already exists message -->
	  		<?php
	  			if(isset($user_status)){
	  		?>
	  		<div class="alert alert-dismissable alert-danger">
			  <button type="button" class="close" data-dismiss="alert">×</button>
			  <strong>Oh sorry! User has already registered with the id you provided.Please check the user list.</strong>
			</div>
	  		<?php
	  			unset($user_status);
	  			}
	  		?>
	  		<!-- user already exists message ends -->
	  		<!-- create success/failed message -->
	  		<?php
	  			if(isset($create_status)){
	  				if($create_status){

	  		?>
	  		<div class="alert alert-dismissable alert-success">
			  <button type="button" class="close" data-dismiss="alert">×</button>
			  <strong>Well done! User has been successfully registered.</strong>
			</div>
			<?php
	  				}else{
	  		?>
	  		<div class="alert alert-dismissable alert-danger">
			  <button type="button" class="close" data-dismiss="alert">×</button>
			  <strong>Sorry! please try again. Couldn't register the user.</strong>
			</div>
			<?php
	  				}
	  				unset($create_status);
	  			}
	  		?>
	  		<!-- create success/failed message ends-->
	  		<form class="form-horizontal" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>?page=administrator&sub=create_user">
			  <fieldset>
			  	<div class="form-group">
			      <label for="select" class="col-lg-2 control-label">User Type</label>
			      <div class="col-lg-10">
			        <select class="form-control" id="select" name="usertype">
			          <option value="1">Student</option>
			          <option value="2">Teacher</option>
			          <option value="3">Staff</option>
			        </select>
			      </div>
			    </div>
			  	 <div class="form-group">
			      <label for="inputFirstName" class="col-lg-2 control-label">First Name</label>
			      <div class="col-lg-10">
			        <input class="form-control" id="inputFirstName" name="firstname" placeholder="First Name" type="text" required>
			      </div>
			      </div>
			      <div class="form-group">
			      <label for="inputLastName" class="col-lg-2 control-label">Last Name</label>
			      <div class="col-lg-10">
			        <input class="form-control" id="inputLastName" name="lastname" placeholder="Last Name" type="text" required>
			      </div>
			    </div>
			    <div class="form-group">
			      <label for="inputEmail" class="col-lg-2 control-label">Email</label>
			      <div class="col-lg-10">
			        <input class="form-control" id="inputEmail" name="email" placeholder="Email" type="text" required>
			      </div>
			    </div>
			     <div class="form-group">
			      <label for="inputUserID" class="col-lg-2 control-label">User ID</label>
			      <div class="col-lg-10">
			        <input class="form-control" id="inputUserID" name="userid" placeholder="User ID" type="text" required>
			      </div>
			      </div>
			    <div class="form-group">
			      <label class="col-lg-2 control-label">Gender</label>
			      <div class="col-lg-10">
			        <div class="radio">
			          <label>
			            <input name="genderRadios" id="optionsRadios1" value="1" checked="" type="radio">
			            Male
			          </label>
			        </div>
			        <div class="radio">
			          <label>
			            <input name="genderRadios" id="optionsRadios2" value="0" type="radio">
			            Female
			          </label>
			        </div>
			      </div>
			    </div>
			    <div class="form-group">
			      <div class="col-lg-10 col-lg-offset-2">
			        <button type="submit" name="create_user" class="btn btn-primary">Register</button>
			      </div>
			    </div>
			  </fieldset>
			</form>

	  </div> <!-- panel-body ends -->
	</div> <!-- panel ends -->
</div>