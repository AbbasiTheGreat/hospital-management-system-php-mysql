<?php

$servername= "localhost";
$username = "root";
$password = "";
$dbname = "hospital";
$conn = mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
	die(mysqli_error($conn));
}

?>