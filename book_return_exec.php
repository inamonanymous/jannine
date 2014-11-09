<?php
	include('include/connection.php');
	$issuedno = mysql_real_escape_string($_GET['issueno']);
	$query = 'DELETE FROM `issuedbook` WHERE `issueno` = '.$issuedno;
	if(mysql_query($query)){
		header("Location: index.php??page=book_transaction&sub=book_return&status=returned");
	}else{
		header("Location: index.php??page=book_transaction&sub=book_return&status=failed");
	}
?>