<?php 

include('DB/db.php');


if(isset($_POST['id'])){

$id = $_POST['id'];

$sql = "DELETE  FROM task WHERE id =$id";

$smts = $conn->prepare($sql);

$result = $smts->execute();

if(!isset($result)){

  die('Query faild');
}
echo 'Date delte successfully';






}



















?>