<?php

$password = $_POST['pwd'];



 $hasht = password_hash($password, PASSWORD_BCRYPT);


function verify($password, $hash){
if(password_verify($password, $hash)){
  return true;
}
return false;

}
?>
