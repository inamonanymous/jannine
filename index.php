<?php 
include('include/connection.php');
	/* check login status */
	session_start();
	if(isset($_SESSION['username'])){
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Library Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css" media="screen">
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.js"></script>
    <![endif]-->
	</head>
	<body>
		<!-- header -->
			<?php include('header.php'); ?>
		<!-- header ends -->
		
		<!-- content based on menu -->
		
			   
		 	<?php
		 	if(isset($_GET['page']) && !isset($_GET['sub'])){
				include('home.php');
		 	}

		 	if(isset($_GET['sub'])){
		 		 $subpage = mysqli_real_escape_string($con, $_GET['sub']); //protected from sql injection
		 		  switch($subpage){
			      case 'book_issue':
			        include('book_issue.php');
			        break;
			      case 'book_return':
			      	include('book_return.php');
			        break;
			      case 'book_list':
			      	include('book_list.php');
			        break;
			      case 'add_book':
			      	include('add_book.php');
			        break;
			      case 'manage_books':
			      	include('manage_books.php');
			        break;
			      case 'search_book':
			      	include('search_book.php');
			        break;
			      case 'create_user':
			      	include('create_user.php');
			        break;
			      case 'manage_users':
			      	include('manage_users.php');
			        break;
			      case 'change_password':
			        include('change_password.php');
			        break;
			      }
		 	}else{
		 		//include('home.php');
		 	}
		 	?>	
		<!-- content ends -->
		
		<!-- footer -->
			<?php include('footer.php'); ?>
		<!-- footer ends -->
	</body>
</html>
<?php
	}else{
		/* if not logged in, redirect to login page */
		header("Location: login.php");
	}
?>