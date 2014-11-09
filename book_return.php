<?php
	if(isset($_POST['get_borrowed_list'])){
		include('include/connection.php');
		$userid = $_POST['userid'];
		/* fetch borrowed list of user*/
		$query = 'SELECT `issueno`, `isbnno`, `userid`, date(`issueddate`) AS `issueddate` FROM `issuedbook` WHERE `userid` = "'.$userid.'"';
		
		$result = mysql_query($query);
		if(mysql_num_rows($result)>0){
			$borrow_status = true;
		}else{
			$borrow_status = false;
		}
	}
?>
<div class="container container-fluid">
	<div class="panel panel-default">
	  <div class="panel-heading">Book Return</div>
	  <div class="panel-body">
	  	<?php
	  	if(isset($borrow_status)){
	  		if($borrow_status){
	  	?>
	  		<table class="table table-striped table-hover ">
			  <thead>
			    <tr>
			      <th>Issued No</th>
			      <th>User ID</th>
			      <th>Book ISBN No</th>
			      <th>Issued Date</th>
			      <th>Return</th>
			    </tr>
			  </thead>
			  <tbody>
	  	<?php
	  			while($row = mysql_fetch_array($result)){
	  	?>
			    <tr>
			      <td><?php echo $row['issueno'];?></td>
			      <td><?php echo $userid;?></td>
			      <td><?php echo $row['isbnno'];?></td>
			      <td><?php echo $row['issueddate'];?></td>
			      <td><a href="book_return_exec.php?issueno=<?php echo $row['issueno'];?>" class="btn btn-success btn-xs">Return</a></td>
			    </tr>
	  	<?php
	  			} 
	  		}else{
	  	?>
	  	<div class="alert alert-dismissable alert-info">
		  <button type="button" class="close" data-dismiss="alert">×</button>
		  <strong>This user has not issued any book.</strong> 
		</div>
	  	<?php
	  		}
	  	}
	  	?>
	  	<?php
	  	if(isset($_GET['status'])){
	  		$status = $_GET['status'];
	  		if($status == 'returned'){
	  	?>
	  	<div class="alert alert-dismissable alert-success">
		  <button type="button" class="close" data-dismiss="alert">×</button>
		  <strong>Book returned successfully!</strong> 
		</div>
	  	<?php
	  		}else if($status == 'failed'){
	  	?>
	  		<div class="alert alert-dismissable alert-danger">
			  <button type="button" class="close" data-dismiss="alert">×</button>
			  <strong>Book return failed. Try again!</strong> 
			</div>
	  	<?php
	  		}
	  	}
	  	?>
	   	<form class="form-horizontal" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>?page=book_transaction&sub=book_return">
		  <fieldset>
		    <div class="form-group">
		      <label for="inputUserID" class="col-lg-2 control-label">User ID</label>
		      <div class="col-lg-10">
		        <input class="form-control" id="inputUserID" name="userid" placeholder="User ID" type="text">
		      </div>
		    </div>
		    <div class="form-group">
		      <div class="col-lg-10 col-lg-offset-2">
		        <button class="btn btn-default">Cancel</button>
		        <button type="submit" name="get_borrowed_list" class="btn btn-primary">Get Borrowed List</button>
		      </div>
		    </div>
		  </fieldset>
		</form>
	  </div>
	</div>
</div>	