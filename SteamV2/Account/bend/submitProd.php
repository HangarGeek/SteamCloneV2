Please wait... (servers are busy)

<?php
session_start();

require_once("../db.php");

$name = $_POST['name'];
$desc = $_POST['desc'];
$min = $_POST['min'];
$price = $_POST['price'];








$insert = $db->prepare("INSERT INTO `products` ( `name`, `descr`, `min`, `price`,`pid`, `approved`, `publisher`)
VALUES ( :name, :desc, :min, :price, NULL, 0, :publisher)");

$insert->bindParam(':name', $name);
$insert->bindParam(':desc', $desc);
$insert->bindParam(':min', $min);
$insert->bindParam(':price', $price);
$insert->bindParam(':publisher', $_SESSION['name']);

$insert->execute();


header("Location: ../AddProd.php");

?>