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

<?php
	if(!empty($_GET["id"]))
	{
		// Content meta tags
		$get_id = $_GET["id"];

		$openGraphQuery = "SELECT * FROM $video_table WHERE ID='$get_id'";
		$openGraphAction = mysqli_query($conn, $openGraphQuery) or die(mysqli_error($conn));

		if($openGraphAction)
		{
        		while ($ogrow = mysqli_fetch_array($openGraphAction))
        		{
				// str_replace("world","Peter","Hello world!");

                		$ogid = $ogrow["ID"];
                		$ogdate = $ogrow["date"];
                		$ogtitle = str_replace("\"", "'", urldecode($ogrow["title"]));
                		$ogsnippet = str_replace("\"", "'", urldecode($ogrow["snippet"]));
                		$ogurl = $ogrow["url"];
                		$ogimage = $ogrow["image"];
                		$ogembed = $ogrow["embed"];
                		$ogvotes = $ogrow["votes"];
       		 	}

			echo "
				<meta property=\"og:site_name\" content=\"Funzilla.tv\"/>
				<meta property=\"og:title\" content=\"" . $ogtitle . " | Funzilla.tv\"/>
				<meta property=\"og:description\" content=\"" . $ogsnippet . "\"/>
				<meta property=\"og:url\" content=\"http://funzilla.tv/post.php?id=" . $id . "\"/>
				<meta property=\"og:image\" content=\"" . $ogimage . "\"/>

				<meta name=\"twitter:site\" content=\"funzilla.tv\"/>
				<meta name=\"twitter:url\" content=\"http://funzilla.tv/post.php?id=" . $id . "\"/>
				<meta name=\"twitter:description\" content=\"" . $ogsnippet . "\"/>
				<meta name=\"twitter:domain\" content=\"funzilla.tv\">
				<meta name=\"twitter:image\" content=\"" . $ogimage . "\"/>

				<title>" . $ogtitle . " - Funzilla.tv</title>
			";
		}

		else
		{
        		// Failure
		}

	}

	else
	{
		// Regular meta tags
		echo "
			<meta property=\"og:site_name\" content=\"Funzilla.tv\"/>
                       	<meta property=\"og:title\" content=\"Funzilla.tv\"/>
                   	<meta property=\"og:description\" content=\"You are looking at the Funzilla.tv! Funzilla.tv is the easiest way to have fun!\"/>
                   	<meta property=\"og:url\" content=\"http://funzilla.tv\"/>
                     	<meta property=\"og:image\" content=\"images/smiley.png\"/>

                    	<meta name=\"twitter:site\" content=\"funzilla.tv\"/>
                     	<meta name=\"twitter:url\" content=\"http://funzilla.tv\"/>
                    	<meta name=\"twitter:description\" content=\"You are looking at the Funzilla.tv! Funzilla.tv is the easiest way to have fun!\"/>
                     	<meta name=\"twitter:domain\" content=\"funzilla.tv\">
                     	<meta name=\"twitter:image\" content=\"images/smiley.png\"/>

                    	<title>Funzilla.tv</title>
		";
	}	
?>

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

<!-- start Mixpanel --><script type="text/javascript">(function(f,b){if(!b.__SV){var a,e,i,g;window.mixpanel=b;b._i=[];b.init=function(a,e,d){function f(b,h){var a=h.split(".");2==a.length&&(b=b[a[0]],h=a[1]);b[h]=function(){b.push([h].concat(Array.prototype.slice.call(arguments,0)))}}var c=b;"undefined"!==typeof d?c=b[d]=[]:d="mixpanel";c.people=c.people||[];c.toString=function(b){var a="mixpanel";"mixpanel"!==d&&(a+="."+d);b||(a+=" (stub)");return a};c.people.toString=function(){return c.toString(1)+".people (stub)"};i="disable track track_pageview track_links track_forms register register_once alias unregister identify name_tag set_config people.set people.set_once people.increment people.append people.track_charge people.clear_charges people.delete_user".split(" ");
for(g=0;g<i.length;g++)f(c,i[g]);b._i.push([a,e,d])};b.__SV=1.2;a=f.createElement("script");a.type="text/javascript";a.async=!0;a.src="//cdn.mxpnl.com/libs/mixpanel-2.2.min.js";e=f.getElementsByTagName("script")[0];e.parentNode.insertBefore(a,e)}})(document,window.mixpanel||[]);
mixpanel.init("ebf5fe3dbc989eeb6aef1fdcdf10f1d2");</script><!-- end Mixpanel -->

</head>

<body>

<?php
	require 'userLog.php';
?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
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
      version    : 'v2.1'
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

<script>
function login()
{
	$('#loginModal').modal('show')
}

function signUp()
{
	$('#signUpModal').modal('show')	
}

function sleep(milliseconds) 
{
	var start = new Date().getTime();
  	for (var i = 0; i < 1e7; i++) 
	{
    		if ((new Date().getTime() - start) > milliseconds)
		{
      			break;
    		}
  	}
}

function done()
{
	/*
	setTimeout(function ()
       	{
     		$.ajax({
             		type: "POST",
                    	url: "points.php",
                     	data: "points=10",
            	});

     	}, 0);
	sleep(100000000);
	$('#doneModal').modal('show')
	*/
}
</script>

<script type="text/javascript" src="http://vslider.admedia.com/?id=PjggPSU&style=2"></script>


<?php
	$countQuery = mysqli_query($conn, "SELECT * FROM $video_table");
     	$num_rows_rand = mysqli_num_rows($countQuery);

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
        		<!--<li><a href="post.php?id=<?php echo $random; ?>">Random</a></li>-->
			<!--<li><a href="fresh.php">Fresh</a></li>-->
			<!--<li><a href="community.php">Community</a></li>-->
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="http://facebook.com/funzillatv" target="_blank"><span style="color:#3b5998"><i class="fa fa-facebook fa-lg"></i></span></a></li>
			<li><a href="http://twitter.com/funzillatv" target="_blank"><span style="color:#21b0ec"><i class="fa fa-twitter fa-lg"></i></span></a></li>
			<li><a href="about.php"><i class="fa fa-info fa-lg"></i></a></li>
			<?php
				/*
				session_start();
				if(!empty($_SESSION["username"]))
				{
					$username = $_SESSION["username"];

					echo "
						<li class=\"dropdown\">
          					<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">" . $username . " <span class=\"caret\"></span></a>
          					<ul class=\"dropdown-menu\" role=\"menu\">
            					<li><a href=\"#\">Action</a></li>
            					<li class=\"divider\"></li>
            					<li><a href=\"#\">One more separated link</a></li>
          					</ul>
        					</li>
					";
				}
	
				else
				{
					echo "
						<li><a href=\"#\" onclick=\"login();\"><i class=\"fa fa-user fa-lg\"></i></a></li>
					";
				}
				*/

				if($loggedIn == "yes")
                                {
                                        echo "
                                                <li class=\"dropdown\">
                                                <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">" . $username . " <span class=\"caret\"></span></a>
                                                <ul class=\"dropdown-menu\" role=\"menu\">
						<li><a href=\"leaderboard.php\">Leaderboard <i class=\"fa fa-arrow-circle-o-up\"></i></a></li>
						<li><a href=\"#\">My Profile <i class=\"fa fa-user\"></i></a></li>
                                                <li><a href=\"#\">Starred Videos <i class=\"fa fa-star\"></i></a></li>
						<li><a href=\"#\">Pointunities <i class=\"fa fa-angellist\"></i></a></li>
						<li><a href=\"#\">Gold Exchange <i class=\"fa fa-exchange\"></i></a></li>
						<li><a href=\"#\">Ring Hunt <i class=\"fa fa-gift\"></i></a></li>
						<li class=\"divider\"></li>
                                                <li><a href=\"#\">" . $points . " Points <span style=\"color:green;\"><i class=\"fa fa-thumbs-o-up\"></i></span></a></li>
						<li><a href=\"#\">0 Gold <span style=\"color:green;\"><i class=\"fa fa-money\"></i></span></a></li>
						<li><a href=\"#\">Ring Level 0 <span style=\"color:green;\"><i class=\"fa fa-level-up\"></i></span></a></li>
						<li class=\"divider\"></li>
						<li><a href=\"#\">Settings <i class=\"fa fa-gear\"></i></a></li>
						<li><a href=\"logout.php\">Logout <i class=\"fa fa-sign-out\"></i></a></li>
                                                </ul>
                                                </li>
                                        ";
                                }
        
                                else
                                {
                                        echo "
						<!-- Log in -->
                                                <!-- <li><a href=\"#\" onclick=\"login();\"><i class=\"fa fa-user fa-lg\"></i></a></li> -->
                                        ";
                                }
			?>
		 </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
