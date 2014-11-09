<?php
	if(isset($_POST['issuebook'])){
		include('include/connection.php');
		$isbnno = $_POST['isbnno'];
		$userid = $_POST['userid'];
		/* check if book is available in the bookself */
		$query  = 'SELECT `quantity` FROM `books` WHERE `isbnno`="'.$isbnno.'"';
		$result = mysql_query($query);
		if(mysql_num_rows($result) >0){
			$row	= mysql_fetch_array($result);
			$total_quantity = $row['quantity'];
			/* get issued book number */
			$query = 'SELECT `isbnno` FROM `issuedbook` WHERE `isbnno`="'.$isbnno.'"';
			$result = mysql_query($query);
			$issuedquantity = mysql_num_rows($result);
			if($total_quantity - $issuedquantity != 0){
				$query = 'INSERT INTO `issuedbook`(`isbnno`, `userid`) VALUES ("'.$isbnno.'","'.$userid.'")';
				if(mysql_query($query)){
					$issued = true;
				}else{
					$issued = false;
				}
			}else{
				$availability_for_issue = false;
				/*book is not available*/
			}
		}else{
			$availability = false;
			/* book not found */
		}
		/* insert into issuedbook table */

	}
?>
<div class="container container-fluid">
	<div class="panel panel-default">
	  <div class="panel-heading">Issue Book</div>
	  <div class="panel-body">
	  	<?php
	  	if(isset($issued)){
	  		if($issued){
	  	?>
	  		<div class="alert alert-dismissable alert-success">
			  <button type="button" class="close" data-dismiss="alert">×</button>
			  <strong>Book has been successfully issued to the user</strong>
			</div>
	  	<?php
	  		}else{
	  	?>
	  		<div class="alert alert-dismissable alert-danger">
			  <button type="button" class="close" data-dismiss="alert">×</button>
			  <strong>Sorry,couldn't issue this book to the user.</strong>
			</div>
	  	<?php
	  		}
	  	}
	  	?>
	  	<?php
	  	if(isset($availability_for_issue)){
	  	?>
	  	<div class="alert alert-dismissable alert-warning">
		  <button type="button" class="close" data-dismiss="alert">×</button>
		  <strong>Sorry, Book is not available for issue this time. Please wait for others to return it.</strong>
		</div>
	  	<?php
	  	}
	  	?>
	  	<?php 
	  	if(isset($availability)){
	  	?>
	  	<div class="alert alert-dismissable alert-danger">
		  <button type="button" class="close" data-dismiss="alert">×</button>
		  <strong>Sorry! This book is not registered in the library. </strong>
		</div>
	  	<?php
	  	}
	  	?>
	    <form class="form-horizontal" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>?page=book_transaction&sub=book_issue">
		  <fieldset>
		    <div class="form-group">
		      <label for="inputBookID" class="col-lg-2 control-label">Book ISBN No.</label>
		      <div class="col-lg-10">
		        <input class="form-control" id="inputBookISBNNo" name="isbnno" placeholder="Book ISBN No" type="text">
		      </div>
		    </div>
		    <div class="form-group">
		      <label for="inputUserID" class="col-lg-2 control-label">User ID</label>
		      <div class="col-lg-10">
		        <input class="form-control" id="inputUserID" name="userid" placeholder="User ID" type="text">
		      </div>
		    </div>
		    <div class="form-group">
		      <div class="col-lg-10 col-lg-offset-2">
		        <button class="btn btn-default">Cancel</button>
		        <button type="submit" name="issuebook" class="btn btn-primary">Issue Book</button>
		      </div>
		    </div>
		  </fieldset>
		</form>
	  </div>
	</div>
</div