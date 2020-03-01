<?php 

include('DB/db.php');

if(isset($_POST['id']) &&  isset($_POST['name']) && isset($_POST['description'])){

$id = $_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];

$sql = "UPDATE task SET name =  '$name', description = '$description' WHERE id =$id";

$smts = $conn->prepare($sql);

$result = $smts->execute();

if(isset($result)){


echo "Update task successfully";

}
else{
    die('Query faild');
}














}

?>