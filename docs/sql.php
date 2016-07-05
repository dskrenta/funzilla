<?php
// sql.php

// Vars
$host = "localhost"; // Host name 
$username = "fundb"; // Mysql username 
$password = "fundba838"; // Mysql password 
$db_name = "fundb"; // Database name 
$video_table = "videos2"; // Table name
$community_table = "community";
$user_table = "users2";
$images_table = "imageStore";

// Connect to server and select database.
$conn = mysqli_connect($host, $username, $password, $db_name)or die("cannot connect");
mysqli_select_db($conn, "$db_name")or die("cannot select DB");

?>
