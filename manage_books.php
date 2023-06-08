<?php
  /* get all registered users */
  include('include/connection.php');
  $query = "SELECT `id`, `title`, `recommendedAge`, `author`, `isbn`, `price` FROM `books_1`";
  $result = mysqli_query($con,$query);
  if(isset($_GET['status'])){
    $delete_status = $_GET['status'];
  }
?>
<div class="container container-fluid">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Manage Books</h3>
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
          <th>Book ID</th>
          <th>Book Title</th>
          <th>Category</th>
          <th>Author</th>
          <th>ISBN No.</th>
          <th>Bookself No.</th>
          <th>Remove</th>
          <th>Edit</th>
        </tr>
      </thead>
      <tbody>
      <?php
      while($row = mysqli_fetch_array($result)){
      ?>
        <tr>
          <td><?php echo $row['id'];?></td>
          <td><?php echo $row['title'];?></td>
          <td><?php echo $row['recommendedAge'];?></td>
          <td><?php echo $row['author'];?></td>
          <td><?php echo $row['isbn'];?></td>
          <td><?php echo $row['price'];?></td>
          <td><a href="delete_book.php?delete=<?php echo $row['isbn'];?>" class="btn btn-primary btn-xs">Delete</a></td>
          <td><a href="#" class="btn btn-info btn-xs">Edit</a></td>
        </tr>
        <?php
      } /* ends while */
      	/* check if the list is empty */
      	if(mysqli_num_rows($result) == 0){
      	?>
      	<tr>
      	<td colspan="8">No book found</td>
      	</tr>
      	<?php
      	}
        ?>
      </tbody>
    </table>
    </div> <!-- panel-body ends -->
  </div> <!-- panel ends -->
</div>
