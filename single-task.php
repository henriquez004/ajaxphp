<?php 


include('DB/db.php');


if(isset($_POST['id'])){

$id = $_POST['id'];
 
$sql = "SELECT * FROM task WHERE id= $id";

$smts = $conn->prepare($sql);
$smts->execute();

while($result = $smts->fetch(PDO::FETCH_ASSOC)){

  $json[]=$result;
  
}

$jsonstring= json_encode($json);

echo $jsonstring;

}







?>