<?php 
include('DB/db.php');

$search = $_POST['search'];


if(!empty($search)){

$sql = "SELECT * FROM task WHERE name LIKE '$search%'";
$smts = $conn->prepare($sql);

if($smts->execute()){


while($result = $smts->fetch(PDO::FETCH_ASSOC)){

 $json[] = $result;



}
$jsonstring = json_encode($json);

echo $jsonstring;


}





}/*if empty*/



?>