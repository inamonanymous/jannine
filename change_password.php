<?php
	if(isset($_POST['change_password'])){
		include('include/connection.php');
		
		$oldpassword = md5($_POST['oldpassword']);
		$newpassword = $_POST['newpassword'];
		$confirmpassword = $_POST['confirmpassword'];
		$username = $_SESSION['username'];
		$encpassword = md5($confirmpassword);
		/*check if new and confirm pass is same*/
		if($newpassword == $confirmpassword){
			/* check if old password is correct */
			$query = 'SELECT `user_id` FROM `user_credentials` WHERE `username`="'.$username.'" AND `password`="'.$oldpassword.'"';
			
			$result = mysql_query($query);
			if(mysql_num_rows($result)>0){
				$query = 'UPDATE `user_credentials` SET `password`="'.$encpassword.'" WHERE `username`="'.$username.'"';
				if(mysql_query($query)){
					$error = 'none';
				}else{
					$error = 'database_update';
				}
			}else{
				/*wrong password*/
				$error = 'wrong_password';
			}
		}else{
			$error = 'confirm';
		}
	}
?>
<div class="container container-fluid">
	<div class="panel panel-default">
	  <div class="panel-heading">Change Password</div>
	  <div class="panel-body">
	  <?php
	  if(isset($error)){
	  	if($error == 'none'){
	  ?>
	  <div class="alert alert-dismissable alert-success">
		  <button type="button" class="close" data-dismiss="alert">×</button>
		  <strong>Password successfully changed!</strong> 
		</div>
	  <?php
	  	}else if($error == 'database_update'){
	  ?>
	  <div class="alert alert-dismissable alert-danger">
		  <button type="button" class="close" data-dismiss="alert">×</button>
		  <strong>Sorry! we encountered error while updating database! Try Again!</strong>
		</div>
	  <?php
	  	}else if($error == 'wrong_password'){
	  ?>
	  <div class="alert alert-dismissable alert-danger">
		  <button type="button" class="close" data-dismiss="alert">×</button>
		  <strong>Please provide the correct password. Please try again!</strong>
		</div>
	  <?php
	  	}else if($error == 'confirm'){
	  ?>
	  <div class="alert alert-dismissable alert-danger">
		  <button type="button" class="close" data-dismiss="alert">×</button>
		  <strong>Error while confirming password! Please try again</strong>
		</div>
	  <?php
	  	}
	  }
	  ?>
	    <form class="form-horizontal" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>?page=setting&sub=change_password">
		  <fieldset>
		    <div class="form-group">
		      <label for="inputOldPass" class="col-lg-2 control-label">Old Password</label>
		      <div class="col-lg-10">
		        <input class="form-control" id="inputOldPass" name="oldpassword" placeholder="Email" type="password" required>
		      </div>
		    </div>
		    <div class="form-group">
		      <label for="inputNewPassword" class="col-lg-2 control-label">New Password</label>
		      <div class="col-lg-10">
		        <input class="form-control" id="inputNewPassword" name="newpassword" placeholder="New Password" type="password" required>
		      </div>
		    </div>
		    <div class="form-group">
		      <label for="inputConfirmPassword" class="col-lg-2 control-label">Confirm Password</label>
		      <div class="col-lg-10">
		        <input class="form-control" id="inputConfirmPassword" name="confirmpassword" placeholder="Confirm Password" type="password" required>
		      </div>
		    </div>
		    <div class="form-group">
		      <div class="col-lg-10 col-lg-offset-2">
		        <button class="btn btn-default">Cancel</button>
		        <button type="submit" name="change_password" class="btn btn-primary">Save Changes</button>
		      </div>
		    </div>
		  </fieldset>
		</form>
	  </div>
	</div>
</div>