<?php
include('include/connection.php');
$isbnno = $_GET['delete'];
/*remove query*/
$query = 'DELETE FROM `books_1` WHERE `isbn` = "'.$isbnno.'"';
if(mysqli_query($con,$query)){
	header('Location: index.php?page=inventory&sub=manage_books&status=1');
}else{
	header('Location: index.php?page=inventory&sub=manage_books&status=0');
}
?>