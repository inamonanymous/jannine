<?php
	include('include/connection.php');
	$query = 'SELECT * FROM `books_1` ORDER BY `title`  ';
	$result = mysqli_query($con,$query);
	if(mysqli_num_rows($result)>0){
		$books_exist = true;
	}else{
		$books_exist = false;
	}
?>
<!-- new arrival box -->
<div class="container container-fluid">
	<!-- book covers -->
	<!-- 
	<div class="panel panel-default">

  <div class="panel-body" style="padding-left:50px;">
    <img src="img/books-cover/book-cover-1.jpg" width="100" height="140"/>
    <img src="img/books-cover/book-cover-2.jpg" width="100" height="140"/>
    <img src="img/books-cover/book-cover-3.jpg" width="100" height="140"/>
    <img src="img/books-cover/book-cover-4.jpg" width="100" height="140"/>
    <img src="img/books-cover/book-cover-5.jpg" width="100" height="140"/>
    <img src="img/books-cover/book-cover-6.jpg" width="100" height="140"/>
    <img src="img/books-cover/book-cover-7.jpg" width="100" height="140"/>
    <img src="img/books-cover/book-cover-8.jpg" width="100" height="140"/>
    <img src="img/books-cover/book-cover-9.jpg" width="100" height="140"/>
    <img src="img/books-cover/book-cover-10.jpg" width="100" height="140"/>
  </div>
  
</div>
    -->
	<!-- book covers ends -->
	<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">New arrival</h3>
  </div>
  <div class="panel-body">
   	<table class="table table-striped table-hover ">
	  <thead>
	    <tr>
	      <th>Title</th>
	      <th>Author</th>
	      <th>ISBN No</th>
	      <th>Recommended Age</th>
	      <th>Price</th>
	    </tr>
	  </thead>
	  <tbody>
	  <?php
	  if(isset($books_exist)){
	  	if($books_exist){
	  		while($row = mysqli_fetch_array($result)){
	  ?>
	    <tr>
	      <td><?php echo $row['title'];?></td>
	      <td><?php echo $row['author'];?></td>
	      <td><?php echo $row['isbn'];?></td>
	      <td><?php echo $row['recommendedAge'];?></td>
	      <td><?php echo $row['price'];?></td>
	    </tr>
	   <?php
	   		}
	   	}else{
	   	?>
	   	<tr>
	   		<td colspan="5">No book is registered.</td>
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
<!-- new arrival box ends -->
   
  	