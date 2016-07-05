<?php
// Required
require 'sql.php';

// Post vars plus security 
$email = mysql_real_escape_string($_POST["email"]);
//$username = mysql_real_escape_string($_POST["username"]);
$password = md5($_POST["password"]);

// Vars
$date = date("Y-m-d H:i:s");

// Query for user
$mysql = "SELECT * FROM $user_table WHERE email='$email' AND password='$password'";
$out = mysql_query($mysql) or die(mysql_error());

$num_rows = mysql_num_rows($out);

// User exists
if($num_rows > 0)
{
	while($row = mysql_fetch_array($out))
	{
		$username = $row["username"];
	}	

	// SESSION
        session_start();
        $_SESSION["email"] = $email;
        $_SESSION["username"] = $username;

        // Header Redirect
        header('Location: index.php');
}

// User does not exist
else
{
	// Throw error message
	echo "
		<h1>Sorry, the email or password you entered was incorrect.</h1>
	";
}

?>
