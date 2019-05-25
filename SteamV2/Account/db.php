<?php



try{
  $db = new PDO('mysql:host=localhost;dbname=main', 'dank', 'dank');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


   



}catch (Exception $e){
  echo "cannot connect to Database. Report this to a Developer!";
echo "<pre>";
  var_dump($e);
  exit;
}


