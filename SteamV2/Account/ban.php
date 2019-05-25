<?php
session_start();
include "bend/account.php";

$rank = $_GET['rank'];
$pubs = $_GET['pubs'];

$acc = new account();
if($_SESSION['rank'] == 'admin'){
$acc->BanUserFromid($pubs, $rank);
header("Location: index.php");
}else{
   $name =  $_SESSION['name'];
    echo "trying to ban ".$id .",". $name . "?";
}