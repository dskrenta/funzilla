<?php
// REQUIRED
require 'sql.php';
require 'header.php';
?>

	<!-- Page Content -->
    	<div class="container">

	<div class="row">
	<div class="col-md-8">
	
	<p class="lead"><b>About Funzilla TV</b></p>
	<p>
		Funzilla is built to be your daily supply of Funny, Weird, Amazing, Cute and Awesome videos.<br/>
		Funzilla was developed at the September 2014 TechCrunch Disrupt Hackathon. 
	</p>
	
	<p class="lead">Additional Questitons</p>
	<p>Contact us at funzillatv@gmail.com for questions, suggestions, more information, and job oportunities.</p>

	</div>
	<div class="col-md-4">
		<div class="fb-like-box" data-href="https://www.facebook.com/funzillatv" data-width="100%" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
		<br /><br  />
		<p class="lead">FRESH VIDEOS</p>

		<?php
			$counter = mysql_query("SELECT * FROM $video_table");
                	$num_rows = mysql_num_rows($counter);	

			$start = rand(240, $num_rows);

			$sql = "SELECT * FROM $video_table ORDER BY ID DESC LIMIT $start, 10";
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

<hr></hr>

<!-- FOOTER -->
<footer>
<center>
<p>Funzilla.tv &copy; 2014</p>
</center>
</footer>

<?php
require 'footer.php';
?>
