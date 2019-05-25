<!DOCTYPE html><?php 

include($_SERVER['DOCUMENT_ROOT'].'/SteamV2/bend/Product.php');



$prod = new Product();

$id = $_GET['id'];

$prod->DelGameFromId($id);

header("Location: ../AccountRed.php");

?>