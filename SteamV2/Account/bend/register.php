<?php
echo "wait";

include "../db.php";
include "encryption.php";
$user = $_POST['user'];
$password = $_POST['pwd'];
$mail = $_POST['mail'];
$rank = "Default";


try{
    
$insert = $db->prepare("INSERT INTO `users` (`id`, `User`, `email`, `Password`, `Rank`)
VALUES (NULL, :name, :email, :psw, :rnk)");

$insert->bindParam(':name', $user);
$insert->bindParam(':email', $mail);
$insert->bindParam(':psw', $hasht);
$insert->bindParam(':rnk', $rank);
$insert->execute();

setcookie("register", "1", time() + 10, "/");

header("Location: ../login.php");


}catch(Exception $ex){
    setcookie("register", "2", time() + 10, "/");
    header("Location: ../register.php");
    
}