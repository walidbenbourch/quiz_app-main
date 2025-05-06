<?php 

// Create connection credentials
$db_host = 'localhost';
$db_name = 'quiz_app.sql';
$db_user = 'root';
$db_pass = '';

// Create mysqli object
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Error handler
if ($mysqli->connect_error) {
  printf("Connection to database failed: %s\n", $mysqli->connect_errno);
  exit();
}
