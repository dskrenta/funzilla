<?php
// Required
require 'sql.php';

// Post vars plus security 
$email = mysql_real_escape_string($_POST["email"]);
$username = mysql_real_escape_string($_POST["username"]);
$password = md5($_POST["password"]);

// Vars
$date = date("Y-m-d H:i:s");

// Query for user
$mysql = "SELECT count(email) as total FROM $user_table WHERE email='$email'";
$out=mysql_query($mysql) or die(mysql_error());

$row = mysql_fetch_assoc($out);

// User exists
if( $row['total'] > 0)
{
	// Throw error message
	echo "<h1>Sorry, user already exists. Go back</h1>";
}

// User does not exist
else
{
        // Insert data into mysql 
        $sql = "INSERT INTO $user_table (date, email, username, password, points)VALUES('$date', '$email', '$username', '$password', '10')";
        $result = mysql_query($sql);

        // SESSION
        session_start();
        $_SESSION["email"] = $email;
        $_SESSION["username"] = $username;

        // Header Redirect
        header('Location: index.php');
}

?>
