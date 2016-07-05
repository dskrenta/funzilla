<?php
// userLog.php

session_start();

if(!empty($_SESSION["username"]))
{
	// Logged in
	$username = $_SESSION["username"];
	$email = $_SESSION["email"];

	$loggedIn = "yes";

	// Query for user
	$mysql = "SELECT * FROM $user_table WHERE email='$email'";
	$out = mysql_query($mysql) or die(mysql_error());

	while($row = mysql_fetch_array($out))
	{
		$points = $row["points"];
	}	
}

else
{
	// Not logged in
	$loggedIn = "no";
}


?>
