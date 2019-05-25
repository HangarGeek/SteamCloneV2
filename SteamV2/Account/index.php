<!DOCTYPE html>


<?php


session_start();
include "../bend/Product.php";
$prod = new Product();
?>

<html>




<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlintLock - Account </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
    
</head>

<body style="background-color:#21394b;">
    <nav class="navbar navbar-light navbar-expand-md navigation-clean-search" style="background-image:linear-gradient(to bottom, rgb(30,29,29) , #21394b);">
        <div class="container"><a class="navbar-brand" href="../index.php" style="color:rgba(204,202,202,0.9);">Uun Logo</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="../Prod/index.php" style="color:rgba(204,202,202,0.9);">Tienda</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#" style="color:rgba(204,202,202,0.9);">Biblioteca</a></li>
                    
            <?php     echo'   <li class="nav-item" role="presentation"><a class="nav-link" href="#" style="color:rgba(204,202,202,0.9);">'.$_SESSION['name'].'</a></li>' ;
               echo '  <li class="nav-item" role="presentation"><a class="nav-link" href="logout.php" style="color:rgba(204,202,202,0.9);">Log Out</a></li>';
            ?>
                </ul>
                <form class="form-inline mr-auto" target="_self">
                    <div class="form-group"><label for="search-field"><i class="fa fa-search"></i></label><input class="form-control search-field" type="search" name="search" id="search-field" style="color:rgba(204,202,202,0.9);"></div>
                </form>
        </div>
        </div>
    </nav>

<?php 




if($_SESSION['rank'] == 'admin' ){
    echo '<a style="color:rgba(204,202,202,0.9);">Logged as ' .$_SESSION['name']  .' ('.$_SESSION['rank'].')';
  echo ' <a href="AddProd.php" class="btn btn-outline-success " role="button">Add game</a>';
  echo ' <a href="PostM.php" class="btn btn-outline-success " role="button">Post message</a>';
  $prod->getProductNotApprovedList();
  
  
}else if($_SESSION['rank'] == 'developer'){
    echo '<a style="color:rgba(204,202,202,0.9);">Logged as ' .$_SESSION['name']  .' ('.$_SESSION['rank'].')';
    echo ' <a href="AddProd.php" class="btn btn-outline-success " role="button">Add game</a>';
  
}else{
    echo  '<a style="color:rgba(204,202,202,0.9);">Logged as ' .$_SESSION['name']  .' ('.$_SESSION['rank'].'). Currently, we only support accounts for developers. Please, use the 
    below to contact an admin</a>';
}
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html><?php 
if($_GET != null){
    $name = $_GET['search'];
    header("Location: index.php?byname=$name");
}

?>