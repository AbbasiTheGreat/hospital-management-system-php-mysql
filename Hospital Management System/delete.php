<?php
include "./hp_connect.php";

if(isset($_GET['deleteid'])){
	$pid = $_GET['deleteid'];
	$sql = "DELETE FROM PATIENT WHERE PATIENT_ID = $pid";
	$result = mysqli_query($conn,$sql);
	if($result)
	{
		header("Location: ./display_pinfo.php");
	}else{
		header("Location: ./display_pinfo.php?error=Patient Data Exists in Appointment, Delete From Appointment");
		//die(mysqli_error($conn));
	}
}
if(isset($_GET['apdeleteid'])){
	$apid = $_GET['apdeleteid'];
	$sql = "DELETE FROM APPOINTMENT WHERE APP_ID = $apid";
	$result = mysqli_query($conn,$sql);
	if($result)
	{
		header("Location: ./display_pinfo.php");
	}else{
		die(mysqli_error($conn));
	}
}