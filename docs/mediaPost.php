<?php
// REQUIRED
require 'sql.php';
require 'header.php';
?>

	<!-- Page Content -->
    	<div class="container">

	<div class="row">
	<div class="col-md-8">
	

<?php
$passed_id = $_GET['id'];

$query = "SELECT * FROM $images_table WHERE ID='$passed_id'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

if (mysqli_num_rows($result) > 0) 
{
    	while($row = mysqli_fetch_array($result)) 
	{
		$id = $row['id'];
		$title = $row['title'];
		$images = json_decode($row['images']);
       		

		echo "<h1>" . $title . "</h1>";
		foreach($images as $element)
		{
			echo "<img src=\"" . $element->image. "\" onerror=\"this.style.display = 'none'\"></img>";
			echo "<h3>" . $element->header . "</h3>";
			echo "<p class=\"lead\">" . $element->description . "</p>";
		}
    	}
} 
else 
{
	echo "0 results";
}

?>

	</div>
	<div class="col-md-4">
		<div class="fb-like-box" data-href="https://www.facebook.com/funzillatv" data-width="100%" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
		<hr />
		<center>
		<iframe src="http://rcm-na.amazon-adsystem.com/e/cm?t=harvix02-20&o=1&p=12&l=ur1&category=primegift&banner=10BSGCHPCJG0HZN45H82&f=ifr&lc=pf4&linkID=LOJCVDR2AERT4QCD" width="300" height="250" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>
		</center>
		<!--
		<hr />
		<p class="lead">FRESH VIDEOS</p>
		-->		

		<?php
			/*
			$counter = mysqli_query($conn, "SELECT * FROM $video_table");
                	$num_rows = mysqli_num_rows($counter);	

			$start = rand(240, $num_rows);

			$sql = "SELECT * FROM $video_table ORDER BY ID DESC LIMIT $start, 10";
                	$action = mysqli_query($conn, $sql) or die(mysqli_error($conn));

			$sideCount = 0;

                	if ($action)
                	{
                        	while ($return = mysqli_fetch_array($action))
                        	{
                                	$side_id = $return["ID"];
                                	$side_date = $return["date"];
                                	$side_title = urldecode($return["title"]);
                                	$side_snippet = urldecode($return["snippet"]);
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
                                                        <a href=\"post.php?id=" . $side_id . "\"><p class=\"lead\">" . $side_title . "</p></a>
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
                                        		<a href=\"post.php?id=" . $side_id . "\"><p class=\"lead\">" . $side_title . "</p></a>
                                        		</p>
                                		";
					}

					$sideCount++;
                        	}
               	 	}
			*/
		?>
		
	
	</div>
	</div>

<!-- FOOTER -->
<footer>
<center>
<p>Funzilla.tv &copy; <span id="date"></span></p>
</center>
</footer>

<?php
require 'footer.php';
?>
