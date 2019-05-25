<?php
include "../db.php";
include "encryption.php";
echo "wait";

$user = $_POST['user'];
$pass = $_POST['pwd'];







try{


$get = $db->prepare("SELECT * FROM `users` WHERE User='$user'");
$get->execute();
if($get->rowCount() >= 1){







      $data = $get->fetch(PDO::FETCH_OBJ);


     $rank =  $data->Rank;

    $dbpass = $data->Password;





if(verify($pass, $dbpass)){
  session_start();
  echo "Redirecting...";
  $_SESSION['rank'] = $rank;
  $_SESSION['name'] = $user;
echo $rank;
echo $user;
  header("Location: ../index.php");
}else{
  setcookie("wrong", "wrong", time() + 10);
    header("Location: ../login.php");

}
}else{
    header("Location: ../login.php");
    setcookie("wrong", "wrong", time() + 10, "/");
    //TODO somethign went wrong
}
}catch (Exception $ex){
    echo ":(";
    setcookie("error", "error", time() + 10, "/");
}