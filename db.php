<?php 

$user = 'root'; 
$password = '';

try{

$conn = new PDO('mysql:host=localhost; dbname=tasks2', $user, $password);

}
catch(PDOException $e){

echo 'Erro'.$e;

}





?>