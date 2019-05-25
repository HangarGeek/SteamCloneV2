<head>

<?php  
if(isset($_COOKIE["register"]) &&  $_COOKIE["register"]==1){
	echo '<div class="alert alert-success">
  Account created! You may now log in
</div>';
unset($_COOKIE["register"]);
setcookie("register", "", time()-3600, "/");

}else if(isset($_COOKIE["error"])){
	echo '<div class="alert alert-warning">
  Something went wrong on our end
</div>';
unset($_COOKIE["error"]);
setcookie("error", "", time()-3600, "/");

}else if(isset($_COOKIE["wrong"])){
	echo '<div class="alert alert-danger">
  Password or username is incorrect. Password and username <bold>are</bold> case sensitive
</div>';
unset($_COOKIE["wrong"]);
setcookie("wrong", "", time()-3600, "/");
}
?>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

  <title>Flintlock Barrel - Login</title>

  <link rel="stylesheet" type="text/css" href="login.css">


</head>





 <div class="text-center" style="padding:50px 0">

	<div class="logo">Login</div>

    <img src=" " height="120px" width="120px"></img>

  <div class="text-center" style="padding:50px 0">

	  <div class="login-form-1">

		  <form id="login-form" method="post" class="text-left" action="bend/login.php">

		  	<div class="login-form-main-message"></div>

			  <div class="main-login-form">

			  	<div class="login-group">

				  	<div class="form-group">

					  	<label for="Usernam" class="sr-only">Username</label>

						  <input type="text" class="form-control" id="lg_username" name="user" placeholder="Username..">

					</div>

					<div class="form-group">

						<label for="pwd" class="sr-only">Password</label>

						<input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password..">

					</div>

				</div>

				<button type="submit" class="login-button" value="Login"><i class="fa fa-chevron-right"></i></button>

			</div>

			<div class="etc-login-form">

				<p><a href="#">Forgot your password?</a></p>

				<p><a href="register.php">New user?</a></p>

			</div>

		</form>

	</div>
