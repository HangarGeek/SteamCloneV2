<?php


class account{

    function __construct()
    {
        
      $db = new PDO('mysql:host=localhost;dbname=main', 'dank', 'dank');
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
       

try{
 
  
  
     
  
  
  
  }catch (Exception $e){
    echo "cannot connect to Database. Report this to a Developer!";
  echo "<pre>";
    var_dump($e);
    exit;
  }
  
  
    }

    function getAccountRankFromId(int $id){



    }

    public function BanUserFromid($pubs, $rank){
            
      
      $db = new PDO('mysql:host=localhost;dbname=main', 'dank', 'dank');
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
      $mail = " SELECT * FROM `users` WHERE `User` = ". $pubs ."";
      //TODO email

    
      $query = " DELETE FROM `users` WHERE `User` = '$pubs' ";
      if($rank == 'developer'){
      $other = "UPDATE `products` SET `Bad` = '1' WHERE `publisher` = '$pubs'";
      $other2 = "UPDATE `products` SET `approved` = '0' WHERE `publisher` = '$pubs'";

      $prods = $db->prepare($other);
      $prods->execute();

      $prods = $db->prepare($other2);
      $prods->execute();
      }


      $update = $db->prepare($query);
      $update->execute();

    
      
     
    }

}