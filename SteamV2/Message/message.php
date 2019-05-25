<?php 



class message{

    public function PostMessage(){

        session_start();
        $title = $_POST['title'];
        $text = $_POST['Text'];
        $author = $_SESSION['name'];
        $rank = $_SESSION['rank'];
        


        $db = new PDO('mysql:host=localhost;dbname=main', 'dank', 'dank');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  



try{
    $queryd = $db->prepare("INSERT INTO `posts` (`id`, `title`, `author`,`rank`, `date`, `Text`) VALUES 
    (NULL, :title, :author, :rankk, NOW(), :text)");


$queryd->bindParam(':title', $title);
$queryd->bindParam(':text', $text);
$queryd->bindParam(':author', $author);
$queryd->bindParam(':rankk', $rank);

$queryd->execute();





}catch(Exception $exc){
    echo "<pre>";
 var_dump($exc);
}

    }

    public function PostComment(){
        session_start();
        $id = $_POST['mid'];
        $text = $_POST['text'];
        $author = $_SESSION['name'];
        $rank = $_SESSION['rank'];
        


        $db = new PDO('mysql:host=localhost;dbname=main', 'dank', 'dank');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  



try{
    $queryd = $db->prepare("INSERT INTO `comments` (`id`, `cid`, `user`, `rank`,  `Text`) VALUES 
    (NULL, :cid, :author, :rankk, :text)");


$queryd->bindParam(':cid', $id);
$queryd->bindParam(':text', $text);
$queryd->bindParam(':author', $author);
$queryd->bindParam(':rankk', $rank);

$queryd->execute();





}catch(Exception $exc){
    echo "<pre>";
 var_dump($exc);
}


    }
    public function GetPostFromId(int $id){

    }
    public function DelPostFromUri(){
        $id = $_GET['mid'];
        $db = new PDO('mysql:host=localhost;dbname=main', 'dank', 'dank');
        if($_SESSION['rank'] == 'admin'){
        
$query = "DELETE FROM `posts` WHERE `posts`.`id` = $id";
$update = $db->prepare($query);
$update->execute();

        }

    }
    public function DelCommentFromUri(){
        $id = $_GET['mid'];
        $db = new PDO('mysql:host=localhost;dbname=main', 'dank', 'dank');

        
        if($_SESSION['rank'] == 'admin'){
$query = "DELETE FROM `comments` WHERE `comments`.`id` = $id";
$update = $db->prepare($query);
$update->execute();

        }

    }


    public function GetPostFromURI(){
        $id = $_GET['mid'];
try{
        $db = new PDO('mysql:host=localhost;dbname=main', 'dank', 'dank');
        $result = "SELECT * FROM posts WHERE `id`=$id";
        $r = $db->prepare($result);
   $r->execute();

        while($res = $r->fetch(PDO::FETCH_ASSOC)){




echo '<div class="post"><h4> <b>'.$res['title'] .'</b>  by <b>'.$res['author'].' </b></h4>
           <h5> at <b>'.$res['date'] .'</b> </h5>
           <br>
            '.$res['Text'].'';
            
            if(isset($_SESSION['rank']))
            if($_SESSION['rank'] == 'admin'){
                echo '<a href="Message/delmes.php?mid='.$res['id'].'" class="btn btn-outline-danger " role="button">Delete</a>';
            }

       
         
       
         echo '   </div>' ;

     
        }

        
    }catch(Exception $exx){
        echo "<pre>";
        var_dump($exx);

    }

    if(isset($_SESSION['rank']) ){
        echo '<div class="div1">';
        
    echo '<div class="post"> <h2> Post comment</h2>
    <form class="form-inline" action="Message/AddMessage.php" method="post">


    <input type="text" readonly class="form-control-plaintext" id="mid" name="mid" value="'. $id.'">
    <textarea type="text" class="form-control" name="text" id="Description" value="" placeholder="Content"cols="40" rows="5" maxlength="7000"></textarea><br>
    <button type="submit" class="btn btn-outline-default " value="Submit"> Submit </buton>  </div>';
    }else{
        echo '<div class="div2">';
    }
    $result2 = "SELECT * FROM comments WHERE `cid`=$id ORDER BY `id`";
    $r2 = $db->prepare($result2);
$r2->execute();

    while($res2 = $r2->fetch(PDO::FETCH_ASSOC)){
        
        echo '<div class="post">';
        if($res2['rank'] == 'admin'){
            echo '<h4 style="color:rgb(255, 19, 0)"><b>'.$res2['user'].' </b></h4>';
        }else if($res2['rank'] == 'developer'){
            echo '<h4 style="color:green"><b>'.$res2['user'].' </b></h4>';
        }else{
            echo '<h4 style="color:grey"><b>'.$res2['user'].' </b></h4>';
        }


echo '   <p>'.$res2['text'].'</p>';

if((isset($_SESSION['rank'])  || !empty($_SESSION['rank']) ) && $_SESSION['rank'] == 'admin'){

    echo '<a href="Message/delcom.php?mid='.$res2['id'].'" class="btn btn-outline-danger " role="button">Delete post</a>';
    echo '<a href="Account/ban.php?pubs='.$res2['user'].'&rank='.$res2['rank'].'" class="btn btn-danger " role="button">Ban user</a>';

}
echo '</div> ';


    }
    echo '</div>';
    }



    public function GetPostList(){
        $db = new PDO('mysql:host=localhost;dbname=main', 'dank', 'dank');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
        
        $result = "SELECT * FROM posts ORDER BY id DESC";
        $r = $db->prepare($result);

    
        
        
        $r->execute();
        while($res = $r->fetch(PDO::FETCH_ASSOC)){

           echo '<div class="post"><h4> <b>'.$res['title'] .'</b>  by <b>'.$res['author'].' </b></h4>
           <h5> at <b>'.$res['date'] .'</b> </h5>
           <br>
            '.$res['Text'].'

       <br>
         
            <a class="" href="?mid='.$res['id'].'">View comments</a>';

            if(isset($_SESSION['rank']))
            if($_SESSION['rank'] == 'admin'){
                echo '<a href="Message/delmes.php?mid='.$res['id'].'" class="btn btn-outline-danger " role="button">Delete</a>';
            }
    
     echo '   </div>' ;
          
        }
    }
}

