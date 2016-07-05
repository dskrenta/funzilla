<?php
require 'sql.php';
require 'userLog.php';

$getPoints = $_POST["points"];
$newPoints = $points + $getPoints; 

if ($loggedIn = "yes")
{
	// Logged in 
        $mysql = "UPDATE $user_table SET points='$newPoints' WHERE email='$email'";
        $out = mysql_query($mysql) or die(mysql_error());
}

else
{
	// Not logged in 
}

?>
