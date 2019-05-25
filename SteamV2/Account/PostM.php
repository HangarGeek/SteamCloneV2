
<?php
session_start();
?>

<head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>



<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

 <link rel="stylesheet" type="text/css" href="login.css">
 <title>Send Product for approval</title>

</head> 
<body>
<div class="col-sm">
<div class="form-group">

<form name=submit action="../Message/idk.php" method="post">
</div>
<div class="form-group">
<label for="name">Name</label>
<?php echo '<input class="form-control" id="name" type="text" placeholder="'. $_SESSION['name'] .'" disabled>'; ?>
</div>
<div class="form-group">
<label for="rank">Rank</label>
<?php echo '<input class="form-control" id="rank" type="text" placeholder="'. $_SESSION['rank'] .'" disabled>' ?>
</div>
<div class="form-group">
<label for="title">Title</label>
<input type="text" class="form-control" value=""  name="title"><br>
</div>
<div class="form-group">
<label for="text">Text</label>
<textarea type="text"class="form-control"  value="" name="Text"></textarea>
</div>
<button type="submit" class="form-control"  value="Submit"> Submit </button>
</form> 
</div>
