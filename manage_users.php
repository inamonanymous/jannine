<?php 
	/* get all registered users */
	include('include/connection.php');
	$query = "SELECT `userid`, `firstname`, `lastname`, `email`, `gender`, `usertype` FROM `users`";
	$result = mysqli_query($con,$query);
	if(isset($_GET['status'])){
		$delete_status = $_GET['status'];
	}
?>
<div class="container container-fluid">
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Manage Users</h3>
	  </div>
	  <div class="panel-body">
	  	<!-- user delete success/failed message -->
	  	<?php
	  		if(isset($delete_status)){
	  			if($delete_status){
	  	?>
	  			<div class="alert alert-dismissable alert-success">
				  <button type="button" class="close" data-dismiss="alert">×</button>
				  <strong>User has been removed successfully!</strong>
				</div>
	  	<?php
	  			}else{

	  	?>
	  			<div class="alert alert-dismissable alert-danger">
				  <button type="button" class="close" data-dismiss="alert">×</button>
				  <strong>Failed to remove the user. Try again!</strong> 
				</div>
	  	<?php
	  			}
	  		}
	  	?>
	  	<!-- user delete success/failed message ends -->
	  	<!-- user list table -->
	  	<table class="table table-striped table-hover ">
		  <thead>
		    <tr>
		      <th>User ID</th>
		      <th>First Name</th>
		      <th>Last Name</th>
		      <th>Email</th>
		      <th>Gender</th>
		      <th>User Type</th>
		      <th>Delete</th>
		      <th>Edit</th>
		    </tr>
		  </thead>
		  <tbody>
		  <?php
		  while($row = mysqli_fetch_array($result)){
		  ?>
		    <tr>
		      <td><?php echo $row['userid'];?></td>
		      <td><?php echo $row['firstname'];?></td>
		      <td><?php echo $row['lastname'];?></td>
		      <td><?php echo $row['email'];?></td>
		      <td><?php if($row['gender'] == 1){ echo 'Male'; }else{echo 'Female';}?></td>
		      <td><?php if($row['usertype'] == 1){ echo 'Student';}elseif($row['usertype']==2){echo 'Teacher';}else{echo "Staff";}?></td>
		      <td><a href="delete_user.php?delete=<?php echo $row['userid'];?>" class="btn btn-primary btn-xs">Delete</a></td>
		      <td><a href="#" class="btn btn-info btn-xs">Edit</a></td>
		    </tr>
		    <?php
			} /* ends while */
		    ?>
		  </tbody>
		</table> 
	  </div> <!-- panel-body ends -->
	</div> <!-- panel ends -->
</div>