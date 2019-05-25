<?php

class Product{
 
public function getProductFromId(int $id){

  include "db.php";

try{
    $queryd = " SELECT * FROM `products` WHERE `pid`='$id'";

    $ex = $db->query($queryd);

    
      
while($res = $ex->fetch(PDO::FETCH_ASSOC)){
  $doneThis = false;

echo ' 
 <h1 class="text-center" style="color:rgb(201,203,204);">'. $res['name'] .'</h1>
 <div style="background-image:linear-gradient(to bottom, rgb(30,29,29) , #21394b);border-radius:1px;padding:500px;width:500px;height:500px;margin-bottom:auto;margin-top:auto;margin-left:auto;margin-right:auto;border-radius:25px;background:#000000;padding:20px;width:50%;height:90%;background-image:linear-gradient(to bottom, rgb(30,29,29) , #21394b);">


 <img src="../img/'.$id.'.png" class="img-fluid" alt="Img not found">';
 if($res['Bad']==1 && $res['approved']!=1){
  echo '<div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">Be aware!</h4>
  <p>Download isn\'t available anymore as publisher has been banned. We recommend you to remove the product in case you had downloaded it</p>

  </div>';
}else  if($res['approved']!=1){
  echo '<div class="alert alert-warning" role="alert">
  <h4 class="alert-heading">Warning!</h4>
  <p>The game has been submited by the publisher for our reviewal, however it hasn\'t been approved yet.</p>

  <p class="down">Game will be available within 72 hours</p>
  </div>';
 }else if($res['Bad']==1){

  echo '<div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">Be aware!</h4>
  <p>Download isn\'t available anymore for one of the following reasons:</p>
  <ul>
  <li>Numerous antivirus have flagged it</li>
  <li>Publisher\'s account has been banned</li>
  <li>Publisher has contacted us requesting to delete it</li>
</ul> 
  </div>';


 }else{


 
  echo'<button class="button" type="button" data-hover=" '.  $res['price']. '€ "><span>Buy</span></button> '; 
 }
  echo' <p style="color:rgb(201,203,204);">'. $res['descr'] .'
   </p><h2 class="text-center" style="color:rgb(201,203,204);"> Required </h2>  <p style="color:rgb(201,203,204);">'.  $res['min'] .'
   </p>';

if( $res['approved']!=1){

  if($_SESSION['rank'] == 'admin'){
    echo '<a href="bend/approve.php?id='. $res['pid'].'" class="btn btn-success" role="button">Approve</a> ';
  }

}





}



  
}catch (Exception $ex){
  echo "Exception";
  echo $ex;
}

}


public function getProductFromName($name){


  
  include "db.php";

try{
    $queryd = " SELECT * FROM `products` WHERE `name` LIKE '$name'";

    $ex = $db->query($queryd);

    

while($res = $ex->fetch(PDO::FETCH_ASSOC)){
  $doneThis = false;

  $id = $res['pid'];
if($res['descr'] != ""){
echo ' 
 <h1 class="text-center" style="color:rgb(201,203,204);">'. $res['name'] .'</h1>
 <div style="background-image:linear-gradient(to bottom, rgb(30,29,29) , #21394b);border-radius:1px;padding:500px;width:500px;height:500px;margin-bottom:auto;margin-top:auto;margin-left:auto;margin-right:auto;border-radius:25px;background:#000000;padding:20px;width:50%;height:90%;background-image:linear-gradient(to bottom, rgb(30,29,29) , #21394b);">


 <img src="../img/'.$id.'.png" class="img-fluid" alt="Not found">
';
if($res['Bad']==1 && $res['approved']!=1){
  echo '<div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">Be aware!</h4>
  <p>Download isn\'t available anymore as publisher has been banned. We recommend you to remove the product in case you had downloaded it</p>

  </div>';
}else  if($res['approved']!=1){
  echo '<div class="alert alert-warning" role="alert">
  <h4 class="alert-heading">Warning!</h4>
  <p>The game has been submited by the publisher for our reviewal, however it hasn\'t been approved yet.</p>

  <p class="down">Game will be available within 72 hours</p>
  </div>';
 }else if($res['Bad']==1){

  echo '<div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">Be aware!</h4>
  <p>Download isn\'t available anymore for one of the following reasons:</p>
  <ul>
  <li>Numerous antivirus have flagged it</li>
  <li>Publisher\'s account has been banned</li>
  <li>Publisher has contacted us requesting to delete it</li>
</ul> 
  </div>';


 }else{


 
  echo'<button class="button" type="button" data-hover=" '.  $res['price']. '€ "><span>Buy</span></button> '; 
 }

echo'
<p style="color:rgb(201,203,204);">'. $res['descr'] .'
 </p><h2 class="text-center" style="color:rgb(201,203,204);"> Required </h2>  <p style="color:rgb(201,203,204);">'.  $res['min'] .'
</p>';

}

}




  
}catch (Exception $ex){
  echo "Exception";
  echo $ex;
}

}

public function getProductNotApprovedList(){
 include "db.php";
  $result = "SELECT * FROM products WHERE approved=0 ORDER BY pid";
$r = $db->prepare($result);

echo '

<table class="table table-dark table-striped table-bordered  " style="color:white;">
<thead>
  <tr>
    <th scope="col">#</th>
    <th scope="col">Image</th>
    <th scope="col">Name</th>
    <th scope="col">Publisher</th>
    <th scope="col">Status</th>

    <th scope="col"> </th>
    <th scope="col">Actions</th>
  </tr>
</thead>';


$r->execute();
while($res = $r->fetch(PDO::FETCH_ASSOC)){
  
  
  
        echo "<tbody>";
  echo "<td> ".  $res['pid'] . "</td> ";
  echo  '<td><img src="../img/logo/'. $res['pid'].'.png" alt="Not available" height="42" width="42"> </td>';
  echo " <td><b> ".  $res['name'] . "</b></td> ";
  echo '<td> '.  $res['publisher'] . '   <br><a href="ban.php?id='. $res['pid'].'&pubs='.$res['publisher'] .'&rank=developer" class="btn btn-danger" role="button">Ban</a></td> ';
  echo "<td> ".  $res['approved'] . "</td> ";
  echo '<td>   <a href="../Prod/index.php?id='. $res['pid'].'" class="btn btn-info" role="button">Info</a> ';
  echo ' <td>  <a href="../Prod/bend/approve.php?id='. $res['pid'].'" class="btn btn-success" role="button">Approve</a> ';
  echo ' <a href="../Prod/bend/delete.php?id='. $res['pid'].'" class="btn btn-danger" role="button">Delete</a> ';


  
  
  
  }

}

public function ApproveGameFromId($id){


include "db.php";

$query = "UPDATE `products` SET `approved` = '1' WHERE `products`.`pid` = ". $id . "";
$update = $db->prepare($query);

$update->execute();


}

public function DelGameFromId($id){


  include "db.php";

      
$query = "DELETE FROM `products` WHERE `products`.`pid` =". $id."";
$update = $db->prepare($query);

$update->execute();

  
  
  
  
  }
}
