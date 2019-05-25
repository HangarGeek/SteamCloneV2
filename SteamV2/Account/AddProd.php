<head>

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>



 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="login.css">
  <title>Send Product for approval</title>

</head> 

<?php 
define('__ROOT__', dirname(dirname(__FILE__))); 

require_once(__ROOT__."/bend/db.php");



?> 
<div class="form-group">
<form name=sendapp action="bend/submitProd.php" method="post">
Name<br>
<input type="text" class="form-control" value=""  name="name"><br>
Description:<br>
<input type="text"class="form-control"  value="" name="desc">

Min:<br>
<input type="text"class="form-control"  value="" name="min">

Price (not working): <span id="pr"></span> €<br>
<div class="slider">
  <input type="range" min="1" max="100" value="1" class="slider" id="price" name="price">
</div> 



<button type="submit" class="form-control"  value="Submit"> Submit </button>
</form> 
</div>


<script>

var slider = document.getElementById("price");
var output = document.getElementById("pr");
output.innerHTML = slider.value;

slider.oninput = function() {
    output.innerHTML = this.value;
}

function PopUp(){
        document.getElementById('notice').style.display="none";
}
$(document).ready(function(){
   setTimeout(function(){
      PopUp();
   }, 200000);
});
</script>
