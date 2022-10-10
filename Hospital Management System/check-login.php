<?php  
session_start();
include "./hp_connect.php";

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role'])) {

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	$username = test_input($_POST['username']);
	$password = test_input($_POST['password']);
	$role = test_input($_POST['role']);

	if (empty($username)) {
		header("Location: ../index.php?error=User Name is Required");
	}else if (empty($password)) {
		header("Location: ../index.php?error=Password is Required");
	}else {

		// Hashing the password
		$password = md5($password);
		echo $password;
        
        $sql = "SELECT * FROM login WHERE USERNAME ='$username' AND PASSWORD ='$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
        	// the user name must be unique
        	$row = mysqli_fetch_assoc($result);
        	if ($row['PASSWORD'] === $password && $row['ROLE'] == $role) {
        		//$_SESSION['name'] = $row['name'];
        		$_SESSION['id'] = $row['LOGIN_ID'];
        		$_SESSION['role'] = $row['ROLE'];
        		$_SESSION['username'] = $row['USERNAME'];
        		//echo "Hellow ";

        		header("Location: ./check_user.php");

        	}else {
        		
        		header("Location: ../index.php?error=Incorect User name or password");
        	}
        }else {
        	header("Location: ../index.php?error=Incorect User name or password");
        }

	}
	
}else {
	header("Location: ./index.php");
}