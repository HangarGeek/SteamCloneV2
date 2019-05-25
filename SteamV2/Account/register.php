<head>

<?php  
if(isset($_COOKIE["register"]) &&  $_COOKIE["register"]==2){
	echo '<div class="alert alert-danger">
  Failed to create account!
</div>';
unset($_COOKIE["register"]);
setcookie("register", "", time()-3600, "/");
}
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

  <title>Register</title>

  <link rel="stylesheet" type="text/css" href="login.css">





</head>



<div class="text-center" style="padding:50px 0">

	<div class="logo">Registration</div>

    <img src="logo" height="120px" width="120px"></img>

  <div class="text-center" style="padding:50px 0">

	  <div class="login-form-1">

		  <form id="login-form" method="post" class="text-left" action="bend/register.php">

		  	<div class="login-form-main-message"></div>

			  <div class="main-login-form">

			  	<div class="login-group">

				  	<div class="form-group">

					  	<label for="Usernam" class="sr-only">Username:</label>

						  <input type="text" class="form-control" id="lg_username" name="user" placeholder="Username..">

					</div>

          <div class="form-group">

					  	<label for="email" class="sr-only">Email:</label>

						  <input type="email" class="form-control" id="lg_email" name="mail" placeholder="user@example.com">

					</div>

					<div class="form-group">

						<label for="pwd" class="sr-only">Password:</label>

						<input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password..">

					</div>

				</div>

				<button type="submit" class="login-button" value="Login"><i class="fa fa-chevron-right"></i></button>

			</div>

			<div class="etc-login-form">

				<p><a href="login.php">Already registered?</a></p>

        <p><a href="../index.html">Main Site</a></p>

			</div>

		</form>

	</div>

</div>
