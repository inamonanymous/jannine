<?php
	include('include/connection.php');
	$query = 'SELECT `issueno`, `isbnno`, `userid`, date(`issueddate`) AS `issueddate` FROM `issuedbook`';
	$result = mysqli_query($con,$query);
	if(mysqli_num_rows($result)>0){
		$issued = true;
	}else{
		$issued = false;
	}
?>
<div class="container container-fluid">
	<div class="panel panel-default">
	  <div class="panel-heading">Issued Book List</div>
	  <div class="panel-body">
	    <table class="table table-striped table-hover ">
		  <thead>
		    <tr>
		      <th>Issued No</th>
		      <th>ISBN No</th>
		      <th>User ID</th>
		      <th>Issued Date</th>
		    </tr>
		  </thead>
		  <tbody>
		  <?php
		  if(isset($issued)){
		  	if($issued){
		  		while($row = mysqli_fetch_array($result)){
		  ?>
		    <tr>
		      <td><?php echo $row['issueno'];?></td>
		      <td><?php echo $row['isbnno'];?></td>
		      <td><?php echo $row['userid'];?></td>
		      <td><?php echo $row['issueddate'];?></td>
		    </tr>
		    <?php
		    	}
		    }else{
		    ?>
		    <tr>
		    	<td colspan="4">No book issued!</td>
		    </tr>
		    <?php
		    }
		   }
		    ?>
		    </tbody>
		</table> 
	  </div>
	</div>
</div>