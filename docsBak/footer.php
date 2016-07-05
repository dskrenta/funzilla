<!-- Modal Uplaod -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalUpload" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Submit a video</h4>
      </div>
      <div class="modal-body">
         <form role="form" method="post" action="submit.php">
         <div class="form-group">
             <label for="exampleInputEmail1">Youtube URL:</label>
             <input type="text" class="form-control" name="url" id="exampleInputEmail1" placeholder="Ex: https://www.youtube.com/watch?v=JnB9bvud6IU">
         </div>
         <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
         </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal SignIn -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Login</h4>
      </div>
      <div class="modal-body">
         <form role="form" action="signIn.php" method="post">
  	    <div class="form-group">
               <label for="exampleInputEmail1">Email</label>
               <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
            </div>
            <div class="form-group">
               <label for="exampleInputPassword1">Password</label>
               <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
      </div>
      <div class="modal-footer">
	<span style="float:left;"><a href="#" data-dismiss="modal" onclick="signUp();">Sign up</a></span>
        <button type="submit" class="btn btn-primary">Login</button>
	 </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal SignUp -->
<div class="modal fade" id="signUpModal" tabindex="-1" role="dialog" aria-labelledby="signUpModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Sign Up</h4>
      </div>
      <div class="modal-body">
         <form role="form" action="signUp.php" method="post">
            <div class="form-group">
               <label for="exampleInputEmail1">Email</label>
               <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
            </div>
	    <div class="form-group">
               <label for="exampleInputPassword1">Username</label>
               <input type="text" name="username" class="form-control" id="exampleInputPassword1" placeholder="Username">
            </div>
            <div class="form-group">
               <label for="exampleInputPassword1">Password</label>
               <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
      </div>
      <div class="modal-footer">
        <span style="float:left;"><a href="#" data-dismiss="modal" onclick="login();">Login</a></span>
        <button type="submit" class="btn btn-primary">Sign Up</button>
         </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Done -->
<div class="modal fade" id="doneModal" tabindex="-1" role="dialog" aria-labelledby="doneModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Points awarded!</h4>
      </div>
      <div class="modal-body">
	<center>
        <p class="lead">10 Points!</p>
	<span style="color:green;"><i class="fa fa-thumbs-o-up fa-5x"></i></span>
	<p></p>
        <?php
	  echo "
	    <div class=\"row\">
            <div class=\"col-md-6\"><button type=\"button\" onclick=\"myFBShare('http://funzilla.tv/post.php?id=" . $id . "')\" class=\"btn btn-primary btn-lg btn-block active\" data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"100 Points\"><i class=\"fa fa-facebook fa-lg\"></i> Share on Facebook</button></div>
            <div class=\"col-md-6\"><a href=\"https://twitter.com/share?url=" . $urlShare . "\" target=\"_blank\"><button type=\"button\" class=\"btn btn-info btn-lg btn-block active\" data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"100 Points\"><i class=\"fa fa-twitter fa-lg\"></i> Tweet it</button></a></div>
            </div>
          ";
	?>
	</center>
      </div>
      <div class="modal-footer">
        <?php
	  echo "
	    <a href=\"post.php?id=" . $next_id . "\">
            <button type=\"button\" class=\"btn btn-danger btn-lg btn-block active\">Next Video <i class=\"glyphicon glyphicon-chevron-right\"></i></button>
            </a>
	  ";
	?>
      </div>
    </div>
  </div>
</div>

<!--Share Dialog-->
<!--
<script>
function myFBShare()
{
	FB.ui({
     		method: 'share_open_graph',
     		action_type: 'og.likes',
     		action_properties: JSON.stringify({
      			object:'http://funzilla.tv',
     		})
    	}, function(response){});
}
</script>
-->

<!--Javascript SRC's-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/unveil.js"></script>

</body>
</html>
