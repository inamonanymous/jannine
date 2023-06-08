<?php
	if(isset($_POST['add_new_book'])){
		include('include/connection.php');
		$title = $_POST['title'];
		$category = $_POST['category'];
		$author = $_POST['author'];
		$isbnno = $_POST['isbnno'];
		$bookselfno = $_POST['bookselfno'];
		
		/* check if the book already exists with the isbnno */
		$query     = 'SELECT `isbn` FROM `books_1` WHERE `isbn`="'.$isbnno.'"';
		$result    = mysqli_query($con,$query);
		if(mysqli_num_rows($result) > 0){
			$book_status = 'exists';
		}else{
			/* insert book details into books table */
			$query = 'INSERT INTO `books_1`(`title`, `recommendedAge`, `author`, `isbn`, `price`) 
						VALUES ("'.$title.'","'.$category.'","'.$author.'","'.$isbnno.'","'.$bookselfno.'")';
			if(mysqli_query($con,$query)){
				$addbook_status = true;
			}else{
				$addbook_status = false;
			}
		}
	}
?>
<div class="container container-fluid">
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Add New Book</h3>
	  </div>
	  <div class="panel-body">
	  	<!-- book already exists message -->
	  		<?php
	  			if(isset($book_status)){
	  		?>
	  		<div class="alert alert-dismissable alert-danger">
			  <button type="button" class="close" data-dismiss="alert">×</button>
			  <strong>Oh sorry! Book has already present with the isbnno you provided.Please check the book list.</strong>
			</div>
	  		<?php
	  			unset($book_status);
	  			}
	  		?>
	  		<!-- user already exists message ends -->
	  		<!-- create success/failed message -->
	  		<?php
	  			if(isset($addbook_status)){
	  				if($addbook_status){

	  		?>
	  		<div class="alert alert-dismissable alert-success">
			  <button type="button" class="close" data-dismiss="alert">×</button>
			  <strong>Well done! Book has been successfully added to the database.</strong>
			</div>
			<?php
	  				}else{
	  		?>
	  		<div class="alert alert-dismissable alert-danger">
			  <button type="button" class="close" data-dismiss="alert">×</button>
			  <strong>Sorry! please try again. Couldn't add this book to the database.</strong>
			</div>
			<?php
	  				}
	  				unset($addbook_status);
	  			}
	  		?>
	  		<!-- create success/failed message ends-->
	  	<form class="form-horizontal" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>?page=inventory&sub=add_book">
		  <fieldset>
		    <div class="form-group">
		      <label for="inputTitle" class="col-lg-2 control-label">Title</label>
		      <div class="col-lg-10">
		        <input class="form-control" id="inputTitle" name="title" placeholder="Book Title" type="text">
		      </div>
		    </div>
		    <div class="form-group">
		      <label for="inputCategory" class="col-lg-2 control-label">Recommended Age</label>
		      <div class="col-lg-10">
		        <input class="form-control" id="inputCategory" name="category" placeholder="Age" type="text">
		    </div>
		    </div>
		    <div class="form-group">
		      <label for="inputAuthor" class="col-lg-2 control-label">Author</label>
		      <div class="col-lg-10">
		        <input class="form-control" id="inputAuthor" name="author" placeholder="Author" type="text">
		    </div>
		    </div>
		    <div class="form-group">
		      <label for="inputISBNNo" class="col-lg-2 control-label">ISBN No.</label>
		      <div class="col-lg-10">
		        <input class="form-control" id="inputISBNNo" name="isbnno" placeholder="ISBN No." type="text">
		    </div>
		    </div>
		    <div class="form-group">
		      <label for="inputBookSelfNo" class="col-lg-2 control-label">Price</label>
		      <div class="col-lg-10">
		        <input class="form-control" id="inputBookSelfNo" name="bookselfno" placeholder="$" type="text">
		    </div>
		    
		    </div>
		     <div class="form-group">
		      <div class="col-lg-10 col-lg-offset-2">
		        <button class="btn btn-default">Cancel</button>
		        <button type="submit" class="btn btn-primary" name="add_new_book">Submit</button>
		      </div>
		    </div>
		  </fieldset>
		</form>
	  </div> <!-- panel-body ends -->
	</div> <!-- panel ends -->
</div>