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
                $metatitle = $metarow["title"];
                $metasnippet = $metarow["snippet"];
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

$openGraphQuery = "SELECT * FROM $video_table WHERE ID='$get_id'";
$openGraphAction = mysql_query($openGraphQuery) or die(mysql_error());

if($openGraphAction)
{
	while ($ogrow = mysql_fetch_array($openGraphAction))
        {
                $ogid = $ogrow["ID"];
                $ogdate = $ogrow["date"];
                $ogtitle = $ogrow["title"];
                $ogsnippet = $ogrow["snippet"];
                $ogurl = $ogrow["url"];
                $ogimage = $ogrow["image"];
                $ogembed = $ogrow["embed"];
                $ogvotes = $ogrow["votes"];
        }
}

else
{
	// Failure
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<link rel="canonical" href="http://funzilla.tv" />

<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta name="description" content="You are looking at the Funzilla.tv! Funzilla.tv is the easiest way to have fun!"/>
<meta name="keywords" content="Funzilla, tv, video, jokes, interesting, cool, fun collection, fun portfolio, admire, fun, humor, humour, just for fun"/>
<meta name="author" content="Funzilla.tv">

<meta property="og:site_name" content="Funzilla.tv"/>
<!--<meta property="og:type" content="blog"/>-->
<meta property="og:title" content="<?php echo $ogtitle; ?> | Funzilla.tv"/>
<meta property="og:description" content="<?php echo $ogsnippet; ?>"/>
<meta property="og:url" content="http://funzilla.tv/post.php?id=<?php echo $id; ?>"/>
<meta property="og:image" content="<?php echo $ogimage; ?>"/>

<meta name="twitter:site" content="funzilla.tv" />
<meta name="twitter:url" content="http://funzilla.tv/post.php?id=<?php echo $id; ?>"/>
<meta name="twitter:description" content="<?php echo $ogsnippet; ?>"/>
<meta name="twitter:domain" content="funzilla.tv">
<meta name="twitter:image" content="<?php echo $ogimage; ?>"/>

<title><?php echo $ogtitle; ?> - Funzilla.tv</title>

<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/smiley.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/smiley.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/smiley.png">
<link rel="apple-touch-icon-precomposed" href="images/smiley.png">
<link rel="shortcut icon" href="images/smiley.png">

<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="css/style.css" rel="stylesheet">
<link href="css/slides.css" rel="stylesheet">
<link href="awesome/css/font-awesome.css" rel="stylesheet">

<style>
.fb-comments, .fb-comments iframe[style], .fb-like-box, .fb-like-box iframe[style] {width:  100% !important;}
.fb-comments span, .fb-comments iframe span[style], .fb-like-box span, .fb-like-box iframe  span[style] {width: 100% !important;}
</style>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="js/unveil.js"></script>

<script>
$(document).ready(function() {
  //$("img").trigger("unveil");
   //$("img").unveil(300);
});

$(function() {
   $(".unveil").trigger("unveil");
   $("img").unveil(300);
});
</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-54534539-1', 'auto');
  ga('send', 'pageview');

</script>

<script>
window.fbAsyncInit = function() {
        FB.init({
                appId      : '677515572339559',
                xfbml      : true,
                version    : 'v2.0'
        });
};

(function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

<?php
        $countQuery = mysql_query("SELECT * FROM $video_table");
        $num_rows_rand = mysql_num_rows($countQuery);

        $random = rand(240, $num_rows_rand);
?>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><strong><span style="color:black">FUNZILLA</span><span style="color:red"> TV</span></strong></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
        		<li><a href="post.php?id=<?php echo $random; ?>">Random</a></li>
			<li><a href="fresh.php">Fresh</a></li>
			<!--<li><a href="community.php">Community</a></li>-->
		</ul>
		<ul class="nav navbar-nav navbar-right">
                        <li><a href="http://facebook.com/funzillatv" target="_blank"><span style="color:#3b5998"><i class="fa fa-facebook fa-lg"></i></span></a></li>
                        <li><a href="http://twitter.com/funzillatv" target="_blank"><span style="color:#21b0ec"><i class="fa fa-twitter fa-lg"></i></span></a></li>
                        <li><a href="about.php"><i class="fa fa-info fa-lg"></i></a></li>
		</ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

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
		$title = $row["title"];
		$snippet = $row["snippet"];
		$url = $row["url"];
		$image = $row["image"];
		$embed = $row["embed"];
		$votes = $row["votes"];

		$urlShare = urlencode("http://funzilla.tv/post.php?id=" . $id);

		echo "
			<!--Start Video Embed-->
			<div class=\"row\">
			<div class=\"col-md-8\">
			<p class=\"lead\"><strong>" . htmlspecialchars_decode($title) . "</strong></p>
			<div class=\"embed-responsive embed-responsive-16by9\">
            		" . $embed . "
			</div>
			<br />
			<p class=\"lead\">" . htmlspecialchars_decode($snippet) . "</p>
			<div class=\"row\">
			<div class=\"col-md-6\"><button type=\"button\" onclick=\"myFBShare('http://funzilla.tv/post.php?id=" . $id . "')\" class=\"btn btn-primary btn-lg btn-block active\"><i class=\"fa fa-facebook fa-lg\"></i> Share on Facebook</button></div>
			<div class=\"col-md-6\"><a href=\"https://twitter.com/share?url=" . $urlShare . "\" target=\"_blank\"><button type=\"button\" class=\"btn btn-info btn-lg btn-block active\"><i class=\"fa fa-twitter fa-lg\"></i> Tweet it</button></a></div>
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
                		$m_title = $display["title"];
                		$m_snippet = $display["snippet"];
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

?>

<script>
function myFBShare(url)
{
        FB.ui({
                method: 'share_open_graph',
                action_type: 'og.likes',
                action_properties: JSON.stringify({
                        object: url,
                })
        }, function(response){});
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
