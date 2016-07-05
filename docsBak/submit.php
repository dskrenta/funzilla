<?php
// Required Files
require 'sql.php';
require 'functions.php';

// Post url
$url = mysql_real_escape_string($_POST["url"]);

// Date
$date = date("Y-m-d H:i:s");

// Open Graph
$og = fetch_og($url);

$ogimage = $og['image'];
$ogtitle = $og['title'];
$ogdescription = $og['description'];

$trimmed = str_replace("'", "", $ogtitle);
$trimmed = str_replace("|", "", $ogtitle);

//die($trimmed);

$trim2 = str_replace("'", "", $ogdescription);

// Generate Embed Code
parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
$video = $my_array_of_vars['v'];

$embed = "<iframe class=\"embed-responsive-item\" src=\"http://www.youtube.com/embed/" . $video . "\" frameborder=\"0\" allowfullscreen></iframe>";

// Insert data into mysql 
$sql = "INSERT INTO $community_table (date, title, snippet, url, image, embed, votes) VALUES ('$date', '$trimmed', '$trim2', '$url', '$ogimage', '$embed', '0')";
$result = mysql_query($sql) or die(mysql_error());

// Redirect Home
header('Location: http://funzilla.tv');
?>
