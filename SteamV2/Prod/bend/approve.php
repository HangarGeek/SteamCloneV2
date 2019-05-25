<!DOCTYPE html><?php 

include($_SERVER['DOCUMENT_ROOT'].'/SteamV2/bend/Product.php');



$prod = new Product();

$id = $_GET['id'];

$prod->ApproveGameFromId($id);

header("Location: ../AccountRed.php");

?>