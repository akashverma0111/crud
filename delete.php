<?php 

require_once 'config/dbconnection.php';
$id = $_GET['id'];
$sql = "delete from classes where id = '{$id}'";
$resultset = mysqli_query($conn, $sql);
$result = mysqli_affected_rows($conn);
if($result >= 0){
	 header("Location: index.php");
}



?>
