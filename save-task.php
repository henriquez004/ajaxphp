<?php 

include('DB/db.php');

if(isset($_POST['name']) && isset($_POST['description'])){

$name = $_POST['name'];
$description = $_POST['description'];
$sql ="INSERT INTO task(name, description) VALUES('$name','$description')";

$stms = $conn->prepare($sql);
$result = $stms->execute();
if(!isset($result)){

die('Query faild');
}

echo "date save successfully";



}




?>