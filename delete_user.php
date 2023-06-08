<?php
include('include/connection.php');
$user_id = $_GET['delete'];
/*remove query*/
$query = 'DELETE FROM `users` WHERE `userid` = "'.trim($user_id).'"';
if(mysqli_query($con,$query)){
	header('Location: index.php?page=administrator&sub=manage_users&status=1');
}else{
	header('Location: index.php?page=administrator&sub=manage_users&status=0');
}
?>