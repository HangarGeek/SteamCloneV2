<?php

$name = $_GET['searchbyname'];
$array = array();



try{
    $db = new PDO('mysql:host=localhost;dbname=main', 'dank', 'dank');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    $result = "SELECT pid, name FROM products WHERE `name` LIKE '$name' ORDER BY name";
$r = $db->prepare($result);



$r->execute();
while($res = $r->fetch(PDO::FETCH_ASSOC)){

    $array[] = $res;
}
  
     echo json_encode($array);
  
  
  
  }catch (Exception $e){
    echo "cannot connect to Database. Report this to a Developer!";
  echo "<pre>";
    var_dump($e);
    exit;
  }
  