<?php 
include('DB/db.php');

$sql = "SELECT * FROM task";

$smts = $conn->prepare($sql);

 if($smts->execute()){

 while($result = $smts->fetch(PDO::FETCH_ASSOC)){

   $json[]=$result;




 }

  $jsonstring = json_encode($json);

   echo $jsonstring;





 }














?>