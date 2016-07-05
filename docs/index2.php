<?php
// REQUIRED
require 'sql.php';
require 'header.php';
?>

	<!-- Page Content -->
    	<!--<div class="container">-->

	<div id="myCarousel" class="carousel slide" data-ride="carousel">
      	<!-- Indicators -->
      	<ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
	<li data-target="#myCarousel" data-slide-to="3"></li>
	<li data-target="#myCarousel" data-slide-to="4"></li>
      	</ol>
      	<div class="carousel-inner">
	
<?php
$query = "SELECT * FROM $video_table ORDER BY ID DESC";
$result = mysql_query($query) or die(mysql_error());

$count = 1;

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

		if ($count < 5)
		{
			echo "
				<div class=\"item
			";
			
			if ($count == 1)
			{
				echo "active";
			}

			echo "
				\">
          			<img src=\"" . $image . "\" alt=\"Slide\">
          			<div class=\"container\">
            			<div class=\"carousel-caption\">
              			<h1>" . $title . "</h1>
              			<p>" . $snippet . "</p>
              			<p><a class=\"btn btn-lg btn-primary\" href=\"#\" role=\"button\">Watch <span class=\"glyphicon glyphicon-chevron-right\"></span></a></p>
            			</div>
          			</div>
        			</div>
			";
		}

		elseif ($count == 5)
		{
			echo "
				<div class=\"item\">
                                <img src=\"" . $image . "\" alt=\"Slide\">
                                <div class=\"container\">
                                <div class=\"carousel-caption\">
                                <h1>" . $title . "</h1>
                                <p>" . $snippet . "</p>
                                <p><a class=\"btn btn-lg btn-primary\" href=\"#\" role=\"button\">Watch <span class=\"glyphicon glyphicon-chevron-right\"></span></a></p>
                                </div>
                                </div>
                                </div>

				</div>
      				<a class=\"left carousel-control\" href=\"#myCarousel\" role=\"button\" data-slide=\"prev\"><span class=\"glyphicon glyphicon-chevron-left\"></span></a>
      				<a class=\"right carousel-control\" href=\"#myCarousel\" role=\"button\" data-slide=\"next\"><span class=\"glyphicon glyphicon-chevron-right\"></span></a>
    				</div><!-- /.carousel -->
				<div class=\"container\">
			";
		}

		else
		{
			echo "
				<!--Start Thumbnail-->
				<div class=\"row\">
				<div class=\"col-md-5\">
                		<a href=\"#\">
                    		<img class=\"img-responsive\" src=\"" . $image . "\" alt=\"\">
                		</a>
            			</div>
            			<div class=\"col-md-7\">
                		<h3>" . $title . "</h3>
                		<p>" . $snippet . "</p>
                		<a class=\"btn btn-primary\" href=\"post.php?id=" . $id . "\">Watch <span class=\"glyphicon glyphicon-chevron-right\"></span></a>
            			</div>
				</div>
				<!--End Thumbnail-->
				<hr>
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

<?php
require 'footer.php';
?>
