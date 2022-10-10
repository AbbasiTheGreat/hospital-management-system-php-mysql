<?php
include "./hp_connect.php";
?>
<!DOCTYPE html>
<html>
<style>
body {
  background-image: url('./hospital.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
</style>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<title>Patient Info</title>
</head>
<body>
	<div class="container">

	
	<div class="container d-flex justify-content-center align-items-center">
		<br>
		<br>
		<br>

		<h2>Patient Data</h2>
	</div>
	<div>
		<button class="btn btn-warning my-5"><a href="receptionist.php" class="text-light">Add Patient</a></button>
	</div>
	<?php if (isset($_GET['error'])) { ?>
      	      <div class="alert alert-danger" role="alert">
				  <?=$_GET['error']?>
			  </div>
			  <?php } ?>
		

		<table class="table p-3 mb-2 bg-light text-dark rounded" >

  <thead>
    <tr>
      <th scope="col">Patient ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Gender</th>
      <th scope="col">Date Of Birth</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
  	<?php
  	$sql = "SELECT * FROM PATIENT";
  	$result = mysqli_query($conn , $sql);
  	if($result){
  		while($row = mysqli_fetch_assoc($result)){
  			$pid = $row['PATIENT_ID'];
  			$fname = $row['P_FNAME'];
  			$lname = $row['P_LNAME'];
  			$gender = $row['P_GENDER'];
  			$dob = $row['DOB'];

  			
  	echo '		 <tr>
      <th scope="row">'.$pid.'</th>
      <td>'.$fname.'</td>
      <td>'.$lname.'</td>
      <td>'.$gender.'</td>
      <td>'.$dob.'</td>
	  <td>
  	  <button class="btn btn-primary"><a href="update.php?updateid='.$pid.'" class="text-light">Update</a></button>
	
  	  <button class =" btn btn-danger"><a href="delete.php?deleteid='.$pid.'" class = "text-light">Delete</a></button>
  	</td>

    </tr> ';

  		}
  		
  	}

  	?>

  	
  </tbody>

  <!-- APPOINTMENT -->

<div>
</table>
<div class="container d-flex justify-content-center align-items-center rounded">
		<br>
		<br>
		<br>
		<h2 style = >Appointments</h2>
	</div>
<div>
	<button class="btn btn-warning my-5"><a href="appointment.php" class="text-light">Add Appointment</a></button>
	
</div>
<div>
<table class="table p-3 mb-2 bg-light text-dark rounded">
  <thead>
    <tr>
      <th scope="col">Appointment ID</th>
      <th scope="col">Patient ID</th>
      <th scope="col">Doctor ID</th>
      <!-- <th scope="col">Medicine ID</th> -->
      <th scope="col">Ward Number</th>
      <th scope="col">Appointment Date</th>
      <th scope="col">Appointment Time</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
  	<?php
  	$sql = "SELECT * FROM Appointment";
  	$result = mysqli_query($conn , $sql);
  	if($result){
  		while($row = mysqli_fetch_assoc($result)){
  			$pid = $row['PATIENT_ID'];
  			$apid = $row['APP_ID'];
  			$did = $row['EMP_ID'];
  			//$medid = $row['MED_ID'];
  			$wardid = $row['WARD_NUM'];
  			$apdate = $row['APP_DATE'];
  			$aptime = $row['APP_TIME'];

  			
  	echo '		 <tr>
      <th scope="row">'.$apid.'</th>
      <td>'.$pid.'</td>
      <td>'.$did.'</td>
      <td>'.$wardid.'</td>
      <td>'.$apdate.'</td>
      <td>'.$aptime.'</td>
	  <td>
  	  <button class="btn btn-primary"><a href="update_ap.php?apupdateid='.$apid.'" class="text-light">Update</a></button>
	
  	  <button class =" btn btn-danger"><a href="delete.php?apdeleteid='.$apid.'" class = "text-light">Delete</a></button>
  	</td>

    </tr> ';

  		}
  		
  	}

  	?>

  	
  </tbody>
  
</table>
</div>
<div>
  	<button type="button" class="btn btn-info"><a href="logout.php" class="text-light">LOGOUT</a></button>
  </div>


	


</body>
</html>