<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "assignment2";

// Create Connection
$conn  = mysqli_connect($db_host, $db_user, $db_password, $db_name);

// Check Connection
if(!$conn) {
 die("connection failed");
}
?>