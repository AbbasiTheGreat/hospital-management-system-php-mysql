<?php
include "hp_connect.php";
if(isset($_POST['submit'])){
  $fname= $_POST['fname'];
  $lname= $_POST['lname'];
  $pid =  $_POST['pid'];
  $gender=$_POST['gender'];
  $dob =  $_POST['dob'];

  $sql = "INSERT INTO PATIENT (P_FNAME , P_LNAME , PATIENT_ID , P_GENDER , DOB) VALUES('$fname','$lname','$pid','$gender','$dob')";
  $result = mysqli_query($conn,$sql);
  if($result){
    header("Location:./display_pinfo.php");
  }else{
    die(mysqli_error($conn));
  }
  
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Receptionist</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <div class = "container my-5">
      <form method="post">
<!-- <div class="mb-3">
    <label  class="form-label">Patient ID</label>
    <input type="number" class="form-control" placeholder="Enter Here" name="pid">
  </div> -->

  <div class="mb-3">
    <label  class="form-label">First Name</label>
    <input type="text" class="form-control" placeholder="Enter Here" name="fname">
  </div>
   <div class="mb-3">
    <label  class="form-label">Last Name</label>
    <input type="text" class="form-control" placeholder="Enter Here" name="lname">
  </div>
  <div>
<label  class="form-label">Gender</label>
<select class="form-select mb-3"
              name= "gender" 
              aria-label="Default select example">
        <option selected value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
    </select>
  </div>
  <div class="mb-3">
    <label  class="form-label">Date of Birth</label>
    <input type="date" class="form-control" placeholder="Enter Here" name="dob">
  </div>


  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
  </body>
</html>