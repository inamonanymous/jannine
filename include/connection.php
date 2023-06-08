<?php
/*
  Document   : connection
  Created on : 
  Author     : 
  Description:
  `	Database initials
 */

$server = 'localhost';
$username = 'root';
$password = 'password';
$dbname = 'lms';

$con = mysqli_connect($server, $username, $password, $dbname);

if (!$con) {
    die('Couldn\'t establish connection to server because ' . mysqli_connect_error());
} else {
    echo 'Connected to the database successfully.';
    // Additional code logic here
}


?>
