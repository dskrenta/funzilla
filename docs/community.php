<?php
// REQUIRED
require 'sql.php';
require 'header.php';
?>

	<!-- Page Content -->
    	<div class="container">

	<div class="row">
	<div class="col-md-8">
	
	<p class="lead">COMMUNITY</p>

<?php
$query = "SELECT * FROM $community_table ORDER BY ID DESC LIMIT 100";
$result = mysql_query($query) or die(mysql_error());

if ($result)
{
	while($row = mysql_fetch_array($result))
        {
		$id = $row["ID"];
		$date = $row["date"];
		$title = $row["title"];
		$snippet = $row["snippet"];
		$url = $row["url"];
		$image = $row["image"];
		$embed = $row["embed"];
		$votes = $row["votes"];

		echo "
			<!--Start Thumbnail-->
			<div class=\"row\">
			<div class=\"col-md-5\">
                	<a href=\"#\">
                    	<a href=\"post.php?id=" . $id . "\"><img class=\"img-responsive\" src=\"" . $image . "\" alt=\"\"></a>
                	</a>
            		</div>
            		<div class=\"col-md-7\">
                	<a href=\"post.php?id=" . $id . "\"><p class=\"lead\">" . $title . "</p></a>
                	" . $snippet . "
            		</div>
			</div>
			<hr />
			<!--End Thumbnail-->
		";
	}
}

else
{
	// Failure
}


?>

	</div>
	<div class="col-md-4">
		<div class="fb-like-box" data-href="https://www.facebook.com/funzillatv" data-width="100%" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
		<br /><br  />
		<p class="lead">FRESH VIDEOS</p>

		<?php
			$counter = mysql_query("SELECT * FROM $video_table");
                	$num_rows = mysql_num_rows($counter);	

			$start = rand(0, $num_rows);

			$sql = "SELECT * FROM $video_table ORDER BY ID DESC LIMIT $start, 10";
                	$action = mysql_query($sql) or die(mysql_error());

                	if ($action)
                	{
                        	while ($return = mysql_fetch_array($action))
                        	{
                                	$side_id = $return["ID"];
                                	$side_date = $return["date"];
                                	$side_title = $return["title"];
                                	$side_snippet = $return["snippet"];
                                	$side_url = $return["url"];
                                	$side_image = $return["image"];
                                	$side_embed = $return["embed"];
                                	$side_votes = $return["votes"];

                                	echo "
                                        	<p>
                                        	<a href=\"post.php?id=" . $side_id . "\"><img src=\"" . $side_image . "\" class=\"img-responsive\"></img></a>
                                        	<a href=\"post.php?id=" . $side_id . "\"><p class=\"lead\">" . $side_title . "</p></a>
                                        	</p>
                                	";
                        	}
               	 	}
		?>
	
	</div>
	</div>

<!-- FOOTER -->
<footer>
<center>
<p>Funzilla.tv &copy; 2014</p>
</center>
</footer>

<?php
require 'footer.php';
?>
