<?php
// Required
require 'sql.php';

// GETs
$uid = $_GET["uid"];
$name = $_GET["name"];
$email = $_GET["email"];

// Vars
$date = date("Y-m-d H:i:s");
$img = "http://graph.facebook.com/" . $uid . "/picture";

// Query for user
$mysql = "SELECT count(uid) as total FROM $user_table WHERE uid='$uid'";
$out=mysql_query($mysql) or die(mysql_error());

$row = mysql_fetch_assoc($out);

// User exists
if( $row['total'] > 0)
{
	// SESSION
      	session_start();
   	$_SESSION["uid"] = $uid;
     	$_SESSION["name"] = $name;
     	$_SESSION["email"] = $email;

     	// Header Redirect
      	header('Location: index.php');
}

// User does exists
else
{
   	// Insert data into mysql 
    	$sql="INSERT INTO $user_table (date, uid, name, email, img, points)VALUES('$date', '$uid', '$name', '$email', '$img', '0')";
     	$result=mysql_query($sql);

      	// SESSION
   	session_start();
     	$_SESSION["uid"] = $uid;
     	$_SESSION["name"] = $name;
    	$_SESSION["email"] = $email;

    	// Header Redirect
   	header('Location: index.php');
}
?>
