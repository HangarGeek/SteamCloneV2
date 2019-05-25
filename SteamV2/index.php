<!DOCTYPE html>
<?php
session_start();
include "Message/message.php";

?>
<html>

<head>
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>
<script>
window.addEventListener("load", function(){
window.cookieconsent.initialise({
  "palette": {
    "popup": {
      "background": "#252e39"
    },
    "button": {
      "background": "#14a7d0"
    }
  },
  "theme": "edgeless",
  "position": "top",
  "static": true
})});
</script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SteamV2</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body style="background-color:#21394b;">
    <nav class="navbar navbar-light navbar-expand-md navigation-clean-search" style="background-image:linear-gradient(to bottom, rgb(30,29,29) , #21394b);">
        <div class="container"><a class="navbar-brand" href="#" style="color:rgba(204,202,202,0.9);">Uun Logo</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="Prod/index.php" style="color:rgba(204,202,202,0.9);">Tienda</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#" style="color:rgba(204,202,202,0.9);">Biblioteca</a></li>
                    
                 <?php 
                 
                 if(isset($_SESSION['name'])){
                 echo  ' <li class="nav-item" role="presentation"><a class="nav-link" href="Account" style="color:rgba(204,202,202,0.9);">'. $_SESSION['name'] .'</a></li>'; 
                 }else{
                    echo  ' <li class="nav-item" role="presentation"><a class="nav-link" href="Account/login.php" style="color:rgba(204,202,202,0.9);">Login</a></li>';   
                 }
                 ?>
                </ul>
            <form class="form-inline" >
                   <i class="fa fa-search"></i></label><input class="form-control search-field" autocomplete="off"type="text" name="search" id="s" style="color:rgba(204,202,202,0.9); background-color:transparent"></div>
                </form>
        </div>
        </div>
    </nav>
   
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="assets/js/script.min.js"></script>
    <script src=" https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>
    

</body>

</html>


<?php 
$mes = new message();
if($_GET != null){
  if($_GET == 'search'){
    $name = $_GET['search'];
    header("Location: Prod/index.php?byname=$name");
  }else{
   $mes->GetPostFromURI();
  }
  }else{
    $mes->GetPostList( );
  }

/*
 -------------------------------------------------------------------------------
*/





?>


<style>
.post{
    width: 55%;
    margin: 5em auto;
    padding: 50px;
    background-color: rgba(102, 204, 255, 0.1);
    border-radius: 1em;
    float: center;


}

.div1{
  border: 1px solid limegreen;
  border-radius: 1em;
}

.div2{
  border: 1px solid red;
  border-radius: 1em;
}

body{
  font-family: 'Roboto', sans-serif; 
}
    </style>