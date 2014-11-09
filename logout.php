<?php
	/* unset all the session variables */
	session_start();
	unset($_SESSION['username']);
	session_destroy();
	/* and then redirect to login page */
	header('Location: login.php');
?>