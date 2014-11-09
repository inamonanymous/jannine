<?php
/*
  Document   : connection
  Created on : 
  Author     : 
  Description:
  `	Database initials
 */
  $server   = 'localhost';
  $username = 'root';
  $password = 'root';
  $dbname   = 'lms';
  $con      = mysql_connect($server, $username, $password);

  if(!$con){
      die('Couldn\'t established connection to server because '.mysql_error()); 
  }else{
      if(!mysql_select_db($dbname)){
			echo 'Required database not found. Please export the db file into database';
      }
  }
?>
