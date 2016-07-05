<script>
/*
if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) 
{
        window.location.assign("postM.php?id=<?php echo $_GET["id"];?>")
}
*/
</script>

<?php
// REQUIRED
require 'sql.php';
//require 'header.php';

$get_id = $_GET["id"];

$next_id  = $get_id - 1;

$idcheck = "SELECT * FROM $video_table WHERE ID='$get_id'";
$idaction = mysql_query($idcheck) or die(mysql_error());

if (mysql_num_rows($idaction) > 0)
{
	// Exists

	while ($metarow = mysql_fetch_array($idaction))
        {
                $metaid = $metarow["ID"];
                $metadate = $metarow["date"];
                $metatitle = urldecode($metarow["title"]);
                $metasnippet = urldecode($metarow["snippet"]);
                $metaurl = $metarow["url"];
                $metaimage = $metarow["image"];
                $metaembed = $metarow["embed"];
                $metavotes = $metarow["votes"];
	}
}

else
{
	header("Location: post.php?id=$next_id");
}

require 'header.php';
?>

    <!-- Page Content -->
    <div class="container">

<?php
$query = "SELECT * FROM $video_table WHERE id='$get_id'";
$result = mysql_query($query) or die(mysql_error());

if ($result)
{
	while ($row = mysql_fetch_array($result))
        {
		$id = $row["ID"];
		$date = $row["date"];
		$title = urldecode($row["title"]);
		$snippet = urldecode($row["snippet"]);
		$url = $row["url"];
		$image = $row["image"];
		$embed = $row["embed"];
		$votes = $row["votes"];

		$urlShare = urlencode("http://funzilla.tv/post.php?id=" . $id);

		// Generate Embed Code
		$doc = new DOMDocument();
		$doc->loadHTML($embed);

		$src = $doc->getElementsByTagName('iframe')->item(0)->getAttribute('src');
		$src = str_replace("http://www.youtube.com/embed/","",$src);
	
		$videoId = $src;
		
		echo "
			<!--Start Video Embed-->
			<div class=\"row\">
			<div class=\"col-md-8\">
			<p class=\"lead\"><strong>" . $title . "</strong></p>
			<div class=\"embed-responsive embed-responsive-16by9\">
            		<!--Player-->
			<!--<div class=\"video-container\"><div id=\"player\"></div></div>-->
			" . $embed . "
			<!--End Player-->
			</div>
			<br />
			<p class=\"lead\">" . $snippet . "</p>
			<div class=\"row\">
			<div class=\"col-md-6\"><button type=\"button\" onclick=\"myFBShare('http://funzilla.tv/post.php?id=" . $id . "')\" class=\"btn btn-primary btn-lg btn-block active\"><i class=\"fa fa-facebook fa-lg\"></i> Share on Facebook</button></div>
			<div class=\"col-md-6\"><a href=\"https://twitter.com/share?url=" . $urlShare . "\" target=\"_blank\"><button type=\"button\" class=\"btn btn-info btn-lg btn-block active\" onclick=\"tweet()\"><i class=\"fa fa-twitter fa-lg\"></i> Tweet it</button></a></div>
			</div>
			</p>
			<p>
			<!--Comments Start-->
			<div id=\"disqus_thread\"></div>
    			<script type=\"text/javascript\">
        		/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        		var disqus_shortname = 'funzilla'; // required: replace example with your forum shortname
			/* * * DON'T EDIT BELOW THIS LINE * * */
        		(function() {
            		var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            		dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            		(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        		})();
    			</script>
    			<noscript>Please enable JavaScript to view the <a href=\"http://disqus.com/?ref_noscript\">comments powered by Disqus.</a></noscript>
    			<!--<a href=\"http://disqus.com\" class=\"dsq-brlink\">comments powered by <span class=\"logo-disqus\">Disqus</span></a>-->
			<!--Comments End-->
			</p>
			<p>
			<a href=\"post.php?id=" . $next_id . "\">
			<button type=\"button\" class=\"btn btn-default btn-lg btn-block\">Next Video <i class=\"glyphicon glyphicon-chevron-right\"></i></button>
			</a>
			</p>
			<p class=\"lead\">YOU MIGHT ALSO LIKE</p>
		";
	
		$mysql = "SELECT * FROM $video_table ORDER BY ID DESC LIMIT 10";
		$output = mysql_query($mysql) or die(mysql_error);

		if ($output)
		{
        		while ($display = mysql_fetch_array($output))
        		{
                		$m_id = $display["ID"];
                		$m_date = $display["date"];
                		$m_title = urldecode($display["title"]);
                		$m_snippet = urldecode($display["snippet"]);
                		$m_url = $display["url"];
                		$m_image = $display["image"];
                		$m_embed = $display["embed"];
                		$m_votes = $display["votes"];

				echo "
					<!--Start Thumbnail-->
                        		<div class=\"row\">
                        		<div class=\"col-md-5\">
                        		<a href=\"#\">
                        		<a href=\"post.php?id=" . $m_id . "\"><img class=\"img-responsive\" src=\"" . $m_image . "\" alt=\"\"></a>
                        		</a>
                        		</div>
                        		<div class=\"col-md-7\">
                        		<a href=\"post.php?id=" . $m_id . "\"><p class=\"lead\">" . $m_title . "</p></a>
                        		<p>" . $m_snippet . "</p>
                        		<a class=\"btn btn-primary\" href=\"post.php?id=" . $m_id . "\">Watch <span class=\"glyphicon glyphicon-chevron-right\"></span></a>
                        		</div>
                        		</div>
                        		<!--End Thumbnail-->
                        		<hr>
				";
			}
		}

		echo "
			<p>
			<a href=\"post.php?id=" . $next_id . "\">
			<button type=\"button\" class=\"btn btn-default btn-lg btn-block\">Next Video <i class=\"glyphicon glyphicon-chevron-right\"></i></button>
			</a>
			</p>
			</div>
            		<div class=\"col-md-4\">
			<p>
			<a href=\"post.php?id=" . $next_id . "\">
			<button type=\"button\" class=\"btn btn-danger btn-lg btn-block active\">Next Video <i class=\"glyphicon glyphicon-chevron-right\"></i></button>
			</a>
			</p>
			<p class=\"lead\">FRESH VIDEOS</p>
		";

		$counter = mysql_query("SELECT * FROM $video_table");
		$num_rows = mysql_num_rows($counter);

		$start = rand(240, $num_rows);

		$sql = "SELECT * FROM $video_table ORDER BY ID DESC LIMIT $start, 10";
		$action = mysql_query($sql) or die(mysql_error());

		if ($action)
		{
			while ($return = mysql_fetch_array($action))
			{
				$side_id = $return["ID"];
                		$side_date = $return["date"];
                		$side_title = urldecode($return["title"]);
                		$side_snippet = urldecode($return["snippet"]);
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

		else
		{
			// Failure
		}
				
		echo "
			</div>
			</div> <!--/row-->
		";
	}
}

else
{
	// Failure
}

		echo "
                        <script src=\"http://www.youtube.com/player_api\"></script>

                        <script>
    
                        // create youtube player
                        var player;

                        function onYouTubePlayerAPIReady() 
                        {
                                player = new YT.Player('player', 
                                {
                                        height: '360',
                                        width: '640',
                                        videoId: '" . $videoId . "',
                                        events: 
                                        {
                                                'onReady': onPlayerReady,
                                                'onStateChange': onPlayerStateChange
                                        }
                                });
                        }

                        // autoplay video
                        function onPlayerReady(event) 
                        {
                                event.target.playVideo();
				mixpanel.track(\"Video play\");
                        }

                        // when video ends
                        function onPlayerStateChange(event) 
                        {        
                                if(event.data === 0) 
                                {            
                                        //alert('done');
					mixpanel.track(\"Video end\");
					done();
                                }
                        }
    
                        </script>
                ";

?>

<script>
function tweet()
{
	mixpanel.track("Twitter share");
	// Point function
	/*
	setTimeout(function ()
        {
                $.ajax({
                        type: "POST",
                        url: "points.php",
                        data: "points=100",
                });

        }, 0);
	*/
}

function myFBShare(url)
{
        FB.ui({
                method: 'share_open_graph',
                action_type: 'og.likes',
                action_properties: JSON.stringify({
                        object: url,
                })
        }, function(response){});

	mixpanel.track("Facebook share");

	// Point function
	/*
	setTimeout(function ()
        {
                $.ajax({
                        type: "POST",
                        url: "points.php",
                        data: "points=100",
                });

        }, 0);
	*/
}
</script>

<!-- FOOTER -->
<footer>
<center>
<hr />
<p>Funzilla.tv &copy; 2014</p>
</center>
</footer>

<?php
require 'footer.php';
?>
