<?php
// REQUIRED
require 'sql.php';
require 'header.php';
?>

	<!-- Page Content -->
    	<div class="container">

	<div class="row">
	<div class="col-md-8">
	
	<p class="lead">FRESH VIDEOS</p>

<?php
$countQuery = mysql_query("SELECT * FROM $video_table");
$num_rows_rand = mysql_num_rows($countQuery);

$random = rand(240, $num_rows_rand);

$query = "SELECT * FROM $video_table ORDER BY ID DESC LIMIT $random, 100";
$result = mysql_query($query) or die(mysql_error());

$count = 0;

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

		if($count < 5)
		{
			echo "
                        	<!--Start Thumbnail-->
                        	<div class=\"row\">
                        	<div class=\"col-md-5\">
                        	<a href=\"#\">
                       		<!--<a href=\"post.php?id=" . $id . "\"><img class=\"img-responsive unveil\" src=\"bg.png\" data-src=\"" . $image . "\" alt=\"\"/></a>-->
                        	<a href=\"post.php?id=" . $id . "\"><img class=\"img-responsive\" src=\"" . $image . "\" alt=\"\"/></a>
				</a>
                        	</div>
                        	<div class=\"col-md-7\">
                        	<a href=\"post.php?id=" . $id . "\"><p class=\"lead\">" . htmlspecialchars_decode($title) . "</p></a>
                        	" . htmlspecialchars_decode($snippet) . "
                        	</div>
                        	</div>
                        	<hr />
                        	<!--End Thumbnail-->
                	";
		}

		else
		{
			echo "
				<!--Start Thumbnail-->
				<div class=\"row\">
				<div class=\"col-md-5\">
                		<a href=\"#\">
                    		<a href=\"post.php?id=" . $id . "\"><img class=\"img-responsive\" src=\"bg.png\" data-src=\"" . $image . "\" alt=\"\"/></a>
                		</a>
            			</div>
            			<div class=\"col-md-7\">
                		<a href=\"post.php?id=" . $id . "\"><p class=\"lead\">" . htmlspecialchars_decode($title) . "</p></a>
                		" . htmlspecialchars_decode($snippet) . "
            			</div>
				</div>
				<hr />
				<!--End Thumbnail-->
			";
		}

		$count++;
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
		<p class="lead">MOST POPULAR</p>

		<?php
			/*
			$counter = mysql_query("SELECT * FROM $video_table");
                	$num_rows = mysql_num_rows($counter);	

			$start = rand(0, $num_rows);
			*/

			$sql = "SELECT * FROM $video_table ORDER BY ID DESC LIMIT 10";
                	$action = mysql_query($sql) or die(mysql_error());

			$sideCount = 0;

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

					if ($sideCount < 4)
					{
						echo "
                                                        <p>
                                                        <!--<img class=\"lazy\" data-src=\"examples/images/1.jpg\" src=\"\" border=\"0\" alt=\"Lazy Image\" />-->
                                                        <!--src=\"bg.png\" data-src=\"img2.jpg\"-->
                                                        <a href=\"post.php?id=" . $side_id . "\"><img src=\"" . $side_image . "\" class=\"img-responsive\"/></a>
                                                        <a href=\"post.php?id=" . $side_id . "\"><p class=\"lead\">" . htmlspecialchars_decode($side_title) . "</p></a>
                                                        </p>
                                                ";
					}

					else
					{
                                		echo "
                                        		<p>
							<!--<img class=\"lazy\" data-src=\"examples/images/1.jpg\" src=\"\" border=\"0\" alt=\"Lazy Image\" />-->
                                        		<!--src=\"bg.png\" data-src=\"img2.jpg\"-->
							<a href=\"post.php?id=" . $side_id . "\"><img src=\"bg.png\" data-src=\"" . $side_image . "\" class=\"img-responsive\"/></a>
                                        		<a href=\"post.php?id=" . $side_id . "\"><p class=\"lead\">" . htmlspecialchars_decode($side_title) . "</p></a>
                                        		</p>
                                		";
					}

					$sideCount++;
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
